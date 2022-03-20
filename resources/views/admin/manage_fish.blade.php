@extends('admin.layout')
@section('title','Manage Fish')
@section('admin_name', session('ADMIN_NAME') )
@section('fish_select','active')
@section('container')

    <h2>MANAGE FISH</h2>
    <div>
        <a href="{{ url('admin/fish') }}"><button class="btn btn-success">BACK</button></a>
    </div>
    <form action="{{ url('admin/fish/manage_fish_process') }}" enctype="multipart/form-data" class="p-3 bg-white my-4 rounded" method="post">
        @csrf
        <h3 class="text-center">ADD NEW FISH</h3>
        <div class="form-group p-3">
            <label for="">Fish Name (ENGLISH)</label>
            <input type="text" name="fish_name_eng" class="form-control" id="">
        </div>
        <div class="form-group p-3">
            <label for="">Fish Name (MALAYALAM)</label>
            <input type="text" name="fish_name_mlm" class="form-control"  id="" required>
        </div>
        <div class="form-group p-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group p-3 text-center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
   
@endsection