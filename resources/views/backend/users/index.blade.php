@extends('backend.main')
@section('title', 'Users')


@section('styles')
    @include('backend.partials._datatable_css')
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
@endsection

@push('pagestyles')
@endpush






@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            @component('backend.partials._breadcrumbs')
            @slot('li_1')
                Authorization
            @endslot
            @slot('title')
                Users
            @endslot
            @endcomponent
            <!-- end page title -->
            @include('backend.users.partials._form')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th data-ordering="false">SR No.</th>


                                        <th data-ordering="false">Name</th>
                                        <th data-ordering="false">Email</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
@section('modals')
    @include('backend.modal.bulk_status_update',['statuses' => ['0'=>'Inactive','1'=>'Active']])
@endsection
@section('scripts')
    @include('backend.partials._datatable_js')

    <script>
        var filtersData;
        function initPhoneValidator(input = "phone", hiddenInput = "full_phone") {
            let inputPhone = document.querySelector(`#${input}`);
            var iPhone = window.intlTelInput(inputPhone, {
                initialCountry: "ae",
                preferredCountries: ["ae"],
                placeholderNumberType: "Phone",
                hiddenInput: hiddenInput,
                utilsScript: laravelAssetUrl + "/intl-tel-input/js/utils.js",
            });
            return iPhone;
        }
        let phoneInput = initPhoneValidator("phone", "full_phone");
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            initialCountry: "ae",
        });
        if ($("#phone").length) {

            input.addEventListener("input", function() {
                var selectedCountryData = iti.getSelectedCountryData();
                var countryCode = selectedCountryData.dialCode;
                $('input[name="phone_countrycode"]').val(countryCode);

                var fullphone = iti.getNumber();
                $('input[name="full_phone"]').val(fullphone);
                $('input[name="phone"]').val(fullphone);
            });
            $("#phone").change(function() {
                // console.log(phoneInput.getNumber());
                // console.log(phoneInput.isValidNumber());
                if (phoneInput.isValidNumber()) {
                    $("#phone").removeClass("is-invalid");
                    $("#phone").addClass("is-valid");
                    // $("#saveBtn").attr("disabled", false);
                    $('input[name="full_phone"]').val(phoneInput.getNumber());
                    $('input[name="phone"]').val(phoneInput.getNumber());
                    $(".phoneValidation").html("");
                    $("#phone").removeClass("is-invalid");
                } else {
                    $("#phone").removeClass("is-valid");
                    $("#phone").addClass("is-invalid");
                    // $("#saveBtn").attr("disabled", true);
                    $('input[name="full_phone"]').val(phoneInput.getNumber());
                    $('input[name="phone"]').val(phoneInput.getNumber());
                }

                if (phoneInput.isValidNumber() == false) {
                    phoneNumberValidatorFalied = 1;
                    $(".phoneValidation").html(
                        "Please enter a valid phone number with Country Code."
                    );
                } else {
                    phoneNumberValidatorFalied = 0;
                }

                if ($("#phone").val() == "" || $("#phone").val() == null) {
                    $(".phoneValidation").html("");
                    $("#phone").removeClass("is-invalid");
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#role').select2({
                placeholder: "Select Badge",
            });
            $('#type').select2({
                placeholder: "Select Type",
            });

            $('#slab_id').select2({
                placeholder: "Select Slab",
            });
            $('#parent_id').select2({
                placeholder: "Select Parent",
            });
            $('#iba_doc_center_id').select2({
                placeholder: "Select Doc Center",
            });

            // button actions
            $('#newBtn').click(function() {
                newForm();
                $('#password-reset-link').addClass('d-none');
            })

            // $('#saveBtn').click(function() {
            //     submitFrom();
            // })

            $('#closeBtn').click(function() {
                closeForm();
            })


            $(document).on('click', '#editBtn', function(event) {
                editData($('#id').val());
                $('#password-reset-link').removeClass('d-none');
            });


            $(document).on('change', '#role', function(event) {
                if ($(this).val() == 5) {
                    $('#iba_doc_center_id').parent().parent().show();
                } else {
                    $('#iba_doc_center_id').parent().parent().hide();
                    $('#iba_doc_center_id').val(null).trigger('change');
                }
            });


            checkAllCheckBoxes();

            /*New Datatable*/
            dataTable = $('#dataTable').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [
                    [4, "desc"]
                ],
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],

                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('users.dt') }}",
                    type: "post",
                    error: function() {
                        $(".users-error").html("");
                        $("#dataTable").append(
                            '<tbody class="users-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
                        );
                        $("#dataTable_processing").css("display", "none");
                    }
                },
                createdRow: function(row, data, index) {
                    $('#dataTable tbody').css('cursor', 'pointer');
                },
                columns: [{
                        data: function(data) {
                            return `<div class="form-check"><input class="form-check-input selectable-checkbox" type="checkbox" name="chk_child" value="${data.id}"></div>`;
                        },
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: function(data) {
                            return `<a href="javascript:void(0)" class="text-${data.color_code ? data.color_code : 'primary'}" onclick="viewData('` +
                                data.id + `')">` + data.first_name + ' ' + data.last_name + `</a>`;
                        },
                        name: 'first_name',
                        searchable: true
                    },
                    {
                        data: function(data) {
                            if (!data.email) return "-";
                            return `${data.email}`;
                        },
                        name: 'email',
                        searchable: true
                    },


                    {
                        data: function(data) {
                            //return data.created_at;
                            if (data.created_at == null) {
                                return '-';
                            } else {
                                // format date
                                var date = new Date(data.created_at);
                                return date.toLocaleString('en-GB', {
                                    timeZone: 'UTC'
                                });

                            }

                        },
                        name: 'created_at',
                        searchable: false
                    },
                    {
                        data: function(data) {
                            let disabled = true;
                            if (data.status == 1) {
                                return '<span class="badge badge-soft-success">Active</span>'
                            } else {
                                return '<span class="badge badge-soft-danger">Inactive</span>'
                            }



                        },
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: function(data) {
                            let disabled = false;
                            if (data.status == 1) {
                                return `<div  class="form-check form-switch form-switch-lg form-switch-success" dir="ltr">
                                        <input ${disabled ? "disabled" : ""} type="checkbox" data-id="${data.id}" data-do="0"  data-key="status" name="status" class="form-check-input changeStatus" checked></div>`;
                            } else {
                                return `<div  class="form-check form-switch form-switch-lg form-switch-success" dir="ltr">
                                        <input ${disabled ? "disabled" : ""} data-id="${data.id}" data-do="1" type="checkbox"  data-key="status" name="status" class="form-check-input changeStatus"></div>`;
                            }
                        },
                        name: 'status',
                        searchable: false
                    },

                ],
            }); // end datatable init


            dataTable.on('draw.dt', function() {
                $(".chk_child").prop("checked", false);
                $('.multi_options').remove();
                $('#checkAll').prop("checked", false);
            });

            dataTable.on('click', 'tbody tr', function(e) {
                var $cell = $(e.target).closest('td'),
                    msg;
                if ($cell.index() != 0) {
                    var data = dataTable.row(this).data();
                    //
                    if ($cell.index() === 8 || $cell.index() === 9 || $cell.index() === 10 || $cell
                        .index() === 11) {

                    } else {
                        viewData(data.id);
                        highlightRow($(this));

                    }
                }
            });


            //---------------------FORM SUBMISSION--------------------------
            $('#newBtn').click(function() {
                isUpdate = false;
                $('#mainForm').trigger("reset");
                $('#modalTitle').html('Add New Service');
            })


            $(document).on('submit', '#mainForm', function(event) {
                $("#submitBtn").prop('disabled', true);
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                if ($('#status_id').is(":checked")) {
                    formData.append('status', 1);
                } else {
                    formData.append('status', 0);
                }


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: isUpdate ? "{{ route('users.update') }}" : "{{ route('users.store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        showToastify(result.msg, "success")
                        $("#submitBtn").prop('disabled', false); //enable submit button
                        $('#mainForm').trigger('reset'); //
                        $(".inputs").val("").trigger("change")
                        $(".inputs").removeClass("is-invalid")
                        $("select.inputs").val("").trigger("change")
                        viewData(result.id)
                        isUpdate = true;
                        dataTable.row().draw();
                    },
                    error: function(jqXhr, json, errorThrown) {

                        let data = jqXhr.responseJSON;
                        $("#submitBtn").prop('disabled', false);

                        $(".inputs").val("").trigger("change")
                        $(".inputs").removeClass("is-invalid")
                        $("select.inputs").val("").trigger("change")

                        // if (jqXhr.status == 500 || jqXhr.status == 400) {
                        showToastify(data.message, "error")
                        // }

                    },
                });
            });

            // ------------------------------END FORM SUBMISSION --------------------------


            $(document).on('submit', '#password-reset-form', function(event) {
                $("#password-reset-Button").prop('disabled', true);
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                formData.append('id', $('#id').val());

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url:  "{{ route('users.update.password') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        showToastify(result.msg, "success")
                        $("#password-reset-Button").prop('disabled', false); //enable submit button
                        $('#password-reset-form').trigger('reset'); //
                        $('#password-reset-modal').modal('hide');

                    },
                    error: function(jqXhr, json, errorThrown) {
                        let data = jqXhr.responseJSON;
                        $("#password-reset-Button").prop('disabled', false);
                        showToastify(data.message, "error")
                    },
                });
            });





            const optionFormat = (item) => {
                if (!item.id) {
                    return item.text;
                }
                var span = document.createElement('span');
                var template = '';
                template += '<span value="1" class="badge fw-bolder ';
                template += '' + item.element.getAttribute('data-kt-rich-content-class') + '">';
                template += '' + item.text + '</span>';
                span.innerHTML = template;
                return $(span);
            }

            $('#badge').select2({
                placeholder: "Select Badge",
                minimumResultsForSearch: Infinity,
                templateSelection: optionFormat,
                templateResult: optionFormat
            });

        });





        function getData(id) {
            $.ajax({
                url: "{{ route('users.show') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    id
                },
                success: function(result) {
                    $('#id').val(result.data.id);
                    if (result.data) {
                        // disables all fields
                        Object.keys(result.data).map((index) => {
                            // $(`#${index}`).val(result.data[index])
                            $(`#${index}`).val(result.data[index]).trigger("change");
                        })
                        let data = result.data;
                        let role = null;
                        data?.roles.map(item => {
                            role = item.name
                        })
                        $("#role").val(role).trigger("change")


                        // status_id
                        if (data.status == 1) {
                            $('#status_id').prop('checked', true);
                        } else {
                            $('#status_id').prop('checked', false);
                        }
                        getActivityLog('App\\Models\\User','password-reset-link');
                        getNotes('App\\Models\\User','load-activity-log');

                        var url = "{{ route('users.index') }}" + "?id=" + data.id;
                        window.history.pushState('data', '', url);

                    }
                },
                error: function(result) {
                    showToastify(result.msg, "error");

                    alert("Error " + result.status + ': ' + JSON.stringify(result.responseJSON.errors))

                }
            });
        }


        function editData(id) {
            editForm();
            getData(id);
            $('#mainForm :input').prop("disabled", false);
        }

        function viewData(id) {
            viewForm();
            getData(id)
            $('#mainForm :input').prop("disabled", true);
            $('.form-switch-right button').prop("disabled", false);
            $('#password-reset-link').removeClass('d-none');
            $(".independent-area").prop("disabled", false);

        }

        $('#authorizationNav, #usersLink').addClass('active');
        $('#authorizationNav').attr('aria-expanded', true);
        $('#sidebarDashboards').addClass('show');
        // checkbox select all functionality





        $(document).on('change', 'tbody tr .selectable-checkbox', function() {
            $(this).parents('tr').toggleClass('selected');
            var checked = $(this).is(':checked');
            if (!checked) {
                $(this).prop('checked', false);
            } else {
                $(this).prop('checked', true);
            }
            updateMultiOption();
        });



        $("#checkAll").change(function() {
            $(".selectable-checkbox").prop("checked", this.checked)
            updateMultiOption();
        })


        function deleteMultiple() {
            var ids_array = [];
            document.getElementsByName("chk_child").forEach(function(e) {
                if (e.checked) {
                    var t = e.value;
                    ids_array.push(t);
                }
            });
            if (ids_array.length > 0) {
                Swal.fire({
                    title: "Attention!!",
                    text: "You are trying to delete record(s). Once deleted, you will not be able to use these!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: "{{ route('users.multi.delete') }}",
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                ids: ids_array
                            },
                            success: function(result) {
                                if (result.status == '200') {
                                    showToastify(result.msg, "success");
                                    $('.multi_options').remove();
                                    dataTable.row().draw();
                                } else {
                                    Swal.fire("Whoops", result.msg, "error");
                                    showToastify(result.msg, "error");
                                }
                            },
                            error: function(result) {
                                console.log(result);
                            }
                        });
                        document.getElementById("checkAll").checked = false;
                    } else {
                        showToastify("Record is safe!", "info");
                    }
                });
            } else {
                showToastify("Please select at least one checkbox", "error");
            }
        }

        $('.table-bordered tbody').on('change', 'input.changeStatus', function() {
            let id = $(this).data('id');
            let action = $(this).data('do');
            let key = $(this).data('key');
            let formData = {
                id: id,
                action: action,
                key: key
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: "{{ route('users.change.status') }}",
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.status == '200') {
                        showToastify("Type Status updated successfully", "success")
                        dataTable.row().draw();
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        $(document).on("click", "#addNoteChatButton", function() {

                let id = $("#id").val();

                if (id == "") {
                    showToastify("Please save record before adding a note.", "error")
                    return;
                }
                let note = $("#chat-input").val();

                //let image = $('#mediaInput').prop('files')[0];
                let image = '';
                if (note == "") {
                    showToastify("Please enter note.", "error")
                    return;
                }
                var formData = new FormData();
                formData.append("parentable_id", id)
                formData.append("parentable_type", "App\\Models\\User")
                formData.append("note", note)
                formData.append("image", image)
                $('#messegeLoading').removeClass('d-none');
                $('#messageSend').addClass('d-none');
                $('#addNoteChatButton').attr('disabled', true);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ route('storeNote') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == '200') {
                            showToastify(result.msg, "success")
                            $("#note").val("").trigger("change");
                            $('#mediaInput').val('');
                            $("#chat-input").val("").trigger("change");
                            getNotes('App\\Models\\User','load-activity-log');
                            $('#showWhenImage').addClass('d-none');
                            $('#blah').attr('src', '');
                        }
                        if (result.status == '0') {
                            showToastify(result.msg, "error");
                            $("#note").val("").trigger("change");
                            $('#mediaInput').val('');
                            $("#chat-input").val("").trigger("change");
                        }
                        $('#messegeLoading').addClass('d-none');
                        $('#messageSend').removeClass('d-none');
                        $('#addNoteChatButton').attr('disabled', false);

                    },
                    error: function(jqXhr, json, errorThrown) {
                        let data = jqXhr.responseJSON;
                        if (data.errors) {
                            $.each(data.errors, function(index, item) {
                                showToastify(item[0], "error")
                            })
                        }
                        if (jqXhr.status == 500 || jqXhr.status == 400) {
                            showToastify(data.msg, "error")
                        }
                        $('#messegeLoading').addClass('d-none');
                        $('#messageSend').removeClass('d-none');
                        $('#addNoteChatButton').attr('disabled', false);

                    },
                });

        })
    </script>
@endsection
