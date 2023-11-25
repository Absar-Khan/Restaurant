@extends('Layouts.admin')
@section('content')
<div class="row">
              <div class="col-lg-16 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin Users Reservation</h4>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Guest</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation as $res)
                          <tr>
                            <td>{{ $res->name }}</td>
                            <td>{{ $res->email }}</td>
                            <td>{{ $res->phone }}</td>
                            <td>{{ $res->guest}}</td>
                            <td>{{ $res->date}}</td>
                            <td>{{ $res->time}}</td>
                            <td>{{ $res->message}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
@endsection