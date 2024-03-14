<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;
class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::where("status", true)->get(["id", "name", "group_name"])->groupBy("group_name");

        return view('backend.users.roles')->with('permissions',$permissions);
    }


    public function store(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            "permissions" => "nullable|array",
            "permissions.*" => "nullable|exists:permissions,id",
            "name" => "required|string",
        ]);

        try {
            $role = Role::create($validatedData);
            $role->syncPermissions($request->permissions);
            return response()->json(['status' => '200', 'msg' => 'Role created Successfully', "id" => $role->id]);

        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            "id" => "required|exists:roles",
            "name" => "required|string",
            "permissions" => "nullable|array",
            "permissions.*" => "nullable|exists:permissions,id",
        ]);

        try {
            $role = Role::find($request->id);
            $role->update($validatedData);
            $role->syncPermissions($request->permissions);
            return response()->json(['status' => '200', 'msg' => 'Role Updated Successfully', "id" => $role->id]);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'error' => 'Something went wrong!', 'error' => $e->getMessage()], 500);
        }
    }
    public function datatable(Request $request)
    {
        $query = Role::get();
        // dd($query);
        return DataTables::of(($query))
            ->make(true);
    }



    public function show(Request $request){
        $request->validate([
            'id' => 'required|exists:roles,id',
        ]);
        try {
            $cat = Role::find($request->id);
            $cat->load("permissions");

            $result = array('status' => '200', 'msg' => 'Role details fetched successfully', 'data' => $cat);
        } catch (\Exception $exception) {
            $result = array('status' => '500', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }



    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:roles',
            'action' => 'required',
        ]);
        $status = Role::find($request->id);
        $status->status = $request->boolean('action');
        $status->updated_by = auth()->user()->id;
        if ($status->save()) {
            $result = array('status' => '200', 'msg' => ' Record(s) updated successfully');
        } else {
            $result = array('status' => '500', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }



    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions',
        ]);

        $status = Role::find($request->id);
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

            if (Role::whereIn('id', $ids)->delete()) {
                $result = array('status' => '200', 'msg' => count($ids) . ' Record(s) deleted successfully');
            } else {
                $result = array('status' => '500', 'msg' => 'Something went wrong!!');
            }

        }

        return json_encode($result);
    }
}
