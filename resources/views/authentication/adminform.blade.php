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
            <p>"Requesting parish documents has never been easier! With online services, you can conveniently submit your request from home, saving time and effort while staying connected."</p>
        </div>

        <div class="form">
            <!-- Sign Up Form -->
            <div id="register" class="register" style="display: none;">
                <form action="{{ route('admin.register') }}" method="POST">
                    @csrf
                    <h3>Admin Sign Up</h3>
                    <label for="adminfullname">Full Name</label>
                    <input type="text" name="adminfullname" id="adminfullname" placeholder="Enter Fullname" required />

                    <label for="admin">Admin</label>
                    <input type="text" name="admin" id="admin" placeholder="Enter Admin" required />

                    <label for="adminpassword">Password</label>
                    <input type="password" name="password" id="adminpassword" placeholder="Enter Admin Password" required />

                    <label for="confirmadminpassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmadminpassword" placeholder="Enter Confirm Password" required />

                    <button type="submit">Register</button>
                    <p>Already registered admin? <a href="javascript:void(0)" onclick="login()">Log in</a></p>
                </form>
            </div>

            <!-- Sign In Form -->
            <div id="login" class="login" >
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <h3>Admin Login</h3>
                    <label for="admin">Admin</label>
                    <input type="text" name="admin" id="admin" placeholder="Admin" required />

                    <label for="adminpassword">Password</label>
                    <input type="password" name="password" id="adminpassword" placeholder="Enter password" required />
                    @error('admin')
                        <p class="text-danger" style="font-size: 10px;color: red;">{{ $message }}</p>
                    @enderror
                    <button type="submit">Log in</button>
                    <p>New here? <a href="javascript:void(0)" onclick="register()">Sign up</a> now to be administrator!</p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function login() {
            document.getElementById("register").style.display = "none";
            document.getElementById("login").style.display = "block";
        }

        function register() {
            document.getElementById("register").style.display = "block";
            document.getElementById("login").style.display = "none";
        }
    </script>
</body>
</html>
