<div class="modal-content">
    <form id="editForm" class="needs-validation" novalidate>
        <input type="hidden" name="id" id="" value="{{ $media->id }}">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalFullscreenLabel">Edit Media</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5>Original</h5>
                                <img src="{{ asset($media->original) }}" alt="{{ $media->alt_text }}" class="img-fluid"
                                    style="max-height:400px">
                            </div>
                        </div>
                    </div>
                    <div class="card d-none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Thumbnail</h5>
                                    <img src="{{ asset($media->thumbnail) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <h5>Watermarked</h5>
                                    <img src="{{ asset($media->watermarked) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <h5>Resized</h5>
                                    <img src="{{ asset($media->resized) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="card" >
                        <div class="card-body" style="height: 500px; overflow-y: auto;">
                            <b>ID</b> &nbsp;&nbsp; {{ $media->id }} <br>
                            <b>Uploaded On</b> &nbsp;&nbsp; {{ $media->created_at }} <br>
                            <b>Uploaded By</b>&nbsp;&nbsp; {{ $media->created_by_id }} <br>
                            <b>File Name</b>&nbsp;&nbsp; {{ $media->original_name }} <br>
                            <b>File Type</b>&nbsp;&nbsp; {{ $media->type }} <br>
                            <b>File Size</b>&nbsp;&nbsp; {{ fileSizeCal($media->size, 'MB') }} MB <br>
                            <b>File Path</b>&nbsp;&nbsp; {{ $media->original }} <br>
                            <b>File Usage Count</b>&nbsp;&nbsp; {{ $media->listingmediacount->count() }} <br>
                            <hr>
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $media->name }}">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="alt_text">Alternative Text</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="alt_text" class="form-control"
                                        value="{{ $media->alt_text }}">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="order">Order</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="order" class="form-control"
                                        value="{{ $media->order }}">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="tags">tags</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control tags-input" name="tags" type="text"
                                        value="{{ tagEditor($media->tags) }}" />
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="2">{{ $media->description }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="image">Image <small>(If want to change the Image)</small></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="row mt-1">
                                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>

                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                        class="ri-close-line me-1 align-middle"></i> Close</a> --}}
                <button type="submit" class="btn btn-primary btn-block btn-sm">Save changes</button>
            </div>

    </form>
</div>

<script>
    $('.tags-input').tagsinput({
        trimValue: true,
        confirmKeys: [13, 44, 32],
        focusClass: "my-focus-class",
    });
</script>
