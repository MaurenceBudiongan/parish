<?php
namespace App\Http\Controllers;

use App\Models\BaptismRequest;
use Illuminate\Http\Request;

class BaptismRequestController extends Controller
{
    public function index()
    {
        $requests = BaptismRequest::all();
        return view('baptism_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('baptism_requests.create');
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
}
