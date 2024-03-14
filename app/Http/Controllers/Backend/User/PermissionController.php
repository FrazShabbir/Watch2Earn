<?php

namespace App\Http\Controllers\Backend\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Str;
use DataTables;
class PermissionController extends Controller
{
    public function index()
    {
        return view('backend.users.permissions');
    }
    public function datatable(Request $request)
    {
        $query = Permission::select('permissions.*');
        return DataTables::of(($query))
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);
        try {
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->group_name = $request->group_name;
            $permission->slug = Str::slug($request->name);
            $permission->save();
            return response()->json(['status' => '200', 'msg' => 'Permission created Successfully', "id" => $permission->id]);

        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions,id',
        ]);
        try {
            $permission = Permission::find($request->id);
            $result = array('status' => '1', 'msg' => 'Permission details fetched successfully', 'data' => $permission);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
        return json_encode($result);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "id" => "required|exists:permissions",
            "name" => "required|string",
            "group_name" => "nullable|string",
        ]);

        try {
            $permission = Permission::find($request->id);
            $permission->name = $request->name;
            $permission->group_name = $request->group_name;
            $permission->slug = Str::slug($request->name);
            $permission->save();
            return response()->json(['status' => '200', 'msg' => 'Permission details updated successfully', "id" => $permission->id]);

        } catch (\Exception $exception) {
            $result = array('status' => '0', 'msg' => 'Something went wrong!!', 'error' => $exception->getMessage());
        }
        return json_encode($result);
    }


    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions',
            'action' => 'required',
        ]);
        $status = Permission::find($request->id);
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

        $status = Permission::find($request->id);
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

            if (Permission::whereIn('id', $ids)->delete()) {
                $result = array('status' => '200', 'msg' => count($ids) . ' Record(s) deleted successfully');
            } else {
                $result = array('status' => '500', 'msg' => 'Something went wrong!!');
            }

        }

        return json_encode($result);
    }
}
