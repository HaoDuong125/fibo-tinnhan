<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Etrust Tin Nhắn</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/logo_etrust.jpg') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/eTrust_125125.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Loader -->
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    {{-- Custom --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: "Helvetica,Arial,sans-serif", sans-serif
        }
        .nav-main.active {
            background-color: #006e82 !important;
        }
        .dropdown-item-noti {
            white-space: unset;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            height: 50px;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-success bg-Etrust">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" onclick="toggleSideBar()"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" onclick="showDropDown()">
                        Hello {{ Auth::user()->name }} ! <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-user">
                        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link text-center navbar-white text-success">
                <img class="img-fluid" src="{{ asset('/images/logo_etrust.jpg')}}" alt="Logo" style="height: 70px">
            </a>

            <!-- Sidebar -->
            <div class="sidebar pb-3" style="height: calc(100vh - (2.93725rem + 50px));">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route("admin.home") }}" class="nav-link nav-main {{ $activePage === 'dashboard' ? ' active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Home Page </p>
                            </a>
                        </li>
                        @foreach (session('SIDEBAR_PERMISSION', []) as $item)
                            @if (empty($item['sub_pages']))
                                <li class="nav-header">{{$item['name_page']}}</li>
                                @continue
                            @endif
                            @foreach ($item['sub_pages'] as $item2)
                                @if ($item2['active_page'] === $activePage)
                                    @php
                                       $hasActivePage = true
                                    @endphp
                                    @break
                                @endif
                            @endforeach

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link nav-main {{ (!empty($hasActivePage)) ? ' active' : '' }}">
                                    <i class="nav-icon {{$item['icon']}}"></i>
                                    <p>
                                        {{$item['name_page']}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: block">
                                    @foreach ($item['sub_pages'] as $item2)
                                        <li class="nav-item">
                                            <a href="{{ route($item2['route']) }}" class="nav-link {{ ($activePage === $item2['active_page']) ? ' active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{$item2['name_page']}}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @php
                                $hasActivePage = false
                            @endphp
                        @endforeach
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content-header')

            <!-- Main content -->
            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2024, made with <i class="fas fa-heart text-danger"></i> <a href="https://Etrust.vn" target="_blank" class="text-Etrust">Etrust</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div class="loader text-center">
        <div class="loader-inner">
            <!-- Animated Spinner -->
            <div class="lds-roller mb-3">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <!-- Spinner Description Text [For Demo Purpose]-->
            <h4 class="text-uppercase font-weight-bold">Loading...</h4>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
    <script>
        var msg_notify_system_error = @php echo (session(App\Enums\EMessageStatusReturn::FAIL_CODE)) ? "'".session(App\Enums\EMessageStatusReturn::FAIL_CODE)."'" : '2'; @endphp;
        var msg_notify_system_success = @php echo (session(App\Enums\EMessageStatusReturn::SUCCESS_CODE)) ? "'".session(App\Enums\EMessageStatusReturn::SUCCESS_CODE)."'" : '2'; @endphp;
        var msg_notify_system_exist = @php echo (session(App\Enums\EMessageStatusReturn::EXIST_CODE)) ? "'".session(App\Enums\EMessageStatusReturn::EXIST_CODE)."'" : '2'; @endphp;

        if (msg_notify_system_error != '2') {
            toastr.error(msg_notify_system_error);
        }
        if (msg_notify_system_success != '2') {
            toastr.success(msg_notify_system_success);
        }
        if (msg_notify_system_exist != '2') {
            toastr.warning(msg_notify_system_exist);
        }
    </script>
    <script>
        $(document).ready(function(){
            var sidebar = localStorage.getItem("sidebar");
            if (sidebar && sidebar === 'hide') {
                $('.sidebar-mini').addClass('sidebar-collapse');
            }
        })

        function showDropDown() {
            if($('.dropdown-menu-user').hasClass('show')) {
                $('.dropdown-menu-user').removeClass('show');
            } else {
                $('.dropdown-menu-user').addClass('show');
            }
        }
        function toggleSideBar() {
            if($('.sidebar-mini').hasClass('sidebar-collapse')) {
                localStorage.setItem("sidebar", "show");
            } else {
                localStorage.setItem("sidebar", "hide");
            }
        }
    </script>
    @section('scripts')
    @show
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    @section('script_vue')
    @show
</body>

</html>
