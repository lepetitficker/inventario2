@extends('items.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Items Page</div>
  <div class="card-body">
      
      <form action="{{ url('items') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Item name</label></br>
        <input type="text" name="name" id="name" required class="form-control"></br>
        <label>Item description</label></br>
        <input type="text" name="description" id="description" required class="form-control"></br>
        <label>Item photo</label></br>
        <input type="file" name="photo" id="photo" required class="form-control"></br>
        <label>Item quantity</label></br>
        <input type="number" name="quantity" id="quantity" required class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop