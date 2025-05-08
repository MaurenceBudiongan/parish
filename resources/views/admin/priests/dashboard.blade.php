<div class="container">
    <h2>Welcome, {{ $priest->first_name }} {{ $priest->last_name }}</h2>

    <ul class="list-group mt-4">
        <li class="list-group-item"><strong>Priest ID:</strong> {{ $priest->priest_id }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $priest->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $priest->phone_number }}</li>
        <li class="list-group-item"><strong>Address:</strong> {{ $priest->address }}</li>
        <li class="list-group-item"><strong>Date of Birth:</strong> {{ $priest->date_of_birth }}</li>
        <li class="list-group-item"><strong>Ordination Date:</strong> {{ $priest->ordination_date }}</li>
        <li class="list-group-item"><strong>Assigned Parish:</strong> {{ $priest->assigned_parish }}</li>
        <li class="list-group-item"><strong>Position:</strong> {{ $priest->position }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $priest->status }}</li>
    </ul>
</div>
