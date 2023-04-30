@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Make a Ride Request</h2>

        <form method="post" action="{{ route('ride_requests.store') }}">
            @csrf

            <p> 
                <label for="requested_ride_id"> Ride ID: </label> 
                <input type="text" name="requested_ride_id" value="{{$rideShare->id}}" readonly> 
            </p> 

            <p> 
                <label for="driver_id"> Driver ID: </label> 
                <input type="text" name="driver_id" value="{{$rideShare->driver_id}}" readonly> 
            </p> 
            <p> 
                <label for="pickup_location"> Pickup Location: </label> 
                <input type="text" name="pickup_location" value="{{$rideShare->pickup_location}}" readonly> 
            </p> 
            <p> 
                <label for="dropoff_location"> Dropoff Location: </label> 
                <input type="text" name="dropoff_location" value="{{$rideShare->dropoff_location}}" readonly> 
            </p> 
            <p> 
                <label for="ride_date"> Ride Date: </label> 
                <input type="date" name="ride_date" value="{{$rideShare->ride_date}}" readonly> 
            </p> 
            <p> 
                <label for="ride_time"> Ride Time: </label> 
                <input type="time" name="ride_time" value="{{$rideShare->ride_time}}" readonly> 
            </p> 
            <p> 
                <label for="price"> Price: </label> 
                <input type="text" name="price" value="{{$rideShare->price}}" readonly> 
            </p> 
            <p> 
                <label for="available_seats"> Available Seats: </label> 
                <input type="text" name="available_seats" value="{{$rideShare->available_seats}}" readonly> 
            </p> 
            <p> 
                <label for="current_available_seats"> Available Seats: </label> 
                <input type="text" name="current_available_seats" value="{{$rideShare->current_available_seats}}" readonly> 
            </p> 
            <p> 
                <label for="ride_note"> Ride Note: </label> 
                <textarea name="ride_note">{{$rideShare->ride_note}}</textarea> 
            </p> 

            <div class="form-group">
                <label for="requested_user_id">user ID:</label>
                <input type="number" class="form-control" id="requested_user_id" name="requested_user_id" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
