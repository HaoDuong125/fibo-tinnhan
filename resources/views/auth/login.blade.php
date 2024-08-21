@extends('layouts.main')

@section('title', "Etrust - Login")

@section('content')
<main id="main" class="page-product-detail ">
    <div class="container" style="margin-top: 8rem">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6 sec-box-white py-5 px-3">
                    <form id="formAction" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center text-uppercase">{{ __("layout.login") }}</h3>
                        <!-- Email input -->
                        <div class="login-password-container">
                            <div lass="form-outline my-5">
                                <label class="form-label" for="emailLogin">{{ __("login.email") }}<span class="require">*</span></label>
                                <input type="text" id="emailLogin" name="email" class="form-control" placeholder="{{ __("login.email") }}" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline my-3">
                                <label class="form-label" for="passwordLogin">{{ __("login.password") }}<span class="require">*</span></label>
                                <input type="password" id="passwordLogin" name="password" class="form-control" placeholder="{{ __("login.password") }}" />
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mt-2 pt-2">
                                <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">{{ __("layout.login") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push("styles")
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        .social-item {
            margin: 10px
        }
        .social-img {
            height: 50px;
            width: 50px;
        }
        .hide {
            display: none
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript">
    </script>
@endpush
