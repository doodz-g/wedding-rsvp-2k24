<b?php
date_default_timezone_set('Asia/Manila');
function timeAgo($timestamp)
{

    $timeNow = time();
    $eventTime = strtotime($timestamp);
    $timeDiff = $timeNow - $eventTime;

    // Time difference calculations
    $seconds = $timeDiff;
    $minutes = floor($timeDiff / 60);
    $hours = floor($timeDiff / 3600);
    $days = floor($timeDiff / 86400);

    if ($seconds < 60) {
        return "$seconds seconds ago";
    } elseif ($minutes < 60) {
        return "$minutes mins ago";
    } elseif ($hours < 24) {
        return "$hours hour ago";
    } elseif ($days < 7) {
        return "$days days ago";
    } else {
        return date("M j, Y", $eventTime);
    }
}
?>

<nav class="navbar navbar-expand-lg navbar bg-dark" style="padding: 0;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color:white;"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"
                style="<?= current_url() == base_url('dashboard') ? 'background-color: white;' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>"
                    style="<?= current_url() == base_url('dashboard') ? 'color: black !important;font-weight: 600;' : '' ?>">Guest
                    Management</a>
            </li>
            <li class="nav-item"
                style="<?= current_url() == base_url('admin/table') ? 'background-color: white;' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/table') ?>"
                    style="<?= current_url() == base_url('admin/table') ? 'color: black !important;font-weight: 600;' : '' ?>">Table
                    Management</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Mabuhay, <?= session()->get('username') ?>!</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?= session()->get('usertype') == 'admin' ? 'd-none' : '' ?>" href="#"
                        id="btn-modal-settings" data-toggle="modal">Settings</a>
                    <a class="dropdown-item" href="<?= base_url('logout'); ?>"
                        style="border-radius:50px;background: transparent;border: none;">Log out</a>
                </div>
            </li>
            <li class="nav-item dropdown nav-notif">
                <a id="btn-notifications" style="border: none;background-color: black;" class="nav-link dropdown-toggle" href="#"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell" style="color:white;font-size:18px;"></i><span style="position: absolute;z-index: 2000;left: 18px;bottom: 19px;color:black;" class="badge bg-success" id="notification-count"><?= $data->notificationsCount; ?></span>
                </a>   
                <div class="dropdown-menu nav-notif" aria-labelledby="navbarDropdown">
                    <div id="notificationContainer">
                    </div>
                    <div class="view-more-container text-center <?php echo ($data->notificationsCountAll > 10 ? '':'d-none') ?>">
                        <button role="button" style="width:100%;" class="btn-primary btn-xs" data-limit= "10" id="btn-view-more"><small>View More</small></button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>