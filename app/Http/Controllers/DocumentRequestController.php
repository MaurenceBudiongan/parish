<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentRequestController extends Controller
{
 // In your DocumentRequestController.php
public function index()
{
    // Retrieve all document requests (or filter as needed)
    $documentRequests = DocumentRequest::all(); // Or use pagination, e.g., ->paginate(10)

    $counts = [
        'baptismal' => DocumentRequest::where('documenttype', 'baptismal')->count(),
        'confirmation' => DocumentRequest::where('documenttype', 'confirmation')->count(),
        'marriage' => DocumentRequest::where('documenttype', 'marriagecertificate')->count(),
    ];

    return view('admin.document_requests.index', compact('documentRequests', 'counts'));
}

public function getDocumentRequestCounts()
{
    $counts = [
        'baptismal' => DocumentRequest::where('documenttype', 'baptismal')->count(),
        'confirmation' => DocumentRequest::where('documenttype', 'confirmation')->count(),
        'marriage' => DocumentRequest::where('documenttype', 'marriagecertificate')->count(),
    ];

    return response()->json($counts);
}

    public function userIndex()
    {
        $requests = DocumentRequest::all();
        return view('user.document_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('user.document_requests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dateofbirth' => 'required',
            'streetaddress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'documenttype' => 'required',
            'reason' => 'required',
        ]);
    
        $validated['request_id'] = 'req-' . uniqid();

    
        DocumentRequest::create($validated);
    
        return redirect()->back()->with('success', 'Request Submitted Successfully');
    }
    
    
    public function edit(DocumentRequest $documentRequest)
    {
        return view('admin.document_requests.edit', compact('documentRequest'));
    }

    public function update(Request $request, DocumentRequest $documentRequest)
    {
        $documentRequest->update($request->all());
        return back()->with('success', 'Document request updated.');
    }

    public function destroy(DocumentRequest $documentRequest)
    {
        $documentRequest->delete();
        return back()->with('success', 'Document request deleted.');
    }

    public function approve($id)
{
    $request = DocumentRequest::findOrFail($id);
    $request->update(['status' => 'APPROVED']);
    
    return redirect()->route('admin.document_requests.index')->with('success', 'Request Approved');
}

public function reject($id)
{
    $request = DocumentRequest::findOrFail($id);
    $request->update(['status' => 'REJECTED']);
    
    return redirect()->route('admin.document_requests.index')->with('success', 'Request Rejected');
}

}

