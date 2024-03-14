<?php

namespace App\Http\Controllers\Backend\Source;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Source;
use DataTables;
class SourceController extends Controller
{
    public function index()
    {
        return view('backend.source.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:sources',
            'order' => 'nullable',
            'badge' => 'nullable',
            'color' => 'nullable',
            'icon' => 'nullable',
            'status' => 'nullable',
        ]);

        try {
            $source = new Source();
            $source->name = $request->name;
            if ($request->is_listing_source) {
                $source->is_listing_source = 1;
            } else {
                $source->is_listing_source = 0;
            }

            if ($request->is_lead_source) {
                $source->is_lead_source = 1;
            } else {
                $source->is_lead_source = 0;
            }

            $source->status = $request->status;

            $source->slug = $request->slug;
            $source->order = $request->order;
            $source->badge = $request->badge;
            $source->color = $request->color;
            $source->icon = $request->icon;
            $source->created_by_id = auth()->user()->id;
            if ($request->hasFile('image')) {
                $source->image = uploadImage($request->image, 'source');
            }
            if ($request->hasFile('thumbnail')) {
                $source->thumbnail = uploadImage($request->thumbnail, 'source');
            }
            $source->save();
            return response()->json(['status' => '200', 'msg' => 'Source created Successfully', "id" => $source->id]);

        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:sources,slug,' . $request->id,
            'order' => 'nullable',
            'badge' => 'nullable',
            'color' => 'nullable',
            'icon' => 'nullable',
            'status' => 'nullable',
        ]);

        try {
            $source = Source::find($request->id);
            $source->name = $request->name;
            if ($request->is_listing_source) {
                $source->is_listing_source = 1;
            } else {
                $source->is_listing_source = 0;
            }
            if ($request->is_lead_source) {
                $source->is_lead_source = 1;
            } else {
                $source->is_lead_source = 0;
            }
            $source->slug = $request->slug;
            $source->order = $request->order;
            $source->badge = $request->badge;
            $source->color = $request->color;
            $source->icon = $request->icon;
            $source->updated_by_id = auth()->user()->id;
            if ($request->hasFile('image')) {
                $source->image = uploadImage($request->image, 'source');
            }
            if ($request->hasFile('thumbnail')) {
                $source->thumbnail = uploadImage($request->thumbnail, 'source');
            }
            $source->save();
            return response()->json(['status' => '200', 'msg' => 'Source Updated Successfully', "id" => $source->id]);
        } catch (\Exception $exception) {
            return response()->json(['status' => '500', 'msg' => 'Something went wrong!', 'error' => $e->getMessage()]);
        }
    }
    public function datatable(Request $request)
    {
        $query = source::get();
        return DataTables::of(($query))
            ->make(true);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sources,id',
        ]);
        try {
            $cat = source::find($request->id);
            $result = array('status' => '200', 'msg' => 'Source details fetched successfully', 'data' => $cat);
        } catch (\Exception $exception) {
            $result = array('status' => '500', 'msg' => 'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:sources,id',
            'action' => 'required|boolean',
            'key' => 'required',
        ]);

        $status = Source::findOrFail($validatedData['id']);
        $status->{$validatedData['key']} = $validatedData['action'];
        $status->updated_by_id = auth()->user()->id;

        if ($status->save()) {
            $result = ['status' => 200, 'msg' => 'Source updated successfully'];
        } else {
            $result = ['status' => 500, 'msg' => 'Something went wrong!!'];
        }

        return response()->json($result);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sources',
        ]);

        $status = source::find($request->id);
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

            if (source::whereIn('id', $ids)->delete()) {
                $result = array('status' => '200', 'msg' => count($ids) . ' Record(s) deleted successfully');
            } else {
                $result = array('status' => '500', 'msg' => 'Something went wrong!!');
            }

        }

        return json_encode($result);
    }



}
