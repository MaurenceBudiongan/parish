<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
class AdminAuthController extends Controller
{
    // Show registration form
    public function showRegistrationForm(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Access denied');
        }
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
    $credentials = $request->only('admin', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        $admin = Auth::guard('admin')->user();
        $donations = Donation::all();

        return redirect()->route('admin.showdashboard')
                         ->with([
                             'admin' => $admin,
                             'donations' => $donations
                         ]);
    }

    return redirect()->back()->withErrors([
        'login' => 'Invalid credentials.',
    ]);
}



    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('gets_started');
    }
 public function showdashboard(Request $request)
{
    $admin = Auth::guard('admin')->user(); // fetch logged-in admin
    $donations = Donation::all(); // get donation data from database

    return view('admin.dashboard.dashboard', compact('admin', 'donations'));
}
    
} 
