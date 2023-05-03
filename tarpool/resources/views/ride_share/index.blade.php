@extends('layouts.temp')

@section('content')
<script>
function toggleField(hideObj,showObj){
  hideObj.disabled=true;        
  hideObj.style.display='none';
  showObj.disabled=false;   
  showObj.style.display='inline';
  showObj.focus();
}
</script>
<div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
          
                            <a href="http://localhost:8000/ride_shares/create" class="btn btn-warning">Add</a>
                            <a href="{{ route('ride_shares.who') }}" class="btn btn-warning">Who</a>

<form method="GET" action="">
    <div class="row">
        
        <div class="col-md-4 mb-3">
            <label for="pickup_location">Pickup Location</label>
            <select class="form-control" id="pickup_location" name="dropoff_location"
        onchange="if(this.options[this.selectedIndex].value=='customOption'){
            toggleField(this,this.nextSibling);
            this.selectedIndex='0';
        }">
          
                <option value="TAR UMT" {{ Request::get('pickup_location') == 'pickup_location' ? 'selected':' '}}  >TAR UMT</option>
                <option value="PV 13" {{ Request::get('pickup_location') == 'PV 13' ? 'selected' : '' }}>PV 13</option>
<option value="PV 15" {{ Request::get('pickup_location') == 'PV 15' ? 'selected' : '' }}>PV 15</option>
<option value="PV 18" {{ Request::get('pickup_location') == 'PV 18' ? 'selected' : '' }}>PV 18</option>
<option value="PV 9" {{ Request::get('pickup_location') == 'PV 9' ? 'selected' : '' }}>PV 9</option>

            </select>
            <input name="pickup_location" style="display:none;" disabled="disabled"
                   onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="dropoff_location">Dropoff Location</label>
            <select class="form-control" id="dropoff_location" name="dropoff_location"
        onchange="if(this.options[this.selectedIndex].value=='customOption'){
            toggleField(this,this.nextSibling);
            this.selectedIndex='0';
        }">
    <option  {{ Request::get('dropoff_location') == 'TAR UMT' ? 'selected':'' }}>TAR UMT</option>
    <option {{ Request::get('dropoff_location') == 'PV 13' ? 'selected':'' }}>PV 13</option>
    <option {{ Request::get('dropoff_location') == 'PV 15' ? 'selected':'' }}>PV 15</option>
    <option {{ Request::get('dropoff_location') == 'PV 18' ? 'selected':'' }}>PV 18</option>
    <option {{ Request::get('dropoff_location') == 'PV 9' ? 'selected':'' }}>PV 9</option>
</select>
            </select>
            <input name="dropoff_location" style="display:none;" disabled="disabled"
                   onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="ride_date">Ride Date</label>
            <input type="date" class="form-control" id="ride_date" name="ride_date" value="{{ Request::get('ride_date') ?? date('Y-m-d') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

                     
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Driver ID</th>
                    <th scope="col">Pickup Location</th>
                    <th scope="col">Dropoff Location</th>
                    <th scope="col">Ride Date</th>
                    <th scope="col">Ride Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available Seats</th>
                    <th scope="col">Current Available Seats</th>
                    <th scope="col">Ride Note</th>
                    <th scope="col">Ride Status</th>
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
<td>{{ $rideShare['current_available_seats'] }}</td>
<td>{{ $rideShare['ride_note'] }}</td>
<td>{{ $rideShare['ride_status'] }}</td>
                        <!-- <td>
                            <a href="{{route('ride_shares.edit', $rideShare['id'])}}" class="btn btn-warning">Edit</a>
                            
                            
                        </td>
                        <td>
                            <form action="{{route('ride_shares.destroy',$rideShare['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td> -->
                        <td>
  <a href="{{ route('ride_requests.create', $rideShare->id) }}" class="btn btn-primary">Request</a>
 


</td>
<td>
  <a href="{{route('ride_shares.myShare', $rideShare['driver_id'])}}" class="btn btn-primary">is me</a>
 


</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection