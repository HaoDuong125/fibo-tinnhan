<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Etrust - Nội Bộ</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            html, body, .container-table {
                height: 100%;
                background: #37517e;
            }
            .container-table {
                display: table;
            }
            .vertical-center-row {
                display: table-cell;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div class="container container-table">
            <div class="row vertical-center-row">
                <div class="row">
                    <div class="col-12 col-md-6 m-auto">
                        <h1 class="text-warning" style="font-size: 60px"><b>ADMIN - MYFARM</b> </h1>
                        <div class="mt-5">
                            <h5 class="text-white mt-5">Etrust - Hệ thống Admin</h5>
                        </div>
                        @auth
                            <div class="mt-4 ">
                                <a href="{{route("home")}}" class="btn btn-warning  btn-lg">VÀO QUẢN LÝ</a>
                            </div>
                        @else
                        <div class="mt-4 ">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email đăng nhập" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-warning  btn-lg">Đăng nhập</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="/images/hero-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
