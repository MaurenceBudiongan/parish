<h2 class="h2">Staff</h2>

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
         background-color: var(--c-gray-600);
         border-radius: 10px;
         border-bottom: 10px;
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
      input[type="email"],
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





