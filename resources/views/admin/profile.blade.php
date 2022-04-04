@extends('admin.layout')
@section('title','profile')
@section('heading')
    <strong>PROFILE</strong>
@endsection

@section('container')
    <div class="row">
        <div class="col-4">
            <img width="100%" class="rounded-pill" src="{{ asset('admin/images/'.session('ADMIN_IMAGE')) }}" alt="">
        </div>
        <div class="col-8 ">
            <h1 style="text-transform:uppercase">{{ $data->name }}  ( ADMIN )</h1>
            <h4>Email : {{ $data->email }}</h4>
            <h4>Contact No : {{ $data->phone }}</h4>
            
        </div>

    </div>

@endsection