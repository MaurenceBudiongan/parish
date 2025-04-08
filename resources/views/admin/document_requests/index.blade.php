{{-- admin.document_requests.index.blade.php --}}
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Document Type</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($documentRequests as $request)
        <tr>
            <td>{{ $request->firstname }} {{ $request->lastname }}</td>
            <td>{{ $request->dateofbirth }}</td>
            <td>{{ $request->streetaddress }}, {{ $request->city }}, {{ $request->state }} {{ $request->zip }}</td>
            <td>{{ $request->email }}</td>
            <td>{{ $request->phonenumber }}</td>
            <td>{{ ucfirst($request->documenttype) }}</td>
            <td>{{ $request->reason }}</td>
            <td>{{ $request->status }}</td>
            <td>
                @if($request->status == 'PENDING')
                    <form action="{{ route('admin.document_requests.approve', $request->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit">Approve</button>
                    </form>

                    <form action="{{ route('admin.document_requests.reject', $request->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit">Reject</button>
                    </form>
                @else
                    <span>No Action</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align: center;">No Document Request Found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
