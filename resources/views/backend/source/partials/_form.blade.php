<form id="mainForm" class="needs-validation" novalidate>
    <div class="row" id="form-section">
        <div class="col-lg-12">
            <div class="card form-card">
                <div class="card-header align-items-center d-flex">
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-0 ">General</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Parameters</a></li>
                            <li class="breadcrumb-item active">Source</li>
                        </ol>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">

                            <button type="button" id="newBtn" class="btn btn-danger add-btn action-add">
                                <i class="ri-add-line align-bottom me-1"></i> Add New
                            </button>

                            <button type="submit" class="btn btn-success d-none action-save"
                                id="saveBtn">Save</button>


                            <button type="button" id="editBtn" class="btn btn-info d-none action-edit">Edit</button>


                            <button type="button" class="btn btn-light d-none action-close"
                                id="closeBtn">Close</button>
                            <button class="btn btn-soft-danger action-delete d-none" onclick="deleteMultiple()"><i
                                    class="ri-delete-bin-2-line"></i></button>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="row d-none" id="formDiv">

        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">

                    <input type="hidden" id="id" name="id">
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-3">
                            <label for="name" class="form-label required">Name</label>

                        </div>
                        <div class="col-xxl-9 col-md-9">
                            <div>
                                <input type="text" name="name" required class="required makeslug form-control inputs" id="name"
                                    placeholder="Enter Source Name">
                            </div>
                        </div>
                    </div>


                    <div class="row gy-4 mt-1">
                        <div class="col-xxl-4 col-md-4">

                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                <label class="form-check-label" for="is_listing_source">Listing
                                    Source</label>
                                <input type="checkbox" class="form-check-input inputs" id="is_listing_source" checked
                                    name="is_listing_source" value="1">
                            </div>

                        </div>
                        <div class="col-xxl-4 col-md-4">

                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                <label class="form-check-label" for="is_lead_source">Lead
                                    Source</label>
                                <input type="checkbox" class="form-check-input inputs" id="is_lead_source" checked
                                    name="is_lead_source" value="1">
                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-lg-4"> @include('backend.partials._common_fields')</div>

    </div>
</form>
