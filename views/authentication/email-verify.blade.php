<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Chaandi Kaar E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon-icon.png') }}">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @php
        date_default_timezone_set('Asia/Karachi');
    @endphp
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ route('authentication.signin') }}" class="d-inline-block auth-logo">
                                    <img src="{{ asset('admin/assets/images/logo_white.png') }}"
                                        alt="Logo not Found" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Hospital Management System</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <table class="body-wrap"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                            <tr
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                    valign="top"></td>
                                <td class="container" width="600"
                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                                    valign="top">
                                    <div class="content"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0"
                                            itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                            <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                                <td class="content-wrap"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;"
                                                    valign="top">
                                                    <meta itemprop="name" content="Confirm Email"
                                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <tr
                                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                                valign="top">
                                                                <div style="text-align: center;margin-bottom: 15px;">
                                                                    <img src="{{ asset('admin/assets/images/logo-dark.png') }}"
                                                                        alt="" height="20">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 24px; vertical-align: top; margin: 0; padding: 0 0 10px;  text-align: center;"
                                                                valign="top">
                                                                <h4
                                                                    style="font-family: 'Roboto', sans-serif; font-weight: 500;font-weight:bold;">
                                                                    Please Verify your email</h5>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block"
                                                                style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 26px; text-align: center;"
                                                                valign="top">
                                                                <p style="margin-bottom: 0;text-transform:capitalize;">
                                                                    Please verify your email address within the time
                                                                    limit in the given Below 👇</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <input type="hidden" id="email"
                                                                    value="{{ session()->get('email') }}">
                                                                <h4 class="mt-2 mb-3"><span
                                                                        class="badge badge-soft-success"
                                                                        id="demo"></span></h4>
                                                            </td>
                                                        </tr>
                                                        <tr
                                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td class="content-block" itemprop="handler" itemscope
                                                                itemtype="http://schema.org/HttpActionHandler"
                                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 22px; text-align: center;"
                                                                valign="top">
                                                                <a id="resend" class="btn btn-primary"
                                                                    data-resend="{{ session()->get('email') }}">Resend
                                                                    Verification Email</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session('success') == 200)
        <script>
            document.getElementById("demo").innerHTML = "EXPIRED";
        </script>
    @else
        <script>
            var countDownDate = new Date(new Date().getTime() + 5 * 60000);
            var email = document.getElementById("email").value;
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("demo").innerHTML = "Time Left : " + minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    window.location.href = `{{ url('/blank-token/${email}') }}`;
                }
            }, 1000);
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $(document).on("click", "#resend", function(stop) {
                stop.preventDefault();
                var value = $(this).data("resend");
                // --------------------------loading button coading-------------------
                const button = document.getElementById("resend");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute('disabled', 'disabled');
                // --------------------------loading button coading-------------------
                $.ajax({
                    url: `{{ url('/resend-email/${value}') }}`,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.message == 200) {
                            button.removeAttribute('disabled');
                            button.innerHTML =
                                "Resend  Verification Email";
                            alert(response.message);
                        } else {
                            button.removeAttribute('disabled');
                            button.innerHTML =
                                "Resend Verification Email";
                            alert(response.message);
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>
