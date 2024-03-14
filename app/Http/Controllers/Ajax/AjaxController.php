<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Note;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class AjaxController extends Controller
{

    public function getUsers(Request $request)
    {
        $query = $request->get('q');
        $data = User::where('first_name', 'like', '%' . $query . '%')
            ->where('last_name', 'like', '%' . $query . '%')
            ->where('phone', 'like', '%' . $query . '%')
            ->where('email', 'like', '%' . $query . '%')->get();
        return response()->json($data);
    }
    public function getNationalities(Request $request)
    {
        $query = $request->get('q');
        $data = \App\Models\Country::where('nationality', 'like', '%' . $query . '%')->orWhere('name', 'like', '%' . $query . '%')
            ->get();
        return response()->json($data);

    }

    public function getTags(Request $request)
    {
        $query = $request->get('q');

        $data = \App\Models\Media::get();

        $allTags = collect();

        foreach ($data as $media) {
            $tags = json_decode($media->tags, true); // Assuming tags are stored in the 'tags' column
            $allTags = $allTags->merge($tags);
        }

        // Get unique tags
        $uniqueTags = $allTags->unique();
        // dd($uniqueTags);
        if ($uniqueTags) {
            return response()->json($uniqueTags);
        }

    }


    public function bulkUpdateStatus(Request $request)
    {
        //    dd(getModel($request->model));
        $request->validate([
            'model' => 'required',
            'ids' => 'required',
            'status' => 'required',
        ]);

        $parent = getModel($request->model);

        $data = $parent::whereIn('id', $request->ids)->update(['status' => $request->status]);
        return response()->json(['status' => '200', 'msg' => 'Status updated successfully']);
    }




    public function bulkArchive(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'ids' => 'required',
        ]);
        $parent = getModel($request->model);
        $data = $parent::whereIn('id', $request->ids)->update(['is_archived' => 1]);
        return response()->json(['status' => '200', 'msg' => 'Record Archived successfully']);
    }

    public function getActivityLog(Request $request){
        $request->validate([
            'parentable_type'=>'required',
            'parentable_id'=>'required'
        ]);
        $logs = ActivityLog::where('parentable_type',$request->parentable_type)->where('parentable_id',$request->parentable_id)->orderBy('id','desc')->get();
        return view('backend.global.activities')
        ->with('logs',$logs);
    }

    public function getNotes(Request $request){
        $request->validate([
            'parentable_type'=>'required',
            'parentable_id'=>'required'
        ]);
        $notes = Note::where('parentable_type',$request->parentable_type)->where('parentable_id',$request->parentable_id)->get();
        return view('backend.global.notes')
        ->with('notes',$notes);
    }


    public function storeNote(Request $request){
        $request->validate([
            'parentable_type'=>'required',
            'parentable_id'=>'required',
            'note'=>'required'
        ]);
        $log = new Note();
        $log->parentable_type = $request->parentable_type;
        $log->parentable_id = $request->parentable_id;
        $log->note = $request->note;
        $log->created_by_id = auth()->user()->id;
        $log->save();
        return response()->json(['status'=>'200','msg'=>'Notes added successfully']);
    }

}
