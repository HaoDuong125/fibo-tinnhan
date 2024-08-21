@extends('layouts.base', ['activePage' => 'dashboard'])

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Trang chủ - Etrust</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-Etrust" href="#">Trang chủ</a></li>
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
           
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
</script>
@endsection
