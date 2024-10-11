<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="shortcut icon" href="<?php echo e(asset('admin/assets/images/favicon.ico')); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo e(asset('admin/assets/libs/glightbox/css/glightbox.min.css')); ?>">
<script src="<?php echo e(asset('admin/assets/js/layout.js')); ?>"></script>
<link href="<?php echo e(asset('admin/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('admin/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('admin/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('admin/assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('admin/assets/libs/select2/css/select2-bootstrap4.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('admin/assets/libs/filepond/filepond.min.css')); ?>" type="text/css" />
<link rel="stylesheet"
    href="<?php echo e(asset('admin/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')); ?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .ui-datepicker-widget-header {
        border: 1px solid #144272;
        background-color: #144272;
        color: #ffffff;
        font-weight: bold;
    }

    .progress {
        position: relative;
        width: 100%;
    }

    .bar {
        background-color: #00ff00;
        width: 0%;
        height: 20px;
    }

    .percent {
        position: absolute;
        display: inline-block;
        left: 50%;
        color: #040608;
    }

    .my-custom-scrollbar {
        position: relative;
        height: 250px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }

    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .btn-bell {
        color: rgb(201, 118, 118);
        font-size: 12px;
        animation-name: bell-ring;
        margin-top: 14px;
        animation-duration: 2s;
        animation-iteration-count: infinite;
    }

    @keyframes bell-ring {
        0% {
            transform: translate(-50%, -50%);
        }

        5%,
        15% {
            transform: translate(-50%, -50%) rotate(25deg);
        }

        10%,
        20% {
            transform: translate(-50%, -50%) rotate(-25deg);
        }

        25% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(0deg);
        }
    }

    @media screen and (min-width: 270px) {
        .chat-input-section {
            margin-top: 2px;
        }
    }

    @media screen and (min-width: 699px) {
        .chat-input-section {
            margin-top: 2px;
        }
    }

    @media screen and (min-width: 699px) {
        .chat-input-section {
            margin-top: 20px;
        }
    }

    @media screen and (min-width: 2760px) {
        .chat-input-section {
            margin-top: 20px;
        }
    }

    .bell {
        display: block;
        width: 40px;
        height: 40px;
        font-size: 17px;
        margin: 50px auto 0;
        color: #202844;
        -webkit-animation: ring 4s .7s ease-in-out infinite;
        -webkit-transform-origin: 50% 4px;
        -moz-animation: ring 4s .7s ease-in-out infinite;
        -moz-transform-origin: 50% 4px;
        animation: ring 4s .7s ease-in-out infinite;
        transform-origin: 50% 4px;
    }

    @-webkit-keyframes ring {
        0% {
            -webkit-transform: rotateZ(0);
        }

        1% {
            -webkit-transform: rotateZ(30deg);
        }

        3% {
            -webkit-transform: rotateZ(-28deg);
        }

        5% {
            -webkit-transform: rotateZ(34deg);
        }

        7% {
            -webkit-transform: rotateZ(-32deg);
        }

        9% {
            -webkit-transform: rotateZ(30deg);
        }

        11% {
            -webkit-transform: rotateZ(-28deg);
        }

        13% {
            -webkit-transform: rotateZ(26deg);
        }

        15% {
            -webkit-transform: rotateZ(-24deg);
        }

        17% {
            -webkit-transform: rotateZ(22deg);
        }

        19% {
            -webkit-transform: rotateZ(-20deg);
        }

        21% {
            -webkit-transform: rotateZ(18deg);
        }

        23% {
            -webkit-transform: rotateZ(-16deg);
        }

        25% {
            -webkit-transform: rotateZ(14deg);
        }

        27% {
            -webkit-transform: rotateZ(-12deg);
        }

        29% {
            -webkit-transform: rotateZ(10deg);
        }

        31% {
            -webkit-transform: rotateZ(-8deg);
        }

        33% {
            -webkit-transform: rotateZ(6deg);
        }

        35% {
            -webkit-transform: rotateZ(-4deg);
        }

        37% {
            -webkit-transform: rotateZ(2deg);
        }

        39% {
            -webkit-transform: rotateZ(-1deg);
        }

        41% {
            -webkit-transform: rotateZ(1deg);
        }

        43% {
            -webkit-transform: rotateZ(0);
        }

        100% {
            -webkit-transform: rotateZ(0);
        }
    }

    @-moz-keyframes ring {
        0% {
            -moz-transform: rotate(0);
        }

        1% {
            -moz-transform: rotate(30deg);
        }

        3% {
            -moz-transform: rotate(-28deg);
        }

        5% {
            -moz-transform: rotate(34deg);
        }

        7% {
            -moz-transform: rotate(-32deg);
        }

        9% {
            -moz-transform: rotate(30deg);
        }

        11% {
            -moz-transform: rotate(-28deg);
        }

        13% {
            -moz-transform: rotate(26deg);
        }

        15% {
            -moz-transform: rotate(-24deg);
        }

        17% {
            -moz-transform: rotate(22deg);
        }

        19% {
            -moz-transform: rotate(-20deg);
        }

        21% {
            -moz-transform: rotate(18deg);
        }

        23% {
            -moz-transform: rotate(-16deg);
        }

        25% {
            -moz-transform: rotate(14deg);
        }

        27% {
            -moz-transform: rotate(-12deg);
        }

        29% {
            -moz-transform: rotate(10deg);
        }

        31% {
            -moz-transform: rotate(-8deg);
        }

        33% {
            -moz-transform: rotate(6deg);
        }

        35% {
            -moz-transform: rotate(-4deg);
        }

        37% {
            -moz-transform: rotate(2deg);
        }

        39% {
            -moz-transform: rotate(-1deg);
        }

        41% {
            -moz-transform: rotate(1deg);
        }

        43% {
            -moz-transform: rotate(0);
        }

        100% {
            -moz-transform: rotate(0);
        }
    }

    @keyframes ring {
        0% {
            transform: rotate(0);
        }

        1% {
            transform: rotate(30deg);
        }

        3% {
            transform: rotate(-28deg);
        }

        5% {
            transform: rotate(34deg);
        }

        7% {
            transform: rotate(-32deg);
        }

        9% {
            transform: rotate(30deg);
        }

        11% {
            transform: rotate(-28deg);
        }

        13% {
            transform: rotate(26deg);
        }

        15% {
            transform: rotate(-24deg);
        }

        17% {
            transform: rotate(22deg);
        }

        19% {
            transform: rotate(-20deg);
        }

        21% {
            transform: rotate(18deg);
        }

        23% {
            transform: rotate(-16deg);
        }

        25% {
            transform: rotate(14deg);
        }

        27% {
            transform: rotate(-12deg);
        }

        29% {
            transform: rotate(10deg);
        }

        31% {
            transform: rotate(-8deg);
        }

        33% {
            transform: rotate(6deg);
        }

        35% {
            transform: rotate(-4deg);
        }

        37% {
            transform: rotate(2deg);
        }

        39% {
            transform: rotate(-1deg);
        }

        41% {
            transform: rotate(1deg);
        }

        43% {
            transform: rotate(0);
        }

        100% {
            transform: rotate(0);
        }
    }
</style>
<style>
    .number::-webkit-outer-spin-button,
    .number::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    .number {
        -moz-appearance: textfield;
    }

    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }
</style>
<?php /**PATH C:\xampp\htdocs\channdi\resources\views/components/admin-header.blade.php ENDPATH**/ ?>