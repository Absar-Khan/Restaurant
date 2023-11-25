@extends('Layouts.admin')
@section('content')
<div class="row">
              <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin Users</h4>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                          <tr>
                            <td>{{ $dt->name }}</td>
                            <td>{{ $dt->email }}</td>
                            @if($dt->usertype==0)
                            <td><a  class="btn btn-danger" href="{{ route('delete.user',$dt->id)}}">Remove</a></td>
                            @else
                            <td>Not Allowed</td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
@endsection