<form id="mainForm" class="needs-validation" novalidate>
    <div class="row" id="form-section">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-0 ">User</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Authorization</a></li>
                            <li class="breadcrumb-item active">User</li>
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
        <div class="col-lg-4">

            <div class="card form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Information</h5>
                </div>
                <div class="card-body">

                    <input type="hidden" id="id" name="id">

                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="first_name" class="form-label required m-auto">first_name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="first_name" class="form-control inputs" id="first_name"
                                placeholder="Enter first_name" required>
                        </div>
                    </div>

                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="last_name" class="form-label required m-auto">last_name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="last_name" class="form-control inputs" id="last_name"
                                placeholder="Enter last_name" required>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="phone" class="form-label required m-auto">phone</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="phone" class="form-control inputs" id="phone"
                                placeholder="Enter phone" required>
                                <div class="text-danger phoneValidation">
                                </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Secondary Information</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="email" class="form-label required m-auto">email</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control inputs" id="email"
                                placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="telegram_chat_id" class="form-label m-auto">telegram_chat_id</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="telegram_chat_id" class="form-control inputs" id="telegram_chat_id"
                                placeholder="Enter telegram_chat_id" >
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-md-3 ">
                            <label for="role" class="form-label required m-auto">role</label>
                        </div>
                        <div class="col-md-9">
                            <select id="role" class="form-select select2 inputs" name="role" id="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-xxl-12 col-md-4">
                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                <label class="form-check-label" for="status_id">status_id</label>
                                <input type="checkbox" class="form-check-input inputs" id="status_id" checked
                                    name="status_id" value="1">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">

            <div class="card form-card" id="password-reset-link">
                <div class="card-header">
                    <h5 class="card-title mb-0">Action</h5>
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-primary independent-area" data-bs-toggle="modal" data-bs-target="#password-reset-modal">Reset Password</button>

                </div>
            </div>

            {{-- @include('backend.global.notes') --}}


        </div>
    </div>
</form>

@include('backend.users.partials._modals')
