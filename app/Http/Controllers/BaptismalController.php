<?php

namespace App\Http\Controllers;

use App\Models\Baptismal;
use Illuminate\Http\Request;

class BaptismalController extends Controller
{
       public function index()       
    {
        $baptismals = Baptismal::all();
        return view('admin.baptismal.index', compact('baptismals'));
    }

    public function create()
    { 
    
        return view('admin.baptismal.create');
    }
    public function store(Request $request)
    {
     
        $request->validate([
            'child_name' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'place' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'parent_residence' => 'required|string|max:255',
            'date_baptism' => 'required|date',
            'minister' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'purpose' => 'required',
        ]);

            $validated = $request->all();
            $validated['baptismal_id'] = 'SanPascual-' . mt_rand(10000000, 99999999);
            Baptismal::create($validated); 

        return redirect()->route('baptismals.index')->with('success', 'Baptismal Record created successfully.');
    }

    public function show(Baptismal $baptismal)
    {
        return view('admin.baptismal.show', compact('baptismal'));
    }

public function edit(Baptismal $baptismal)
{
    return view('admin.baptismal.edit', compact('baptismal'));
}

    public function update(Request $request, Baptismal $baptismal)
    {
        $request->validate([
        'child_name' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'place' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'parent_residence' => 'required|string|max:255',
            'date_baptism' => 'required|date',
            'minister' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'purpose' => 'required|string',
        ]);

        $baptismal->update($request->all());

        return redirect()->route('admin.baptismals.index')->with('success', 'Baptismal updated successfully.');
    }

    public function destroy(Baptismal $baptismal)
    {
        $baptismal->delete();

        return redirect()->route('admin.baptismal.index')->with('success', 'Staff deleted successfully.');
    }
}