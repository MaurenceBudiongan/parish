<?php
namespace App\Http\Controllers;

use App\Models\DeathRequest;
use Illuminate\Http\Request;

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
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
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
            $data['idProof'] = $request->file('idProof')->store('id_proofs');
        }
         $data['deathrequest_id'] = 'req-' . uniqid();
        $death_request->update($data);
        return redirect()->route('death_requests.index')->with('success', 'Request updated.');
    }

public function destroy($id)
{
    $baptism_request = DeathRequest::findOrFail($id);
    $baptism_request->delete();
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
