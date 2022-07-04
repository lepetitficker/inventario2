@extends('items.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit the item's info</div>
  <div class="card-body">
      
      <form action="{{ url('items/' .$items->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$items->id}}" id="id" />
        <label>Item name</label></br>
        <input type="text" name="name" id="name" value="{{$items->name}}" required class="form-control"></br>
        <label>Item description</label></br>
        <input type="text" name="description" id="description" value="{{$items->description}}" required class="form-control"></br>
        <label>Item photo</label></br>
        <div class="container">
          <div class="col-md-4 px-0">
            <img src="../../../uploads/items/{{ $items->photo }}" alt="{{ $items->photo }}" class="img-fluid">
          </div>
        </div>
        <input type="file" name="photo" id="photo" class="form-control"></br>
        <label>Item quantity</label></br>
        <input type="number" name="quantity" id="quantity" value="{{$items->quantity}}" required class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success">
        <a href="{{ url('items') }}" class="btn btn-danger float-end" title="Back">
          <i class="fa fa-plus" aria-hidden="true"></i> Back
        </a>
        </br>
    </form>
   
  </div>
</div>
 
@stop