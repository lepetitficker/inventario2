@extends('items.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Items info
  <a href="{{ url('items') }}" class="btn btn-danger float-end" title="Back">
    <i class="fa fa-plus" aria-hidden="true"></i> Back
  </a>
</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Item name : {{ $items->name }}</h5>
        <p class="card-text">Item description : {{ $items->description }}</p>
        <p class="card-text">Item photo: {{ $items->photo }}</p>
        <div class="container">
          <div class="col-md-4 px-0">
            <img src="../../uploads/items/{{ $items->photo }}" alt="{{ $items->photo }}" class="img-fluid">
          </div>
        </div>
        <p class="card-text">Item quantity : {{ $items->quantity }}</p>
  </div>       
    </hr>  
  </div>
</div>