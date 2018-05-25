<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }


    public function login(Request $request)
    {
         // Validation the form data
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to login the admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            // if success redirect to their intended location
            return redirect()->intended(route('admin'));
        }
        // if unsuccessful, then redirect back to the login form with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('adminLogout');
    }
}
