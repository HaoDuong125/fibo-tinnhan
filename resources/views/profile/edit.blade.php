@extends('layouts.base', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Đổi mật khẩu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-Etrust" href="#">Đổi mật khẩu</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@php
$roleUser = Auth::user()->role;
@endphp

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Đổi mật khẩu Đăng Nhập') }}</h4>
                        </div>
                        <div class="card-body ">
                            @if (session('status_password'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <span>{{ session('status_password') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="input-current-password">Mật khẩu đăng nhập hiện tại</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                            input type="password" name="old_password" id="input-current-password"
                                            placeholder="{{ __('Current Password') }}" value="" required />
                                        @if ($errors->has('old_password'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{
                                            $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="input-password">Mật khẩu mới</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" id="input-password" type="password"
                                            placeholder="{{ __('New Password') }}" value="" required />
                                        @if ($errors->has('password'))
                                        <span id="password-error" class="error text-danger" for="input-password">{{
                                            $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="input-password-confirmation">Nhập lại mật
                                    khẩu mới</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation"
                                            id="input-password-confirmation" type="password"
                                            placeholder="{{ __('Confirm New Password') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-auto">
                            <button type="submit" class="btn btn-block btn-Etrust mb-4">{{ __('Đổi mật khẩu Đăng Nhập')
                                }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
