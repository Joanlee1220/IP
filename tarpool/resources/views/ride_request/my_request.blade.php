@extends('layouts.app')

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
<td>
                            <form action="{{route('ride_request.destroy',$rideRequest['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection