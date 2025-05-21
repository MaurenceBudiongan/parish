<?php

namespace App\Http\Controllers;

use App\Models\MarriageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarriageRequestController extends Controller
{
    public function index()
    {
        $requests = MarriageRequest::all();
        return view('marriage_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('marriage_requests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'spouse1' => 'required',
            'spouse2' => 'required',
            'marriageDate' => 'required|date',
            'marriagePlace' => 'required',
            'officiant' => 'nullable',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        $data['marriagerequest_id'] = 'req-' . uniqid();
        MarriageRequest::create($data);

        return redirect()->back()->with('success', 'Marriage request submitted.');
    }

    public function edit(MarriageRequest $marriage_request)
    {
        return view('marriage_requests.edit', compact('marriage_request'));
    }

    public function update(Request $request, MarriageRequest $marriage_request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'spouse1' => 'required',
            'spouse2' => 'required',
            'marriageDate' => 'required|date',
            'marriagePlace' => 'required',
            'officiant' => 'nullable',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            // Delete old file if exists
            if ($marriage_request->idProof) {
                Storage::disk('public')->delete($marriage_request->idProof);
            }
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        // Keep existing marriagerequest_id
        $data['marriagerequest_id'] = $marriage_request->marriagerequest_id;

        $marriage_request->update($data);

        return redirect()->back()->with('success', 'Request updated.');
    }

    public function destroy($id)
    {
        $marriage_request = MarriageRequest::findOrFail($id);

        // Delete idProof file from storage
        if ($marriage_request->idProof) {
            Storage::disk('public')->delete($marriage_request->idProof);
        }

        $marriage_request->delete();

        return redirect()->back()->with('success', 'Request deleted.');
    }

    public function approve($id)
    {
        $request = MarriageRequest::findOrFail($id);
        $request->update(['status' => 'APPROVED']);

        return back()->with('success', 'Request Approved');
    }

    public function reject($id)
    {
        $request = MarriageRequest::findOrFail($id);
        $request->update(['status' => 'REJECTED']);

        return back()->with('success', 'Request Rejected');
    }
}
