<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideRequest;
use App\Models\RideShare;

class RideRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rideRequests = RideRequest::all();
        return view('ride_request\index', compact('rideRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create($request_id)
    // {
    
    //     $rideShare = rideShare::find($request_id);

    //     return view('ride_request\create', compact('rideShare'));
    // }

   public function create($id)
{
    $rideShare = RideShare::findOrFail($id);
    return view('ride_request.create', compact('rideShare'));
}
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rideShare = RideShare::findOrFail($request->get('requested_ride_id'));

        $rideRequest = new RideRequest();
        $rideRequest->requested_user_id = $request->get('requested_user_id');
        $rideRequest->requested_ride_id = $request->get('requested_ride_id');
        $rideRequest->request_status = 'pending';
        $rideRequest->save();
        $rideShare->current_available_seats -= 1;
        $rideShare->save();

        return redirect('ride_requests')->with('success', 'Ride request added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rideRequest = RideRequest::find($id);
        return view('ride_request/edit', compact('rideRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rideRequest = RideRequest::find($id);
        $rideRequest->request_status = $request->get('request_status');
        $rideRequest->save();

        return redirect('ride_requests')->with('success', 'Ride request updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rideRequest = RideRequest::find($id);
        $rideRequest->delete();
        return redirect('ride_requests')->with('success', 'Ride request deleted');
    }
    public function acceptedRideRide(string $id)
    {
        $rideRequest = RideRequest::findOrFail($id);
    $rideRequest->request_status = 'accepted';
    $rideRequest->save();

    $rideRequests = RideRequest::findOrFail($rideRequest->id);
    return view('ride_request\request_list', compact('rideRequests'));

    }

    public function who()
    {
        return view('ride_request\who');
    }

    public function myRequest(string $userId)
    {
        $rideRequests = RideRequest::where('requested_user_id', $userId)->get();

                return view('ride_request\my_request', compact('rideRequests'));
    }
    


}



