<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Leads Monthly</h4>
        </div>
        <div class="card-body">
            <canvas id="leads-monthly"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Listings Monthly</h4>
        </div>
        <div class="card-body">
            <canvas id="listings-monthly"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Datapool Monthly</h4>
        </div>
        <div class="card-body">
            <canvas id="datapool-monthly"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Stats By Status</h4>
        </div>
        <div class="card-body">


            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#leads-by-status"
                        role="tab">
                        Lead By Status
                    </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#listing-by-status" role="tab">
                        Listings By Status
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="leads-by-status" role="tabpanel">
                    <div class="card form-card bg-white " style="min-height: 500px">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6>Leads</h6>
                                </div>
                                <div class="flex-shrink-0">
                                </div>
                            </div>
                        </div>
                        <div class="card-body sortable-gallery">
                            <table id="dataTable"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads_status_count as  $key=>$value)


                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>


                <div class="tab-pane" id="listing-by-status" role="tabpanel">
                    <div class="card form-card bg-white">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="flex-grow-0">
                                    <h6>Listings</h6>
                                </div>
                                <div class="flex-grow-1 text-end">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable"
                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listing_status_count as  $key=>$value)


                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
