<!-- to reset password fields script is added in custom scripts filke -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="regenrate_modal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title regenrate_modal-title">Regenrate Password</h4>
        </div>
        <div class="modal-body regenrate_modal-body">
            <div class="ajaxerrors"></div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input class="form-control" name="password" id="password" type="password" required>                                   
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" required>                                   
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning btn-loader" id="btn-regenrate"> Confirm</button>
        </div>
        </div>
    </div>
</div>