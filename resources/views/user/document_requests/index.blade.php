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
                        <td>{{ $request->status }}</td>
                        <td>
                            <div class="action">
                                <form action="{{ route('baptismrequest.destroy', $request->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"
                                        onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                                </form>
                                @if ($request->status == 'APPROVED' && $request->certificate_path)
                                    <a href="{{ route('document.get', ['type' => 'baptismal', 'id' => $request->baptismrequest_id]) }}"
                                        class="get-document">
                                        <button type="button" class="get-document">Get Document</button>
                                    </a>
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
                        <td>{{ $request->status }}</td>
                        <td>
                            <div class="action">
                                <form action="{{ route('confirmationrequest.destroy', $request) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"
                                        onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                                </form>
                                @if ($request->status == 'APPROVED')
                                    <form
                                        action="{{ route('document.get', ['type' => 'confirmation', 'id' => $request->confirmationrequest_id]) }}"
                                        method="GET" style="display:inline;">
                                        <button type="submit" class="get-document">Get Document</button>
                                    </form>
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
                        <td>{{ $request->spouse1 }} {{ $request->spouse2 }}</td>
                        <td>{{ ucfirst($request->created_at) }}</td>
                        <td>{{ ucfirst($request->relationship) }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <div class="action">
                                <form action="{{ route('marriagerequest.destroy', $request->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"
                                        onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                                </form>
                                @if ($request->status == 'APPROVED')
                                    <form
                                        action="{{ route('document.get', ['type' => 'marriage', 'id' => $request->marriagerequest_id]) }}"
                                        method="GET" style="display:inline;">
                                        <button type="submit" class="get-document">Get Document</button>
                                    </form>
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
                        <td>{{ $request->status }}</td>
                        <td>
                            <div class="action">
                                <form action="{{ route('deathrequest.destroy', $request->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete"
                                        onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                                </form>
                                @if ($request->status == 'APPROVED')
                                    <form
                                        action="{{ route('document.get', ['type' => 'death', 'id' => $request->deathrequest_id]) }}"
                                        method="GET" style="display:inline;">
                                        <button type="submit" class="get-document">Get Document</button>
                                    </form>
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