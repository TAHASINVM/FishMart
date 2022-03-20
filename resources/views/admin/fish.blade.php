@extends('admin.layout')
@section('title','Fish')
@section('admin_name', session('ADMIN_NAME') )
@section('fish_select','active')
@section('container')

    <h2>Fish</h2>
    <div>
        <a href="{{ url('admin/fish/manage_fish') }}"><button class="btn btn-success">ADD NEW FISH</button></a>
    </div>
    @if (session()->has('msg'))
        <div class="alert alert-success text-center my-2" role="alert">
            {{ session('msg') }}
        </div>      
    @endif
    <table class="table mt-5">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Eng - Name</th>
                <th>Mal - Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                    $count=1;
            @endphp
            @foreach ($data as $fish)
                <tr>
                    <th>{{ $count++}}</th>
                    <th>{{ $fish->eng_name }}</th>
                    <th>{{ $fish->mal_name }}</th>
                    <th>
                        <img width="200px" src="{{ asset('media/fish/'.$fish->image) }}" alt="">
                    </th>
                    <th>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    
   

@endsection