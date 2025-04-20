<h2 class="h2">Marriage Record</h2>
<div class="marriageCreate">
    <form action="{{ route('marriage.store') }}" method="POST">
        @csrf
        <div>
            <label>Bride Full Name:</label>
            <input type="text" name="bride" required>
        </div>
        <div>
            <label>Groom Full Name:</label>
            <input type="text" name="groom" required>
        </div>
        <div>
            <label>Officiant (Priest):</label>
            <input type="text" name="officiant" required>
        </div>
        <div>
         <label>Date of Marriage:</label>
         <input type="date" name="marriage_date" required>
     </div>
        <button type="submit" onclick="return confirm('Save this Marriage record?')">Save Confirmation</button>
    </form>
</div>
<style>
    .marriageCreate {
        padding: 15px;
        background-color: var(--c-gray-600);
        border-radius: 10px;
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

    .marriageCreate form button {
        padding: 12px;
        width: 100%;
        background: #45FFBC;
        color: black;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>
