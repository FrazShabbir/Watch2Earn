@push('pagestyles')
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endpush

<div class="col-lg-12">
    <div class="card form-card">
        <div class="card-body">
            <div class="row">
                <!-- end col -->
                <div class="col-md-12 mb-1">
                    <input type="text" name="input" class="form-control" placeholder="" id="uploadtags">
                    {{-- <input type="text" class="form-control" placeholder="Enter Tags"  id="uploadtags"> --}}
                </div>
                <div class="col-lg-12">
                    <input id="filepondInput" type="file" class="filepond filepond-input-multiple" multiple
                        name="images[]" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5" multiple>
                </div>
            </div>
        </div>
    </div>
</div>


@push('pagescripts')
    <script src="{{ asset('backend/assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}">
    </script>



    <script>
        fetchImages();
        $(document).ready(function() {
            const pond = FilePond.create(document.getElementById('filepondInput'), {
                allowMultiple: true,
                maxFiles: 3,
                maxFileSize: '3MB',
                server: {
                    url: '{{ route('media.handleUpload') }}',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onload: (response) => {
                            fetchImages();
                        },
                        ondata: (formData) => {
                            const tags = $('#uploadtags').val();
                            formData.append('tags', tags);
                            return formData;
                        }
                    }
                }
            });
            pond.on('removefile', (error, file) => {

            });
        });

        function fetchImages(page = 1, tags = null) {
            $.ajax({
                url: "{{ route('media.fetchImages') }}",
                type: 'GET',
                dataType: 'html',
                data: {
                    page: page,
                    tags: tags // Include tags in the request
                }, // Send the current page number to the server
                success: function(data) {
                    var url = new URL(window.location.href);
                    url.searchParams.set('page', page);
                    $('#appendImages').html('');
                    $('#appendImages').html(data);
                }
            });
        }
        $(document).on('change', '#image_tags', function() {
            let tags = $('#image_tags').val();
            fetchImages(1, tags); // Fetch images with tags when tags change
        });
        $(document).on('click', '.nextBtn, .backBtn', function(event) {
            event.preventDefault();

            var currentPage = window.location.search.match(/page=(\d+)/);
            var page = currentPage ? parseInt(currentPage[1], 10) : 1;
            var tags = $('#image_tags').val();

            if ($(this).hasClass('nextBtn')) {
                page++;
            } else if ($(this).hasClass('backBtn')) {
                page = Math.max(page - 1, 1);
            }

            fetchImages(page, tags);

            var newUrl = window.location.href.split('?')[0] + '?page=' + page;
            history.pushState({
                page: page
            }, document.title, newUrl);
        });

        // $(document).on('click', '.nextBtn', function(event) {
        //     event.preventDefault();

        //     var currentPage = window.location.search.match(/page=(\d+)/);
        //     var page = currentPage ? parseInt(currentPage[1], 10) + 1 : 1;
        //     fetchImages(page);
        //     var newUrl = window.location.href.split('?')[0] + '?page=' + page;
        //     history.pushState({
        //         page: page
        //     }, document.title, newUrl);
        // });
        // $(document).on('click', '.backBtn', function(event) {
        //     event.preventDefault();
        //     var currentPage = window.location.search.match(/page=(\d+)/);
        //     var page = currentPage ? parseInt(currentPage[1], 10) - 1 : 1;
        //     fetchImages(page);
        //     var newUrl = window.location.href.split('?')[0] + '?page=' + page;
        //     history.pushState({
        //         page: page
        //     }, document.title, newUrl);
        // });


        $(document).on('click', '.edit-media', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('media.edit') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: 'html',
                success: function(data) {
                    $('#edit-image-data').html(data);
                    $('.exampleModalFullscreen').modal('show');
                }
            });
        });

        $(document).on('submit', '#editForm', function(event) {
            event.preventDefault();
            $("#submitBtn").prop('disabled', true);
            var formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('media.update') }}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.status == 200) {
                        showToastify(result.msg, "success")
                        $('.exampleModalFullscreen').modal('hide');
                        fetchImages();
                        $("#submitBtn").prop('disabled', false);
                    }
                },
                error: function(jqXhr, json, errorThrown) {



                },
            });
        });
    </script>
@endpush
