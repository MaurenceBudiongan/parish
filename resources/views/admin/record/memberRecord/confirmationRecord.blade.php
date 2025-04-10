<style>
@import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
:root {
    --c-gray-900: #000000;
    --c-gray-800: #1f1f1f;
    --c-gray-700: #2e2e2e;
    --c-gray-600: #313131;
    --c-gray-500: #969593;
    --c-gray-400: #a6a6a6;
    --c-gray-300: #bdbbb7;
    --c-gray-200: #f1f1f1;
    --c-gray-100: #ffffff;
    --c-green-500: #45ffbc;
    --c-olive-500: #e3ffa8;
    --c-blue-500: #1a59bf;
    --c-white: var(--c-gray-100);
    --c-text-primary: var(--c-gray-100);
    --c-text-secondary: var(--c-gray-200);
    --c-text-tertiary: var(--c-gray-500);
}
    .confirmationRecord h2 {
        margin-top: 20px;
        color: white;
        backdrop-filter: blur();
    }

    table {
        width: 100%;
        font-family: "Be Vietnam Pro", sans-serif;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #f2f2f2;
    }
    td{
        font-size: .6rem;
        color: #000000;
    }
    th {
        background-color: var(--c-green-500);
        color: var(--c-gray-900);
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
        gap: 1rem;
    }

    .action form {
        margin: 0;
    }

    .action button {
        padding: 5px 12px;
        font-size: .6rem;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .action button.approve {
        background-color: #28a745;
        color: #fff;
    }

    .action button.approve:hover {
        background-color: #218838;
    }

    .action button.reject {
        background-color: #dc3545;
        color: #fff;
    }

    .action button.reject:hover {
        background-color: #c82333;
    }

    .action button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
    td span {
        color: #777;
    }

    td[colspan="9"] {
        text-align: center;
    }
</style>



<div class="confirmationRecord">
    <h2 class="">Confirmation Records</h2>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Event</th>
                <th>Sponsor</th>
                <th>Confirmation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->event }}</td>
                    <td>{{ $record->sponsor }}</td>
                    <td>{{ $record->confirmation_date }}</td>
                    <td>
                        <a href="" onclick="return confirm('Edit this record?')">Edit</a>
                        <form action="{{ route('confirmation.destroy', $record->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $records->links() }}

