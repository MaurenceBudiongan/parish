<div class="container">
    <h2>Staff Login</h2>
    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('staff.login.submit') }}"> @csrf
        <div class="form-group">
            <label for="name">Staff Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="staff_id">Staff ID</label>
            <input type="text" class="form-control" name="staff_id" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Login</button>
    </form>
</div>
