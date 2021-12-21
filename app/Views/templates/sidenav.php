<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">


            <?php if (in_groups('admin')) : ?>
                <!-- divider -->

                <hr class="sidebar-divider">

                <div class="sb-sidenav-menu-heading">
                    TICKET MANAGEMENT
                </div>

                <a class="nav-link" href="<?= base_url('tiket') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></i></div>
                    Informasi Tiket
                </a>
                
                <a class="nav-link" href="<?= base_url('ticket') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></i></div>
                    Pemesanan
                </a>
                
                <a class="nav-link" href="<?= base_url('tiket') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-ticket-alt"></i></i></div>
                    Data Tiket
                </a>
                
                <a class="nav-link" href="<?= base_url('kereta') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-train"></i></i></div>
                    Data Kereta
                </a>

                <hr class="sidebar-divider">

                <div class="sb-sidenav-menu-heading">
                    USER MANAGEMENT
                </div>

                <!-- User List -->
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></i></div>
                    Profil Users 
                </a>

            <?php endif; ?>

            <?php if (in_groups('user')) : ?>
                <!-- divider -->

                <hr class="sidebar-divider">

                <div class="sb-sidenav-menu-heading">
                    TIKET
                </div>

                <!-- User List -->
                <a class="nav-link" href="<?= base_url('tiket') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></i></div>
                    Pesan Tiket
                </a>

            <?php endif; ?>
            <!-- divider -->

            <a class="nav-link" href="<?= base_url('user') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></i></div>
                My Profile
            </a>


            <!-- divider -->
            <hr class="sidebar-divider">

            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
            </a>

            <!-- divider -->
            <hr class="sidebar-divider">

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged-in As:</div>
        <?= user()->username; ?>
    </div>
</nav>