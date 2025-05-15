<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marriage;

class MarriageController extends Controller
{
    public function index()
    {
        $marriages = Marriage::latest()->paginate(10);
        return view('admin.marriage.index', compact('marriages'));
    }

    public function create()
    {
        return view('admin.marriage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'groom_name' => 'required',
            'groom_fathername' => 'required',
            'bride_name' => 'required',
            'bride_fathername' => 'required',
            'date' => 'required|date',
            'priest' => 'required',
            'first_witnessed' => 'nullable',
            'second_witnessed' => 'nullable',
            'third_witnessed' => 'nullable',
            'fourth_witnessed' => 'nullable',
            'fifth_witnessed' => 'nullable',
            'sixth_witnessed' => 'nullable',
            'seventh_witnessed' => 'nullable',
            'eighth_witnessed' => 'nullable',
            'place_issuance' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $validated = $request->all();
        $validated['marriage_id'] = 'SanPascual-' . mt_rand(10000000, 99999999);

        Marriage::create($validated);

        return redirect()->route('marriages.index')
                         ->with('success', 'Marriage record created successfully.');
    }

    public function edit($id)
    {
        $marriage = Marriage::findOrFail($id);
        return view('admin.marriage.edit', compact('marriage'));
    }

    public function update(Request $request, $id)
    {

        $marriage = Marriage::findOrFail($id);
 
        $request->validate([
            'groom_name' => 'required',
            'groom_fathername' => 'required',
            'bride_name' => 'required',
            'bride_fathername' => 'required',
            'date' => 'required|date',
            'priest' => 'required',
            'first_witnessed' => 'nullable',
            'second_witnessed' => 'nullable',
            'third_witnessed' => 'nullable',
            'fourth_witnessed' => 'nullable',
            'fifth_witnessed' => 'nullable',
            'sixth_witnessed' => 'nullable',
            'seventh_witnessed' => 'nullable',
            'eighth_witnessed' => 'nullable',             
            'place_issuance' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $marriage->update($request->all());

        return redirect()->route('marriages.index')
                         ->with('success', 'Marriage record updated successfully.');
    }

    public function destroy($id)
    {
        Marriage::findOrFail($id)->delete();

        return redirect()->route('marriages.index')
                         ->with('success', 'Marriage record deleted successfully.');
    }
}
