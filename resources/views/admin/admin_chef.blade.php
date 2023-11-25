@extends('Layouts.admin')

@section('content')

<div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Food Chef</h4>
                    <p class="card-description"> Add Food Chef </p>
                    <form method="post" action="{{ route('add.food.chef') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label >Name</label>
                        <input style="color:white;" type="text" class="form-control" name="name" placeholder="name" Required>
                      </div>
                      <div class="form-group">
                        <label>Speciality</label>
                        <input style="color:white;" type="text" class="form-control" name="speciality" placeholder="speciality" Required>
                      </div>
                      <div class="form-group">
                        <label >Image</label>
                        <input style="color:white;" type="file" class="form-control" name="image" Required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>
                    <br>
                    <div class="row">
               <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Food Chefs</h4>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Speciality</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($chef as $ch)
                          <tr>
                            <td>{{ $ch->name }}</td>
                            <td>{{ $ch->speciality }}</td>
                            <td><img height="200" width="200" src="/foodchef/{{$ch->image}}"></td>
                            <td><a class="btn btn-danger" href="{{ route('delete.food.chef',$ch->id) }}">Remove</a></td>
                            <td><a class="btn btn-success" href="{{ route('edit.food.chef',$ch->id)}}">Edit</a></td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              
            </div>
@endsection