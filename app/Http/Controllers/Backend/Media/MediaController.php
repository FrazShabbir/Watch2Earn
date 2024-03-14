<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MediaController extends Controller
{
    public function index()
    {
        return view('backend.media.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                // $extension = $image->getClientOriginalExtension();
                // $size = $image->getSize();

                // $filename = time() . '_' . uniqid() . '.' . $extension;
                // $path = 'uploads/listings/';
                // $image->move($path, $filename);

                // $originalImage = $path . $filename;

                // $resizedImage = Image::make(public_path($originalImage))->resize(200, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                // $thumbnailPath = $path . 'thumbnail_' . $filename;
                // $resizedImage->save(public_path($thumbnailPath));

                // $watermark = Image::make(public_path($originalImage));
                // $watermark->insert(public_path(fromSettings('watermark')), 'top-right', 10, 10);
                // $watermarkedImagePath = $path . 'watermarked_' . $filename;
                // $watermark->save(public_path($watermarkedImagePath));
                // $resizedImage = Image::make(public_path($originalImage))->resize(800, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });

                // $resizedImagePath = $path . 'resized_' . $filename;
                // $resizedImage->save(public_path($resizedImagePath));

                $processAndSaveImages = processAndSaveImages($image);
                dd($processAndSaveImages);
                $media = new Media();
                $media->tags = json_encode(explode(',', $request->tags));
                $media->alt_text = $request->alt_text;
                $media->size = $size;
                $media->extension = $extension;

                $media->thumbnail = $thumbnailPath;
                $media->watermarked = $watermarkedImagePath;
                $media->resized = $resizedImagePath;
                $media->original = $originalImage;
                // $media->gallery_id = $gallery->id;
                $media->created_by_id = auth()->user()->id;
                $media->save();
            }
        }

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $media = Media::findOrFail($request->id);
        return view('backend.media.edit')
            ->with('media', $media);
    }

    public function fetchImages(Request $request)
    {
        // $medias = Media::where('type', 'Photos')->get();
        // return view('backend.media.partials._images')
        //     ->with('medias', $medias);
        $perPage = 12;
        $medias = Media::where('type', 'Photos')->paginate($perPage);
        return view('backend.media.partials._images')->with('medias', $medias);
    }

    public function handleUpload(Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $processAndSaveImages = processAndSaveImages($image);

                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();
                $orginal_name = $image->getClientOriginalName();

                $media = new Media();
                $media->tags = json_encode(explode(',', $request->tags));
                $media->alt_text = $request->alt_text;
                $media->size = $size;
                $media->type = 'Photos';
                $media->extension = $extension;
                $media->original_name = $orginal_name;
                $media->thumbnail = $processAndSaveImages['thumbnail'];
                $media->watermarked = $processAndSaveImages['watermarked'];
                $media->resized = $processAndSaveImages['resized'];
                $media->original = $processAndSaveImages['original'];

                $media->created_by_id = auth()->user()->id;
                $media->save();
            }
        }

        return response()->json(['success' => 'Images Uploaded Successfully.']);
    }

    public function handleDelete(Request $request)
    {
        $media = Media::findOrFail($request->id);
        $media->delete();
        return response()->json(['success' => 'Image Deleted Successfully.']);
    }

    public function update(Request $request)
    {
        $media = Media::findOrFail($request->id);
        $media->alt_text = $request->alt_text;
        $media->name = $request->name;
        $media->order = $request->order;
        $media->description = $request->description;
        $media->tags = json_encode(explode(',', $request->tags));

        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $size = $image->getSize();
            $original_name = $image->getClientOriginalName();
            $processAndSaveImages = processAndSaveImages($image);

            $media->size = $size;
            $media->type = $extension;
            $media->original_name = $original_name;

            $media->thumbnail = $processAndSaveImages['thumbnail'];
            $media->watermarked = $processAndSaveImages['watermarked'];
            $media->resized = $processAndSaveImages['resized'];
            $media->original = $processAndSaveImages['original'];
        }

        $media->save();

        return response()->json(['status' => '200', 'msg' => 'Media Updated Successfully', "id" => $media->id]);
    }

    public function getTagRelatedImages(Request $request)
    {
        if (Gate::denies('Listings Edit')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'tags' => 'required',
        ]);

        $tags = $request->tags;

        $images = Media::where('type', 'Photos')->where(function ($query) use ($tags) {
            foreach ($tags as $tag) {
                $query->orWhere(function ($query) use ($tag) {
                    $query->whereRaw('lower(tags) LIKE ?', ['%"' . strtolower($tag) . '"%']); // Case-insensitive search
                });
            }
        })->paginate(12);
        // dd($images);
        return view('backend.media.partials._images')
            ->with('medias', $images);
    }

}
