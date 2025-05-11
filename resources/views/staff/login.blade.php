<!-- resources/views/authentication/adminform.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/adminform.css') }}" />
    <title>Online Parish Record Keeping</title>
</head>

<body>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3"></div>

    <div class="container">
        <div class="intro">
            <h1>Online Parish Record Keeping</h1>
            <p>"Requesting parish documents has never been easier! With online services, you can conveniently submit
                your request from home, saving time and effort while staying connected."</p>
        </div>

        <div class="form">
            <!-- Sign In Form -->
            <div id="login" class="login">
                    <form method="POST" action="{{ route('staff.login.submit') }}">
                    @csrf
                    <h3>Staff Sign In</h3>
                    <label for="admin">Staff Name</label>
                    <input type="text" name="name" id="admin" placeholder="Admin" required />

                    <label for="adminpassword">Staff ID</label>
                    <input type="password" name="staff_id" id="adminpassword" placeholder="Enter password" required />
                    @error('admin')
                        <p class="text-danger" style="font-size: 10px;color: red;">{{ $message }}</p>
                    @enderror
                    <button type="submit">Sign in</button>
                    <p>Cant Sign in? Get the Staff Id on the administrator.
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

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

