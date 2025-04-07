<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminInfo;

class AdminInfoController extends Controller
{
    public function create()
    {
        return view('admin.create'); // Show form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_info,email',
            'password' => 'required|string|min:8',
        ]);

        AdminInfo::create($validated);

        session(['form_submitted' => true]); // Set session to allow dashboard access

        return redirect()->route('admin.dashboar'); // Now allow access to dashboard
    }
}
