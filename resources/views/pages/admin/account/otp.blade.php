@extends('layouts.base', ['activePage' => 'list-sms-otp'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách SMS OTP</h1>
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
                    <div class="card-header">
                        <h3 class="card-title">Danh sách SMS OTP</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route("admin.myfarm.otp")}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="textSearch">SĐT, Loại otp</label>
                                                <input type="text" class="form-control"  name="textSearch" value="{{$info['textSearch']}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dateFrom">Từ ngày</label>
                                                <input type="datetime-local" class="form-control" id="dateFrom" name="dateFrom" value="{{$info['dateFrom']}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dateTo">Đến ngày</label>
                                                <input type="datetime-local" class="form-control" id="dateTo" name="dateTo" value="{{$info['dateTo']}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 offset-md-1">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label>
                                                <button type="submit" class="btn btn-block btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h6>Tổng số: <b>{{ number_format($listOtp->total()) }}</b></h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover no-footer" id="tableOrderIds">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Số điện thoại</th>
                                                <th>Loại</th>
                                                <th>Mã OTP</th>
                                                <th>Trạng thái</th>
                                                <th>Xác thực</th>
                                                <th>Ngày tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($listOtp as $key => $otp)
                                                <tr>
                                                    <td> {{$key + $listOtp->firstItem()}}</td>
                                                    <td> {{ $otp->phone }}</td>
                                                    <td> {{ $otp->type }}</td>
                                                    <td> {{ $otp->code_otp }}</td>
                                                    <td>
                                                        @if ($otp->status == "send_success")
                                                            <span class="text-primary">Đã gửi</span>
                                                        @else
                                                            <span class="text-warning">Chưa gửi</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($otp->used == "0")
                                                            <span class="text-warning">Chưa xác thực</span>
                                                        @elseif ($otp->used == "1")
                                                            <span class="text-primary">Đã xác thực</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ Illuminate\Support\Carbon::parse($otp->created_at)->format('H:i d-m-Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td class="empty" colspan="8">Chưa có dữ liệu</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                        {!! $listOtp->appends(request()->input())->links() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
