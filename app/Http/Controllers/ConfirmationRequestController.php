<?php
namespace App\Http\Controllers;

use App\Models\ConfirmationRequest;
use Illuminate\Http\Request;

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
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
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
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
        }

        $confirmation_request->update($data);
        return redirect()->route('confirmation_requests.index')->with('success', 'Request updated.');
    }

public function destroy($id)
{
    $baptism_request = ConfirmationRequest::findOrFail($id);
    $baptism_request->delete();
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
