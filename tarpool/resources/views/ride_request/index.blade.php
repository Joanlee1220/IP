@extends('layouts.temp')

@section('content')
<div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <a href="http://localhost:8000/ride_requests/iam" class="btn btn-warning">i am</a>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
<th scope="col">Ride ID</th>
<th scope="col">Requested User ID</th>
<th scope="col">Request Status</th>
<th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($rideRequests as $rideRequest)
                    <tr>
                    <td>{{$rideRequest['id']}}</td>
<td>{{$rideRequest['requested_ride_id']}}</td>
<td>{{$rideRequest['requested_user_id']}}</td>
<td>{{$rideRequest['request_status']}}</td>
<td><a href="{{route('ride_request.myRequest', $rideRequest['requested_user_id'])}}" class="btn btn-primary">is me</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection