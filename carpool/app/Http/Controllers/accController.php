<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\acc;

class accController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accs = acc::all();
        return view('acc\index', compact('accs'));
    }
    
    public function create()
    {
        return view('acc\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new acc();
        $user->full_name = $request->input('full_name');
        $user->email_address = $request->input('email_address');
        $user->hashed_password = bcrypt($request->input('password'));
        $user->gender = $request->input('gender');
        $user->phone_number = $request->input('phone_number');
        $user->profile_picture_url = $request->input('profile_picture_url');
        $user->is_vehicle_owner = $request->input('is_vehicle_owner');
        $user->vehicle_model = $request->input('vehicle_model');
        $user->vehicle_color = $request->input('vehicle_color');
        $user->vehicle_plate = $request->input('vehicle_plate');
        $user->save();
    
        return redirect('accs')->with('success', 'User added successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
