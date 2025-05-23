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
        <div class="form">
            <!-- Sign In Form -->
            <div id="login" class="login">
                <form method="POST" action="{{ route('adminaccess.logins') }}">
                    @csrf
                    <label for="admin_id">Admin ID:</label>
                    <input type="text" name="admin_id" id="admin_id" required>
                    <button type="submit">Access Admin</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
