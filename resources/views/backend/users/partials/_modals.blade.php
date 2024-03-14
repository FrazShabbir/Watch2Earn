<!-- Default Modals -->
<div id="password-reset-modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="password-reset-modalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
           <form id="password-reset-form">
            <div class="modal-body">

                <div class="row gy-4 mt-1">
                    <div class="col-md-3 ">
                        <label for="password" class="form-label required m-auto">Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" name="password" class="independent-area form-control inputs" id="password"
                            placeholder="Enter password" required>
                    </div>
                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-md-3 ">
                        <label for="password_confirmation" class=" form-label required m-auto">Confirm Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" name="password_confirmation" class="form-control independent-area inputs"
                            id="password_confirmation" placeholder="Enter password" required>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="password-reset-Button">Save Changes</button>
            </div>
           </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
