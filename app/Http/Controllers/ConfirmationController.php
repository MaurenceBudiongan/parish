<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmation;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirmations = Confirmation::latest()->paginate(10);
        return view('admin.confirmation.index', compact('confirmations'));
    }

    public function create()
    {
        return view('admin.confirmation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'excellency' => 'required',
            'parish_name' => 'required',
            'first_sponsor' => 'required',
            'second_sponsor' => 'nullable',
            'purpose' => 'required',
        ]);
             $validated = $request->all();
            $validated['confirmation_id'] = 'SanPascual-' . mt_rand(10000000, 99999999);
            Confirmation::create($validated); 

             return redirect()->route('confirmations.index')
                         ->with('success', 'Confirmation record created successfully.');
    }

    public function edit($id)
    {
        $confirmation = Confirmation::findOrFail($id);
        return view('admin.confirmation.edit', compact('confirmation'));
    }

    public function update(Request $request, $id)
    {
        $confirmation = Confirmation::findOrFail($id);

        $request->validate([
            'child_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'excellency' => 'required',
            'parish_name' => 'required',
            'first_sponsor' => 'required',
            'second_sponsor' => 'nullable',
            'purpose' => 'required',
        ]);

        $confirmation->update($request->all());

        return redirect()->route('confirmations.index')
                         ->with('success', 'Confirmation record updated successfully.');
    }

    public function destroy($id)
    {
        Confirmation::findOrFail($id)->delete();

        return redirect()->route('confirmations.index')
                         ->with('success', 'Confirmation record deleted successfully.');
    }
}
