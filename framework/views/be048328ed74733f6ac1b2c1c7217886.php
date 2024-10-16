<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashbaord</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <?php
                                        date_default_timezone_set('Asia/Karachi');
                                        $currentHour = date('G');
                                        $greeting;
                                    ?>
                                    <?php if($currentHour >= 5 && $currentHour < 12): ?>
                                        <?php
                                            $greeting = 'Good Morning';
                                        ?>
                                    <?php elseif($currentHour >= 12 && $currentHour < 17): ?>
                                        <?php
                                            $greeting = 'Good Afternoon';
                                        ?>
                                    <?php elseif($currentHour >= 17 && $currentHour < 19): ?>
                                        <?php
                                            $greeting = 'Good Evening';
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $greeting = 'Good Night';
                                        ?>
                                    <?php endif; ?>
                                    <h4 class="fs-16 mb-1"><?php echo e($greeting); ?>, <?php echo e($user->name); ?>!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-animate bg-primary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white-50 mb-0">Total Orders</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold text-white"><span class="counter-value"
                                                    data-target="<?php echo e($orders); ?>">0</span>
                                            </h2>
                                            <a href="<?php echo e(url('/orders')); ?>" class="text-decoration-underline text-white">View
                                                all Orders</a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                    <i class="fas fa-layer-group"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-animate bg-primary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white-50 mb-0">Today Orders</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold text-white"><span class="counter-value"
                                                    data-target="<?php echo e($todayOrders); ?>">0</span>
                                            </h2>
                                            <a href="<?php echo e(url('/orders')); ?>" class="text-decoration-underline text-white">View
                                                all Orders</a>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                    <i class="fas fa-layer-group"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div>
                        <?php if($user->role == 'Admin'): ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Categories</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="<?php echo e($totalCategories); ?>">0</span>
                                                </h2>
                                                <a href="<?php echo e(url('/category')); ?>"
                                                    class="text-decoration-underline text-white">View All Categories</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fa-solid fa-list-check"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Product Units</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="<?php echo e($totalUnits); ?>">0</span>
                                                </h2>
                                                <a href="<?php echo e(url('/quantity')); ?>"
                                                    class="text-decoration-underline text-white">View All Units</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fas fa-layer-group"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Products</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="<?php echo e($totalProducts); ?>">0</span>
                                                </h2>
                                                <a href="<?php echo e(url('/product')); ?>"
                                                    class="text-decoration-underline text-white">View All Products</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fab fa-product-hunt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php if(session('success') == 200): ?>
    <?php $__env->startSection('script'); ?>
        <script>
            Swal.fire({
                toast: true,
                icon: "success",
                title: "Welcome to Dashboard...!",
                animation: false,
                position: "top-right",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('script'); ?>
    <script>
        function updateDigitalClock() {
            const now = new Date();

            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            const ampm = (hours >= 12) ? 'PM' : 'AM';
            const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;

            const digitalClock = document.getElementById('digital-clock');
            digitalClock.textContent =
                `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
        }

        function formatTwoDigits(number) {
            return (number < 10) ? `0${number}` : number;
        }
        setInterval(updateDigitalClock, 1000);
        updateDigitalClock();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Pages/dashboard.blade.php ENDPATH**/ ?>