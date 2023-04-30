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
<th colspan="2">Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($rideRequests as $rideRequest)
                    <tr>
                    <td>{{$rideRequest['id']}}</td>
<td>{{$rideRequest['requested_ride_id']}}</td>
<td>{{$rideRequest['requested_user_id']}}</td>
<td>{{$rideRequest['request_status']}}</td>
<td>
                            <a href="" class="btn btn-warning">accepted</a>
                            
                            
                        </td>
                        <td>
                        @if(isset($rideRequest) && !empty($rideRequest))
                        <form method="POST" action="{{ route('ride_request.acceptedRide',$rideRequest['id'])}}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger" type="submit">Accepted</button>
 
                        <input name="_method" type="hidden" value="accepted">
                             
</form>

                        </td>
               

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection