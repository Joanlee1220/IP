<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideShare;
use App\Models\RideRequest;
use App\Models\CpUser;
use App\Exceptions\RideException;

class RideShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $ride_shares = RideShare::query();

        if ($request->has('pickup_location')) {
            $pickup_location = $request->input('pickup_location');
            $ride_shares->where('pickup_location', $pickup_location);
        }

        if ($request->has('dropoff_location')) {
            $dropoff_location = $request->input('dropoff_location');
            $ride_shares->where('dropoff_location', $dropoff_location);
        }

        if ($request->has('ride_date')) {
            $ride_date = $request->input('ride_date');
            $ride_shares->where('ride_date', $ride_date);
        }

        $ride_shares = $ride_shares->get();

        return view('ride_share\index', compact('ride_shares'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ride_share\create');
    }

    public function who()
    {
        return view('ride_share\who');
    }

    public function myShare(string $userId)
    {
        try {
            $ride_shares = RideShare::where('driver_id', $userId)->get();
        } catch(RideException $exception){
            return view('errors\no', ['error' => $exception->getMessage()]);
        }

        return view('ride_share\my_share', compact('ride_shares'));
    }

    public function requestForRide(string $rideId)
    {
        $rideRequests = RideRequest::where('requested_ride_id', $rideId)->get();
        return view('ride_share\request_list', compact('rideRequests'));

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

        return redirect('ride_shares')->with('success', "info added");
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
        $rideShare = rideShare::find($id);

        return view('ride_share\edit', compact('rideShare', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rideShare = rideShare::find($id);
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

        return redirect('ride_shares');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rideShare = rideShare::find($id);
        $rideShare->delete();
        return redirect('ride_shares')->with('success', "info destroy");
    }



    public function reply(string $id)
    {
        
        try {
            $rideRequest = RideRequest::findOrFail($id);
        } catch(RideException $exception){
            return view('ride_share\no', ['error' => $exception->getMessage()]);
        }


        $cpUser = CpUser::findOrFail($rideRequest->requested_user_id);

        return view('ride_share\reply_request', compact('cpUser', 'rideRequest', 'id'));
    }

    public function replyRequest(Request $request, string $id)
    {
        $rideRequest = RideRequest::findOrFail($id);
        $rideRequest->request_status = $request->get('request_status');
        $rideRequest->save();

        if ($request->get('request_status') == 'accepted') {
            $rideShare = RideShare::findOrFail($rideRequest->requested_ride_id);
            $rideShare->current_available_seats -= 1;
            $rideShare->save();
        }



        $rideRequests = RideRequest::where('requested_ride_id', $rideRequest->requested_ride_id)->get();
        return view('ride_share\request_list', compact('rideRequests'));
    }

    public function generateRideShareHistoryDetailXMLFile(string $driver_id)
{
    $rideShares = RideShare::where('driver_id', $driver_id)->get();

    $dom = new DOMDocument('1.0', 'UTF-8');
    $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xml/rideShareHistoryDetails/rideShareHistoryDetails.xsl"');
    $dom->appendChild($xslt);
    $dom->formatOutput = true;
    $root = $dom->createElement('rideShareHistoryDetail');

    //Ride Shares
    $rideSharesElement = $dom->createElement('rideShares');
    foreach ($rideShares as $rideShare) {
        $rideShareElement = $dom->createElement('rideShare');
        $rideShareElement->setAttribute('id', $rideShare->id);
        $driverId = $dom->createElement('driverId', $rideShare->driver_id);
        $rideShareElement->appendChild($driverId);
        $pickupLocation = $dom->createElement('pickupLocation', $rideShare->pickup_location);
        $rideShareElement->appendChild($pickupLocation);
        $dropoffLocation = $dom->createElement('dropoffLocation', $rideShare->dropoff_location);
        $rideShareElement->appendChild($dropoffLocation);
        $departureTime = $dom->createElement('departureTime', $rideShare->departure_time);
        $rideShareElement->appendChild($departureTime);
        $availableSeats = $dom->createElement('availableSeats', $rideShare->current_available_seats);
        $rideShareElement->appendChild($availableSeats);

        //Ride Requests
        $rideRequests = RideRequest::where('requested_ride_id', $rideShare->id)->get();
        $rideRequestsElement = $dom->createElement('rideRequests');
        foreach ($rideRequests as $rideRequest) {
            $rideRequestElement = $dom->createElement('rideRequest');
            $rideRequestElement->setAttribute('id', $rideRequest->id);
            $requesterName = $dom->createElement('requesterName', $rideRequest->requester_name);
            $rideRequestElement->appendChild($requesterName);
            $pickupLocation = $dom->createElement('pickupLocation', $rideRequest->pickup_location);
            $rideRequestElement->appendChild($pickupLocation);
            $dropoffLocation = $dom->createElement('dropoffLocation', $rideRequest->dropoff_location);
            $rideRequestElement->appendChild($dropoffLocation);
            $status = $dom->createElement('status', $rideRequest->request_status);
            $rideRequestElement->appendChild($status);
            $rideRequestsElement->appendChild($rideRequestElement);
        }
        $rideShareElement->appendChild($rideRequestsElement);

        $rideSharesElement->appendChild($rideShareElement);
    }
    $root->appendChild($rideSharesElement);

    $dom->appendChild($root);

    $filePath = "xml/rideShareHistoryDetails/rideShareHistoryDetails.xml";
    $dom->save($filePath);

    $xsl = new DOMDocument;
    $xsl->load('xml/rideShareHistoryDetails/rideShareHistoryDetails.xsl');

    $proc = new XsltProcessor();
    $proc->importStylesheet($xsl);

    return $proc->transformToXml($dom);
}



}