<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

@yield('title')

<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/vendor/toastr/toastr.min.css">

    <link rel="stylesheet" href="/css/tailwind-ui.min.css">
    <link rel="stylesheet" href="https://tailwindui.com/css/components-v2.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer=""></script>
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
@section('nav-bar')
    @include('layouts.partials.nav-bar')
@show

<!-- Main Sidebar Container -->
@section('side-bar')
    @include('layouts.partials.side-bar')
@show

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('breadcrumbs')
                @include('layouts.partials.flash')

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @section('footer')
        @include('layouts.partials.footer')
    @show
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/vendor/select2/js/select2.full.min.js"></script>
<!-- AdminLTE -->
<script src="/vendor/adminlte/dist/js/adminlte.js"></script>

<script src="/vendor/sweetalert2/sweetalert2.min.js"></script>
<script src="/vendor/toastr/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>
<!-- MyScript -->
<script src="/js/main.js"></script>
@livewireScripts

<!-- OPTIONAL SCRIPTS -->
{{--<script src="plugins/chart.js/Chart.min.js"></script>--}}
{{--<script src="dist/js/demo.js"></script>--}}
{{--<script src="dist/js/pages/dashboard3.js"></script>--}}
</body>
</html>
