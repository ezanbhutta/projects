<?php $__env->startSection('title', 'Chaandi Kaar Ecommerce'); ?>
<?php $__env->startSection('main'); ?>
    <main>
        <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Checkout</h3>
                            <div class="breadcrumb__list">
                                <span><a href="<?php echo e(url('/')); ?>">Home</a></span>
                                <span>Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="tp-checkout-bill-area">
                            <h3 class="tp-checkout-bill-title">Billing Details</h3>

                            <div class="tp-checkout-bill-form">
                                <form action="#">
                                    <div class="tp-checkout-bill-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Full Name <span>*</span></label>
                                                    <input type="text" id="full_name" placeholder="Enter Full Name"
                                                        value="<?php echo e($user->name); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Email address <span>*</span></label>
                                                    <input type="email" id="email" value="<?php echo e($user->email); ?>"
                                                        disabled placeholder="Enter Email Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Contact No <span>*</span></label>
                                                    <input type="text" id="contact_no" placeholder="Enter Contact No">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Country </label>
                                                    <input type="text" id="country" placeholder="Enter Country">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>State </label>
                                                    <input type="text" id="state" placeholder="Enter State">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>City </label>
                                                    <input type="text" id="city" placeholder="Enter City">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Zip/Postal Code </label>
                                                    <input type="text" id="zip_code"
                                                        placeholder="Enter Zip/Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Street Address </label>
                                                    <input type="text" id="address" placeholder="Enter Street Address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Order note</label>
                                                    <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tp-checkout-place white-bg">
                            <h3 class="tp-checkout-place-title">Your Order</h3>

                            <div class="tp-order-info-list">
                                <ul>
                                    <li class="tp-order-info-list-header">
                                        <h4>Product</h4>
                                        <h4>Total</h4>
                                    </li>
                                    <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="tp-order-info-list-desc">
                                            <p><?php echo e(Str::ucfirst($item->product_id->product_name)); ?> <span> x
                                                    <?php echo e($item->product_quantity); ?></span></p>
                                            <span><?php echo e('Rs.' . $item->product_quantity * $item->product_id->product_price); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Subtotal</span>
                                        <span><?php echo e('Rs.' . $totalPrice); ?></span>
                                    </li>
                                    <li class="tp-order-info-list-total">
                                        <span>Total</span>
                                        <span><?php echo e('Rs.' . $totalPrice); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tp-checkout-payment">
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="bank_transfer" name="payment_method">
                                    <label for="bank_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                                    <div class="tp-checkout-payment-desc direct-bank-transfer">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="easypaisa" name="payment_method">
                                    <label for="easypaisa">Easypaisa</label>
                                    <div class="tp-checkout-payment-desc easypaisa">
                                        <p>Pay using Easypaisa. Make sure to use your Order ID as the payment reference. Your order will be processed once the payment is confirmed.</p>
                                    </div>
                                </div>
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="jazzcash" name="payment_method">
                                    <label for="jazzcash">Jazzcash</label>
                                    <div class="tp-checkout-payment-desc jazzcash">
                                        <p>Pay using Jazzcash. Please include your Order ID as the payment reference. We will ship your order after confirming the payment.</p>
                                    </div>
                                </div>
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="cod" value="COD" name="payment_method">
                                    <label for="cod">Cash on Delivery</label>
                                    <div class="tp-checkout-payment-desc cash-on-delivery">
                                        <p>Pay in cash when the delivery is made. Please ensure you have the exact amount as our delivery personnel may not carry change.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tp-checkout-btn-wrapper">
                                <a type="button" class="tp-checkout-btn w-100" id="place_order">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#place_order", function(stop) {
                stop.preventDefault();
                var full_name = $("#full_name").val();
                var email = $("#email").val();
                var contact_no = $("#contact_no").val();
                var country = $("#country").val();
                var state = $("#state").val();
                var city = $("#city").val();
                var zip_code = $("#zip_code").val();
                var address = $("#address").val();
                var order_note = $("#order_note").val();
                var payment_method = "";
                if ($("#cod").is(":checked")) {
                    payment_method = "COD";
                } else if ($("#jazzcash").is(":checked")) {
                    payment_method = "JAZZCASH";
                } else if ($("#easypaisa").is(":checked")) {
                    payment_method = "EASYPAISA";
                } else if ($("#bank_transfer").is(":checked")) {
                    payment_method = "BANK TRANSFER";
                }
                if (full_name == "" || email == "" || contact_no == "" || country == "" || state == "" ||
                    city == "" || zip_code == "" || address == "" || order_note == "" || payment_method ==
                    "") {
                    Swal.fire({
                        toast: true,
                        icon: "error",
                        title: "Please fill out all fields and select a payment method.",
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    return false;
                }

                const button = document.getElementById("place_order");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute('disabled', 'disabled');
                var formData = new FormData();
                formData.append("full_name", full_name);
                formData.append("email", email);
                formData.append("contact_no", contact_no);
                formData.append("country", country);
                formData.append("state", state);
                formData.append("city", city);
                formData.append("zip_code", zip_code);
                formData.append("address", address);
                formData.append("order_note", order_note);
                formData.append("payment_method", payment_method);
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: `<?php echo e(url('/place_order')); ?>`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        button.removeAttribute('disabled');
                        button.innerHTML = "Place Order";
                        if (response.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Order Placed Successfully...!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            window.location.href = `<?php echo e(url('/order/${response.order_key}')); ?>`;
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Something went wrong. Please try again.",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        button.removeAttribute('disabled');
                        button.innerHTML = "Place Order";
                        Swal.fire({
                            toast: true,
                            icon: "error",
                            title: "Something went wrong. Please try again.",
                            animation: false,
                            position: "top-right",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                });
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Pages/checkout.blade.php ENDPATH**/ ?>