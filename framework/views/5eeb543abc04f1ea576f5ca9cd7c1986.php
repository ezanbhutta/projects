<?php $__env->startSection('title', 'Manage Categories'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/customers')); ?>">Customers</a></li>
                            <li class="breadcrumb-item active">Manage</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title mb-0">All Customers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 1;
                                ?>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($customer_dates[$customer->id]): ?>
                                        <tr>
                                            <td data-ordering="false"><?php echo e($num++); ?></td>
                                            <td><?php echo e(Str::ucfirst($customer->name)); ?></td>
                                            <td><?php echo e($customer->email); ?></td>
                                            <td><?php echo e($customer->contact_no); ?></td>
                                            <td><?php echo e(date('M j, Y', strtotime($customer_dates[$customer->id]))); ?></td>
                                            <td><span class="badge bg-primary"><?php echo e(__('Active')); ?></span></td>
                                            <td>
                                                <?php if($customer->order_status == 'Processing'): ?>
                                                    <span class="badge bg-danger"><?php echo e(__('Processing')); ?></span>
                                                <?php elseif($customer->order_status == 'Delivered'): ?>
                                                    <span class="badge bg-success"><?php echo e(__('Delivered')); ?></span>
                                                <?php elseif($customer->order_status == 'Cancelled'): ?>
                                                    <span class="badge bg-warning"><?php echo e(__('Cancelled')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Customers/view.blade.php ENDPATH**/ ?>