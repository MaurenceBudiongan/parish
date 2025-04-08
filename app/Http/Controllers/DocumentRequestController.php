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

    // Pass the variable to the view
    return view('admin.document_requests.index', compact('documentRequests'));
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
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dateofbirth' => 'required',
            'streetaddress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'documenttype' => 'required',
            'reason' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['reference_code'] = 'REF-' . strtoupper(Str::random(10));

        DocumentRequest::create($requestData);

        return redirect()->route('user.document_requests.index')->with('success', 'Document request submitted.');
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

    public function approve(DocumentRequest $documentRequest)
    {
        $documentRequest->update(['status' => 'APPROVED']);
        return back()->with('success', 'Request Approved.');
    }

    public function reject(DocumentRequest $documentRequest)
    {
        $documentRequest->update(['status' => 'REJECTED']);
        return back()->with('success', 'Request Rejected.');
    }
}

