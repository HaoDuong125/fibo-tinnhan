@extends('layouts.base', ['activePage' => 'list-account'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông Tin Tài Khoản</h1>
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
                        <h3 class="card-title">Thông Tin Tài Khoản</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col ">
                                <div class="my-3"><b>THÔNG TIN TÀI KHOẢN</b></div>
                                Tên: <b>{{$user->name}}</b> <br>
                                Email: <b>{{$user->email}}</b><br>
                                Số Điện Thoại: <b>{{$user->phone}}</b><br>
                                Địa Chỉ: <b>{{$user->address}}</b><br>
                                @if(empty($user->myBusiness->company_name))
                                Công ty: <b>{{$user->company_name}}</b><br>
                                Thông tin khác: <b>{{$user->note}}</b><br>
                                @endif
                            </div>
                            <div class="col ">
                                <div class="my-3"><b>THÔNG TIN DOANH NGHIỆP</b></div>
                                Công ty: <b>{{$user->myBusiness->company_name ?? ""}}</b><br>
                                Mã số thuế: <b>{{$user->myBusiness->tax ?? ""}}</b><br>
                                Người đại diện: <b>{{$user->myBusiness->representative ?? ""}}</b><br>
                                Tên thương mại: <b>{{$user->myBusiness->name_business ?? ""}}</b><br>
                                Webiste: <b>{{$user->myBusiness->website ?? ""}}</b><br>
                                Email: <b>{{$user->myBusiness->email ?? ""}}</b><br>
                                Số điện thoại: <b>{{$user->myBusiness->phone ?? ""}}</b><br>
                                Thông Tin Khác: <b>{{$user->myBusiness->more_info ?? ""}}</b><br>
                                Đăng ký đối tác ngày: {{ empty($user->myBusiness->created_at) ? '' : Illuminate\Support\Carbon::parse($user->myBusiness->created_at)->format('Y-m-d H:i:s')}} <br>
                                Tình trạng đối tác: @if ($user->register_partner_status == App\Enums\ERegisterPartnerStatus::ACTIVE)
                                                <span class="badge bg-success">Kích Hoạt</span>
                                            @elseif($user->register_partner_status == App\Enums\ERegisterPartnerStatus::PENDING)
                                                <span class="badge bg-warning">Đã đăng ký</span>
                                            @elseif($user->register_partner_status == App\Enums\ERegisterPartnerStatus::CANCEL)
                                                <span class="badge bg-danger">Ngừng kích hoạt</span>
                                            @else
                                                <span class="badge bg-primary">Chưa đăng ký</span>
                                            @endif
                                <br> <br>
                                @if ($user->register_partner_status == App\Enums\ERegisterPartnerStatus::ACTIVE)
                                    <button data-toggle="modal" data-target="#lockPartnerModal" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Ngừng Kích Hoạt Đối Tác">
                                        <i class="fas fa-edit"></i>
                                        Ngừng Kích Hoạt Đối Tác
                                    </button>
                                @endif
                                @if ($user->register_partner_status != App\Enums\ERegisterPartnerStatus::ACTIVE)
                                    <button data-toggle="modal" data-target="#acctivePartnerModal" class="btn btn-sm btn-success" data-toggle="tooltip" title="Kích Hoạt Đối Tác">
                                        <i class="fas fa-edit"></i>
                                        Kích Hoạt Đối Tác
                                    </button>
                                @endif
                            </div>
                            @if ($roleUser != App\Enums\EUserRole::CS)
                            <div class="col">
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-Etrust m-2" data-toggle="tooltip" title="Đổi Mật Khẩu Đăng Nhập">
                                    <i class="fas fa-edit"></i>
                                    Đổi Mật Khẩu Đăng Nhập
                                </button>
                                <br>
                                @if ($user->status == App\Enums\EUserStatus::ACTIVE)
                                    <button data-toggle="modal" data-target="#lockAccountModal" class="btn btn-danger m-2" data-toggle="tooltip" title="Ngừng Kích Hoạt Tài Khoản">
                                        <i class="fas fa-edit"></i>
                                        Ngừng Kích Hoạt Tài Khoản
                                    </button>
                                @else
                                    <button data-toggle="modal" data-target="#acctiveAccountModal" class="btn btn-success m-2" data-toggle="tooltip" title="Kích Hoạt Tài Khoản">
                                        <i class="fas fa-edit"></i>
                                        Kích Hoạt Tài Khoản
                                    </button>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <div class="modal fade" id="lockAccountModal" tabindex="-1" role="dialog" aria-labelledby="lockAccountModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lockAccountModalLabel">Cập Nhật Tài Khoản</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.inactive.account') }}">
                                @csrf
                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                <p>Có chắc chắn muốn ngừng kích hoạt tài khoản này không?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-Etrust">Cập Nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="acctiveAccountModal" tabindex="-1" role="dialog" aria-labelledby="acctiveAccountModallLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="acctiveAccountModalLabel">Cập Nhật Tài Khoản</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.active.account') }}">
                                @csrf
                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                <p>Có chắc chắn kích hoạt tài khoản này không?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-Etrust">Cập Nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lockPartnerModal" tabindex="-1" role="dialog" aria-labelledby="lockPartnerModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lockPartnerModalLabel">Ngừng Kích hoạt Đối Tác</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.inactive.partner') }}">
                                @csrf
                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                <p>Bạn có chắc chắn muốn ngừng kích hoạt đối tác tài khoản này không?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-Etrust">Cập Nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="acctivePartnerModal" tabindex="-1" role="dialog" aria-labelledby="acctivePartnerlLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="acctivePartnerlLabel">Cập Nhật Tài Khoản</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.active.partner') }}">
                                @csrf
                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                <p>Có chắc chắn kích hoạt đối tác tài khoản này không?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-Etrust">Cập Nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Mật Khẩu Đăng Nhập</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.change.password.account') }}">
                                @csrf
                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                <div class="form-group row">
                                    <label for="nameProvider" class="col-sm-4 col-form-label">Mật Khẩu Mới</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="passwordCustomer" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="statusVoucherUpdate" class="col-sm-4 col-form-label">Xác Nhận Mật Khẩu</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="passwordConfirmCustomer" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-Etrust">Cập Nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection

