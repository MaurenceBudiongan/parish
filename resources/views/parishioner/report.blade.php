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
<style>
    .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

.container h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
}

.container h3 {
    color: #2980b9;
    margin: 15px 0 10px;
    position: relative;
}

.container h3::after {
    content: '';
    display: block;
    height: 2px;
    width: 50px;
    background: #2980b9;
    margin-top: 5px;
}

.container ul {
    list-style: none;
    padding: 0;
}

.container li {
    padding: 10px;
    border: 1px solid #ddd;
    margin: 5px 0;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    color: black;

}

.container li:hover {
    background-color: #eaf2f8;
}

li:nth-child(odd) {
    background-color: #f1f1f1;
}

li:nth-child(even) {
    background-color: #ffffff;
}

li:before {
    content: '✔️'; /* Use different icons based on the section */
    margin-right: 8px;
}

h3:nth-of-type(1) li:before {
    content: '🆕';
}

h3:nth-of-type(2) li:before {
    content: '✅';
}

h3:nth-of-type(3) li:before {
    content: '❌';
}

@media (max-width: 600px) {
    .container {
        padding: 15px;
    }

    h2 {
        font-size: 1.5rem;
    }

    h3 {
        font-size: 1.2rem;
    }

    li {
        font-size: 0.9rem;
        color: black;
    }
}
</style>