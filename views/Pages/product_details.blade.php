@extends('layouts.app')
@section('title', 'Chaandi Kaar Ecommerce')
@section('main')
    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <div class="breadcrumb__list has-icon">
                                <span class="breadcrumb-icon">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z"
                                            fill="#55585B" stroke="#55585B" stroke-width="0.5" />
                                    </svg>
                                </span>
                                <span><a href="{{ url('/') }}">Home</a></span>
                                <span><a
                                        href="{{ url('/get_category/' . $category->id) }}">{{ Str::ucfirst($category->name) }}</a></span>
                                <span>{{ Str::ucfirst($product->product_name) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-product-details-area">
            <div class="tp-product-details-top pb-115">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6">
                            <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                                <nav>
                                    <div class="nav nav-tabs flex-sm-column" id="productDetailsNavThumb" role="tablist">
                                        @foreach (json_decode($product->product_image) as $key => $image)
                                            <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                id="nav-{{ $key }}-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-{{ $key }}" type="button" role="tab"
                                                aria-controls="nav-{{ $key }}"
                                                aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                                <img src="{{ $image }}" alt="Product Thumbnail {{ $key + 1 }}">
                                            </button>
                                        @endforeach
                                    </div>
                                </nav>
                                <div class="tab-content m-img" id="productDetailsNavContent">
                                    @foreach (json_decode($product->product_image) as $key => $image)
                                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                            id="nav-{{ $key }}" role="tabpanel"
                                            aria-labelledby="nav-{{ $key }}-tab" tabindex="0">
                                            <div class="tp-product-details-nav-main-thumb">
                                                <img src="{{ $image }}"
                                                    alt="Product Main Image {{ $key + 1 }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-xl-5 col-lg-6">
                            <div class="tp-product-details-wrapper">
                                <div class="tp-product-details-category">
                                    <span>{{ Str::ucfirst($category->name) }}</span>
                                </div>
                                <h3 class="tp-product-details-title">{{ Str::ucfirst($product->product_name) }}</h3>
                                <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                    <div class="tp-product-details-stock mb-10">
                                        @if ($stock->product_stock == 0)
                                            <span>Out of Stock</span>
                                        @else
                                            <span>In Stock</span>
                                        @endif
                                    </div>
                                    <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                        <div class="tp-product-details-rating">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    {{ Str::ucfirst($product->product_description) }}
                                </p>
                                <div class="tp-product-details-price-wrapper mb-20">
                                    <span
                                        class="tp-product-details-price new-price">{{ 'Rs.' . $product->product_price }}</span>
                                </div>
                                <div class="tp-product-details-action-wrapper">
                                    <h3 class="tp-product-details-action-title">Quantity</h3>
                                    <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                        <div class="tp-product-details-quantity">
                                            <div class="tp-product-quantity mb-15 mr-15">
                                                <span class="tp-cart-minus">
                                                    <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <input class="tp-cart-input" type="text" value="1">
                                                <span class="tp-cart-plus">
                                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="tp-product-details-add-to-cart mb-15 w-100">
                                            <button class="tp-product-details-add-to-cart-btn w-100"
                                                data-id="{{ $product->id }}" id="add_to_cart"
                                                {{ $stock->product_stock == 0 ? 'disabled' : '' }}>{{ $stock->product_stock == 0 ? 'Out of Stock' : 'Add to Cart' }}</button>
                                        </div>
                                    </div>
                                    <button class="tp-product-details-buy-now-btn w-100" data-id="{{ $product->id }}"
                                        id="add_to_cart"
                                        {{ $stock->product_stock == 0 ? 'disabled' : '' }}>{{ $stock->product_stock == 0 ? 'Out of Stock' : 'Buy Now' }}</button>
                                </div>
                                <div class="tp-product-details-query">
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span>Category: </span>
                                        <p>Computers & Tablets</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-product-details-bottom pb-140">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tp-product-details-tab-nav tp-tab">
                                <nav>
                                    <div class="nav nav-tabs justify-content-center p-relative tp-product-tab"
                                        id="navPresentationTab" role="tablist">
                                        <button class="nav-link active" id="nav-description-tab" aria-selected="true"
                                            data-bs-toggle="tab" data-bs-target="#nav-description" type="button"
                                            role="tab" aria-controls="nav-description">Description</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="navPresentationTabContent">
                                    <div class="tab-pane fade active show" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab" tabindex="0">
                                        <div class="tp-product-details-desc-wrapper pt-80">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-10">
                                                    <div class="tp-product-details-desc-item pb-105">
                                                        <div class="row">
                                                            <div class="col-lg-6 mx-auto">
                                                                <div class="tp-product-details-desc-content pt-25">
                                                                    <span>{{ Str::ucfirst($category->name) }}</span>
                                                                    <h3 class="tp-product-details-desc-title">
                                                                        {{ Str::ucfirst($product->product_name) }}</h3>
                                                                    <p>{{ Str::ucfirst($product->product_description) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product details area end -->

        <!-- related product area start -->
        <section class="tp-related-product pt-95 pb-120">
            <div class="container">
                <div class="row">
                    <div class="tp-section-title-wrapper-6 text-center mb-40">
                        <span class="tp-section-title-pre-6">Next day Products</span>
                        <h3 class="tp-section-title-6">Related Products</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-allCollection" role="tabpanel"
                                aria-labelledby="nav-allCollection-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($related_products as $product)
                                        @if ($product_stock[$product->id] == 0 || $product_stock[$product->id] > 0)
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                                    <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
                                                        <a href="{{ url('/product/details/' . $product->id) }}">
                                                            <img src="{{ json_decode($product->product_image)[0] }}" style="width:261px;height:261px"
                                                                alt="">
                                                        </a>
                                                        <div
                                                            class="tp-product-action-3 tp-product-action-4 has-shadow tp-product-action-primaryStyle">
                                                            <div class="tp-product-action-item-3 d-flex flex-column">
                                                                <button type="button" data-id="{{ $product->id }}"
                                                                    id="related_add_to_cart"
                                                                    {{ $product_stock[$product->id] == 0 ? 'disabled' : '' }}
                                                                    class="tp-product-action-btn-3 tp-product-add-cart-btn">
                                                                    <svg width="17" height="17"
                                                                        viewBox="0 0 17 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H4.75212H14.0265H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799ZM4.74722 12.7162C3.62777 12.7162 2.68001 11.8438 2.58906 10.728L1.81046 1.4837L0.529505 1.26308C0.181854 1.20198 -0.0501969 0.873587 0.00930333 0.526523C0.0705036 0.17946 0.406255 -0.0462578 0.746256 0.00805037L2.51426 0.313534C2.79901 0.363599 3.01576 0.5995 3.04042 0.888012L3.24017 3.26484C15.3748 3.26993 15.4139 3.27587 15.4726 3.28266C15.946 3.3514 16.3625 3.59833 16.6464 3.97849C16.9303 4.35779 17.0493 4.82535 16.9813 5.29376L16.1747 10.8586C16.0225 11.9177 15.1011 12.7162 14.0301 12.7162H14.0259H4.75402H4.74722Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M12.6629 7.67446H10.3067C9.95394 7.67446 9.66919 7.38934 9.66919 7.03804C9.66919 6.68673 9.95394 6.40161 10.3067 6.40161H12.6629C13.0148 6.40161 13.3004 6.68673 13.3004 7.03804C13.3004 7.38934 13.0148 7.67446 12.6629 7.67446Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M4.38171 15.0212C4.63756 15.0212 4.84411 15.2278 4.84411 15.4836C4.84411 15.7395 4.63756 15.9469 4.38171 15.9469C4.12501 15.9469 3.91846 15.7395 3.91846 15.4836C3.91846 15.2278 4.12501 15.0212 4.38171 15.0212Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M4.38082 15.3091C4.28477 15.3091 4.20657 15.3873 4.20657 15.4833C4.20657 15.6763 4.55592 15.6763 4.55592 15.4833C4.55592 15.3873 4.47687 15.3091 4.38082 15.3091ZM4.38067 16.5815C3.77376 16.5815 3.28076 16.0884 3.28076 15.4826C3.28076 14.8767 3.77376 14.3845 4.38067 14.3845C4.98757 14.3845 5.48142 14.8767 5.48142 15.4826C5.48142 16.0884 4.98757 16.5815 4.38067 16.5815Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M13.9701 15.0212C14.2259 15.0212 14.4333 15.2278 14.4333 15.4836C14.4333 15.7395 14.2259 15.9469 13.9701 15.9469C13.7134 15.9469 13.5068 15.7395 13.5068 15.4836C13.5068 15.2278 13.7134 15.0212 13.9701 15.0212Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M13.9692 15.3092C13.874 15.3092 13.7958 15.3874 13.7958 15.4835C13.7966 15.6781 14.1451 15.6764 14.1443 15.4835C14.1443 15.3874 14.0652 15.3092 13.9692 15.3092ZM13.969 16.5815C13.3621 16.5815 12.8691 16.0884 12.8691 15.4826C12.8691 14.8767 13.3621 14.3845 13.969 14.3845C14.5768 14.3845 15.0706 14.8767 15.0706 15.4826C15.0706 16.0884 14.5768 16.5815 13.969 16.5815Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                    <span
                                                                        class="tp-product-tooltip">{{ $product_stock[$product->id] == 0 ? 'Out of Stock' : 'Add to Cart' }}</span>
                                                                </button>
                                                                <a href="{{ url('/product/details/' . $product->id) }}"
                                                                    class="tp-product-action-btn-3 tp-product-quick-view-btn text-center">
                                                                    <svg width="18" height="15"
                                                                        viewBox="0 0 18 15" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                    <span class="tp-product-tooltip">Quick View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-add-cart-btn-large-wrapper">
                                                            <button type="button" class="tp-product-add-cart-btn-large"
                                                                {{ $product_stock[$product->id] == 0 ? 'disabled' : '' }}
                                                                data-id="{{ $product->id }}" id="related_add_to_cart">
                                                                {{ $product_stock[$product->id] == 0 ? 'Out of Stock' : 'Add to Cart' }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-content-3">
                                                        <h3 class="tp-product-title-3">
                                                            <a
                                                                href="{{ url('/product/details/' . $product->id) }}">{{ Str::ucfirst($product->product_name) }}</a>
                                                        </h3>
                                                        <div class="tp-product-price-wrapper-3">
                                                            <span
                                                                class="tp-product-price-3 new-price">{{ 'Rs.' . $product->product_price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on("click", "#add_to_cart", function(e) {
                e.preventDefault();
                var product_id = $(this).data('id');
                var quantity = $(".tp-cart-input").val();
                var formData = new FormData();
                formData.append("product_id", product_id);
                formData.append("quantity", quantity);
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "{{ url('/add_to_cart') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        if (response.message == 400) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Login is the first priority",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else if (response.message == 200) {
                            $(".cart_items_count").empty();
                            $(".cart_items_count").append(response.cart_items);
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Product added to the cart",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else if (response.message == 300) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Product already exists into the cart if you want to buy more than increase the quantity form the cart.",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 6000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Someting went wrong",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },
                });
            });
            $(document).on("click", "#related_add_to_cart", function(e) {
                e.preventDefault();
                var product_id = $(this).data('id');
                var quantity = 1;
                var formData = new FormData();
                formData.append("product_id", product_id);
                formData.append("quantity", quantity);
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "{{ url('/add_to_cart') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        if (response.message == 400) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Login is the first priority",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else if (response.message == 200) {
                            $(".cart_items_count").empty();
                            $(".cart_items_count").append(response.cart_items);
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Product added to the cart",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else if (response.message == 300) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Product already exists into the cart if you want to buy more than increase the quantity form the cart.",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 6000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Someting went wrong",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },
                });
            });
        });
    </script>
@endsection
