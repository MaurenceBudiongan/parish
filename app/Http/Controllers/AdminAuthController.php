<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('authentication.adminform');
    }
   
    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'adminfullname' => 'required|string|max:255',
            'admin' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = new Admin();
        $admin->adminfullname = $request->adminfullname;
        $admin->admin = $request->admin;
        $admin->password = Hash::make($request->password);
        $admin->save();

        Auth::login($admin);

        return redirect()->back()->with('success', 'Request Submitted Successfully');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('authentication.adminform');
    }

// Handle login
public function login(Request $request)
{
    // Attempt to authenticate with the 'admin' field
    $credentials = $request->only('admin', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        // Redirect to the correct route after successful login
        return redirect()->route('admin.dashboard.dashboard');  // This matches the route name defined above
    }

    return back()->withErrors(['admin' => 'These credentials do not match our records.']);
}



    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('authentication.adminform');
    }
}
