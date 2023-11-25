@extends('Layouts.admin')

@section('content')

<div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Food Menu</h4>
                    <p class="card-description"> Add Food Menu </p>
                    <form method="post" action="{{ route('food.menu') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label >Title</label>
                        <input style="color:white;" type="text" class="form-control" name="title" placeholder="title" Required>
                      </div>
                      <div class="form-group">
                        <label>Price</label>
                        <input style="color:white;" type="num" class="form-control" name="price" placeholder="price" Required>
                      </div>
                      <div class="form-group">
                        <label >Image</label>
                        <input style="color:white;" type="file" class="form-control" name="image" Required>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <input style="color:white;" type="text" class="form-control" name="description" placeholder="decription" Required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>
                    <br>
            <div class="row">
               <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Food Menu</h4>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($food as $fd)
                          <tr>
                            <td>{{ $fd->title }}</td>
                            <td>{{ $fd->price }}</td>
                            <td><img height="200" width="200" src="/foodimage/{{$fd->image}}"></td>
                            <td>{{ $fd->description }}</td>
                            <td><a class="btn btn-danger" href="{{ route('delete.food.menu',$fd->id) }}">Remove</a></td>
                            <td><a class="btn btn-success"href="{{ route('edit.food.menu',$fd->id) }}">Edit</a></td>

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