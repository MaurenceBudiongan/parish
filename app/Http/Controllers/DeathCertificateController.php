<?php

namespace App\Http\Controllers;

use App\Models\DeathCertificate;
use Illuminate\Http\Request;

class DeathCertificateController extends Controller
{
    public function index()
    {
        $certificates = DeathCertificate::latest()->paginate(10);
        return view('admin.record.memberRecord.deathRecord', compact('certificates'));
    }

    public function create()
    {
        return view('admin.create_record.deathCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'sex' => 'required',
            'birth_date' => 'required|date',
            'age' => 'required',
            'birth_place' => 'required',
            'civil_status' => 'required',
            'address' => 'required',
            'death_date' => 'required|date',
            'place_of_death' => 'required',
            'cause_of_death' => 'required',
        ]);

        DeathCertificate::create($request->all());

        return redirect()->back()->with('success', 'Death record Added Successfully');
    }

    public function edit(DeathCertificate $deathCertificate)
    {
        return view('death.edit', compact('deathCertificate'));
    }

    public function update(Request $request, DeathCertificate $deathCertificate)
    {
        $request->validate([
            'full_name' => 'required',
            // ... repeat validations
        ]);

        $deathCertificate->update($request->all());

        return redirect()->route('death-certificates.index')
                         ->with('success', 'Death certificate updated successfully.');
    }

    public function destroy(DeathCertificate $deathCertificate)
    {
        $deathCertificate->delete();
        return back()->with('success', 'Death record deleted!');
    }
}
