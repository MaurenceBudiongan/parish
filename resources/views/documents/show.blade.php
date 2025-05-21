 
<div style="max-width: 700px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 0 10px #ccc;">
    <h1 style="text-align:center; margin-bottom: 2rem;">Your {{ ucfirst($type) }} Certificate</h1>

    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
            @if($type == 'baptismal')
                <tr><th>Request ID</th><td>{{ $document->baptismrequest_id }}</td></tr>
                <tr><th>Child Name</th><td>{{ $document->childName }}</td></tr>
                <tr><th>Request Date</th><td>{{ $document->created_at->format('F d, Y') }}</td></tr>
                <tr><th>Relationship</th><td>{{ $document->relationship }}</td></tr>
                <tr><th>Status</th><td>{{ $document->status }}</td></tr>
            @elseif($type == 'confirmation')
                <tr><th>Request ID</th><td>{{ $document->confirmationrequest_id }}</td></tr>
                <tr><th>Confirmed Person</th><td>{{ $document->confirmedName }}</td></tr>
                <tr><th>Request Date</th><td>{{ $document->created_at->format('F d, Y') }}</td></tr>
                <tr><th>Relationship</th><td>{{ $document->relationship }}</td></tr>
                <tr><th>Status</th><td>{{ $document->status }}</td></tr>
            @elseif($type == 'marriage')
                <tr><th>Request ID</th><td>{{ $document->marriagerequest_id }}</td></tr>
                <tr><th>Spouse Names</th><td>{{ $document->spouse1 }} & {{ $document->spouse2 }}</td></tr>
                <tr><th>Request Date</th><td>{{ $document->created_at->format('F d, Y') }}</td></tr>
                <tr><th>Relationship</th><td>{{ $document->relationship }}</td></tr>
                <tr><th>Status</th><td>{{ $document->status }}</td></tr>
            @elseif($type == 'death')
                <tr><th>Request ID</th><td>{{ $document->deathrequest_id }}</td></tr>
                <tr><th>Deceased Name</th><td>{{ $document->fullName }}</td></tr>
                <tr><th>Request Date</th><td>{{ $document->created_at->format('F d, Y') }}</td></tr>
                <tr><th>Relationship</th><td>{{ $document->relationship }}</td></tr>
                <tr><th>Status</th><td>{{ $document->status }}</td></tr>
            @endif
        </tbody>
    </table>

    <div style="text-align:center; margin-top: 2rem;">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Requests</a>
        {{-- Add download or print button here if you want --}}
    </div>
</div>
 
