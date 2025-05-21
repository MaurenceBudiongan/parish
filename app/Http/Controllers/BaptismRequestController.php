<?php
namespace App\Http\Controllers;

use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\DeathRequest;
use App\Models\MarriageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // ✅ Add this line
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

    public function show()
    {
        $confirmationrequests = ConfirmationRequest::all();
        $baptismrequests = BaptismRequest::all();
        $marriagerequests = MarriageRequest::all();
        $deathrequests = DeathRequest::all();

        return view('user.document_requests.index', compact('baptismrequests','confirmationrequests','marriagerequests','deathrequests'));
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
            // Store in 'public/id_proofs' folder, accessible via /storage/id_proofs
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        $data['baptismrequest_id'] = 'req-' . uniqid();
        BaptismRequest::create($data);

        return redirect()->back()->with('success', 'Baptism request submitted.');
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
            // Optionally delete old file if exists
            if ($baptism_request->idProof) {
                Storage::disk('public')->delete($baptism_request->idProof);
            }
            $data['idProof'] = $request->file('idProof')->store('id_proofs', 'public');
        }

        $baptism_request->update($data);

        return redirect()->back()->with('success', 'Request updated.');
    }

    public function destroy($id)
    {
        $baptism_request = BaptismRequest::findOrFail($id);
        if ($baptism_request->idProof) {
            Storage::disk('public')->delete($baptism_request->idProof);
        }
        $baptism_request->delete();

        return redirect()->back()->with('success', 'Request deleted.');
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
