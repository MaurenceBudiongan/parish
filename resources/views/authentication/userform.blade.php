<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/userform.css') }}" />
    <title>Online Parish Record</title>
</head>

<body>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3"></div>

    <div class="container">
        <div class="intro">
            <h1>Online Parish Record Keeping</h1>
            <p>
                "Requesting parish documents has never been easier! With online services, you can conveniently submit
                your request from home, saving time and effort while staying connected."
            </p>
        </div>

        <div class="form">
            <!-- Register Form -->
            <div id="register" class="register">
                <form action="{{ route('user.register.process') }}" method="POST" onsubmit="return validateUsername()">
                    @csrf
                    <h3>Parish Record Keeping Register</h3>
                    <div class="grid">
                        <div>
                            <label for="fullname">Full name</label>
                            <input type="text" id="fullname" name="fullname" placeholder="Enter Fullname"
                                required />
                        </div>
                        <div>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter Username"
                                required />
                            <span id="username-error" style="color: red; display: none">
                                Username must contain at least one uppercase letter and one symbol.
                            </span>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter email" required />
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter password"
                                required />
                        </div>
                        <div>
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" id="confirmpassword" name="confirmpassword"
                                placeholder="Enter password" required />
                        </div>
                        <span id="password-error" style="color:red; display:none;">Passwords do not match.</span>

                    </div>
                    <button type="submit">Register</button>
                    <p>
                        Been here before?
                        <a href="javascript:void(0)" onclick="login()">Log in</a>
                    </p>
                </form>
            </div>

            <!-- Login Form -->
            <div id="login" class="login" style="display: none">
                <form action="{{ route('user.login.process') }}" method="POST">
                    @csrf
                    <h3>Parish Record Keeping Login</h3>
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" placeholder="Enter email" required />
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="Enter password" required />
                    <button type="submit">Log in</button>
                    <p>
                        New here?
                        <a href="javascript:void(0)" onclick="register()">Sign up</a> now to get started!
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateUsername() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmpassword").value;
            const usernameError = document.getElementById("username-error");
            const passwordError = document.getElementById("password-error");

            const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).+$/;

            if (!regex.test(username)) {
                usernameError.style.display = "block";
                return false;
            } else {
                usernameError.style.display = "none";
            }

            if (password !== confirmPassword) {
                passwordError.style.display = "block";
                return false;
            } else {
                passwordError.style.display = "none";
            }

            return true;
        }


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
