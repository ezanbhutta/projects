<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- =======user header includes here  --}}
    <x-user-header />
    <style>
        <style>.custom-cart-quantity {
            text-align: center;
        }

        .custom-product-quantity {
            display: flex;
            align-items: center;
        }

        .custom-cart-minus,
        .custom-cart-plus {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-cart-minus svg,
        .custom-cart-plus svg {
            fill: #333;
            pointer-events: none;
            /* Prevents clicking on the SVG itself */
        }

        .custom-cart-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 5px;
            padding: 5px;
            font-size: 14px;
            line-height: 1.5;
        }

        .custom-cart-minus:hover,
        .custom-cart-plus:hover {
            background-color: #e0e0e0;
        }

        .custom-cart-minus:active,
        .custom-cart-plus:active {
            background-color: #d0d0d0;
        }
    </style>

    </style>
</head>

<body>
    {{-- -=====user header includes===== --}}
    <x-user-navbar />
    {{-- -=====user header includes===== --}}
    {{-- ========main content   --}}
    @yield('main')
    {{-- ========main content   --}}
    {{-- =======user footer includes here  --}}
    <x-user-footer />
    {{-- =======user footer includes here  --}}
</body>

</html>
