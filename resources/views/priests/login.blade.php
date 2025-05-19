<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/adminform.css') }}" />
    <title>Priest Login - Online Parish Record Keeping</title>
</head>

<body>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3"></div>

    <div class="container">
        <div class="intro">
            <h1>Online Parish Record Keeping</h1>
            <p>"Priests can now access parish records with ease and security. Stay updated and connected with our online platform."</p>
        </div>

        <div class="form">
            <!-- Priest Login Form -->
            <div id="login" class="login">
                <form method="POST" action="{{ route('priests.login.submit') }}">
                    @csrf
                    <h3>Priest Login</h3>

                    @if (session('error'))
                        <p style="color:red; font-size: 12px;">{{ session('error') }}</p>
                    @endif

                    <label for="credentials">Priest Name</label>
                    <input type="text" name="credentials" id="credentials" placeholder="Enter full name" required />

                    <label for="priest_id">Priest ID</label>
                    <input type="text" name="priest_id" id="priest_id" placeholder="Enter priest ID" required />

                    <button type="submit">Login</button>
                    <p>Need help? Contact the parish admin to retrieve your login credentials.</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
