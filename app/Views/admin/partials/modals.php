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
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <label for="name">Companions:</label>
                        <ul id="companion-container" style="line-height:3.5;list-style:none;padding-left:0;">

                        </ul>
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
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="update_name" name="name">
                        <input type="hidden" class="form-control" id="update_user_id" name="user_id">
                        <label for="name">Companions:</label>
                        <ul id="update_companion_container" style="line-height:3.5;list-style:none;padding-left:0;">

                        </ul>
                        <button type="button" class="update_companion"><i class="fa fa-plus"></i> Add
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
                            <?php for ($x = 1; $x <= 11; $x++) { ?>
                                <option value="<?php echo $x; ?>" <?php echo $data->{"total_for_" . $x} == 0 ? 'disabled' : ''; ?>>
                                    <?php echo ($x == 11 ? 'Kids': $x); ?> (Slots:
                                    <?php echo $data->{"total_for_" . $x} == 0 ? 'Full' : $data->{"total_for_" . $x}; ?>)
                                </option>
                            <?php } ?>
                        </select>
                        <div class="modal-footer">
                            <input type="hidden" id="a_user_id" name="user_id">
                            <button type="button" class="btn btn-primary bg-black" id="btn-assign-guest" disabled>Assign</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Settings Modal -->
    <div class="modal fade" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-black">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="settings-form-update">
                        <div id="settings-container"></div>
                        <div class="modal-footer">
                            <button type="button" value="submit" class="btn btn-primary bg-black updateSettings">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>