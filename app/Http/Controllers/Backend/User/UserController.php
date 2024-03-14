<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DataTables;
use DB;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Mail;
use App\Jobs\SendPasswordResetEmail;

class UserController extends Controller
{
    public function index()
    {


        $roles = Role::when(!auth()->user()->hasRole('Super Admin'), function($q){
            $q->whereNotIn('name', ['Super Admin']);
        })->get();
        $users = User::all();

        return view('backend.users.index')
            ->with('roles', $roles)
            ->with('users', $users);
    }

    public function datatable(Request $request)
    {
        $query = User::select('users.*');
        return DataTables::of(($query))
            ->make(true);
    }

    public function store(Request $request)
    {

        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "email" => "required",
            "role" => "required",
            'telegram_chat_id'=>'nullable'
        ]);

        try {
            if(!auth()->user()->hasRole('Super Admin') && $request->role == 'Super Admin'){
                return response()->json(['status' => '500', 'msg' => 'You are not allowed to create Super Admin!'], 403);
            }


            DB::beginTransaction();
            $parent = User::where('uid', $request->parent_id)->first();

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->avatar = 'placeholder.png';
            $user->email = $request->email;
            $user->telegram_chat_id = $request->telegram_chat_id;

            // $user->slab_id = $request->slab_id;
            $user->password = Hash::make($request->password);
            $user->uid = generateAlphaNumeric(5);

            $user->status = $request->status;
            $user->save();


            event(new Registered($user));
            $user->assignRole($request->role);
            DB::commit();




            return response()->json(['status' => '200', 'msg' => 'User created Successfully', "id" => $user->id]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()], 500);
        }
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);

        $old_data = json_encode($user->toArray());
        $validatedData = $request->validate([
            "id" => "required|exists:users",
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "email" => "required|unique:users,email," . $user->id,
            "role" => "required",
            "telegram_chat_id" => "nullable",
            // 'referral_code' => 'nullable',
        ]);

        try {

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->avatar = 'placeholder.png';
            $user->email = $request->email;
            $user->telegram_chat_id = $request->telegram_chat_id;

            // $user->password = Hash::make($request->password);


            $user->status = $request->status;
            $user->save();
            $user->syncRoles($request->role);
            $new_data = json_encode($user->toArray());

            logActivity(auth()->id(),$user->id,User::Class,'User Updated',$old_data,$new_data);
            return response()->json(['status' => '200', 'msg' => 'User updated Successfully', "id" => $user->id]);

        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);
        try {
            $user = User::with('roles')->find($request->id);
            $result = array('status' => '200', 'msg' => 'User details fetched successfully', 'data' => $user);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
        return json_encode($result);
    }



    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users',
        ]);

        $status = User::find($request->id);
        if ($status->delete()) {
            $result = array('status' => '200', 'msg' => 'Record(s) deleted successfully');
        } else {
            $result = array('status' => '500', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function deleteMultiple(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
        ]);
        if (gettype($request->ids) == 'array' && count($request->ids) > 0) {
            $ids = $request->ids;

            if (User::whereIn('id', $ids)->delete()) {
                $result = array('status' => '200', 'msg' => count($ids) . ' Record(s) deleted successfully');
            } else {
                $result = array('status' => '500', 'msg' => 'Something went wrong!!');
            }

        }

        return json_encode($result);
    }



    public function updatePassword(Request $request){
        // dd($request->all());
        $request->validate([
            'id' => 'required|exists:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);


        if($user->save()){


            // Mail::to($user->email)->send(new PasswordResetEmail());
            SendPasswordResetEmail::dispatch($user->email, $user->full_name, $request->password);

            $result = array('status' => '200', 'msg' => 'Password updated successfully');
        }else{
            $result = array('status' => '500', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'action' => 'required|boolean',
            'key' => 'required',
        ]);

        $status = User::findOrFail($validatedData['id']);
        $status->{$validatedData['key']} = $validatedData['action'];
        // $status->updated_by_id = auth()->user()->id;

        if ($status->save()) {
            $result = ['status' => 200, 'msg' => 'User Status updated successfully'];
        } else {
            $result = ['status' => 500, 'msg' => 'Something went wrong!!'];
        }

        return response()->json($result);
    }
}
