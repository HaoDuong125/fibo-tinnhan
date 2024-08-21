<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/logo_title_fibo_2.png') }}">
    <title>Etrust Tin Nhắn </title>
    @stack('meta')
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    {{-- Custom --}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/eTrust_125125.min.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('dist/css/notify-awesome.css') }}" />
    <link href="{{ asset('css/style.css?v=3') }}" rel="stylesheet">
    <script src="{{ asset('dist/js/notify-awesome.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://unpkg.com/video.js/dist/video-js.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script>
        window.SITE_URL = '{{ url('/') }}';
        let notifierAWESome = new AWN({
            maxNotifications: 4,
            durations: {
                global: 2000
            },
            icons: {
                prefix: "<span style='font-size: xx-large;' class='lnr lnr-",
                suffix: "'></span>",
                tip: "question-circle",
                info: "star",
                success: "checkmark-circle",
                warning: "warning",
                alert: "cross-circle",
                confirm: "bullhorn",
            },
            messages: {
                async: "Etrust...",
                "async-block": "<div><img src='/images/logo_etrust.jpg'></div>",
            },
        });
    </script>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini text-sm layout-fixed">
    <div class="wrapper">
        @include('layouts.header', ['disableLocale' => $disableLocale ?? 0])
        <aside class="main-sidebar elevation-4 show-on-mobile" style="top: 102px">
            <div class="sidebar pb-3" style="height: calc(100vh - (2.93725rem + 50px));background-color: #fff">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column p-0" data-widget="treeview" role="menu" data-accordion="false">
                        @auth
                        <div class="dropdown show">
                            <a class="btn dropdown-toggle dropdown-text" href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __("layout.hi") }}, {{ auth()->user()->name }}!
                            </a>
                            
                        </div>
                        @endauth
                        <li class="nav-item mt-3">
                            <div class="text-center">
                                @auth
                                    <a type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn button-primary w-auto">{{ __("layout.logout") }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a type="button" href="{{ route("login") }}" class="btn button-primary w-auto">{{ __("layout.login") }}</a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
        @include('layouts.footer')
    </div>
    @stack('modal')
    <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
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
    @section('script_vue')
    @show
</body>
</html>
