<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7fa;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    table {
        width: 80%;
        margin: 30px auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        padding: 12px 20px;
        text-align: left;
        border-bottom: 1px solid #f2f2f2;
    }

    table th {
        background-color: #007BFF;
        color: #ffffff;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .action {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    .action button {
        padding: 8px 15px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .action button.delete {
        background-color: #dc3545;
        color: #fff;
    }

    .action button.delete:hover {
        background-color: #c82333;
    }

    .action button.get-document {
        background-color: #28a745;
        color: #fff;
    }

    .action button.get-document:hover {
        background-color: #218838;
    }

    .action button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
</style>

<h2>My Document Requests</h2>

<table>
    <thead>
        <tr>
            <th>Reference Code</th>
            <th>Name</th>
            <th>Document Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
        <tr>
            <td>{{ $request->request_id }}</td>
            <td>{{ $request->firstname }} {{ $request->lastname }}</td>
            <td>{{ ucfirst($request->documenttype) }}</td>
            <td>{{ ucfirst($request->status) }}</td>
            <td>
                <div class="action">
                    <form action="{{ route('admin.document_requests.destroy', $request->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Delete</button>
                    </form>
                    @if($request->status == 'APPROVED')
                    <button class="get-document">Get Document</button>
                    @else
                    <button disabled>Not Approved</button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
