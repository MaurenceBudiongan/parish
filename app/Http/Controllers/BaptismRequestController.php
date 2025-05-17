<?php
namespace App\Http\Controllers;

use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\DeathRequest;
use App\Models\MarriageRequest;
use Illuminate\Http\Request;

class BaptismRequestController extends Controller
{
    public function index()
    {    
    
        $confirmationrequests = ConfirmationRequest::all();
        $baptismrequests = BaptismRequest::all();
        $marriagerequests = MarriageRequest::all();
        $deathrequests = DeathRequest::all();
        return view('admin.document_requests.index', compact('baptismrequests','confirmationrequests','marriagerequests','deathrequests'));
    }

    public function create()
    {
        return view('admin.document_requests.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'childName' => 'required',
            'dob' => 'required|date',
            'baptismDate' => 'required',
            'baptismPlace' => 'required',
            'parentsNames' => 'required',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);

        if ($request->hasFile('idProof')) {
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
        }
        $data['baptismrequest_id'] = 'req-' . uniqid();
        BaptismRequest::create($data);
        return redirect()->route('baptism_requests.index')->with('success', 'Baptism request submitted.');
    }

    public function edit(BaptismRequest $baptism_request)
    {
        return view('baptism_requests.edit', compact('baptism_request'));
    }

    public function update(Request $request, BaptismRequest $baptism_request)
    {
        $data = $request->validate([
            'requester' => 'required',
            'childName' => 'required',
            'dob' => 'required|date',
            'baptismDate' => 'required',
            'baptismPlace' => 'required',
            'parentsNames' => 'required',
            'purpose' => 'required',
            'contact' => 'required',
            'relationship' => 'nullable',
            'idProof' => 'nullable|file',
        ]);
    
        if ($request->hasFile('idProof')) {
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
        }

        $baptism_request->update($data);
        return redirect()->route('baptism_requests.index')->with('success', 'Request updated.');
    }

    public function destroy(BaptismRequest $baptism_request)
    {
        $baptism_request->delete();
        return redirect()->route('baptism_requests.index')->with('success', 'Request deleted.');
    }

    


    public function approve($id)
{
    $request = BaptismRequest::findOrFail($id);
    $request->update(['status' => 'APPROVED']);
    
    return back()->with('success', 'Request Approved');
}

public function reject($id)
{
    $request = BaptismRequest::findOrFail($id);
    $request->update(['status' => 'REJECTED']);
    
    return back()->with('success', 'Request Rejected');
}

}
