@extends('layouts.app')

@section('content')
<h2>Who i am</h2>
    <div class="container">
        <h2>Who i am</h2>
    
        <form method="post"action="{{url('ride_shares.myShare')}}"> 
            @csrf
            <div class="form-group">
                <label for="driver_id">Driver ID:</label>
                <input type="number" class="form-control" id="driver_id" name="driver_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
