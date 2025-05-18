<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7fa;
    }

    .RequestStatus {
        height: 30rem;
        overflow-y: scroll;
    }
    .status{
        margin-bottom: 5rem;
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

    table th,
    table td {
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

    .status .action {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    .status .action button {
        padding: 8px 15px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .status .action button.delete {
        background: linear-gradient(to right, #4f46e5, #22d3ee);
        color: #fff;
    }

    .status .action button.delete:hover {
        background: linear-gradient(to right, #4338ca, #06b6d4);
    }

    .status .action button.get-document {
        background-color: #28a745;
        color: #fff;
    }

    .status .action button.get-document:hover {
        transform: translateY(-2px);
        background-color: #218838;
    }

    .status .action button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
    .pending{
        color: white;
    }
</style>

<div class="RequestStatus">
<div class="status">

    <h2>My Baptism Certificate Requests</h2>

    <table>
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Child Name</th>
                <th>Request Time</th>
                <th> Relationship To Baptized</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baptismrequests as $request)
                <tr>
                    <td>{{ $request->baptismrequest_id }}</td>
                    <td>{{ $request->childName }}</td>
                    <td>{{ ucfirst($request->created_at) }}</td>
                    <td>{{ ucfirst($request->relationship) }}</td>
                       <td>{{  $request->status }}</td>
                    <td>
                        <div class="action">
                            <form action="{{ route('baptismrequest.destroy', $request->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"  onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                            </form>
                            @if ($request->status == 'APPROVED')
                                <button class="get-document">Get Document</button>
                            @else
                                <button class="pending" disabled>Pending</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="status">

    <h2>My Confirmation Certifcate Requests</h2>

    <table>
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Confirmed Person</th>
                <th>Request Time</th>
                <th> Relationship To Confirmed</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($confirmationrequests as $request)
                <tr>
                    <td>{{ $request->confirmationrequest_id }}</td>
                    <td>{{ $request->confirmedName }}</td>
                    <td>{{ ucfirst($request->created_at) }}</td>
                    <td>{{ ucfirst($request->relationship) }}</td>
                       <td>{{  $request->status }}</td>
                    <td>
                        <div class="action">
                            <form action="{{ route('confirmationrequest.destroy', $request) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"  onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                            </form>
                            @if ($request->status == 'APPROVED')
                                <button class="get-document">Get Document</button>
                            @else
                                <button class="pending" disabled>Pending</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




<div class="status">

    <h2>My Marriage Certificate Requests</h2>

    <table>
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Spouse Name</th>
                <th>Request Time</th>
                <th> Relationship To Baptized</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marriagerequests as $request)
                <tr>
                    <td>{{ $request->marriagerequest_id }}</td>
                    <td>{{ $request->spouse1  }}  {{ $request->spouse2  }}</td>
                    <td>{{ ucfirst($request->created_at) }}</td>
                    <td>{{ ucfirst($request->relationship) }}</td>
                       <td>{{  $request->status }}</td>
                    <td>
                        <div class="action">
                            <form action="{{ route('marriagerequest.destroy', $request->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"  onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                            </form>
                            @if ($request->status == 'APPROVED')
                                <button class="get-document">Get Document</button>
                            @else
                                <button class="pending" disabled>Pending</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>






<div class="status">

    <h2>My Death Certificate Requests</h2>

    <table>
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Deceased Name</th>
                <th>Request Time</th>
                <th> Relationship To Baptized</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deathrequests as $request)
                <tr>
                    <td>{{ $request->deathrequest_id }}</td>
                    <td>{{ $request->fullName }}</td>
                    <td>{{ ucfirst($request->created_at) }}</td>
                    <td>{{ ucfirst($request->relationship) }}</td>
                       <td>{{  $request->status }}</td>
                    <td>
                        <div class="action">
                            <form action="{{ route('deathrequest.destroy', $request->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"  onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                            </form>
                            @if ($request->status == 'APPROVED')
                                <button class="get-document">Get Document</button>
                            @else
                                <button class="pending" disabled>Pending</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>