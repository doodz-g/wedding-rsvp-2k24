<nav class="navbar navbar-expand-lg navbar bg-dark" style="padding: 0;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="<?php echo current_url() == base_url('dashboard') ? 'background-color: white;' : ''?>">
                    <a class="nav-link" href="<?php echo base_url('dashboard')?>" style="<?php echo current_url() == base_url('dashboard') ? 'color: black !important;font-weight: 600;' : ''?>">Guest Management </a>
                </li>
                <li class="nav-item" style="<?php echo current_url() == base_url('admin/table') ? 'background-color: white;' : ''?>">
                    <a class="nav-link" href="<?php echo base_url('admin/table')?>" style="<?php echo current_url() == base_url('admin/table') ? 'color: black !important;font-weight: 600;' : ''?>">Table Management</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mabuhay, <?= session()->get('username')?>!</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php echo session()->get('usertype') == 'admin' ? 'd-none' : '' ?>" href="#" id="btn-modal-settings" data-toggle="modal">Settings</a>
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>" style="border-radius:50px;background: transparent;border: none;">Log out</a>
                    </div>
                </li>
            </ul>
        </div> 
</nav>
