<div class="container"> 
    <h2>Parishioner Report</h2>

    <h3>🆕 New Parishioners (within 1 day)</h3>
    <ul>
        @forelse($newParishioners as $p)
            <li>{{ $p->fullname }} - Registered: {{ $p->created_at->diffForHumans() }}</li>
        @empty
            <li>No new parishioners</li>
        @endforelse
    </ul>

    <h3>✅ Active Parishioners</h3>
    <ul>
        @forelse($active as $p)
            <li>{{ $p->fullname }}</li>
        @empty
            <li>No active parishioners</li>
        @endforelse
    </ul>

    <h3>❌ Inactive Parishioners</h3>
    <ul>
        @forelse($inactive as $p)
            <li>{{ $p->fullname }}</li>
        @empty
            <li>No inactive parishioners</li>
        @endforelse
    </ul>
</div>
