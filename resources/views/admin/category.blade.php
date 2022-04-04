@extends('admin.layout')
@section('title','Category')
@section('category_select','active')
@section('heading')
    <strong>CATEGORY</strong>
@endsection
@section('container')
    <div>
        <a href="{{ url('admin/category/add_category') }}"><button class="btn btn-success">ADD NEW CATEGORY</button></a>
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
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                    $count=1;
            @endphp
            @foreach ($result as $category)
                <tr>
                    <th>{{ $count++}}</th>
                    <th>{{ $category->category }}</th>
                    <th>
                        <a href="{{ url('admin/category/delete/'.$category->id) }}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    
   

@endsection