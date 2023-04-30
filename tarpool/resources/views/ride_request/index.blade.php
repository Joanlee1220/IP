@extends('layouts.app')

@section('content')
<div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
      
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
<th scope="col">Ride ID</th>
<th scope="col">Requested User ID</th>
<th scope="col">Request Status</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($rideRequests as $rideRequest)
                    <tr>
                    <td>{{$rideRequest['id']}}</td>
<td>{{$rideRequest['requested_ride_id']}}</td>
<td>{{$rideRequest['requested_user_id']}}</td>
<td>{{$rideRequest['request_status']}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection