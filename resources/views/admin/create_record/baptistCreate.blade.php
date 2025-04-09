
<div class="baptistCreate">
<h2>Add Baptismal Record</h2>
<form action="{{ route('admin.baptismal.store') }}" method="POST">
    @csrf
    <div>
        <label>Full Name:</label>
        <input type="text" name="fullname" required>
    </div>
    <div>
        <label>Sponsor:</label>
        <input type="text" name="sponsor" required>
    </div>

    <div>
        <label>Baptism Date:</label>
        <input type="date" name="baptism_date" required>
    </div>

    <button type="submit">Save Record</button>
</form>

<style>
    h2{
        text-align: center;
    }
    form{
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
        color: #555;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.3s;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.5);
    }

    .baptistCreate form button{
        padding: 12px;
        width: 100%;
       
        background: #45FFBC;
        color: black;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>
