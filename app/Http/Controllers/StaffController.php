<?php
// app/Http/Controllers/StaffController.php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }
    public function loginForm()
    {
        return view('admin.staff.login'); // create this view below
    }
    public function login(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'name' => 'required',
        ]);

        $staff = Staff::where('staff_id', $request->staff_id)->first();

        if ($staff) {
            $inputName = strtolower(trim($request->name));
            $expectedName = strtolower(trim("{$staff->last_name},{$staff->first_name}"));

            if ($inputName === $expectedName) {
                // Store in session manually
                session(['staff_user' => $staff]);
                return redirect()->route('staff.index');
            }
        }

        return back()->with('error', 'Invalid Staff ID or Name.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'nullable',
            'position' => 'required',
            'department' => 'required',
            'address' => 'required|string', 
            'status' => 'required|in:active,inactive',
        ]);

            $validated = $request->all();
            $validated['staff_id'] = 'SanPascual-' . mt_rand(10000000, 99999999);
            Staff::create($validated); 

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
              'staff_id' => 'required|unique:staff,staff_id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'phone' => 'nullable',
            'position' => 'required',
             'department' => 'required',
            'address' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
