<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Chaandi Kaar E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon-icon.png') }}">
    <link href="{{ asset("admin/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin/assets/css/app.min.css") }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <img src="{{ asset("/../../../../img.themesbrand.com/velzon/images/auth-offline.gif") }}" alt="" height="210">
                                    <h3 class="mt-4 fw-semibold">We're currently offline</h3>
                                    <p class="text-muted mb-4 fs-14">We can't show you this images because you aren't connected to the internet. When you’re back online refresh the page or hit the button below</p>
                                    <button class="btn btn-success btn-border" id="button_move" onClick="window.location.href=window.location.href"><i class="ri-refresh-line align-bottom"></i> Refresh</button>
                                </div>
                            </div>x
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on("click", "#button_move", function() {
            const button = document.getElementById("button_move");
            button.innerHTML =
                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
            button.setAttribute('disabled', 'disabled');
        });
    </script>
</body>

</html>
