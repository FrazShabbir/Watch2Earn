<form id="mainForm" class="needs-validation" novalidate>
    <div class="row" id="form-section">
        <div class="col-lg-12">
            <div class="card form-card">
                <div class="card-header align-items-center d-flex">
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-0 ">Packages</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Parameters</a></li>
                            <li class="breadcrumb-item active">Package</li>
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
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Details</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row gy-4 mb-1">
                        <div class="col-xxl-3 col-md-3">
                            <label for="name" class="form-label required">Name</label>

                        </div>
                        <div class="col-xxl-9 col-md-9">
                            <div>
                                <input type="text" name="name" required class="required makeslug form-control inputs" id="name"
                                    placeholder="Enter Package Name">
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 mb-1">
                        <div class="col-xxl-3 col-md-3">
                            <label for="price" class="form-label required">price</label>

                        </div>
                        <div class="col-xxl-9 col-md-9">
                            <div>
                                <input type="text" name="price" required class="required form-control inputs" id="price"
                                    placeholder="Enter Package price">
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 mb-1">
                        <div class="col-xxl-3 col-md-3">
                            <label for="description" class="form-label required">description</label>

                        </div>
                        <div class="col-xxl-9 col-md-9">
                            <div>
                                <textarea  name="description" required class="required form-control inputs" id="description"
                                    placeholder="Enter Package description"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-4"> @include('backend.partials._common_fields')</div>

    </div>
</form>
