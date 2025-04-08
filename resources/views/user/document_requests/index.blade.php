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
<td>{{ $request->reference_code }}</td>
<td>{{ $request->firstname }} {{ $request->lastname }}</td>
<td>{{ $request->documenttype }}</td>
<td>{{ $request->status }}</td>
<td>
    <a href="{{ route('admin.document_requests.edit', $request->id) }}">Edit</a>
    <form action="{{ route('admin.document_requests.destroy', $request->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
