<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideShare;

class RideShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ride_shares = RideShare::all();
        return view('ride_share\index', compact('ride_shares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ride_share\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rideShare = new RideShare();
        $rideShare->driver_id = $request->get('driver_id');
        $rideShare->pickup_location = $request->get('pickup_location');
        $rideShare->dropoff_location = $request->get('dropoff_location');
        $rideShare->ride_date = $request->get('ride_date');
        $rideShare->ride_time = $request->get('ride_time');
        $rideShare->price = $request->get('price');
        $rideShare->available_seats = $request->get('available_seats');
        $rideShare->current_available_seats = $request->get('current_available_seats');
        $rideShare->ride_note = $request->get('ride_note');
        $rideShare->ride_status = $request->get('ride_status');
        $rideShare->save();

        return redirect('ride_shares')->with('success',"info added");
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
    public function edit(string $id	)
    {
        $rideShare = rideShare::find($id	);
  
        return view('ride_share\edit', compact('rideShare', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id	)
    {
        $rideShare = rideShare::find($id	);
        $rideShare->driver_id = $request->get('driver_id');
        $rideShare->pickup_location = $request->get('pickup_location');
        $rideShare->dropoff_location = $request->get('dropoff_location');
        $rideShare->ride_date = $request->get('ride_date');
        $rideShare->ride_time = $request->get('ride_time');
        $rideShare->price = $request->get('price');
        $rideShare->available_seats = $request->get('available_seats');
        $rideShare->ride_note = $request->get('ride_note');
        $rideShare->ride_status = $request->get('ride_status');
        $rideShare->save();
      
      return redirect('ride_shares');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rideShare = rideShare::find($id);
        $rideShare->delete();
         return redirect('ride_shares')->with('success',"info destroy");
    }
}