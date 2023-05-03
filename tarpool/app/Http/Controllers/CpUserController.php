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
<<<<<<< HEAD
=======
    }

    /*public function userlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // The user is authenticated, so show the user profile
            return view('userprofile');
        } else {
            // The user is not authenticated, so redirect to the login page
            return redirect('/login')->with('error', 'Invalid login credentials');
        }
    }*/

    public function userlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->route('userprofile');
        } else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
>>>>>>> 6db7b8ceb249e8bc0c6c4656313409d6b54159d7
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userProfile\createUser');
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
        $cpuser = cpuser::find($id);
        return view('userProfile\editUser', compact('cpuser', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cpuser = cpuser::find($id);
        $cpuser->fname = $request->get('fname');
        $cpuser->lname = $request->get('lname');
        $cpuser->email = $request->get('email');
        $cpuser->password = $request->get('password');
        $cpuser->gender = $request->get('gender');
        $cpuser->phone_number = $request->get('phone_number');
        $cpuser->img = $request->get('img');
        $cpuser->status = $request->get('status');
        $cpuser->verification_status = $request->get('verification_status');
        $cpuser->save();
      
<<<<<<< HEAD
        return redirect('cp_users');
=======
      return redirect('cp_users');
>>>>>>> 6db7b8ceb249e8bc0c6c4656313409d6b54159d7
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cpuser = cpuser::find($id);
        $cpuser->delete();
        return redirect('cp_users')->with('success',"info destroy");
    }
}
