@extends('layouts.app')
@section('title', 'Chaandi Kaar Ecommerce')
@section('main')
    <main>
        <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Forgot Password</h3>
                            <div class="breadcrumb__list">
                                <span><a href="{{ url('/') }}">Home</a></span>
                                <span>Reset Passowrd</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-login-area pb-140 p-relative z-index-1 fix">
            <div class="tp-login-shape">
                <img class="tp-login-shape-1" src="{{ asset('/assets/img/login/login-shape-1.png') }}" alt="">
                <img class="tp-login-shape-2" src="{{ asset('/assets/img/login/login-shape-2.png') }}" alt="">
                <img class="tp-login-shape-3" src="{{ asset('/assets/img/login/login-shape-3.png') }}" alt="">
                <img class="tp-login-shape-4" src="{{ asset('/assets/img/login/login-shape-4.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="tp-login-wrapper">
                            <div class="tp-login-top text-center mb-30">
                                <h3 class="tp-login-title">Reset Passowrd</h3>
                                <p>Enter your email address to request password reset.</p>
                            </div>
                            <div class="tp-login-option">
                                <div class="tp-login-input-wrapper">
                                    <div class="tp-login-input-box">
                                        <div class="tp-login-input">
                                            <input id="email" type="email" placeholder="example@gmail.com">
                                        </div>
                                        <div class="tp-login-input-title">
                                            <label for="email">Enter Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-login-bottom mb-15">
                                    <button type="button" class="tp-login-btn w-100" id="submit">Forget</button>
                                </div>
                                <div class="tp-login-suggetions d-sm-flex align-items-center justify-content-center">
                                    <div class="tp-login-forgot">
                                        <span>Wait I Remeber my Passowrd? <a href="{{ url('/login') }}"> Login</a></span>
                                    </div>
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
            $(document).on("click", "#submit", function(stop) {
                stop.preventDefault();
                var email = $("#email").val();
                const button = document.getElementById("submit");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute('disabled', 'disabled');
                if (email == "") {
                    Swal.fire({
                        toast: true,
                        icon: "error",
                        title: "Please fill out the the fields first..!",
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    button.removeAttribute('disabled');
                    button.innerHTML = "Forget";
                    return false
                }
                var formData = new FormData();
                formData.append("email", email);
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "{{ url('/reset-link') }}",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        button.removeAttribute('disabled');
                        button.innerHTML = "Forget";
                        if (response.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Please check your gmail account to reset the password",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else if (response.message == 400) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Please check your internet connection you are offline",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "You are using a wrong email please correct it",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                })
            })
        })
    </script>
@endsection
