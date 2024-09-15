<nav class="navbar navbar-expand-lg navbar bg-dark">
        <a class="navbar-brand" href="#">D & A</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('dashboard')?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/table')?>">Table Slots</a>
                </li>
                <li class="nav-item">
                </li>
            </ul>
            <?php if (session()->get('logged_in')): ?>
                <p style="color: white;margin-bottom:0;">Mabuhay, <?= session()->get('username') ?>! <a
                        href="<?php echo base_url('logout'); ?>" class="btn btn-secondary" data-target="#"
                        style="border-radius:50px;background: transparent;border: none;"><i class="fa fa-power-off"
                            style="color:red;font-size:32px;"></i></a></p>
            <?php endif; ?>
        </div>
    </nav>
