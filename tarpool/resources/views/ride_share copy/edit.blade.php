@extends('layouts.temp')

@section('content')
        <h2>Edit Ride Share Details</h2> 
        <form method="post" action="{{route('ride_shares.update',$id)}}"> 
    
        @csrf 
            <input name="_method" type="hidden" value="PATCH"> 
            <p> 
                <label for="driver_id"> Driver ID: </label> 
                <input type="text" name="driver_id" value="{{$rideShare->driver_id}}"> 
            </p> 
            <p> 
                <label for="pickup_location"> Pickup Location: </label> 
                <input type="text" name="pickup_location" value="{{$rideShare->pickup_location}}"> 
            </p> 
            <p> 
                <label for="dropoff_location"> Dropoff Location: </label> 
                <input type="text" name="dropoff_location" value="{{$rideShare->dropoff_location}}"> 
            </p> 
            <p> 
                <label for="ride_date"> Ride Date: </label> 
                <input type="date" name="ride_date" value="{{$rideShare->ride_date}}"> 
            </p> 
            <p> 
                <label for="ride_time"> Ride Time: </label> 
                <input type="time" name="ride_time" value="{{$rideShare->ride_time}}"> 
            </p> 
            <p> 
                <label for="price"> Price: </label> 
                <input type="text" name="price" value="{{$rideShare->price}}"> 
            </p> 
            <p> 
                <label for="available_seats"> Available Seats: </label> 
                <input type="text" name="available_seats" value="{{$rideShare->available_seats}}"> 
            </p> 
            <p> 
                <label for="current_available_seats"> Available Seats: </label> 
                <input type="text" name="current_available_seats" value="{{$rideShare->current_available_seats}}"> 
            </p> 
            <p> 
                <label for="ride_note"> Ride Note: </label> 
                <textarea name="ride_note">{{$rideShare->ride_note}}</textarea> 
            </p> 
            <p> 
                <label for="ride_status"> Ride Status: </label> 
                <select name="ride_status"> 
                    <option value="pending" {{$rideShare->ride_status == 'pending' ? 'selected' : ''}}>Pending</option> 
                    <option value="in-progress" {{$rideShare->ride_status == 'in-progress' ? 'selected' : ''}}>In Progress</option> 
                    <option value="completed" {{$rideShare->ride_status == 'completed' ? 'selected' : ''}}>Completed</option> 
                    <option value="cancelled" {{$rideShare->ride_status == 'cancelled' ? 'selected' : ''}}>Cancelled</option> 
                </select> 
            </p> 
            <p> 
                <button type="submit" > Update </button> 
            </p> 
        </form>
@endsection