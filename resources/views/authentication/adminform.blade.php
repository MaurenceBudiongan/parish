<?php
    // Check for success or error messages in the query string
    if (isset($_GET['error'])) {
        echo "<script>alert('" . htmlspecialchars($_GET['error']) . "');</script>";
    } elseif (isset($_GET['success'])) {
        echo "<script>alert('" . htmlspecialchars($_GET['success']) . "');</script>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/adminform.css') }}" />
    <title>Online Barangay Document</title>
  </head>
  <body>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3"></div>

    <div class="container">
      <div class="intro">
        <h1>Online Parish Record Keeping</h1>
        <p>
          "Requesting parish documents has never been easier! With online
          services, you can conveniently submit your request from home, saving
          time and effort while staying connected."
        </p>
      </div>

      <div class="form">
        <!-- Register Form -->
        <div id="register" class="register">
          <form action="./authenticate/adminsignupProcess.php" method="post" onsubmit="return validateUsername()">
            <h3>Admin Sign Up</h3>
            <label for="adminfullname">Full name</label>
            <input
              type="text"
              name="adminfullname"
              id="adminfullname"
              placeholder="Enter Fullname"
              required
            />
            <label for="admin">Admin</label>
            <input
              type="text"
              name="admin"
              id="admin"
              placeholder="Enter Admin"
              required
            />

            <label for="adminpassword">Password</label>
            <input
              type="password"
              id="adminpassword"
              name="adminpassword"
              placeholder="Enter Admin Password"
              required
            />
            <label for="confirmadminpassword">Confirm Password</label>
            <input
              type="password"
              id="confirmadminpassword"
              name="adminconfirmpassword"
              placeholder="Enter Confirm Password"
              required
            />
            <button type="submit">Register</button>
            <p>
              Already registered admin?
              <a href="javascript:void(0)" onclick="login()">Log in</a>
            </p>
          </form>
        </div>

        <!-- Login Form -->
        <div id="login" class="login" style="display: none">
          <form action="./authenticate/adminsigninProcess.php" method="post">
            <h3>Admin Login</h3>
            <label for="admin">Admin</label>
            <input type="text" id="admin" name="admin" placeholder="Admin" />
            <label for="adminpassword">Password</label>
            <input
              type="password"
              id="adminpassword"
              name="adminpassword"
              placeholder="Enter password"
            />
            <button type="submit">Log in</button>
            <p>
              New here?
              <a href="javascript:void(0)" onclick="register()">Sign up</a> now
              to be administrator!
            </p>
          </form>
        </div>
      </div>
    </div>

    <script>
      function validateUsername() {
        const username = document.getElementById("username").value;
        const usernameError = document.getElementById("username-error");

        const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).+$/;

        if (!regex.test(username)) {
          usernameError.style.display = "block";
          return false; // Prevent form submission
        } else {
          usernameError.style.display = "none";
          return true; // Allow form submission
        }
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
