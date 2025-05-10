<div class="Record">  
    <h2 class="text-2xl font-bold mb-4">Staff Records</h2>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Department</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($staff as $person)
                <tr>
                    <td>{{ $person->staff_id }}</td>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->phone }}</td>
                    <td>{{ $person->position }}</td>
                    <td>{{ $person->department }}</td>
                    <td>{{ $person->address }}</td>
                    <td>{{ $person->status }}</td>
                    <td>
                        <div class="action">
                            <a href="{{ route('staff.edit', $person->id) }}" class="edit">Edit</a>
                            <form action="{{ route('staff.destroy', $person->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="delete" onclick="return confirm('Delete this staff record?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No staff records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Record h2 {
        text-align: center;
        margin-top: 20px;
    }

    table {
        width: 100%;
        font-family: "Be Vietnam Pro", sans-serif;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #f2f2f2;
    }

    td {
        vertical-align: middle;
        font-size: .6rem;
        color: #000000;
    }

    th {
        background-color: #45ffbc;
        color: #000000;
        font-weight: 400;
        font-size: .8rem;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action {
        display: flex;
        flex-direction: row;
        gap: 1rem;
    }

    td span {
        color: #777;
    }

    td[colspan="10"] {
        text-align: center;
    }

    .edit {
        padding: .3rem;
        background-color: #45ffbc;
        border: none;
        text-decoration: none;
        font-size: 12px;
        color: black;
        border-radius: 4px;
    }

    .delete {
        color: white;
        padding: .3rem;
        background-color: rgb(249, 87, 84);
        border: none;
        font-size: 12px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
