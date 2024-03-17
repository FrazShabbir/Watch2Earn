<?php

namespace App\Http\Controllers\Backend\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use DataTables;

class PackageController extends Controller
{
    public function index()
    {
        // dd('Package');
        return view('backend.package.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'slug' => 'nullable|unique:packages',
            'order' => 'nullable',
            'badge' => 'nullable',
            'color' => 'nullable',
            'icon' => 'nullable',
            'status' => 'nullable',
        ]);

        try {
            $package = new Package();
            $package->name = $request->name;
            $package->price = $request->price;
            $package->description = $request->description;

            $package->status = $request->status;

            $package->slug = $request->slug;
            $package->order = $request->order;
            $package->badge = $request->badge;
            $package->color = $request->color;
            $package->icon = $request->icon;
            $package->created_by_id = auth()->user()->id;
            if ($request->hasFile('image')) {
                $package->image = uploadImage($request->image, 'package');
            }
            if ($request->hasFile('thumbnail')) {
                $package->thumbnail = uploadImage($request->thumbnail, 'package');
            }
            $package->save();
            return response()->json(['status' => '200', 'msg' => 'Package created Successfully', "id" => $package->id]);

        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'slug' => 'nullable|unique:packages,slug,' . $request->id,
            'order' => 'nullable',
            'badge' => 'nullable',
            'color' => 'nullable',
            'icon' => 'nullable',
            'status' => 'nullable',
        ]);

        try {
            $package = Package::find($request->id);
            $package->name = $request->name;
            $package->price = $request->price;
            $package->description = $request->description;

            $package->slug = $request->slug;
            $package->order = $request->order;
            $package->badge = $request->badge;
            $package->color = $request->color;
            $package->icon = $request->icon;
            $package->updated_by_id = auth()->user()->id;
            if ($request->hasFile('image')) {
                $package->image = uploadImage($request->image, 'package');
            }
            if ($request->hasFile('thumbnail')) {
                $package->thumbnail = uploadImage($request->thumbnail, 'package');
            }
            $package->save();
            return response()->json(['status' => '200', 'msg' => 'Package Updated Successfully', "id" => $package->id]);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function datatable(Request $request)
    {
        $query = Package::get();
        return DataTables::of(($query))
            ->make(true);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:packages,id',
        ]);
        try {
            $cat = Package::find($request->id);
            $result = array('status' => '200', 'msg' => 'Package details fetched successfully', 'data' => $cat);
        } catch (\Exception $exception) {
            $result = array('status' => '500', 'msg' => 'Something went wrong!!', 'error' => $exception->getMessage());
        }
        return json_encode($result);
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
