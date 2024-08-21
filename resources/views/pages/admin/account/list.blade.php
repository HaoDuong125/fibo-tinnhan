@extends('layouts.base', ['activePage' => 'list-account'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh Sách Khách hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-Etrust" href="#">Account</a></li>
                    <li class="breadcrumb-item active">Danh Sách Khách hàng</li>
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
                    <div class="card-header">
                        <h3 class="card-title">Danh Sách Khách hàng</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.search.account') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="infoCustomer">Thông Tin</label>
                                        <input type="text" class="form-control" name="infoCustomer" value="{{$info['infoCustomer']}}" placeholder="Nhập tên, email hoặc số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="statusSearch">Trạng Thái</label>
                                        <select name="statusSearch" id="statusSearch" class="form-control">
                                            <option value="ALL" @if ($info['statusSearch'] == 'ALL') selected @endif>Tất Cả</option>
                                            <option value="{{App\Enums\EUserStatus::ACTIVE}}"  @if ($info['statusSearch'] == App\Enums\EUserStatus::ACTIVE) selected @endif>Kích Hoạt</option>
                                            <option value="{{App\Enums\EUserStatus::CANCEL}}"  @if ($info['statusSearch'] == App\Enums\EUserStatus::CANCEL) selected @endif>Ngừng Kích Hoạt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="statusPartnerSearch">Đối tác</label>
                                        <select name="statusPartnerSearch" id="statusPartnerSearch" class="form-control">
                                            <option value="ALL" @if ($info['statusPartnerSearch'] == 'ALL') selected @endif>Tất Cả</option>
                                            <option value="{{App\Enums\ERegisterPartnerStatus::NOT_YET}}"  @if ($info['statusPartnerSearch'] == App\Enums\ERegisterPartnerStatus::NOT_YET) selected @endif>Chưa đăng ký</option>
                                            <option value="{{App\Enums\ERegisterPartnerStatus::PENDING}}"  @if ($info['statusPartnerSearch'] == App\Enums\ERegisterPartnerStatus::PENDING) selected @endif>Đã đăng ký</option>
                                            <option value="{{App\Enums\ERegisterPartnerStatus::ACTIVE}}"  @if ($info['statusPartnerSearch'] == App\Enums\ERegisterPartnerStatus::ACTIVE) selected @endif>Kích hoạt</option>
                                            <option value="{{App\Enums\ERegisterPartnerStatus::CANCEL}}"  @if ($info['statusPartnerSearch'] == App\Enums\ERegisterPartnerStatus::CANCEL) selected @endif>Ngưng kích hoạt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fromTo">Thời Gian</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" name="fromTo" id="fromTo" value="{{$info['fromTo']}}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-block btn-Etrust">Tìm Kiếm</button>
                                    </div>
                                </div>
                                {{-- @if (Auth::user()->role != App\Enums\EUserRole::CS)
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <a href="{{ route('admin.export.account', $info) }}" class="btn btn-block btn-Etrust">Export</a>
                                    </div>
                                </div>
                                @endif --}}
                            </div>
                        </form>
                    </div>
                    @if (Auth::user()->role == App\Enums\EUserRole::SUPPER_ADMIN || Auth::user()->role == App\Enums\EUserRole::ADMIN)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a type="button" class="btn btn-block bg-Etrust" href="{{ route('admin.create.account.view') }}">Tạo Khách Hàng </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body table-responsive pt-0">
                        <table class="table table-bordered table-hover table-head-fixed">
                            <thead>
                                <tr>
                                    <th class="bg-Etrust" style="width: 10px">#</th>
                                    <th class="text-center bg-Etrust">Thông Tin</th>
                                    <th class="text-center bg-Etrust">Trạng Thái</th>
                                    <th class="text-center bg-Etrust">Đăng ký đối tác</th>
                                    <th class="text-center bg-Etrust">Ngày Tạo</th>
                                    <th class="text-center bg-Etrust">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listAccount as $key => $value)
                                <tr>
                                    <td class="align-middle" scope="row"> {{$key + $listAccount->firstItem()}} </td>
                                    <td class="align-middle text-left">
                                        N: {{$value->name}} <br>
                                        P: {{$value->phone}} <br>
                                        E: {{$value->email}} <br>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($value->status == App\Enums\EUserStatus::ACTIVE)
                                            <span class="badge bg-success">Kích Hoạt</span>
                                        @else
                                            <span class="badge bg-danger">Ngừng Kích Hoạt</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($value->register_partner_status == App\Enums\ERegisterPartnerStatus::ACTIVE)
                                            <span class="badge bg-success">Kích Hoạt</span>
                                        @elseif($value->register_partner_status == App\Enums\ERegisterPartnerStatus::PENDING)
                                            <span class="badge bg-warning">Đã đăng ký</span>
                                        @elseif($value->register_partner_status == App\Enums\ERegisterPartnerStatus::CANCEL)
                                            <span class="badge bg-danger">Ngừng kích hoạt</span>
                                        @else
                                            <span class="badge bg-primary">Chưa đăng ký</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">{{ empty($value->created_at) ? '' : Illuminate\Support\Carbon::parse($value->created_at)->format('Y-m-d H:i:s')}}</td>
                                    <td class="align-middle text-center">
                                        @if (($value->role != App\Enums\EUserRole::ADMIN && Auth::user()->role == App\Enums\EUserRole::ADMIN) || Auth::user()->role == App\Enums\EUserRole::SUPPER_ADMIN)
                                        <a href="{{ route('admin.detail.account', base64_encode($value->id)) }}"  class="btn btn-sm btn-info" title="Xem chi tiết">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('admin.edit.account.view', $value->id) }}"  class="btn btn-sm btn-info" title="Cập nhật thông tin">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $listAccount->appends($info)->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
    function changePassword(userId) {
        $('#userId').val(userId)
        $("#exampleModal").modal('show');
    }

    $('#fromTo').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'YYYY-MM-DD',
            cancelLabel: 'Clear'
        }
    });
    $('input[name="fromTo"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('input[name="fromTo"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // $('#nameAccountSearch').select2({
    //     theme: 'bootstrap4',
    //     width: 'resolve'
    // });
</script>
@endsection
