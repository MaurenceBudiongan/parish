<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.admin');
    }

    public function logins(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|string',
        ]);

        if ($request->admin_id === 'SANPASCUAL_2025') {
       
            return redirect()->route('authentication.adminform');
        }
        return back()->withErrors(['admin_id' => 'Invalid Admin ID.']);
    }
}

