<nav class="navbar navbar-expand-lg navbar bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('dashboard')?>">Guest Management <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/table')?>">Table Management</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mabuhay, <?=  esc($username) ?>!</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php  esc( $usertype )  == 'admin' ? 'd-none' : '' ?>" href="#" id="btn-modal-settings" data-toggle="modal">Settings</a>
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>" style="border-radius:50px;background: transparent;border: none;">Log out</a>
                    </div>
                </li>
            </ul>
        </div> 
</nav>
