@extends('backend.main')
@section('title', 'Media | Photos')


@section('styles')

    <style type="text/css">
        div.dataTables_wrapper div.dataTables_filter input {
            border-color: var(--vz-input-border);
            background-color: var(--vz-input-bg);
            color: var(--vz-body-color);
            line-height: 1.5;
            padding: 0.5rem 0.9rem 0.5rem 1.025rem;
            border-radius: 0.25rem;
            font-size: .8125rem;
        }
    </style>
    {{-- <script type="text/javascript" src="{{ asset('backend/assets/js/jquery-tags.js') }}"></script> --}}

@endsection

@push('pagestyles')
@endpush






@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            @component('backend.partials._breadcrumbs')
                @slot('li_1')
                    Media
                @endslot
                @slot('title')
                    Photos
                @endslot
            @endcomponent
            <!-- end page title -->

            @include('backend.media.partials.form')

            <div class="row">
                <div class="col-lg-12 mb-2">
                    <select class="form-control select2" id="image_tags" name="image_tags_search" multiple>

                    </select>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body bg-light" id="appendImages">

                        </div>
                    </div>



                </div>
                <!--end col-->
            </div>



        </div>
    </div>


@endsection


@push('pagescripts')
@endpush

@section('scripts')
    <script>
        // $(document).on('change', '#image_tags', function() {
        //     let tags = $('#image_tags').val();
        //     console.log(tags);
        //     if (tags == null || tags == "") {
        //         fetchImages();
        //     } else {
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //             },
        //             type: "POST",
        //             url: "{{ route('media.tags.getImages') }}",
        //             data: {
        //                 tags: tags
        //             },
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#appendImages').html(data);
        //             },
        //             error: function(data) {
        //                 console.log('Error:', data);
        //             }
        //         });
        //     }
        // });

        $(document).on('change', '#image_tags', function() {
            let tags = $('#image_tags').val();

            if (tags == null || tags == "") {
                fetchImages(); // No tags selected, fetch all images
            } else {
                // Get the current page number
                let currentPage = getCurrentPageNumber();

                // Make an AJAX request to fetch images with tags and pagination
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "{{ route('media.tags.getImages') }}",
                    data: {
                        tags: tags,
                        page: currentPage // Include the current page number in the request
                    },
                    dataType: 'html',
                    success: function(data) {
                        $('#appendImages').html(data);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

        // Function to get the current page number
        function getCurrentPageNumber() {
            return parseInt($('.pagination').find('.active').text(), 10) || 1;
        }


        $('#image_tags').select2({
            placeholder: 'Select tags',
            allowClear: true,
            closeOnSelect: true,
            ajax: {
                url: "{{ route('get.tags') }}",
                dataType: 'json',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(tag) {
                            return {
                                id: tag,
                                text: tag,
                            }
                        })

                    };
                },

            }
        });
    </script>
@endsection
