<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin Info</title>
</head>
<body>

    <h1>Create Admin Info</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Submit</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

</body>
</html>
