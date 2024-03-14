@extends('backend.main')
@section('title', 'Roles')


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
                    Roles
                @endslot
            @endcomponent
            <!-- end page title -->

          @include('backend.users.partials._roles_form')
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
                                        <th data-ordering="false">Slug</th>
                                        <th>Create Date</th>
                                        <th>Status</th>

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
        $(document).on("change", "#select-all-permissions", function() {
            $(".permission-groups").prop("checked", this.checked).trigger("change");
        })

        $(document).on("change", ".permission-groups", function() {
            let group = $(this).val();

            $(`.${group}-permission`).prop("checked", this.checked).trigger("change");
        })


        $(document).ready(function() {
            // button actions
            $('#newBtn').click(function() {
                newForm();
            })

            $('#saveBtn').click(function() {
                submitFrom();

            })

            $('#closeBtn').click(function() {
                closeForm();
            })

            checkAllCheckBoxes();

            $(document).on('click', '#editBtn', function(event) {
                editData($('#id').val());
            });

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
                    url: "{{ route('roles.dt') }}",
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
                                data.id + `')">` + data.name + `</a>`;
                        },
                        name: 'name',
                        searchable: true
                    },
                    {
                        data: function(data) {
                            if (!data.slug) return "-";
                            return `${data.slug}`;
                        },
                        name: 'slug',
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

                    // {
                    //     data: function(data) {
                    //         return `<div class="dropdown d-inline-block">
                //                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                //                                        <i class="ri-more-fill align-middle"></i>
                //                                    </button>
                //                                    <ul class="dropdown-menu dropdown-menu-end">
                //                                        <li><a data-id="` + data.id + `" class="dropdown-item edit-item-btn edit-link"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                //                                        <li>
                //                                            <a  data-id="` + data.id + `" class="dropdown-item remove-item-btn delete-link">
                //                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                //                                            </a>
                //                                        </li>
                //                                    </ul>
                //                                </div>`
                    //     },
                    //     searchable: false
                    // },
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



            $(document).on('submit', '#mainForm', function(event) {
                $("#saveBtn").prop('disabled', true);
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                console.table(formData)
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: isUpdate ? "{{ route('roles.update') }}" : "{{ route('roles.store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        showToastify(result.msg, "success")
                        $("#saveBtn").prop('disabled', false); //enable submit button
                        $('#mainForm').trigger('reset'); //
                        $(".inputs").val("").trigger("change")
                        $(".inputs").removeClass("is-invalid")
                        $("select.inputs").val("").trigger("change")
                        viewData(result.id)
                        isUpdate = true;
                        dataTable.row().draw();
                    },
                    error: function(jqXhr, json, errorThrown) {
                        $("#saveBtn").prop('disabled', false);
                        console.table(jqXhr)
                        console.table(json)
                        console.table(errorThrown)
                        let data = jqXhr.responseJSON;
                        if (data.errors) {
                            $.each(data.errors, function(index, item) {
                                showToastify(item[0], "error")
                            })
                        }
                        if (jqXhr.status == 500 || jqXhr.status == 400) {
                            showToastify(data.message, "error")
                        }
                    },
                });
            });

            // ------------------------------END FORM SUBMISSION --------------------------






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
            $(".permission-groups").prop("checked", false).trigger("change")
            $.ajax({
                url: "{{ route('roles.show') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    id
                },
                success: function(result) {

                    $('#id').val(result.data.id);
                    let data = result.data

                    if (result.data) {
                        Object.keys(result.data).map((index) => {
                            $(`#${index}`).val(result.data[index]).trigger("change")
                        })
                        data?.permissions.map(item => {
                            $(`#permission-${item.id}`).prop("checked", true).trigger("change")
                        })
                        var url = "{{ route('roles.index') }}" + "?id=" + data.id;
                        window.history.pushState('data', '', url);
                    }


                },
                error: function(result) {
                    console.log(result);
                }
            });
        }


        function editData(id) {


            editForm();
            getData(id);
            $('input.input').each(function() {
                var dataVal = $(this).data('val');
                $(this).val(dataVal);
            });


        }

        function viewData(id) {
            viewForm()
            getData(id)
            $('input.input').each(function() {
                var dataVal = $(this).data('val');
                $(this).val(dataVal);
            });
        }
        $('#authorizationNav, #rolesLink').addClass('active');
        $('#authorizationNav').attr('aria-expanded', true);
        $('#sidebarDashboards').addClass('show');





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
                            url: "{{ route('roles.multi.delete') }}",
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
    </script>
@endsection
