@extends('Layouts.admin')
@section('content')
<div class="row">
<form action="{{ route('search') }}" method="get">
    <input type="text" name="search" style="color:blue;">
    <input type="submit" value="Search" class="btn btn-success">
</form>
<h1 style="text-align:center;">Customer Orders</h1>
              <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin Users</h4>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>foodname</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>TotalPrice</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $odr)
                          <tr>
                            <td>{{ $odr->name }}</td>
                            <td>{{ $odr->phone }}</td>
                            <td>{{ $odr->address }}</td>
                            <td>{{ $odr->foodname }}</td>
                            <td>{{ $odr->price }}$</td>
                            <td>{{ $odr->quantity }}</td>
                            <td>{{ $odr->price* $odr->quantity}}$</td>
                            <td><a class="btn btn-danger" href="{{ route('admin.delete.order',$odr->id) }}">Remove</a></td>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
@endsection