<h2 class="h2">Priest </h2>
<div class="Create">
    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" required>
        </div>

        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Phone:</label>
            <input type="number" name="phone" required>
        </div>

        <div>
            <label>Position:</label>
            <input type="text" name="position" required>
        </div>

        <div>
            <label>Department:</label>
            <input type="text" name="department" required>
        </div>

        <div>
            <label>Address:</label>
            <input type="text" name="address" required>
        </div>

        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="">-- Select Status --</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" onclick="return confirm('Save this staff record?')">Save Staff</button>
    </form>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Create {
        padding: 15px;
        background-color: #313131;
        border-radius: 10px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .h2 {
        margin-bottom: 20px;
        text-align: center;
        color: white;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #f1f1f1;
        font-size: 12px;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 12px;
    }

    input:focus,
    select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
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

    button:hover {
        background: #30d9a1;
    }
</style>
