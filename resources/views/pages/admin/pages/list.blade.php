@extends('layouts.base', ['activePage' => 'pages'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh Sách Trang</h1>
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
                        <h3 class="card-title">Danh Sách Trang</h3>
                    </div>
                    <div class="card-body table-responsive pt-3">
                        <table class="table table-bordered table-hover table-head-fixed">
                            <thead>
                                <tr>
                                    <th class="bg-Etrust" style="width: 10px">#</th>
                                    <th class="text-center bg-Etrust">Trang</th>
                                    <th class="text-center bg-Etrust">Ngày cập nhật</th>
                                    <th class="text-center bg-Etrust">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $key => $value)
                                <tr>
                                    <td class="align-middle" scope="row"> {{$key + $pages->firstItem()}} </td>
                                    <td class="align-middle text-left">
                                        {{$value->name_page}}
                                    </td>
                                    <td class="align-middle text-center">{{ empty($value->updated_at) ? '' : Illuminate\Support\Carbon::parse($value->updated_at)->format('Y-m-d H:i:s')}}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('admin.myfarm.pages.edit', ["slug" => $value->key_config, "language" => "vi"]) }}"  class="btn btn-sm btn-info" title="Xem chi tiết">
                                            <i class="fas fa-info-circle"></i> VI
                                        </a>
                                        <a href="{{ route('admin.myfarm.pages.edit', ["slug" => $value->key_config, "language" => "en"]) }}"  class="btn btn-sm btn-info" title="Xem chi tiết">
                                            <i class="fas fa-info-circle"></i> EN
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $pages->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
</script>
@endsection
