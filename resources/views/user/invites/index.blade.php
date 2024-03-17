@extends('user.main')
@section('title', 'Packages')


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
                    My Invites
                @endslot
                @slot('title')
                    User
                @endslot
            @endcomponent
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th data-ordering="false">Name</th>

                                        <th>Joining Date</th>
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
@endsection
@section('scripts')
    @include('backend.partials._datatable_js')
    <script>
        $(document).ready(function() {



            /*New Datatable*/
            dataTable = $('#dataTable').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [
                    [2, "desc"]
                ],
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],

                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('invites.dt') }}",
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
                        data: function(data) {
                            return `<a href="javascript:void(0)" class="text-${data.color ? data.color : 'primary'}" onclick="viewData('` +
                                data.id + `')">` + data.first_name +` `+ data.last_name+ `</a>`;
                        },
                        name: 'first_name',
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



                ],
            }); // end datatable init


            dataTable.on('draw.dt', function() {
                $(".chk_child").prop("checked", false);
                $('.multi_options').remove();
                $('#checkAll').prop("checked", false);
            });
        });










        $('#authorizationNav, #usersLink').addClass('active');
        $('#authorizationNav').attr('aria-expanded', true);
        $('#sidebarDashboards').addClass('show');
    </script>
@endsection
