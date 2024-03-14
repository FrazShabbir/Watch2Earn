<form id="mainForm" class="needs-validation" novalidate>
    <div class="row" id="form-section">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-0 ">Roles</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Authorization</a></li>
                            <li class="breadcrumb-item active">Roles</li>
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
                    <div>
                        <input type="hidden" id="id" name="id">
                        <div class="row">


                            <div class="col-xxl-6 col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class="form-label">name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control inputs"
                                        id="name" placeholder="name">
                                    </div>
                                </div>



                        </div>

                            <div class="col-12 mt-2">
                                <div class="d-flex justify-content-start align-items-center gap-2">
                                    <h5>Permissions</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="select-all-permissions">
                                        <label class="form-check-label" for="select-all-permissions">
                                            Select all
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    {{-- @dd($permissions) --}}
                                    @foreach ($permissions ?? [] as $group => $groups)
                                        @php $groupSlug = slugify($group) @endphp
                                        <div class="card form-card">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex justify-content-start align-items-center gap-2">
                                                    <h5><strong>{{ $group }}</strong> </h5>
                                                    <div class="form-check">
                                                        <input class="form-check-input inputs permission-groups"
                                                            value="{{ $groupSlug }}" type="checkbox"
                                                            id="{{ $groupSlug }}-group">
                                                        <label class="form-check-label"
                                                            for="{{ $groupSlug }}-group">
                                                            Select All
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach ($groups as $permission)
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input inputs {{ $groupSlug }}-permission"
                                                                    name="permissions[]" type="checkbox"
                                                                    value="{{ $permission->id }}"
                                                                    data-val={{ $permission->id }}
                                                                    id="permission-{{ $permission->id }}">
                                                                <label class="form-check-label"
                                                                    for="permission-{{ $permission->id }}">
                                                                    {{ $permission->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</form>
