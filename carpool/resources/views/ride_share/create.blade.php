@extends('layouts.temp')

@section('content')
    <div class="container">
        <h2>Create New Ride Share</h2>
    
        <form method="post"action="{{url('ride_shares')}}"> 
            @csrf
            <div class="form-group">
                <label for="driver_id">Driver ID:</label>
                <input type="number" class="form-control" id="driver_id" name="driver_id" required>
            </div>
            <div class="form-group">
                <label for="pickup_location">Pickup Location:</label>
                <input type="text" class="form-control" id="pickup_location" name="pickup_location" required>
            </div>
            <div class="form-group">
                <label for="dropoff_location">Dropoff Location:</label>
                <input type="text" class="form-control" id="dropoff_location" name="dropoff_location" required>
            </div>
            <div class="form-group">
                <label for="ride_date">Ride Date:</label>
                <input type="date" class="form-control" id="ride_date" name="ride_date" required>
            </div>
            <div class="form-group">
                <label for="ride_time">Ride Time:</label>
                <input type="time" class="form-control" id="ride_time" name="ride_time" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="available_seats">Available Seats:</label>
                <input type="number" class="form-control" id="available_seats" name="available_seats" required>
            </div>
            <div class="form-group">
                <label for="available_seats">Current Available Seats:</label>
                <input type="number" class="form-control" id="current_available_seats" name="available_seats" required>
            </div>
            <div class="form-group">
                <label for="ride_note">Ride Note:</label>
                <textarea class="form-control" id="ride_note" name="ride_note" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="ride_status">Ride Status:</label>
                <select class="form-control" id="ride_status" name="ride_status">
                    <option value="pending">Pending</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
