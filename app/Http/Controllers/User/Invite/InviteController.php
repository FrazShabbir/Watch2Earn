<?php

namespace App\Http\Controllers\User\Invite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
class InviteController extends Controller
{
    public function index()
    {
        // dd('Package');
        return view('user.invites.index');
    }


    public function datatable(Request $request)
    {
        $query = User::where('parent_id',auth()->id())->get();
        return DataTables::of(($query))
            ->make(true);
    }



    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:packages,id',
            'action' => 'required|boolean',
            'key' => 'required',
        ]);

        $status = Package::findOrFail($validatedData['id']);
        $status->{$validatedData['key']} = $validatedData['action'];
        $status->updated_by_id = auth()->user()->id;

        if ($status->save()) {
            $result = ['status' => 200, 'msg' => 'Package updated successfully'];
        } else {
            $result = ['status' => 500, 'msg' => 'Something went wrong!!'];
        }

        return response()->json($result);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:packages',
        ]);

        $status = Package::find($request->id);
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

            if (Package::whereIn('id', $ids)->delete()) {
                $result = array('status' => '200', 'msg' => count($ids) . ' Record(s) deleted successfully');
            } else {
                $result = array('status' => '500', 'msg' => 'Something went wrong!!');
            }

        }

        return json_encode($result);
    }



}
