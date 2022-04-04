@extends('admin.layout')
@section('title','Add Category')
@section('category_select','active')
@section('heading')
    <strong>ADD CATEGORY</strong>
@endsection
@section('container')
    <div>
        <a href="{{ url('admin/category') }}"><button class="btn btn-success">BACK</button></a>
    </div>
    <form action="{{ url('admin/category/add_category_process') }}" class="p-3 bg-white my-4 rounded" method="post">
        @csrf
        <h3 class="text-center">ADD NEW CATEGORY</h3>
        <div class="form-group p-3">
            <label for="">Category</label>
            <input type="text" name="category" class="form-control" id="">
        </div>
        <div class="form-group p-3 text-center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
   
@endsection