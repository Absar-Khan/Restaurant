@extends('Layouts.admin')

@section('content')

<div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Food Menu</h4>
                    <p class="card-description"> Update Food Menu </p>
                    <form method="post" action="{{ route('update.food.menu',$food->id) }}" enctype="multipart/form-data">
                    
                        @csrf
                     
                      <div class="form-group">
                        <label >Title</label>
                        <input style="color:white;" type="text" class="form-control" name="title" value="{{ $food->title }}">
                      </div>
                      <div class="form-group">
                        <label>Price</label>
                        <input style="color:white;" type="num" class="form-control" name="price" value="{{ $food->price }}">
                      </div>
                      <div class="form-group">
                        <label >OldImage</label>
                        <img height="100" width="100" src="/foodimage/{{$food->image}}">
                      </div>
                      <div class="form-group">
                        <label >Image</label>
                        <input style="color:white;" type="file" class="form-control" name="image" Required>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <input style="color:white;" type="text" class="form-control" name="description" value="{{$food->description}}">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>

@endsection