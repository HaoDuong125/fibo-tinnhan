@extends('layouts.base', ['activePage' => 'list-account'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tạo Tài Khoản</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-Etrust" href="#">Account</a></li>
                    <li class="breadcrumb-item active">Tạo Tài Khoản</li>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-Etrust">
                        <h3 class="card-title">Tạo Tài Khoản</h3>
                    </div>
                    <form role="form" method="POST" action="{{route('admin.create.account')}}">
                        @csrf
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Tên Đầy Đủ <sup class="text-danger">(*)</sup></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nguyễn Văn A - Etrust" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="info@myfarm.vn" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Số Điện Thoại <sup class="text-danger">(*)</sup></label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="0899 909 880" min="10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Địa chỉ <sup class="text-danger">(*)</sup></label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="284/3 Luỹ Bán Bích, Tân Phú, HCM" required autocomplete="none" required min="5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 col-md-4">
                                        <label for="province_id">Tỉnh thành <sup class="text-danger">(*)</sup></label>
                                        <select name="province_id" id="province_id" data-city_id="" class="form-control custom-select-black select" required>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="district_id">Quận Huyện <sup class="text-danger">(*)</sup></label>
                                            <select name="district_id" id="district_id" data-district_id="" class="form-control custom-select-black select" required>
                                                <option value=""></option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="ward_id">Phường Xã </label>
                                            <select name="ward_id" id="ward_id" data-ward_id="" class="form-control custom-select-black select">
                                                <option value=""></option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Loại tài khoản</label>
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="{{App\Enums\EUserRole::USER}}">User</option>
                                                @if (Auth::user()->role == App\Enums\EUserRole::SUPPER_ADMIN)
                                                    <option value="{{App\Enums\EUserRole::ADMIN}}">Admin</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passwordWebsite">Mật Khẩu Đăng Nhập <sup class="text-danger">(*)</sup></label>
                                            <input type="text" class="form-control" id="passwordWebsite" name="passwordWebsite" required autocomplete="none">
                                            <small>Tối thiểu 8 kí tự</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="moreInfo">Thông Tin Khác</label>
                                            <textarea class="form-control" name="moreInfo" id="moreInfo" cols="15" rows="5"></textarea>
                                            <div class="form-group mt-3">
                                                <small>Lưu ý: <sup class="text-danger">(*)</sup> là thông tin bắt buộc nhập</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-Etrust">Tạo Tài Khoản</button>
                                <button type="button" class="btn btn-primary float-right" onclick="window.history.back();">Quay lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <style>
        .select2-container {
        width: 100% !important;
    }

    .select2-container .select2-selection {
        height: 40px;
        line-height: 26px;
    }

    .select2-selection.has_error {
        border-color: red;
    }

    .select2-selection__arrow {
        height: 40px;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
    </style>
@endpush
@section('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="province_id"]').trigger("change");
        });
        $('select[name="province_id"]').select2({
            placeholder: "Tỉnh/Thành phố",
        });
        $('select[name="district_id"]').select2({
            placeholder: "Quận/Huyện",
        });
        $('select[name="ward_id"]').select2({
            placeholder: "Phường/Xã",
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('select[name="province_id"]').change(function(e) {
            var district_id = 0;
            if ($('select[name="province_id"]').data('district') > 0) {
                district_id = $('select[name="province_id"]').data('district');
            }
            var province_id = $('select[name="province_id"]').val();
            $.ajax({
                url: '{{ route('checkout.get.district') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    'province': province_id
                },
                beforeSend: function() {
                    $('select[name="district_id"]').html("");
                    $('select[name="ward_id"]').html("");
                    $('select[name="district_id"]').select2({
                        disabled: true
                    });
                    $('select[name="ward_id"]').select2({
                        disabled: true
                    });
                },
                success: function(response) {
                    if (response.error != true) {
                        var district = response.data;
                        if (district.length > 0) {
                            $('select[name="district_id"]').select2({
                                disabled: false
                            });
                            var option = "";
                            for (let i = 0; i < district.length; i++) {
                                option +=
                                    `<option value="${ district[i]['id'] }">${ district[i]['name'] }</option>`;
                            }
                            $('select[name="district_id"]').append(option);
                            if (district_id > 0) {
                                if ($('select[name="district_id"]').find("option[value='" + district_id +
                                        "']").length > 0) {
                                    $('select[name="district_id"]').val(district_id).trigger('change');
                                }
                            } else {
                                $('select[name="district_id"]').trigger('change');
                            }
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })
        $('select[name="district_id"]').change(function(e) {
            var ward_id = 0;
            if ($('select[name="province_id"]').data('ward') > 0) {
                ward_id = $('select[name="province_id"]').data('ward');
            }
            var district_id = $('select[name="district_id"]').val();
            $.ajax({
                url: '{{ route('checkout.get.ward') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    'district': district_id
                },
                beforeSend: function() {
                    $('select[name="ward_id"]').html("");
                    $('select[name="ward_id"]').select2({
                        disabled: true
                    })
                },
                success: function(response) {
                    if (response.error != true) {
                        var ward = response.data;
                        if (ward.length > 0) {
                            $('select[name="ward_id"]').select2({
                                disabled: false
                            })
                            var option = "";
                            for (let i = 0; i < ward.length; i++) {
                                option +=
                                    `<option value="${ ward[i]['id'] }">${ ward[i]['name'] }</option>`;
                            }
                            $('select[name="ward_id"]').append(option);
                            if (ward_id > 0) {
                                if ($('select[name="ward_id"]').find("option[value='" + ward_id + "']")
                                    .length > 0) {
                                    $('select[name="ward_id"]').val(ward_id).trigger('change');
                                }
                            } else {
                                $('select[name="ward_id"]').trigger('change');
                            }
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })
    </script>
@endsection
