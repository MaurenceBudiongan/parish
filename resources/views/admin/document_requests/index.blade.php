
<style>
@import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
:root {
    --c-gray-900: #000000;
    --c-gray-800: #1f1f1f;
    --c-gray-700: #2e2e2e;
    --c-gray-600: #313131;
    --c-gray-500: #969593;
    --c-gray-400: #a6a6a6;
    --c-gray-300: #bdbbb7;
    --c-gray-200: #f1f1f1;
    --c-gray-100: #ffffff;
    --c-green-500: #45ffbc;
    --c-olive-500: #e3ffa8;
    --c-blue-500: #1a59bf;
    --c-white: var(--c-gray-100);
    --c-text-primary: var(--c-gray-100);
    --c-text-secondary: var(--c-gray-200);
    --c-text-tertiary: var(--c-gray-500);
}
    h2 {
        text-align: center;
        margin-top: 20px;
        color: #333;
    }

    table {
        font-family: "Be Vietnam Pro", sans-serif;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #f2f2f2;
    }
    td{
        font-size: .6rem;
        color: #000000;
    }
    th {
        background-color: var(--c-green-500);
        color: var(--c-gray-900);
        font-weight: 400;
        font-size: .8rem;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action {
        display: flex;
        gap: 1rem;
    }

    .action form {
        margin: 0;
    }

    .action button {
        padding: 5px 12px;
        font-size: .6rem;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .action button.approve {
        background-color: #28a745;
        color: #fff;
    }

    .action button.approve:hover {
        background-color: #218838;
    }

    .action button.reject {
        background-color: #dc3545;
        color: #fff;
    }

    .action button.reject:hover {
        background-color: #c82333;
    }

    .action button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
    td span {
        color: #777;
    }

    td[colspan="9"] {
        text-align: center;
    }
</style>
<table>
    <thead>
        <tr>
            <th>Request ID</th>
            <th>Full Name</th>
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
            <td>{{ $request->request_id }}</td>
            <td>{{ $request->firstname }} {{ $request->lastname }}</td>
            <td>{{ $request->streetaddress }}, {{ $request->city }}, {{ $request->state }} {{ $request->zip }}</td>
            <td>{{ $request->email }}</td>
            <td>{{ $request->phonenumber }}</td>
            <td>{{ ucfirst($request->documenttype) }}</td>
            <td>{{ $request->reason }}</td>
            <td>{{ ucfirst($request->status) }}</td>
            <td>
                <div class="action">
                    @if($request->status == 'PENDING')
                    <form action="{{ route('admin.document_requests.approve', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="approve" onclick="return confirm('Approve this request?')" >Approve</button>
                    </form>

                    <form action="{{ route('admin.document_requests.reject', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="reject" onclick="return confirm('Reject this request?')" >Reject</button>
                    </form>
                    @else
                    <span>No Action</span>
                    @endif
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No Document Request Found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
