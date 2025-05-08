<div class="Record">
 <h2 class="text-2xl font-bold mb-4"> Event Announcements</h2>

 <table class="table-auto w-full">
     <thead>
         <tr>
             <th>Title</th>
             <th>Event Date</th>
             <th>Time</th>
             <th>Location</th>
             <th>Audience</th>
             <th>Status</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($events as $event)
             <tr>
                 <td>{{ $event->title }}</td>
                 <td>{{ $event->event_date }}</td>
                 <td>{{ $event->start_time }} - {{ $event->end_time }}</td>
                 <td>{{ $event->location }}</td>
                 <td>{{ $event->audience }}</td>
                 <td>{{ $event->status }}</td>
                 <td>
                     <div class="action">
                         <form action="{{ route('event_announcements.edit', $event->id) }}" method="GET">
                             <button class="edit" type="submit"
                                 onclick="return confirm('Edit this event?')">Edit</button>
                         </form>
                         <form action="{{ route('event_announcements.destroy', $event->id) }}" method="POST"
                             style="display:inline;">
                             @csrf
                             @method('DELETE')
                             <button class="delete" type="submit"
                                 onclick="return confirm('Are you sure to delete this event?')">Delete</button>
                         </form>
                     </div>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>
</div>

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
     flex-direction: row;
     gap: 1rem;
 }

 td span {
     color: #777;
 }

 td[colspan="9"] {
     text-align: center;
 }

 .edit {
     padding: .3rem;
     background-color: var(--c-green-500);
     border: none;
 }

 .delete {
     color: white;
     padding: .3rem;
     background-color: rgb(249, 87, 84);
     border: none;
 }
</style>
