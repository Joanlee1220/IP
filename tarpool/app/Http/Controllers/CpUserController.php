<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpUser;

class CpUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cp_users = CpUser::all();
        return view('userProfile\user_login', compact('cp_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userProfile\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cpuser = new CpUser();
        $cpuser->fname = $request->get('fname');
        $cpuser->lname = $request->get('lname');
        $cpuser->email = $request->get('email');
        $cpuser->password = $request->get('password');
        $cpuser->gender = $request->get('gender');
        $cpuser->phone_number = $request->get('phone_number');
        $cpuser->img = $request->get('img');
        $cpuser->status = $request->get('status');
        $cpuser->verification_status = $request->get('verification_status');
        /*$cpuser->is_vehicle_owner = $request->get('is_vehicle_owner');
        $cpuser->vehicle_model = $request->get('vehicle_model');
        $cpuser->vehicle_color = $request->get('vehicle_color');
        $cpuser->vehicle_plate = $request->get('vehicle_plate');
        $cpuser->verification_status = $request->get('verification_status');
        $cpuser->created_at = $request->get('created_at');
        $cpuser->updated_at = $request->get('updated_at');*/
        $cpuser->save();

        return redirect('cp_users')->with('success',"info added");
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
