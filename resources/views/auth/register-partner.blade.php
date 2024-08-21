@extends('layouts.main')

@section('title', "Etrust - Register")

@php
    if (!empty(session('phone'))) {
        $phone = session('phone');
    } else {
        $phone = old('phone');
    }
@endphp

@section('content')
<main id="main" class="page-product-detail ">
    <div class="container" style="margin-top: 6rem">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                {{-- <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                </div> --}}
                <div class="col-12 col-md-6 my-5 py-5 px-4 sec-box-white">
                    <form id="formAction" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3 class="text-center text-uppercase">{{ __("layout.register_partner") }}</h3>
                        @if(!empty($phone))
                        <div class="mt-4">{{ __("login.register_with_phone")}}: <b>{{$phone}}</b></div>
                        @endif
                        {{-- <div class="row text-center mb-4">
                            <div class="col-6">
                                <div class="type_of_account @if (empty(old('type_account'))) active @endif @if (old('type_account') == 2) active @endif" data-type_of_account="business">
                                    <img src="https://www.igrow.asia/images/icon-badan-usaha.png" alt="">
                                    <div>{{ __("register.type_company") }}</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="type_of_account @if (old('type_account') == 1) active @endif" data-type_of_account="individual">
                                    <img src="https://www.igrow.asia/images/icon-perorangan.png" alt="">
                                    <div>{{ __("register.type_individual") }}</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type_account" value="{{ old('type_account') ?? 2 }}"> --}}
                        @if (!empty($phone))
                        <div class="form-outline my-3">
                            <label class="form-label" for="name">{{ __("register.name") }}<span class="require">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="{{ __("register.name") }}" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            {{-- <div class="col-12 col-md-6">
                                <div class="form-outline my-3">
                                    <label class="form-label" for="phone">{{ __("register.phone") }}<span class="require">*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$phone}}" placeholder="{{ __("register.phone") }}" required readonly/>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$phone}}" placeholder="{{ __("register.phone") }}" required readonly hidden/>
                            <div class="col-12">
                                <div class="form-outline my-3">
                                    <label class="form-label" for="email">{{ __("register.email") }}</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __("register.email") }}"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-outline my-3">
                                    <label class="form-label" for="email">{{ __("register.password") }}<span class="require">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="{{ __("register.password") }}" required/>
                                    <small>{{ __("register.the_password_least_8_characters.") }}</small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-outline my-3">
                                    <label class="form-label" for="confirm-password">{{ __("register.confirm_password") }}<span class="require">*</span></label>
                                    <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="{{ __("register.confirm_password") }}" required/>
                                    <small>{{ __("register.the_password_least_8_characters.") }}</small>
                                </div>
                            </div> --}}
                        </div>

                        <div class="company_el">
                            <div class="form-outline my-3 ">
                                <label class="form-label" for="company_name">{{ __("register.company_name") }}</label>
                                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="{{ __("register.company_name") }}"/>
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline my-3 ">
                                <label class="form-label" for="company_name">{{ __("register.note") }}</label>
                                <textarea name="note" id="note" class="form-control" cols="30" rows="5" placeholder="{{ __("register.note") }}">{{ old('note') }}</textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">{{ __("layout.register") }}</button>
                        </div>
                        @else
                            <div class="login-otp-container">
                                <input type="text" name="type" value="register_partner" hidden/>
                                <div lass="form-outline my-5">
                                    <label class="form-label" for="phone">{{ __("login.phone") }}<span class="require">*</span></label>
                                    <input type="text" id="phoneOtp" name="phone" class="form-control" placeholder="{{ __("login.phone") }}" />
                                </div>
                                <div class="text-center mt-2 pt-2">
                                    <button id="sendOtp" type="button" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">{{ __("login.continue") }}</button>
                                </div>
                            </div>
                        @endif
                        {{-- <div>
                            {{ __("register.have_already_an_account") }}? <a href="{{ route("login") }}"> {{ __("register.login_here") }}</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push("styles")
    <style>
        .type_of_account {
            cursor: pointer;
            border: 1px solid gray;
            padding: 1rem;
            border-radius: 10px
        }
        .type_of_account.active {
            border: 3px solid #006e82;

        }
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
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
@endpush

@push("scripts")
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(".type_of_account").click(function() {
            $(".type_of_account").removeClass("active");
            $(this).addClass("active");
            if ($(this).data('type_of_account') == "individual") {
                $(".company_el").addClass("d-none");
                $("input[name='type_account']").val(1);
            } else {
                $(".company_el").removeClass("d-none");
                $("input[name='type_account']").val(2);
            }
        });
        $(document).ready(function(){
            var phone = "{{$phone ?? ""}}";
            if (!phone) {
                $('#formAction').attr('action', '{{route('send.otp')}}');
            }
            var error = "{{session('error') ?? ""}}";
            if (error) {
                toastr.error(error);
            }
        })
        $('#sendOtp').on('click', async function(e) {
            var phone = $('#phoneOtp').val();
            if (!phone) {
                toastr.error('{{__('layout.input_phone')}}');
                return false;
            }
            var thisRegex = /^(0)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            if (!phone.match(thisRegex)) {
                toastr.error('{{__('layout.phone_invalid')}}');
                return false;
            }

            $.ajax({
                type: "GET",
                url: `/check-phone/${phone}`,
                success: function(response) {
                    if (response?.errors) {
                        toastr.error(response?.message);
                        return false
                    }
                    $("form#formAction").submit();
                }
            });
        });
    </script>
@endpush
