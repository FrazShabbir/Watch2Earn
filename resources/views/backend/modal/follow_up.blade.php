<!-- Default Modals -->
<div id="follow-up" class="modal fade" tabindex="-1" aria-labelledby="follow-upLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Follow up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form id="follow-up-form" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">User</label>
                                <select name="user_id" id="follow_up_user_id" class="form-control select2">
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">Type</label>
                                <select name="type" id="follow_up_type" class="select2 form-control">
                                    <option value="">Select</option>
                                    <option value="1">Call</option>
                                    <option value="2">Email</option>
                                    <option value="3">Meeting</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        @if (strpos(Route::currentRouteName(), 'listings') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\Listing">
                        @elseif(strpos(Route::currentRouteName(), 'leads') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\Lead">
                        @elseif(strpos(Route::currentRouteName(), 'datapool') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\DataPool">
                        @endif
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">Listing</label>
                                <select name="listing_id" id="follow_up_listing_id" class="form-control">

                                </select>
                            </div>
                        </div><!--end col-->
                        {{-- @endif --}}
                        {{-- @if (strpos(Route::currentRouteName(), 'owners') !== false)
                            <input type="hidden" name="modal_name" value="/App/Models/Owner">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Owner</label>
                                    <select name="owner_id" id="follow_up_owner_id" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Call</option>
                                        <option value="2">Email</option>
                                        <option value="3">Meeting</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                        @endif
                        @if (strpos(Route::currentRouteName(), 'leads') !== false)
                            <input type="hidden" name="modal_name" value="/App/Models/Lead">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Lead</label>
                                    <select name="lead_id" id="follow_up_lead_id" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Call</option>
                                        <option value="2">Email</option>
                                        <option value="3">Meeting</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                        @endif --}}
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cleave-date" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" placeholder="DD-MM-YYYY"
                                    id="cleave-date">
                            </div>

                        </div><!-- end col -->
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Time</label>
                                <input type="time" name="time" class="form-control" placeholder="hh:mm"
                                    id="cleave-time-format">
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="set_remainder">
                                <label class="form-check-label" for="set_remainder">Remainder</label>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-6 set_remainder d-none">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Type</label>
                                <select name="unit" id="unit" class="select2 form-control">
                                    <option value="">Select</option>
                                    <option value="Hour">Hour ago</option>
                                    <option value="Minute">Minute ago</option>
                                    <option value="Days">Days ago</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-6 set_remainder d-none">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Value</label>
                                <input type="number" name="unit_value" class="form-control"
                                    placeholder="Enter unit_value" id="unit_value">
                            </div>
                        </div><!-- end col -->
                    </div><!--end row-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save Follow up</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="follow-up-edit" class="modal fade" tabindex="-1" aria-labelledby="follow-upLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Follow up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form id="follow-up-form-edit" class="needs-validation" novalidate>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">User</label>
                                <select name="user_id" id="follow_up_user_id_edit" class="form-control select2">
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">Type</label>
                                <select name="type" id="follow_up_type" class="select2 form-control">
                                    <option value="">Select</option>
                                    <option value="1">Call</option>
                                    <option value="2">Email</option>
                                    <option value="3">Meeting</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        @if (strpos(Route::currentRouteName(), 'listings') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\Listing">
                        @elseif(strpos(Route::currentRouteName(), 'leads') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\Lead">
                        @elseif(strpos(Route::currentRouteName(), 'datapool') !== false)
                            <input type="hidden" name="parentable_type" value="App\Models\DataPool">
                        @endif
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">Listing</label>
                                <select name="listing_id" id="follow_up_listing_id_edit" class="form-control">

                                </select>
                            </div>
                        </div><!--end col-->
                        {{-- @endif --}}
                        {{-- @if (strpos(Route::currentRouteName(), 'owners') !== false)
                            <input type="hidden" name="modal_name" value="/App/Models/Owner">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Owner</label>
                                    <select name="owner_id" id="follow_up_owner_id" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Call</option>
                                        <option value="2">Email</option>
                                        <option value="3">Meeting</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                        @endif
                        @if (strpos(Route::currentRouteName(), 'leads') !== false)
                            <input type="hidden" name="modal_name" value="/App/Models/Lead">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Lead</label>
                                    <select name="lead_id" id="follow_up_lead_id" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Call</option>
                                        <option value="2">Email</option>
                                        <option value="3">Meeting</option>
                                    </select>
                                </div>
                            </div><!--end col-->
                        @endif --}}
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cleave-date" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" placeholder="DD-MM-YYYY"
                                    id="date">
                            </div>

                        </div><!-- end col -->
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Time</label>
                                <input type="time" name="time" class="form-control" placeholder="hh:mm"
                                    id="time">
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="edit_description"></textarea>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="edit_set_remainder">
                                <label class="form-check-label" for="edit_set_remainder">Remainder</label>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-6 edit_set_remainder d-none">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Type</label>
                                <select name="unit" id="edit_unit" class="select2 form-control">
                                    <option value="">Select</option>
                                    <option value="Hour">Hour ago</option>
                                    <option value="Minute">Minute ago</option>
                                    <option value="Days">Days ago</option>
                                </select>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-6 edit_set_remainder d-none">
                            <div class="mb-3">
                                <label for="cleave-time-format" class="form-label">Value</label>
                                <input type="number" name="unit_value" class="form-control"
                                    placeholder="Enter unit_value" id="edit_unit_value">
                            </div>
                        </div><!-- end col -->
                    </div><!--end row-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update Follow up</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@push('pagescripts')
    <script>
        $(document).on('submit', '#follow-up-form', function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            formData.append('parentable_id', $('#id').val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('comman.follow-up.store') }}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: (result) => {
                    console.log(result);
                    showToastify(result.msg, "success")
                    $('#follow-up-form').trigger('reset');
                    $('#follow_up_user_id').val(null).trigger('change');
                    $('#follow_up_listing_id').val(null).trigger('change');
                    // get from input name parentable_type and get last word after / in data.parentable_type
                    let form = document.getElementById('follow-up-form');

                    let parentableTypeInput = form.querySelector('input[name="parentable_type"]');
                    let parentable_type_value = parentableTypeInput.value;

                    let parentable_type = parentable_type_value.split('\\').pop();
                    getFollowUps(parentable_type);
                    $('#follow-up').modal('hide');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $(document).on('submit', '#follow-up-form-edit', function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('comman.follow-up.update') }}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: (result) => {
                    console.log(result);
                    showToastify(result.msg, "success")
                    let parentable_type = data.parentable_type.split('\\').pop();
                    getFollowUps(parentable_type);
                    $('#follow-up-form').trigger('reset');
                    $('#follow_up_user_id_edit').val(null).trigger('change');
                    $('#follow_up_listing_id_edit').val(null).trigger('change');
                    $('#follow-up-edit').modal('hide');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $(document).ready(function() {
            $('#follow_up_user_id').select2({
                placeholder: 'Select User',
                allowClear: true,
                closeOnSelect: true,
                ajax: {
                    url: "{{ route('get.users') }}",
                    dataType: 'json',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: `${item.id}`,
                                    text: `${item.id} - ${item.first_name} - ${item.last_name}`,
                                }
                            })

                        };
                    },

                }
            });
            $('#follow_up_user_id_edit').select2({
                placeholder: 'Select User',
                allowClear: true,
                closeOnSelect: true,
                ajax: {
                    url: "{{ route('get.users') }}",
                    dataType: 'json',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: `${item.id}`,
                                    text: `${item.id} - ${item.first_name} - ${item.last_name}`,
                                }
                            })

                        };
                    },

                }
            });

            // $('#follow_up_lead_id').select2({
            //     placeholder: 'Select Lead',
            //     allowClear: true,
            //     closeOnSelect: true,
            //     parent: $('#follow-up'),
            //     ajax: {
            //         url: "{{ route('get.leads') }}",
            //         dataType: 'json',
            //         type: 'GET',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         processResults: function(data) {
            //             return {
            //                 results: $.map(data, function(item) {
            //                     return {
            //                         id: `${item.id}`,
            //                         text: `${item.id} - ${item.first_name} - ${item.last_name}`,
            //                     }
            //                 })

            //             };
            //         },

            //     }
            // });
            $('#follow_up_listing_id').select2({
                placeholder: 'Select Listing',
                allowClear: true,
                closeOnSelect: true,
                parent: $('#follow-up'),
                ajax: {
                    url: "{{ route('get.listings') }}",
                    dataType: 'json',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: `${item.id}`,
                                    text: `${item.id} - ${item.title} - ${item.ref_no}`,
                                }
                            })

                        };
                    },

                }
            });
            $('#follow_up_listing_id_edit').select2({
                placeholder: 'Select Listing',
                allowClear: true,
                closeOnSelect: true,
                parent: $('#follow-up'),
                ajax: {
                    url: "{{ route('get.listings') }}",
                    dataType: 'json',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: `${item.id}`,
                                    text: `${item.id} - ${item.title} - ${item.ref_no}`,
                                }
                            })

                        };
                    },

                }
            });

        });

        function getFollowUps(model) {
            let parentable_id = $("#id").val();
            let parentable_type = model;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('get.followups') }}",
                type: 'POST',
                dataType: 'html',
                data: {
                    parentable_id: parentable_id,
                    parentable_type: parentable_type
                },
                success: function(result) {
                    $('#followup_div').html(result);
                },
                error: function(result) {
                    console.log(result);
                }
            });
        }


        $(document).on('click', '#set_remainder', function(e) {
            if ($(this).is(':checked')) {
                $('.set_remainder').removeClass('d-none');
            } else {
                $('.set_remainder').addClass('d-none');

            }
        });
        $(document).on('click', '#edit_set_remainder', function(e) {
            if ($(this).is(':checked')) {
                $('.edit_set_remainder').removeClass('d-none');
            } else {
                $('.edit_set_remainder').addClass('d-none');

            }
        });
        $(document).on('click', '.edit-follow-up', function(e) {
            id = $(this).data('id');
            $.ajax({
                url: "{{ route('show.followup') }}",
                type: 'get',
                dataType: 'json',
                data: {
                    id
                },
                success: function(result) {
                    data = result.data;
                    is_followup_update = true;
                    $('#follow-up-edit').modal('show');
                    $('#follow-up-form-edit input[name="id"]').val(data.id);
                    $('#follow-up-form-edit input[name="date"]').val(data.date);
                    $('#follow-up-form-edit input[name="time"]').val(data.time);
                    $('#follow-up-form-edit textarea[name="description"]').val(data.description);
                    $('#follow-up-form-edit select[name="type"]').val(data.type).trigger('change');
                    $('#follow-up-form-edit select[name="user_id"]').val(data.user_id).trigger(
                        'change');
                    $('#follow-up-form-edit input[name="unit_value"]').val(data.unit_value);

                    // $('#follow-up-form-edit input[name="unit"]').val(data.unit);
                    // select2 set value
                    $('#follow-up-form-edit select[name="unit"]').val(data.unit).trigger('change');

                    if (data.unit && data.unit_value) {
                        $('#edit_set_remainder').prop('checked', true);
                        $('.edit_set_remainder').removeClass('d-none');
                    }

                    if (data.user) {
                        let option_user = "<option value=" + data.user.id + ">" + data.user.id + " - " +
                            data.user.first_name + " - " + data.user.last_name + "</option>";
                        $('#follow_up_user_id_edit').append(option_user);
                        $('#follow_up_user_id_edit').val(data.user.id).trigger("change");
                    }

                    if (data.listing) {
                        let option_listing = "<option value=" + data.listing.id + ">" + data.listing
                            .id +
                            " - " + data.listing.title + "</option>";
                        $('#follow_up_listing_id_edit').append(option_listing);
                        $('#follow_up_listing_id_edit').val(data.listing.id).trigger("change");
                    }

                    // get last word after / in data.parentable_type

                },
                error: function(result) {
                    showToastify(result.msg, "error");

                    alert("Error " + result.status + ': ' + JSON.stringify(result.responseJSON.errors))

                }
            });
        });
    </script>
@endpush
