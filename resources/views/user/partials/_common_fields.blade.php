
    <div class="card form-card">
        <div class="card-header">
            <h5 class="card-title mb-0">Common Fields</h5>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div>
                        <label for="slug" class="form-label mt-2 required">Slug</label>
                        <input type="text" class="form-control inputs" id="slug" placeholder="Slug" name="slug"
                            readonly required>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 col-sm-12">
                    <div>
                        <label for="order" class="form-label mt-2">Order</label>
                        <input type="number" class="form-control inputs" id="order" placeholder="Order" name="order">
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 col-sm-12">
                    <div>
                        <label for="badge" class="form-label mt-2">Badge</label>
                        <select id="badge" class="js-example-basic-single inputs" name="badge" data-placeholder="Select Badge">
                            <option value=""></option>
                            @include('backend.partials._badges')
                        </select>
                    </div>
                </div>

                <div class="col-xxl-6 col-md-6 col-sm-12">
                    <div>
                        <label for="icon" class="form-label mt-2">Icon</label>
                        <input type="text" class="form-control inputs" id="icon" placeholder="Icon" name="icon">
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 col-sm-12">
                    <div>
                        <label for="color" class="form-label mt-2">Color</label>
                        <input type="color" class="form-control inputs form-control-color w-100" id="color"
                            placeholder="Color" name="color">
                    </div>
                </div>

                <div class="col-xxl-6 col-md-6 col-sm-12 mt-1">
                    <div>
                        <label for="status" class="form-label required">Status</label>
                        <select class="form-select mb-3 select2 inputs" data-placeholder="Select Status" required aria-label="Default select example" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </div>


            </div>

            <div class="row mt-2">
                <!-- Accordions with Plus Icon -->
                <div class="accordion custom-accordionwithicon-plus" id="accordionWithplusicon">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionwithplusExample1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accor_plusExamplecollapse1" aria-expanded="false"
                                aria-controls="accor_plusExamplecollapse1">
                                Media
                            </button>
                        </h2>
                        <div id="accor_plusExamplecollapse1" class="accordion-collapse collapse"
                            aria-labelledby="accordionwithplusExample1" data-bs-parent="#accordionWithplusicon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <div class="position-relative d-inline-block">
                                                    <label for="image" class="form-label mt-2">Image</label>
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="image-input" class="mb-0" data-bs-toggle="tooltip"
                                                            data-bs-placement="right" title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill">upload</i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value="" id="image-input"
                                                            type="file" accept="image/png, image/gif, image/jpeg"
                                                            name="image">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="" id="img" class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div>
                                                <div class="position-relative d-inline-block">
                                                    <label for="thumbnail" class="form-label mt-2">Thumbnail</label>

                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="thumb-image-input" class="mb-0"
                                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                                            title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class=" ri-image-line">upload</i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value=""
                                                            id="thumb-image-input" type="file"
                                                            accept="image/png, image/gif, image/jpeg" name="thumbnail">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="" id="thumb-img"
                                                                class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>







<script>
    document.querySelector("#image-input").addEventListener("change", function() {
        var preview = document.querySelector("#img");
        var file = document.querySelector("#image-input").files[0];
        var reader = new FileReader();
        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);
        if (file) {
            reader.readAsDataURL(file);
        }
    });
    document.querySelector("#thumb-image-input").addEventListener("change", function() {
        var preview = document.querySelector("#thumb-img");
        var file = document.querySelector("#thumb-image-input").files[0];
        var reader = new FileReader();
        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);
        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
