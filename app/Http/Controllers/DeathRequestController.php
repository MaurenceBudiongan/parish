<?php

namespace App\Http\Controllers;

use App\Models\DeathRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeathRequestController extends Controller
{
    public function index()
    {
        $requests = DeathRequest::all();
        return view('death_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('death_requests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'fullName' => 'required',
            'deathDate' => 'required',
            'deathPlace' => 'required',
            'dobOrAge' => 'nullable',
            'parentsNames' => 'nullable',
            'spouseName' => 'nullable',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        $data['deathrequest_id'] = 'req-' . uniqid();

        DeathRequest::create($data);

        return redirect()->route('death_requests.index')->with('success', 'Death request submitted.');
    }

    public function edit(DeathRequest $death_request)
    {
        return view('death_requests.edit', compact('death_request'));
    }

    public function update(Request $request, DeathRequest $death_request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'fullName' => 'required',
            'deathDate' => 'required',
            'deathPlace' => 'required',
            'dobOrAge' => 'nullable',
            'parentsNames' => 'nullable',
            'spouseName' => 'nullable',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            // Delete old file if exists
            if ($death_request->idProof) {
                Storage::disk('public')->delete($death_request->idProof);
            }

            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        // Keep existing deathrequest_id
        $data['deathrequest_id'] = $death_request->deathrequest_id;

        $death_request->update($data);

        return redirect()->route('death_requests.index')->with('success', 'Request updated.');
    }

    public function destroy($id)
    {
        $death_request = DeathRequest::findOrFail($id);

        if ($death_request->idProof) {
            Storage::disk('public')->delete($death_request->idProof);
        }

        $death_request->delete();

        return redirect()->back()->with('success', 'Request deleted.');
    }

    public function approve($id)
    {
        $request = DeathRequest::findOrFail($id);
        $request->update(['status' => 'APPROVED']);

        return back()->with('success', 'Request Approved');
    }

    public function reject($id)
    {
        $request = DeathRequest::findOrFail($id);
        $request->update(['status' => 'REJECTED']);

        return back()->with('success', 'Request Rejected');
    }
}
