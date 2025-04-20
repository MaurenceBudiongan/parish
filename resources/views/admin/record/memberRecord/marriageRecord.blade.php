<div class="marriageRecord">
 <h2 class="text-2xl font-bold mb-4">Marriage Records</h2>
 <table class="table-auto w-full">
     <thead>
         <tr>
             <th>Bride</th>
             <th>Groom</th>
             <th>Officiant</th>
             <th>Date of Marriage</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach($marriagerecords as $record)
             <tr>
                 <td>{{ $record->bride }}</td>
                 <td>{{ $record->groom }}</td>
                 <td>{{ $record->officiant }}</td>
                 <td>{{ $record->marriage_date }}</td>
                 <td class="action">
                     <a href="{{ route('marriage.edit', $record->id) }}" onclick="return confirm('Edit this record?')">Edit</a>
                     <form action="{{ route('marriage.destroy', $record->id) }}" method="POST">
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
{{ $marriagerecords->links() }}

<style>
 @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600&display=swap");

:root {
    --c-green-500: #45ffbc;
    --c-text: #333;
    --c-white: #fff;
    --c-hover: #f5f5f5;
    --c-border: #e5e5e5;
    --c-edit: #1a73e8;
    --c-delete: #e53935;
}

body {
    font-family: "Be Vietnam Pro", sans-serif;
}

.marriageRecord {
    padding: 20px;
    background: var(--c-white);
}

.marriageRecord h2 {
    text-align: center;
    font-size: 1.5rem;
    color: var(--c-text);
    margin-bottom: 1.5rem;
}

table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    border-radius: 8px;
}

thead th {
    background-color: var(--c-green-500);
    color: #000;
    padding: 12px;
    text-align: left;
    font-size: 0.9rem;
    font-weight: 500;
}

tbody td {
    padding: 10px 12px;
    font-size: 0.85rem;
    color: var(--c-text);
    border-bottom: 1px solid var(--c-border);
}

tbody tr:nth-child(even) {
    background-color: #fafafa;
}

tbody tr:hover {
    background-color: var(--c-hover);
}

.action {
    display: flex;
    gap: 8px;
}

.btn {
    font-size: 0.75rem;
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn.edit {
    background-color: var(--c-edit);
    color: var(--c-white);
}

.btn.edit:hover {
    background-color: #155cb0;
}

.btn.delete {
    background-color: var(--c-delete);
    color: var(--c-white);
}

.btn.delete:hover {
    background-color: #c62828;
}

</style>
