@extends('admin.layout')
@section('title','History')
@section('history_select','active')
@section('heading')
    <strong>HISTORY</strong>
@endsection
@section('container')

    @if (session()->has('msg'))
        <div class="alert alert-success text-center my-2" role="alert">
            {{ session('msg') }}
        </div>      
    @endif

    <form action="{{ url('admin/history/get_history') }}" method="post" class="p-4 bg-white rounded shadow">
        @csrf
        <h2>Search By Date</h2>
        <div class="form-row d-flex flex-wrap justify-content-between">
            <div class="form-group col-12 col-md-4">
                <label for="">Date</label>
                <input type="date" name="date" id="" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>

    @if (isset($results[0]))
    <h2 class="my-4 bg-white rounded p-4 text-center shadow">{{ \Carbon\Carbon::parse($results[0]->date)->isoFormat('D MMM YYYY') }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Fish</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>

            </tr>
        </thead>
        <tbody>
            @php
                $count=1;
            @endphp
            @foreach ($results as $item)
                <tr>
                    <th>{{ $count++ }}</th>
                    <th>{{ $item['getFishName']->eng_name }} ({{ $item['getFishName']->mal_name }})</th>
                    <th>{{ $item['getCategory']->category }}</th>
                    <th>{{ $item->price }}</th>
                    <th>
                        <img width="100px" src="{{ asset('media/fish/'.$item['getFishName']->image) }}" alt="">
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif (isset($results) && !isset($results[0]))
        <h4 class="my-4 bg-white rounded p-2 text-center shadow">No Data Found</h4>
    @endif

    
   

@endsection