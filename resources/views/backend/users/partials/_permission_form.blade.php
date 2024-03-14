<form id="mainForm" class="needs-validation" novalidate>
    <div class="row" id="form-section">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-0 ">Permissions</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Authorization</a></li>
                            <li class="breadcrumb-item active">Permissions</li>
                        </ol>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">

                            <button type="button" id="newBtn" class="btn btn-danger add-btn action-add">
                                <i class="ri-add-line align-bottom me-1"></i> Add New
                            </button>

                            <button type="submit" class="btn btn-success d-none action-save"
                                id="saveBtn">Save</button>


                            <button type="button" id="editBtn"
                                class="btn btn-info d-none action-edit">Edit</button>


                            <button type="button" class="btn btn-light d-none action-close"
                                id="closeBtn">Close</button>
                            <button class="btn btn-soft-danger action-delete d-none"
                                onclick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row d-none" id="formDiv">
        <div class="col-lg-12">

            <div class="card form-card">
                <div class="card-body">

                    <input type="hidden" id="id" name="id">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name" class="form-label required m-auto">Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control inputs" id="name"
                                    placeholder="Name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="group_name" class="form-label">Group Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control inputs" id="group_name"
                                    placeholder="Group Name" name="group_name">
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
