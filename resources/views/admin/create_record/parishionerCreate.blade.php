<h2 class="h2">Parishioner Record</h2>
<div class="baptistCreate">
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
        <button type="submit" onclick="return confirm('Save this baptist record?')">Save Record</button>
    </form>

    <style>
