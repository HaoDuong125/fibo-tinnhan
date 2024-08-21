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
                    <form role="form" method="POST" action="{{route('admin.myfarm.pages.update')}}">
                        @csrf
                        <input type="hidden" name="keyConfig" value="{{$page->key_config}}">
                        <input type="hidden" name="language" value="{{$language}}">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="valueConfig">Thông Tin </label>
                                            <textarea class="form-control" name="valueConfig" id="valueConfig" cols="15" rows="5">@if($language == "en") {{$page->value_config_en}} @else {{$page->value_config}} @endif</textarea>
                                            <div class="form-group mt-3">
                                                <small>Lưu ý: <sup class="text-danger">(*)</sup> là thông tin bắt buộc nhập</small>
                                            </div>
                                        </div>
                                    </div>
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

