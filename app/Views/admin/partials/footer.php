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
                        <button type="button" value="submit"
                            class="btn btn-primary bg-black updateSettings">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<footer class="sticky-footer text-white">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    December 10, 2024
                </div>
                <div class="col-md-4">
                    &copy; 2024 Doodz <span class="text-primary">&</span> Akiss Wedding
                </div>
                <div class="col-md-4">
                    All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    function timeAgo(timestamp) {
        // Get the current time in milliseconds
        const timeNow = Math.floor(Date.now() / 1000);

        // Convert the timestamp to seconds
        const eventTime = Math.floor(new Date(timestamp).getTime() / 1000);

        // Calculate the time difference
        const timeDiff = timeNow - eventTime;

        // Time difference calculations
        const seconds = timeDiff;
        const minutes = Math.floor(timeDiff / 60);
        const hours = Math.floor(timeDiff / 3600);
        const days = Math.floor(timeDiff / 86400);

        // Determine the appropriate time format
        if (seconds < 60) {
            return `${seconds} seconds ago`;
        } else if (minutes < 60) {
            return `${minutes} mins ago`;
        } else if (hours < 24) {
            return `${hours} hour${hours > 1 ? 's' : ''} ago`;
        } else if (days < 7) {
            return `${days} day${days > 1 ? 's' : ''} ago`;
        } else {
            return new Date(eventTime * 1000).toLocaleDateString("en-US", {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }
    }

    $(document).on('click', '#btn-notifications', function () {
        $("#btn-view-more").attr('data-limit', 10);
        var limit =  $("#btn-view-more").data('limit');
        $.ajax({
            url: '<?php echo site_url('admin/get-notifications'); ?>',
            type: 'POST',
            data: { limit: limit },
            dataType: 'json',
            success: function (response) {
                // Check if the response is an array and if it's empty
                if (Array.isArray(response) && response.length === 0) {
                    console.log('Response is an empty array.');
                } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                    // Check if the response is an object and if it's empty
                    console.log('Response is an empty object.');
                } else {
                    // Handle non-empty response
                    console.log('Response:', response);
                    var notificationContainer = $("#notificationContainer");
                    var html = '';
                    if (response.notifications.length > 0) {
                        $.each(response.notifications, function (index, item) {
                            html += '<div class="'+ (item.is_read == 0 ? 'bg-success' : '') +'" style="height:50px;border-bottom: 1px solid gray; justify-content: space-between; align-items: center;"><sup style="font-size: 9px;width: auto;width: 56px;padding-left:30em;" class="text-success">' + timeAgo(item.created_at) + '</sup><a class="dropdown-item notif" href="#" data-id="' + item.id + '"><p style="font-size: 0.7em;">' + item.message + '</p></a></div>';
                        });
                    } else {
                        html += '<small style="padding:9px;">Notifications empty.</small>';
                    }

                    console.log(html);
                    notificationContainer.html(html);
                }
            },
            error: function (xhr, status, error) {
                toastr.warning('An error occurred: ' + error);
            }
        });
    });
    $(document).on('click', '#btn-view-more', function (e) {
        e.stopPropagation();
        var currentLimit = parseInt($(this).attr('data-limit')) || 10;
        var newLimit = currentLimit + 10;

        $.ajax({
            url: '<?php echo site_url('admin/get-notifications'); ?>',
            type: 'POST',
            data: { limit: newLimit },
            dataType: 'json',
            success: function (response) {

                if (!response || (Array.isArray(response) && response.length === 0)) {
                    console.log('No notifications to display.');
                }

                var notificationContainer = $("#notificationContainer");
                var html = '';

                if (response.notifications && response.notifications.length > 0) {
                    $.each(response.notifications, function (index, item) {
                        html += '<div class="'+ (item.is_read == 0 ? 'bg-success' : '') +'" style="height:50px;border-bottom: 1px solid gray; justify-content: space-between; align-items: center;"><sup style="font-size: 9px;width: auto;width: 56px;padding-left:30em;" class="text-success">' + timeAgo(item.created_at) + '</sup><a class="dropdown-item notif" href="#" data-id="' + item.id + '"><p style="font-size: 0.7em;">' + item.message + '</p></a></div>';
                    });
                } else {
                    html += '<small style="padding:9px;">Notifications empty.</small>';
                }

                notificationContainer.html(html);
            },
            error: function (xhr, status, error) {
                toastr.warning('An error occurred: ' + error);
            }
        });

        $(this).attr('data-limit', newLimit);
        console.log('Current limit updated to: ' + newLimit);
    });

    $(document).on('mouseleave', '.notif', function (e) {
        e.stopPropagation();
        var id = $(this).data('id');
        $(this).removeClass('bg-success');
        var self = this; // Store the reference to 'this'
        console.log(id);
        $.ajax({
            url: '<?php echo site_url('admin/update-notification'); ?>',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                console.log(response.notification_count);
                $("#notification-count").text(response.notification_count);
                console.log('Notification status updated.');
            },
            error: function (xhr, status, error) {
                toastr.warning('An error occurred: ' + error);
            }
        });
    });
    $(document).on('click', '#btn-modal-settings', function () {
        $.ajax({
            url: '<?php echo site_url('admin/settings'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response)
                var html = '';
                $.each(response.settings, function (index, setting) {
                    html += '<label>' + setting.name + ':</label>' +
                        '<input type="text" class="form-control" id="' + setting.name + '" name="setting[' + setting.id + ']" value="' + setting.quantity + '" required>';

                });
                $("#settings-container").html(html);

                $("#settings-modal").modal('show');
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    $(document).on('click', '.updateSettings', function () {
        var formData = $(".settings-form-update").serialize();;
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        $.ajax({
            url: '<?php echo site_url('admin/update-settings'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status == 'error') {
                    toastr.error(response.message);
                } else {
                    toastr.success(response.message);
                    $("#settings-modal").modal('hide');
                    $(".updateSettings").text('Save');
                    refreshTable();
                }

            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
</script>