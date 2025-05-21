<?php

namespace App\Http\Controllers;

use App\Models\ConfirmationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfirmationRequestController extends Controller
{
    public function index()
    {
        $confirmationrequests = ConfirmationRequest::all();
        return view('admin.document_requests.index', compact('confirmationrequests'));
    }

    public function create()
    {
        return view('confirmation_requests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'confirmedName' => 'required',
            'dob' => 'required|date',
            'confirmationDate' => 'required',
            'confirmationPlace' => 'required',
            'parentsNames' => 'nullable',
            'sponsorName' => 'nullable',
            'reason' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        $data['confirmationrequest_id'] = 'req-' . uniqid();

        ConfirmationRequest::create($data);

        return redirect()->route('confirmation_requests.index')->with('success', 'Confirmation request submitted.');
    }

    public function edit(ConfirmationRequest $confirmation_request)
    {
        return view('confirmation_requests.edit', compact('confirmation_request'));
    }

    public function update(Request $request, ConfirmationRequest $confirmation_request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'confirmedName' => 'required',
            'dob' => 'required|date',
            'confirmationDate' => 'required',
            'confirmationPlace' => 'required',
            'parentsNames' => 'nullable',
            'sponsorName' => 'nullable',
            'reason' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            // Delete old file if it exists
            if ($confirmation_request->idProof) {
                Storage::disk('public')->delete($confirmation_request->idProof);
            }
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        // Preserve confirmationrequest_id
        $data['confirmationrequest_id'] = $confirmation_request->confirmationrequest_id;

        $confirmation_request->update($data);

        return redirect()->route('confirmation_requests.index')->with('success', 'Request updated.');
    }

    public function destroy($id)
    {
        $confirmation_request = ConfirmationRequest::findOrFail($id);

        // Delete idProof from storage if exists
        if ($confirmation_request->idProof) {
            Storage::disk('public')->delete($confirmation_request->idProof);
        }

        $confirmation_request->delete();

        return redirect()->back()->with('success', 'Request deleted.');
    }

    public function approve($id)
    {
        $request = ConfirmationRequest::findOrFail($id);
        $request->update(['status' => 'APPROVED']);

        return back()->with('success', 'Request Approved');
    }

    public function reject($id)
    {
        $request = ConfirmationRequest::findOrFail($id);
        $request->update(['status' => 'REJECTED']);

        return back()->with('success', 'Request Rejected');
    }
}
