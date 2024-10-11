<?php $__env->startSection('title', 'Manage Orders'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/orders')); ?>">Orders</a></li>
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
                                <h5 class="card-title mb-0">Filtertation By Date</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_filteration" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <?php
                                    $today = \Carbon\Carbon::now();
                                    $currentWeek = \Carbon\Carbon::parse($today);
                                    $startOfWeek = $currentWeek->startOfWeek()->format('m/d/y');
                                    $endOfWeek = $currentWeek->endOfWeek()->format('m/d/y');
                                    $dateRange = $startOfWeek . ' - ' . $endOfWeek;
                                ?>
                                <label class="form-label">Select Range *</label>
                                <input type="text" name="daterange" class="form-control" value="<?php echo e($dateRange); ?>"
                                    placeholder="Select Range">
                                <strong class="text-danger" id="daterange"></strong>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid gap-2 mt-4">
                                    <button class="btn btn-warning waves-effect waves-light" type="submit"
                                        id="apply_filter"><i class="fas fa-filter"></i> Apply Filteration</button>
                                </div>
                            </div>
                        </form>
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
                                <h5 class="card-title mb-0">All Orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Order Key</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 1;
                                ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-ordering="false"><?php echo e($num++); ?></td>
                                        <td><a
                                                href="<?php echo e(url('/order/details/' . $order->order_key)); ?>"><?php echo e(str_replace('order_key_', '', $order->order_key)); ?></a>
                                        </td>
                                        <td><?php echo e($order->name); ?></td>
                                        <td><?php echo e($order->email); ?></td>
                                        <td><?php echo e($order->contact_no); ?></td>
                                        <td><?php echo e(date('M j, Y', strtotime($order->created_at))); ?></td>
                                        <td>
                                            <?php if($order->order_status == 'Processing'): ?>
                                                <span class="badge bg-danger"><?php echo e(__('Processing')); ?></span>
                                            <?php elseif($order->order_status == 'Delivered'): ?>
                                                <span class="badge bg-success"><?php echo e(__('Delivered')); ?></span>
                                            <?php elseif($order->order_status == 'Cancelled'): ?>
                                                <span class="badge bg-warning"><?php echo e(__('Cancelled')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="badge bg-info"><?php echo e($order->payment_method); ?></span></td>
                                        <td><a href="<?php echo e(url('/order/details/' . $order->order_key)); ?>"
                                                class="btn btn-primary text-white btn-sm"><i class="fas fa-eye"></i>
                                                Details</a></td>
                                    </tr>
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
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            var salesTable = $('#example2').DataTable();

            $(document).on("click", "#apply_filter", function(event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
                const button = this;
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                var formData = new FormData(document.getElementById('form_filteration'));
                $.ajax({
                    url: `<?php echo e(url('/orders_filteration')); ?>`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        $(".text-danger").html("");
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply Filteration';
                        if (response && response.data) {
                            salesTable.clear().draw();
                            var count = 0;
                            $.each(response.data, function(key, value) {
                                count++;
                                salesTable.row.add([
                                    count,
                                    value.order_key,
                                    value.name,
                                    value.email,
                                    value.contact_no,
                                    value.date,
                                    value.status,
                                    value.payment_method,
                                    value.delete_button,
                                ]).draw(false);
                            });
                            $("#grand_amount").empty();
                            $("#grand_amount").append("Rs. " + response.grand_amount)
                        }
                    },
                    error: function(xhr, status, error) {
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply Filteration';
                        console.error('Error occurred: ', error);
                    }
                });
            });

            function numberFormat(number, decimals = 0) {
                const factor = Math.pow(10, decimals);
                return (Math.round(number * factor) / factor).toLocaleString();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Pages/orders.blade.php ENDPATH**/ ?>