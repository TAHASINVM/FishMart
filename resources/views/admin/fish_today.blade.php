@extends('admin.layout')
@section('title','Today Fish')
@section('admin_name', session('ADMIN_NAME') )
@section('today_fish_select','active')
@section('container')

    <h2>Today Fishes</h2>
    <div>
        <form action="{{ url('/admin/today_fish/add') }}" method="post" class="p-4 bg-white rounded shadow">
            @csrf
            <div class="form-row d-flex justify-content-around">
                <div class="form-group col-3">
                    <label for="">Fish</label>
                    <select name="fish" id="" class="form-control" required>
                        <option value="">Select</option>
                        @foreach ($fish as $item)
                            <option value="{{ $item->id }}">{{ $item->mal_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-control" required>
                        <option value="">Select</option>
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                </div>
                <div class="form-group col-2">
                    <label for="">Price</label>
                    <input type="number" name="price" id="" class="form-control" required>
                </div>
                <div class="form-group col-3 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-success">ADD TO LIST</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Fish</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=1;
                @endphp
                @foreach ($today as $item)
                    <tr>
                        <th>{{ $count++ }}</th>
                        <th>{{ $item->fish_id }}</th>
                        <th>{{ $item->category_id }}</th>
                        <th>{{ $item->price }}</th>
                        <th>Action</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   

@endsection