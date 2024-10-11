<?php $__env->startSection('title', 'Chaandi Kaar Ecommerce'); ?>
<?php $__env->startSection('main'); ?>
    <main>
        <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Shopping Cart</h3>
                            <div class="breadcrumb__list">
                                <span><a href="<?php echo e(url('/')); ?>">Home</a></span>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Product</th>
                                        <th class="tp-cart-header-price">Price</th>
                                        <th class="tp-cart-header-quantity">Quantity</th>
                                        <th class="tp-cart-header-quantity">Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $totalPrice = 0;
                                    ?>
                                    <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $totalPrice += $item->product_id->product_price * $item->product_quantity;
                                        ?>
                                        <tr>

                                            <td class="tp-cart-img"><a
                                                    href="<?php echo e(url('/product/details/' . $item->product_id->id)); ?>"> <img
                                                        src="<?php echo e(json_decode($item->product_id->product_image)[0]); ?>"
                                                        alt=""></a></td>
                                            <td class="tp-cart-title"><a
                                                    href="<?php echo e(url('/product/details/' . $item->product_id->id)); ?>"><?php echo e(Str::ucfirst($item->product_id->product_name)); ?></a>
                                            </td>
                                            <td class="tp-cart-price">
                                                <span><?php echo e('Rs.' . $item->product_id->product_price); ?></span>
                                            </td>
                                            <td class="tp-cart-quantity">
                                                <div class="tp-product-quantity mt-10 mb-10">
                                                    <span class="tp-cart-minus"
                                                        onclick="changeQuantityMinus(<?php echo e($item->id); ?>)">
                                                        <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1H9" stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <input class="tp-cart-input" type="text"
                                                        id="quantity-<?php echo e($item->id); ?>"
                                                        value="<?php echo e($item->product_quantity); ?>" min="1">
                                                    <span class="tp-cart-plus"
                                                        onclick="changeQuantityPlus(<?php echo e($item->id); ?>)">
                                                        <svg width="10" height="10" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 1V9" stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M1 5H9" stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="tp-cart-price">
                                                <span id="product_price_total_<?php echo e($item->id); ?>"><?php echo e('Rs.' . $item->product_id->product_price * $item->product_quantity); ?></span>
                                            </td>
                                            <td class="tp-cart-action">
                                                <form>
                                                    <input type="hidden" id="get_url"
                                                        value="<?php echo e(url('/remove_cart_item')); ?>">
                                                    <input type="hidden" id="module_name" value="Item">
                                                </form>
                                                <button class="tp-cart-action-btn delete" data-del="<?php echo e($item->id); ?>">
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    <span>Remove</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                            <div class="row align-items-end">
                                <div class="col-xl-12 col-md-12">
                                    <div class="tp-cart-update text-end me-5">
                                        <a href="<?php echo e(url('shop')); ?>" type="button" class="tp-cart-update-btn"><i
                                                class="fas fa-arrow-left"></i> Continue
                                            Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Subtotal</span>
                                <span class="tp-cart-checkout-top-price"
                                    id="product_subtotal_price"><?php echo e('Rs.' . number_format($totalPrice, 0)); ?></span>
                            </div>
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span id="product_total_price"><?php echo e('Rs.' . number_format($totalPrice, 0)); ?></span>
                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <a href="<?php echo e(url('/checkout')); ?>" class="tp-cart-checkout-btn w-100">Proceed to
                                    Checkout</a>
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
        function changeQuantityPlus(element) {
            var quantity = $("#quantity-" + element).val();
            quantity = Number(quantity);
            quantity = quantity + 1;
            $.ajax({
                url: `<?php echo e(url('/change_quantity')); ?>`,
                method: 'GET',
                data: {
                    "cart_id": element,
                    "product_quantity": quantity,
                },
                success: function(response) {
                    $("#product_subtotal_price").empty();
                    $("#product_subtotal_price").append("Rs." + response.total);
                    $("#product_total_price").empty();
                    $("#product_total_price").append("Rs." + response.total);
                    $("#product_price_total_"+element).empty();
                    $("#product_price_total_"+element).append("Rs."+response.product_price);
                }
            });
        }

        function changeQuantityMinus(element) {
            var quantity = $("#quantity-" + element).val();
            quantity = Number(quantity);
            if (quantity > 1) {
                quantity = quantity - 1;
            }
            $.ajax({
                url: `<?php echo e(url('/change_quantity')); ?>`,
                method: 'GET',
                data: {
                    "cart_id": element,
                    "product_quantity": quantity,
                },
                success: function(response) {
                    $("#product_subtotal_price").empty();
                    $("#product_subtotal_price").append("Rs." + response.total);
                    $("#product_total_price").empty();
                    $("#product_total_price").append("Rs." + response.total);
                    $("#product_price_total_"+element).empty();
                    $("#product_price_total_"+element).append("Rs."+response.product_price);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Pages/cart.blade.php ENDPATH**/ ?>