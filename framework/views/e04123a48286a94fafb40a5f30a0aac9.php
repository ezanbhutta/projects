<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box horizontal-logo">
                    <a href="<?php echo e(url('/dashbaord')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(asset('admin/assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(asset('admin/assets/images/logo-dark.png')); ?>" alt="" height="17">
                        </span>
                    </a>

                    <a href="<?php echo e(url('/dashbaord')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(asset('admin/assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(asset('admin/assets/images/logo-light.png')); ?>" alt="" height="17">
                        </span>
                    </a>
                </div>
                <?php
                    $user = DB::table('users')->where('id', session()->get('user_added'))->first();
                ?>
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                </div>
                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <a href="<?php echo e(url('/clear')); ?>" class="btn btn-primary text-light">
                        <i class="fas fa-plus"></i> Clear Cache
                    </a>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary text-light ms-2">
                        Go to User Site <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="<?php echo e(asset('admin/assets/images/users/dummy.jpg')); ?>" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e($user->name); ?></span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?php echo e($user->role); ?></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Welcome <?php echo e($user->name); ?>!</h6>
                        <a class="dropdown-item" href="<?php echo e(url('/get-profile')); ?>"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>
                                <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                        
                    </div>
                </div>
            </div>
        </div>
</header>
<?php /**PATH C:\xampp\htdocs\channdi\resources\views/components/admin-navbar.blade.php ENDPATH**/ ?>