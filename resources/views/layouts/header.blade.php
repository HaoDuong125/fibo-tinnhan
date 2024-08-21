
<header class="header header-wrapper bg-white" style="border-bottom: solid 1px #c1c1c1">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        {{-- <a class="nav-link d-block d-md-none" data-widget="pushmenu" href="#" role="button" onclick="toggleSideBar()"><i class="fas fa-bars"></i></a> --}}
                        <a href="{{route('home')}}">
                            <img class="img-fluid" src="/images/logo_etrust.jpg" alt="Logo" style="height: 60px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .header-wrapper {
        position: fixed;
        top: 0px;
        width: 100%;
        z-index: 1000;
        background-color:#f8f9fa;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        pointer-events: none;
    }

    .dropdown-menu > a:hover {
        background: #006e82;
        color: white;
    }

    .button-primary {
        background-color: #006e82;
        color: #fff;
    }
    .button-primary:hover {
        background-color: #025a69;
        color: #fff;
    }
    .button-outline {
        border: 1px solid #006e82;
        color: #006e82;
    }
    .button-outline:hover {
        background-color: #006e82;
        color: #fff !important;
    }
</style>
