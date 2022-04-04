@extends('admin.layout')
@section('title','Today Fish')
@section('today_fish_select','active')
@section('heading')
    <strong>TODAY FISH</strong>
@endsection
@section('container')
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
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
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
                    <th>Image</th>
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
                        <th>{{ $item['getFishName']->eng_name }} ({{ $item['getFishName']->mal_name }})</th>
                        <th>{{ $item['getCategory']->category }}</th>
                        <th>{{ $item->price }}</th>
                        <th>
                            <img width="100px" src="{{ asset('media/fish/'.$item['getFishName']->image) }}" alt="">
                        </th>
                        <th>
                            @if ($item->status==0)
                                <a href="{{ url('admin/today_fish/status/'.$item->id.'/1') }}" class="btn btn-sm btn-warning">Finish</a>
                            @else
                                <a href="{{ url('admin/today_fish/status/'.$item->id.'/0') }}" class="btn btn-sm btn-success">Available</a>
                                <button onclick="getAddedFishData({{ $item->id }})" class="btn btn-sm btn-primary">Edit</button>
                                <a href="{{ url('admin/today_fish/remove/'.$item->id) }}" class="btn btn-sm btn-danger">Remove</a>
                            @endif
                            
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    
    <div class="modal fade" id="editAddedFishDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-start">
                    <img width="100px" class="rounded-pill shadow-sm" src="" alt="" id="today_fish_image">
                    <h5 class="modal-title flex-fill text-center" id="today_fish_name"></h5>
                </div>
                <form action="{{ url('/admin/today_fish/record_update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" id="today_fish_category" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control" id="today_fish_price" required>
                        </div>
                        <input type="hidden" name="id" id="today_fish_history_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Update Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>

    function getAddedFishData(id){
        $.ajax({
            type:'GET',
            dataType:'json',
            url:"/admin/today_fish/record_get",
            data:{
                getId:id
            }
        }).done(function(res){
            $('#today_fish_name').text(res.get_fish_name.eng_name+' ('+res.get_fish_name.mal_name+')');
            $('#today_fish_image').attr('src','/media/fish/'+res.get_fish_name.image);
            $('#today_fish_category').val(res.category_id);
            $('#today_fish_price').val(res.price);
            $('#today_fish_history_id').val(res.id);
            $('#editAddedFishDataModal').modal('show');
        })
    }
</script>