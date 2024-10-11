<?php $__env->startSection('title', 'Edit Profile'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img class="ounded-circle avatar-xl img-thumbnail user-profile-image"
                                    src="<?php echo e(asset('admin/assets/images/users/dummy.jpg')); ?>" alt="Header Avatar">
                            </div>
                            <h5 class="fs-16 mb-1"><?php echo e($user->name); ?></h5>
                            <p class="text-muted mb-0">
                                <?php echo e($user->role); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Complete Your Profile</h5>
                            </div>

                        </div>
                        <div class="progress animated-progress custom-progress progress-label">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="label">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="<?php echo e(url('#editProfile')); ?>"
                                    role="tab">
                                    <i class="fas fa-user"></i> Edit Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="<?php echo e(url('#editPrices')); ?>" role="tab">
                                    <i class="fas fa-tag"></i> Edit Current Prices
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="editProfile" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="card-header custom-card-header bg-light text-center">
                                            <h6 class="card-title mb-0 mx-auto"><i class="fas fa-user"
                                                    style="border: 2px solid #e1e6f1;border-radius: 50%;padding: 6px;background-color: #a9b1c0;color: #0a2647;"></i>
                                                Edit General Information</h6>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 mx-auto border-right mt-3">
                                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="col-6">
                                                <label class="form-label">Name *</label>
                                                <input type="hidden" id="id" value="<?php echo e($user->id); ?>">
                                                <input type="hidden" id="get_url" value="<?php echo e(url('/get-update-profile')); ?>">
                                                <input type="hidden" id="module_name" value="Profile">
                                                <input type="text" name="name" value="<?php echo e($user->name); ?>"
                                                    placeholder="Enter First Name" class="form-control" autocomplete="off"
                                                    oninput="NameValidation(this)">
                                                <strong class="text-danger" id="name"></strong>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email *</label>
                                                <input type="email" name="email" value="<?php echo e($user->email); ?>"
                                                    placeholder="example@gmail.com" class="form-control" autocomplete="off"
                                                    oninput="EmailValidation(this)">
                                                <strong class="text-danger" id="email"></strong>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Contact No *</label>
                                                <input type="text" name="contact_no" value="<?php echo e($user->contact_no); ?>"
                                                    placeholder="+92-XXXXXXXXXX" class="form-control contact_number"
                                                    autocomplete="off">
                                                <strong class="text-danger" id="contact_no"></strong>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Password *</label>
                                                <input type="text" name="password" value="<?php echo e($user->temp_password); ?>"
                                                    placeholder="Enter Password" class="form-control" autocomplete="off">
                                                <strong class="text-danger" id="password"></strong>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address *</label>
                                                <textarea name="address" class="form-control" row="4"><?php echo e($user->address); ?></textarea>
                                                <strong class="text-danger" id="address"></strong>
                                            </div>
                                            <?php if($user->role=="Admin"): ?>
                                            <div class="col-12">
                                                <label class="form-label">Labour Cost *</label>
                                                <input name="labour_cost" type="number" placeholder="Enter Labour Cost" class="form-control" value="<?php echo e($user->labour_cost); ?>">
                                                <strong class="text-danger" id="labour_cost"></strong>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-6">
                                                <button class="btn btn-primary m-1 rounded-pill" type="submit"
                                                    id="update">Update Profile > </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Pages/get_profile.blade.php ENDPATH**/ ?>