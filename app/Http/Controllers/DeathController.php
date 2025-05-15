<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;


class DeathController extends Controller
{
    public function index()
    {
        $deaths = Death::latest()->paginate(10);
        return view('admin.death.index', compact('deaths'));
    }

    public function create()
    {
        return view('admin.death.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'deceased_name' => 'required',
            'residence' => 'required',
            'age' => 'required',
            'cause' => 'required',
            'death_time' => 'required',
            'place' => 'required',
            'burial_time' => 'required',
            'guardian' => 'required',
            'priest' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'rectory' => 'required',
        ]);

        $validated = $request->all();
        $validated['death_id'] = 'SanPascual-' . mt_rand(10000000, 99999999);

        Death::create($validated);

        return redirect()->route('deaths.index')
                         ->with('success', 'Death certificate created successfully.');
    }

    public function edit($id)
    {
        $death = Death::findOrFail($id);
        return view('admin.death.edit', compact('death'));
    }

    public function update(Request $request, $id)
    {
        $death = Death::findOrFail($id);

        $request->validate([
            'deceased_name' => 'required',
            'residence' => 'nullable',
            'age' => 'nullable',
            'cause' => 'nullable',
            'death_time' => 'nullable',
            'place' => 'nullable',
            'burial_time' => 'nullable',
            'guardian' => 'nullable',
            'priest' => 'nullable',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'rectory' => 'nullable',
        ]);

        $death->update($request->all());

        return redirect()->route('deaths.index')
                         ->with('success', 'Death certificate updated successfully.');
    }

    public function destroy($id)
    {
        Death::findOrFail($id)->delete();

        return redirect()->route('deaths.index')
                         ->with('success', 'Death certificate deleted successfully.');
    }
}
