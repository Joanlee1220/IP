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
                @foreach ($ride_shares as $rideShare)
                    <tr>
                    <td>{{$rideShare['id']}}</td>
<td>{{$rideShare['driver_id']}}</td>
<td>{{$rideShare['pickup_location']}}</td>
<td>{{$rideShare['dropoff_location']}}</td>
<td>{{ $rideShare['ride_date'] }}</td>
<td>{{ $rideShare['ride_time'] }}</td>
<td>{{ $rideShare['price'] }}</td>
<td>{{ $rideShare['available_seats'] }}</td>
<td>{{ $rideShare['ride_note'] }}</td>
<td>{{ $rideShare['ride_status'] }}</td>
<td>
                            <a href="{{route('ride_shares.edit', $rideShare['id'])}}" class="btn btn-warning">Edit</a>
                            
                            
                        </td>
                        <td>
                            <form action="{{route('ride_shares.destroy',$rideShare['id'])}}" method="post">
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