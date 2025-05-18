<h2 class="h2"> Mass/Service Scheduling Record</h2>
<div class="Create">
    <form action="{{ route('mass_schedules.store') }}" method="POST">
        @csrf
        <div>
         <label>Title:</label>
         <input type="text" name="title" required>
     </div>

     <div>
         <label>Description:</label>
         <textarea name="description" rows="2"></textarea>
     </div>

     <div>
         <label>Service Type:</label>
         <input type="text" name="service_type" required>
     </div>

     <div>
         <label>Date:</label>
         <input type="date" name="date" required>
     </div>

     <div>
         <label>Start Time:</label>
         <input type="time" name="start_time" required>
     </div>

     <div>
         <label>End Time:</label>
         <input type="time" name="end_time" required>
     </div>
     
     <div>
         <label>Location:</label>
         <input type="text" name="location" required>
     </div>

     <div>
         <label>Status:</label>
         <select name="status" required>
             <option value="Scheduled">Scheduled</option>
             <option value="Completed">Completed</option>
             <option value="Cancelled">Cancelled</option>
             <option value="Postponed">Postponed</option>
         </select>
     </div>

     <div>
         <label>Notes:</label>
         <textarea name="notes" rows="2"></textarea>
     </div>
        <button type="submit" onclick="return confirm('Save this baptist record?')">Save Record</button>
    </form>
</div>

    <style>
     @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

     .Create {
         padding: 15px;
         background-color: var(--c-gray-600);
         border-radius: 10px;
         border-bottom: 10px;
          height: 30rem;
          overflow-y: scroll;
         font-family: 'Be Vietnam Pro', sans-serif;
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
     textarea,select,
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





