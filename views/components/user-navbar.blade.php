<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>
<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
        @php
            $categories = DB::table('categories')->latest()->get();
        @endphp
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="{{ url('/') }}">
                        <!-- <img src="{{ asset('user/assets/img/logo/logo.svg') }}" alt="logo"> -->
                    </a>
                </div>
            </div>
            <div class="offcanvas__category pb-40">
                <button class="tp-offcanvas-category-toggle">
                    <i class="fa-solid fa-bars"></i>
                    All Categories
                </button>
                <div class="tp-category-mobile-menu">
                    <nav class="tp-category-menu-content" style="display: none;">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ url('get_category/' . $category->id) }}"
                                        class="text-capitalize">{{ Str::ucfirst($category->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tp-main-menu-mobile fix mb-40">
                <nav class="tp-main-menu-content">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li class="has-dropdown">
                            <a>Category</a>
                            <ul class="tp-submenu">
                                @foreach ($categories as $category)
                                    <li><a href="{{ url('get_category/' . $category->id) }}"
                                            class="text-capitalize">{{ Str::ucfirst($category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="offcanvas__contact align-items-center d-none">
                <div class="offcanvas__contact-icon mr-20">
                    <span>
                        <img src="{{ asset('user/assets/img/icon/contact.png') }}" alt="">
                    </span>
                </div>
                <div class="offcanvas__contact-content">
                    <h3 class="offcanvas__contact-title">
                        <a href="{{ url('tel:098-852-987') }}">004524865</a>
                    </h3>
                </div>
            </div>
            <div class="offcanvas__btn">
                <a href="{{ url('/contact') }}" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
            </div>
        </div>
        <div class="offcanvas__bottom">
            <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                <div class="offcanvas__currency-wrapper currency">
                    <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                        id="tp-offcanvas-currency-toggle">Currency : PKR</span>
                    <ul class="offcanvas__currency-list tp-currency-list">
                        <li>PKR</li>
                    </ul>
                </div>
                <div class="offcanvas__select language">
                    <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                        <div class="offcanvas__lang-img mr-15">
                            <img src="{{ asset('user/assets/img/icon/language-flag.png') }}" alt="">
                        </div>
                        <div class="offcanvas__lang-wrapper">
                            <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                id="tp-offcanvas-lang-toggle">English</span>
                            <ul class="offcanvas__lang-list tp-lang-list">
                                <li>English</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
    <div class="container">
        <div class="row row-cols-5">
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ url('/shop') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-store"></i>
                        <span>Store</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ url('/cart') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-love"></i>
                        <span>Cart</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ url('/profile') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-user"></i>
                        <span>Account</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                        <i class="flaticon-menu-1"></i>
                        <span>Menu</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="tp-header-area tp-header-style-primary tp-header-height">
        <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-md-block">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-md-8">
                        <div class="tp-header-info d-flex align-items-center">
                            <div class="tp-header-info-item">
                                <a href="{{ url('mailto:rishalsiddiqui87@gmail.com') }}">
                                    <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span> rishalsiddiqui87@gmail.com
                                </a>
                                <a href="{{ url('mailto:ezanmujahid@gmail.com') }}">
                                    <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span> ezanmujahid@gmail.com
                                </a>
                                <a href="{{ url('mailto:chusamadon31@gmail.com') }}">
                                    <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span> chusamadon31@gmail.com
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                            <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                                <div class="tp-header-top-menu-item tp-header-lang">
                                    <span class="tp-header-lang-toggle" id="tp-header-lang-toggle">English</span>
                                    <ul>
                                        <li>
                                            <a href="{{ url('#') }}">English</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-header-top-menu-item tp-header-currency">
                                    <span class="tp-header-currency-toggle" id="tp-header-currency-toggle">PKR</span>
                                    <ul>
                                        <li>
                                            <a href="{{ url('#') }}">PKR</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-header-top-menu-item tp-header-setting">
                                    <span class="tp-header-setting-toggle"
                                        id="tp-header-setting-toggle">{{ session()->has('user_added') ? DB::table('users')->where('id', session()->get('user_added'))->first()->name : 'Account' }}</span>
                                    <ul>
                                        @if (session()->has('user_added'))
                                            <li>
                                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                                            </li>
                                            @if (DB::table('users')->where('id', session()->get('user_added'))->first()->role == 'User')
                                                <li>
                                                    <a href="{{ url('/profile') }}">My Profile</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ url('/logout') }}">Logout</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ url('/login') }}">Login/SignUp</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
            <div class="container">
                <div class="tp-mega-menu-wrapper p-relative">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('logo 4.png') }}"  width="70px" height="50px" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 d-none d-xl-block">
                            <div class="main-menu menu-style-2">
                                <nav class="tp-main-menu-content">
                                    @php
                                        $categories = DB::table('categories')->latest()->get();
                                    @endphp
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/about') }}">About Us</a></li>
                                        <li class="has-dropdown">
                                            <a>Category</a>
                                            <ul class="tp-submenu">
                                                @foreach ($categories as $category)
                                                    <li><a href="{{ url('get_category/' . $category->id) }}"
                                                            class="text-capitalize">{{ Str::ucfirst($category->name) }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                            <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                <div class="tp-header-search-2 d-none d-sm-block">
                                    <form action="#">
                                        <input type="text" placeholder="Search for Products...">
                                        <button type="submit">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M18.9999 19L14.6499 14.65" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="tp-header-action d-flex align-items-center ml-30">
                                    {{-- <div class="tp-header-action-item d-none d-lg-block">
                                        <a href="{{ url('/dashboard') }}" class="tp-header-action-btn"
                                            title="Go to Dashboard">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </a>
                                    </div> --}}
                                    {{-- <div class="tp-header-action-item d-none d-lg-block">
                                        @if (session()->has('user_added'))
                                            <a href="{{ url('/logout') }}" class="tp-header-action-btn"
                                                title="Sign Out">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/login') }}" class="tp-header-action-btn"
                                                title="Sign In">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </a>
                                        @endif
                                    </div> --}}
                                    <div class="tp-header-action-item">
                                        <a href="{{ url('/cart') }}" class="tp-header-action-btn">
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M7.70365 10.1018H7.74942" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M13.5343 10.1018H13.5801" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span
                                                class="tp-header-action-badge cart_items_count">{{ session()->has('user_added')? DB::table('sales')->where(['customer_id' => session()->get('user_added'), 'status' => 0])->count(): 0 }}</span>
                                        </a>
                                    </div>
                                    <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                        <button type="button" class="tp-offcanvas-open-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                                viewBox="0 0 30 16">
                                                <rect x="10" width="20" height="2" fill="currentColor" />
                                                <rect x="5" y="7" width="25" height="2"
                                                    fill="currentColor" />
                                                <rect x="10" y="14" width="20" height="2"
                                                    fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
