@if ($medias->count() == 0)
    <div class="alert alert-info">
        <strong>Info!</strong> No images found.
    </div>
@else
    {{-- <div class="row">
    @foreach ($medias as $media)
        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography edit-media" data-category="photography" data-id="{{ $media->id }}">
            <div class="gallery-box card card-border-effect-none">

                <div class="gallery-container">
                    <img class="gallery-img img-fluid mx-auto" src="{{ asset($media->resized) }}" alt="" />
                    <div class="gallery-overlay">
                        <h5 class="overlay-caption">{{$media->alt_text??'---'}}</h5>
                    </div>
                </div>
            </div>
             <div class="box-content">
                <div class="d-flex align-items-center mt-1">
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                <i class="ri-edit-box-line text-muted align-bottom me-1"></i>
                            </button>
                            <a href="{{ asset($media->watermarked) }}" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                <i class="ri-eye-line text-muted align-bottom me-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
    <style>
        .gallery-container {
            position: relative;
            overflow: hidden;
            height: 200px;
            /* Set a fixed height for the container */
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Maintain aspect ratio while covering the container */
        }
    </style>

    <div class="row mb-2 ">
        @foreach ($medias as $media)
            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography edit-media" data-category="photography"
                data-id="{{ $media->id }}">
                <div class="gallery-box card card-border-effect-none">

                    <div class="gallery-container">
                        <img class="gallery-img img-fluid mx-auto" src="{{ asset($media->resized) }}" alt="" />
                        <div class="gallery-overlay">
                            <h5 class="overlay-caption">{{ $media->name ?? '---' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="box-content mb-4">
                    <div class="d-flex align-items-center mt-1">
                        <div class="flex-grow-1 text-muted">Alt Text: <a href=""
                                class="text-body text-truncate">{{ $media->alt_text ?? '---' }}</a></div>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-3">
                                <button type="button"
                                    class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                    <i class="ri-edit-box-line text-muted align-bottom me-1"></i>
                                </button>
                                <a href="{{ asset($media->watermarked) }}"
                                    class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                    <i class="ri-eye-line text-muted align-bottom me-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Display pagination links --}}


    {{-- <div class="row gallery-wrapper" style="position: relative; height: 678.681px;">
    @foreach ($medias as $media)
    <div class="element-item col-xxl-3 col-xl-4 col-sm-6" style="position: absolute; left: 0px; top: 0px;">
        <div class="gallery-box card card-border-effect-none">
            <div class="gallery-container">
                <a class="image-popup" href="{{ asset($media->thumbnail) }}" title="">
                    <img class="gallery-img img-fluid mx-auto" src="{{ asset($media->thumbnail) }}" alt="">
                    <div class="gallery-overlay">
                        <h5 class="overlay-caption">Glasses and laptop from above</h5>
                    </div>
                </a>
            </div>

            <div class="box-content">
                <div class="d-flex align-items-center mt-1">
                    <div class="flex-grow-1 text-muted">by <a href="" class="text-body text-truncate">Ron Mackie</a></div>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 2.2K
                            </button>
                            <button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                <i class="ri-question-answer-fill text-muted align-bottom me-1"></i> 1.3K
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endforeach

</div> --}}
    @include('backend.media.partials._modal')
@endif
<div id="paginationLinks">
    <div>
        <ul class="pagination pagination-separated justify-content-center mb-0">
            <li class="page-item ">
                <a href="javascript:void(0);" class="page-link backBtn {{ $medias->currentPage() <= 1 ? 'disabledlink' : '' }}"><i class="mdi mdi-chevron-left"></i></a>
            </li>

            <li class="page-item">
                <a href="javascript:void(0);"  class="page-link nextBtn {{ $medias->currentPage() == $medias->lastPage() ? 'disabledlink' : '' }} "><i class="mdi mdi-chevron-right"></i></a>
            </li>
        </ul>
    </div>
</div>
