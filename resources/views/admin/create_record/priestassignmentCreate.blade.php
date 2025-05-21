<h2 class="h2">Priest Assignment</h2>

<div class="Create">
    <form action="{{ route('priests_assignments.store') }}" method="POST">
        @csrf

        <div>
            <label>Priest:</label>
            <select name="priest_id" required>
                <option value="">-- Select Priest --</option>
                @foreach ($priests as $priest)
                    <option value="{{ $priest->priest_id }}">{{ $priest->first_name }} {{ $priest->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Assignment Type:</label>
            <input type="text" name="assignment_type" required>
        </div>

        <div>
            <label>Assignment Title:</label>
            <input type="text" name="assignment_title" required>
        </div>

        <div>
            <label>Location:</label>
            <input type="text" name="location" required>
        </div>

        <div>
            <label>Start Date:</label>
            <input type="date" name="start_date" required>
        </div>

        <div>
            <label>End Date (optional):</label>
            <input type="date" name="end_date">
        </div>

        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <div>
            <label>Assigned By:</label>
            <input type="text" name="assigned_by" required>
        </div>

        <div>
            <label>Remarks:</label>
            <input type="text" name="remarks">
        </div>

        <button type="submit" onclick="return confirm('Save this priest assignment?')">Save Assignment</button>
    </form>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Create {
        padding: 15px;
        background-color: var(--c-gray-600);
        border-radius: 10px;
        border-bottom: 10px;
        font-family: 'Be Vietnam Pro', sans-serif;
        height: 30rem;
        overflow-y: auto;
    }

    .h2 {
        margin-bottom: 20px;
    }

    form {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .form-title {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }



    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: var(--c-gray-200);
        font-size: 12px;
    }

    input[type="text"],
    input[type="number"],
    input[type="time"],
    textarea,
    select,
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.3s;
        font-size: 12px;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .Create form button {
        padding: 12px;
        background: #45FFBC;
        color: black;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>
