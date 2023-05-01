@extends('layouts.temp')

@section('content')
        <h2>Edit Ride Share Details</h2> 
        <form method="post"  action="{{route('ride_shares.replyRequest',$id)}}"> 
        replyRequest
    
        @csrf 
        @method('PATCH')
            <input name="_method" type="hidden" value="PATCH"> 
            <div class="form-group">
                <label for="requested_ride_id">Requested Ride ID</label>
                <input type="text" class="form-control" id="requested_ride_id" name="requested_ride_id" value="{{ $rideRequest->requested_ride_id }}">
            </div>
            <div class="form-group">
                <label for="requested_user_id">Requested User ID</label>
                <input type="text" class="form-control" id="requested_user_id" name="requested_user_id" value="{{ $rideRequest->requested_user_id }}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $cpUser->fname }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $cpUser->email }}" readonly>
            </div>
            
            <div class="form-group">
    <label for="request_status">Request Status</label>
    <select class="form-control" id="request_status" name="request_status">
        <option value="accepted" {{ $rideRequest->request_status === 'accepted' ? 'selected' : '' }}>Accepted</option>
        <option value="rejected" {{ $rideRequest->request_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
</div>

            <p> 
                <button type="submit" > Reply </button> 
            </p> 
        </form>
@endsection