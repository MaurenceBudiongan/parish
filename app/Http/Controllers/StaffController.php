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
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }
    public function loginForm()
    {
        return view('staff.login'); // create this view below
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
                 return view('staff.dashboard', ['staff' => $staff]);
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
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅
    ]);

    $validated = $request->all();
    $validated['staff_id'] = uniqid();

    if ($request->hasFile('photo')) {
        $filename = time().'_'.$request->photo->getClientOriginalName();
        $path = $request->photo->storeAs('staff_photos', $filename, 'public');
        $validated['photo'] = $path;
    }

    Staff::create($validated);

    return redirect()->back()->with('success', 'Staff created successfully.');
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
        'staff_id' => 'required|unique:staff,staff_id,' . $staff->id,
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:staff,email,' . $staff->id,
        'phone' => 'nullable',
        'position' => 'required',
        'department' => 'required',
        'address' => 'required',
        'status' => 'required|in:active,inactive',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅
    ]);

    $data = $request->all();

    if ($request->hasFile('photo')) {
        $filename = time().'_'.$request->photo->getClientOriginalName();
        $path = $request->photo->storeAs('staff_photos', $filename, 'public');
        $data['photo'] = $path;
    }

    $staff->update($data);

    return redirect()->back()->with('success', 'Staff updated successfully.');
}

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully.');
    }
}
