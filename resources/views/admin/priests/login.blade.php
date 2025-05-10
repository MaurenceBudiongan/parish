<div class="container">
    <h2>Priest Login</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('priests.login.submit') }}">
        @csrf

        <div class="form-group">
            <label for="credentials">Priest Name</label>
            <input type="text" class="form-control" name="credentials" required>
        </div>

        <div class="form-group">
            <label for="priest_id">Priest ID</label>
            <input type="text" class="form-control" name="priest_id" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Login</button>
    </form>
</div>
