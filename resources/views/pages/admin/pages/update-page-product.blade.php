@extends('layouts.base', ['activePage' => 'pages'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật - {{ $page->name_page }}</h1>
            </div>

        </div>
    </div>
</section>
@endsection

@php
    $roleUser = Auth::user()->role;
    $bannerMobile = "";
    $bannerDesktop = "";

    if ($language == "en") {
        if (!empty($page->value_config_en)) {
            $data = json_decode($page->value_config_en);
            $bannerMobile = $data->banner_mobile;
            $bannerDesktop = $data->banner_desktop;
        }
    } else {
        if (!empty($page->value_config)) {
            $data = json_decode($page->value_config);
            $bannerMobile = $data->banner_mobile;
            $bannerDesktop = $data->banner_desktop;
        }
    }
@endphp

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-Etrust">
                        <h3 class="card-title">Cập nhật
                            @if ($language == "en")
                                (Tiếng Anh)
                            @else
                                (Tiếng Việt)
                            @endif
                        </h3>
                    </div>
                    <form role="form" method="POST" action="{{route('admin.myfarm.pages.product.update')}}" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="keyConfig" value="{{$page->key_config}}">
                        <input type="hidden" name="language" value="{{$language}}">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="thumbnail_mb">Banner Mobile </label>
                                            <input type="file" name="banner_mobile_update" accept="image/*" class="form-control" placeholder="Ảnh banner mobile" id="thumbnail_mb" >
                                            <small></small>
                                            <input type="hidden" name="banner_mobile" value="{{$bannerMobile}}">
                                            <img src="{{$bannerMobile}}" style="width: 200px" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="thumbnail_dt">Banner Desktop </label>
                                            <input type="file" name="banner_desktop_update" accept="image/*" class="form-control" placeholder="Ảnh banner destop" id="thumbnail_dt" >
                                            <input type="hidden" name="banner_desktop" value="{{$bannerDesktop}}">
                                            <img src="{{$bannerDesktop}}" style="width: 200px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <small>Lưu ý: <sup class="text-danger">(*)</sup> là thông tin bắt buộc nhập</small>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-Etrust">Cập nhật </button>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).on('click','.remove-item', function() {
            $(this).closest('.item').remove();
        });
        $(document).on('click','.add-more-info', function() {
            $(".list-item").append(`<div class="item" style="margin: 0.5rem; display: inline-flex; flex: 0 0 40%;">
                                        <input type="text" class="form-control" name="list_more_info[]" >
                                        <span class="text-danger remove-item" style="margin: auto 1rem;"><i class="fa fa-window-close-o" aria-hidden="true"></i></span>
                                    </div>`);
        });
        $(document).ready(function() {
            $('#valueConfig').summernote({
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    // ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['picture', 'hr', 'link', 'video']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            });
        });
    </script>
@endsection

