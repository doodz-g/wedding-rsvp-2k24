<!-- Add Modal -->
<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="guest-form-add">
                    <div class="form" style="display:ruby-text;">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required style="width:57%;">
                        <label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">Entourage?</label>
                        <select id="exampleDropdown" class="is_entourage_dropdown" name="is_entourage"
                            style="height: 38px; border: 2px solid #ced4da;">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div>
                        <label class="d-none comp_label" for="name">Companions:</label>
                        <ul id="companion-container" style="line-height:3.5;list-style:none;padding-left:0;">

                        </ul>
                    </div>
                    <button type="button" class="add_companion"><i class="fa fa-plus"></i> Add
                        companion</button>
                    <div class="modal-footer">
                        <button type="button" value="submit" class="btn btn-primary bg-black submitButton">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit Modal -->
<div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="guest-form-update">
                    <div class="form" style="display:ruby-text;">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="update_name" name="name" style="width:57%;">
                        <input type="hidden" class="form-control" id="update_user_id" name="user_id">
                        <label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">Entourage?</label>
                        <select id="is_entourage" class="is_entourage_dropdown" name="is_entourage"
                            style="height: 38px; border: 2px solid #ced4da;">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div>
                        <label for="name" class="d-none comp_label">Companions:</label>
                        <ul id="update_companion_container" style="line-height:3.5;list-style:none;padding-left:0;">

                        </ul>
                    </div>
                    <button type="button"
                        class="update_companion <?php echo $data->totalGNow == 120 ? 'd-none' : '' ?>"><i
                            class="fa fa-plus"></i> Add
                        companion</button>
                    <div class="modal-footer">
                        <button type="button" value="submit" class="btn btn-primary bg-black updateButton">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Remove Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Would you like to remove this guest?</p>
                <div class="modal-footer">
                    <input type="hidden" id="d_user_id">
                    <button type="button" class="btn btn-primary bg-black" id="btn-delete-guest">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Assign Modal -->
<div class="modal fade" id="assign-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Assign this guest to a table:</p>
                <div class="row form-check">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll">Select All</label>
                </div>
                <form class="guest-table-update">
                    <div class="container" style="padding-bottom:10px;">
                        <div class="form-check" id="ga-table-container">

                        </div>
                    </div>
                    <select class="form-control" id="table_number" name="table_number">
                        <option disabled selected>Select Table #</option>
                        <?php for ($x = 1; $x <= 13; $x++) { ?>
                            <option value="<?php echo $x; ?>" <?php echo $data->{"total_for_" . $x} == 0 ? 'disabled' : ''; ?>>
                                <?php echo ($x == 11 ? 'Kids' : ($x == 12 ? 'Sponsors A' : ($x == 13 ? 'Sponsors B' : $x))); ?>
                                (Slots:<?php echo $data->{"total_for_" . $x} == 0 ? 'Full' : $data->{"total_for_" . $x}; ?>)
                            </option>
                        <?php } ?>
                    </select>
                    <div class="modal-footer">
                        <input type="hidden" id="a_user_id" name="user_id">
                        <button type="button" class="btn btn-primary bg-black" id="btn-assign-guest"
                            disabled>Assign</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- QR Settings Modal -->
<div class="modal fade" id="qr-settings-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Change QR setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="qr-settings-form-update">
                    <label for="name">Enter your email for the OTP:</label>
                    <div style="display: flex; align-items: center;">
                        <input type="text" class="form-control" id="email" name="email" style="width: 200px;">
                        <span style="margin-left: 5px;">@celebratewithus.site</span>
                    </div>
                    <input type="hidden" class="form-control" id="qr_setting" name="qr_setting">
                    <div class="modal-footer">
                        <button type="button" value="submit"
                            class="btn btn-primary bg-black btn-send-email">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- OTP Modal -->
<div class="modal fade" id="otp-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Confirm OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="qr-settings-form-update">
                    <label for="name">Enter your OTP:</label>
                    <input type="text" class="form-control" id="otp" name="otp" maxlength="5"
                        style="text-align:center;">
                    <div class="modal-footer">
                        <button type="button" value="submit"
                            class="btn btn-primary bg-black btn-validate-otp">Validate</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>