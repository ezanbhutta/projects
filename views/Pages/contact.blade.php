@extends('layouts.app')
@section('title', 'Chaandi Kaar Ecommerce')
@section('main')
    <main>
        <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Keep In Touch with Us</h3>
                            <div class="breadcrumb__list">
                                <span><a href="{{ url('/') }}">Home</a></span>
                                <span>Contact</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-contact-area pb-100">
            <div class="container">
                <div class="tp-contact-inner">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="tp-contact-wrapper">
                                <h3 class="tp-contact-title">Sent A Message</h3>

                                <div class="tp-contact-form">
                                    <form id="contact-form"
                                        action="https://template.wphix.com/shofy-prv/shofy/assets/mail.php" method="POST">
                                        <div class="tp-contact-input-wrapper">
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="name" id="name" type="text"
                                                        placeholder="Enter Your Name">
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="name">Enter Name</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="email" id="email" type="email"
                                                        placeholder="example@gmail.com">
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="email">Enter Email</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="subject" id="subject" type="text"
                                                        placeholder="Write your subject">
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="subject">Subject</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <textarea id="message" name="message" placeholder="Write your message here..."></textarea>
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="message">Your Message</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-contact-btn">
                                            <button type="button" id="submit">Send Message</button>
                                        </div>
                                    </form>
                                    <p class="ajax-response"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="tp-contact-info-wrapper">
                                <div class="tp-contact-info-item">
                                    <div class="tp-contact-info-icon">
                                        <span>
                                            <img src="{{ asset('/assets/img/contact/contact-icon-1.png') }}" alt="">
                                        </span>
                                    </div>
                                    <div class="tp-contact-info-content">
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
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
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="mailto:rishalsiddiqui87@gmail.com"><span class="__cf_email__"
                                                            data-cfemail="196a71767f60596a6c6969766b6d377a7674">rishalsiddiqui87@gmail.com</span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="mailto:ezanmujahid@gmail.com"><span class="__cf_email__"
                                                            data-cfemail="196a71767f60596a6c6969766b6d377a7674">ezanmujahid@gmail.com</span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="18" height="16" viewBox="0 0 18 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="mailto:chusamadon31@gmail.com"><span class="__cf_email__"
                                                            data-cfemail="196a71767f60596a6c6969766b6d377a7674">chusamadon31@gmail.com</span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-contact-info-item">
                                    <div class="tp-contact-info-icon">
                                        <span>
                                            <img src="{{ asset('/assets/img/contact/contact-icon-2.png') }}"
                                                alt="">
                                        </span>
                                    </div>
                                    <div class="tp-contact-info-content">
                                        <p>
                                            <a href="https://maps.app.goo.gl/gpaAD5fUgrSsPsSYA" target="_blank">
                                                The Chaandi Kaar Ecommerce Platform <br> Multan
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="tp-contact-info-item">
                                    <div class="tp-contact-info-icon">
                                        <span>
                                            <img src="{{ asset('/assets/img/contact/contact-icon-3.png') }}"
                                                alt="">
                                        </span>
                                    </div>
                                    <div class="tp-contact-info-content">
                                        <div class="tp-contact-social-wrapper mt-5">
                                            <h4 class="tp-contact-social-title">Find on social media</h4>

                                            <div class="tp-contact-social-icon">
                                                <a href="https://www.facebook.com/"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                                <a href="https://www.twitter.com/"><i
                                                        class="fa-brands fa-twitter"></i></a>
                                                <a href="https://www.linkedin.com/"><i
                                                        class="fa-brands fa-linkedin-in"></i></a>
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
        <section class="tp-map-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-map-wrapper">
                            <div class="tp-map-hotspot">
                                <span class="tp-hotspot tp-pulse-border">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="6" cy="6" r="6" fill="#821F40" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-map-iframe">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220733.1719983582!2d71.4746583!3d30.1812562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b315778dea7d9%3A0xbad72fc74e55d42f!2sMultan%2C%20Punjab!5e0!3m2!1sen!2s!4v1724411329662!5m2!1sen!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                var name = $("#name").val();
                var email = $("#email").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                const button = document.getElementById("submit");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute('disabled', 'disabled');
                if (name == "" || email == "" || subject == "" || message == "") {
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
                    button.innerHTML = "Send Message";
                    return false;
                }
                var formData = new FormData();
                formData.append("name", name);
                formData.append("email", email);
                formData.append("subject", subject);
                formData.append("message", message);
                $.ajax({
                    url: "{{ url('/contact_add') }}",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(response) {
                        button.removeAttribute('disabled');
                        button.innerHTML = "Send Message";
                        if (response.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Message Sent Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $("#name").val("");
                            $("#email").val("");
                            $("#subject").val("");
                            $("#message").val("");
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Something Went Wrong During the Request..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            toast: true,
                            icon: "error",
                            title: "Network or server error!",
                            animation: false,
                            position: "top-right",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        button.prop('disabled', false);
                        button.html("Send Message");
                    }
                })
            })
        })
    </script>
@endsection
