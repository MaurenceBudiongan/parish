
<h2 class="h2">Priest Assignment Records</h2>

<div class="card-container">
    @foreach ($assignments as $assignment)
        <div class="assignment-card">
            <h3>{{ $assignment->priest->first_name }} {{ $assignment->priest->last_name }}</h3>
            <p><strong>Assignment Type:</strong> {{ $assignment->assignment_type }}</p>
            <p><strong>Title:</strong> {{ $assignment->assignment_title }}</p>
            <p><strong>Location:</strong> {{ $assignment->location }}</p>
            <p><strong>Start Date:</strong> {{ $assignment->start_date }}</p>
            <p><strong>End Date:</strong> {{ $assignment->end_date ?? 'N/A' }}</p>
            <p><strong>Status:</strong> <span class="status {{ strtolower($assignment->status) }}">{{ $assignment->status }}</span></p>
            <p><strong>Assigned By:</strong> {{ $assignment->assigned_by }}</p>
            <p><strong>Remarks:</strong> {{ $assignment->remarks ?? 'None' }}</p>

            <div class="action-buttons">
                <a href="{{ route('priests_assignments.edit', $assignment->id) }}" class="edit-btn">Edit</a>
                <form action="{{ route('priests_assignments.destroy', $assignment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

 

<style>
    .h2 {
        margin-bottom: 20px;
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 24px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }

    .assignment-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-family: 'Be Vietnam Pro', sans-serif;
        position: relative;
    }

    .assignment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }

    .assignment-card h3 {
        margin-top: 0;
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .assignment-card p {
        margin: 4px 0;
        font-size: 14px;
        color: #555;
    }

    .status.active {
        color: green;
        font-weight: bold;
    }

    .status.completed {
        color: blue;
        font-weight: bold;
    }

    .status.cancelled {
        color: red;
        font-weight: bold;
    }

    .action-buttons {
        margin-top: 10px;
        display: flex;
        gap: 10px;
    }

    .edit-btn, .delete-btn {
        padding: 6px 12px;
        font-size: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s ease;
        text-decoration: none;
        color: white;
    }

    .edit-btn {
        background-color: #007bff;
    }

    .edit-btn:hover {
        background-color: #0056b3;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .delete-btn:hover {
        background-color: #a71d2a;
    }

    .pagination-links {
        margin-top: 20px;
        text-align: center;
    }
</style>

