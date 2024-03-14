<div id="update-bulk-status" class="modal fade" tabindex="-1" aria-labelledby="update-bulk-statusLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Bulk Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form id="update-bulk-status-form" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">New Status</label>
                                <select name="new_status" id="new_status" class="select2 form-control">
                                 @foreach ($statuses as $key => $value)
                                    <option value="{{ $key}}">{{ $value }}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div><!--end col-->

                    </div><!--end row-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update-status-btn" onclick="updateStatusPost()"  class="btn btn-primary ">Update Status</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
