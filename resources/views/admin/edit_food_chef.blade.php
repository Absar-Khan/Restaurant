@extends('Layouts.admin')

@section('content')

<div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Food Chef</h4>
                    <p class="card-description"> Update Food Chef </p>
                    <form method="post" action="{{ route('update.food.chef',$foodchef->id) }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label >Name</label>
                        <input style="color:white;" type="text" class="form-control" name="name" value="{{ $foodchef->name }}">
                      </div>
                      <div class="form-group">
                        <label>Speciality</label>
                        <input style="color:white;" type="text" class="form-control" name="speciality" value="{{ $foodchef->speciality }}">
                      </div>
                      <div class="form-group">
                        <label >OldImage</label>
                        <img height="100" width="100" src="/foodchef/{{$foodchef->image}}">
                      </div>
                      <div class="form-group">
                        <label >Image</label>
                        <input style="color:white;" type="file" class="form-control" name="image" Required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>

@endsection