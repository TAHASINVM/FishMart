@extends('admin.layout')
@section('title','Manage Fish')
@section('fish_select','active')
@section('heading')
    <strong>EDIT FISH</strong>
@endsection
@section('container')

    <div>
        <a href="{{ url('admin/fish') }}"><button class="btn btn-success">BACK</button></a>
    </div>
    <form action="{{ url('admin/fish/edit_fish_process/'.$data->id) }}" enctype="multipart/form-data" class="p-3 bg-white my-4 rounded" method="post">
        @csrf
        <h3 class="text-center">EDIT FISH DETAILS</h3>
        <div class="form-group p-3">
            <label for="">Fish Name (ENGLISH)</label>
            <input type="text" name="fish_name_eng" value="{{ $data->eng_name }}" class="form-control" id="">
        </div>
        <div class="form-group p-3">
            <label for="">Fish Name (MALAYALAM)</label>
            <input type="text" name="fish_name_mlm" value="{{ $data->mal_name }}"  class="form-control"  id="" required>
        </div>
        <div class="form-group p-3">
            <label for="">New Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group p-3">
            <label for="">Current Image</label>
            <img width="200px" class="d-block border rounded" src="{{ asset('media/fish/'.$data->image) }}" alt="">
        </div>
        <div class="form-group p-3 text-center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
   
@endsection