<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parish Record </title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

        * {
            font-family: "Be Vietnam Pro", sans-serif;
        }

        body {
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5rem;
        }

        @media only screen and (max-width: 431px) {
            body {
                flex-direction: column;
                align-items: center;
            }
        }

        header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10rem;

        }

        .logo {
            display: flex;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: #696666;
            cursor: pointer;
        }

        header h1 {
            font-size: 28px;
            color: #6678e8;
            margin-left: 10%;
        }

        header button {
            color: white;
            background-color: #6678e8;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
        }

        .container {
            display: flex;
            align-items: center;

            gap: 6rem;
        }

        @media only screen and (max-width: 431px) {
            .container {
                flex-direction: column;
                align-items: center;
                margin-left: 60%;
            }

            .text-section {
                max-width: 1200px;
            }

            p {
                width: 500px;
            }
        }

        .text-section {
            max-width: 600px;
        }

        h1 {
            font-size: 36px;
            color: #6678e8;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
            text-align: justify;
        }

        .appointment-btn {
            color: white;
            background-color: #e866a3;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
            display: inline-block;
        }

        .images {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .images img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #d9d9d9;
            /* Optional border */
        }

        .image-container {
            display: flex;
            justify-content: space-around;
        }

        .thirdwheel {
            width: 150px;
            height: 150px;
            margin-right: 350px;
            border-radius: 50%;
            transform: rotate(-40deg);
            object-fit: cover;
            border: 2px solid #d9d9d9;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img src="{{ asset('img/trinidad.png') }}" alt="parish" width="50px" height="50px">
            <h1>San_Pascual</h1>
        </div>

        <nav>
            <a href="#">Services</a>
            <a href="#">About Us</a>
            <a href="#">Location & Hours</a>
            <a href="{{ route('staffclick') }}">Staff</a>
            <a href="{{ route('authentication.adminform') }}">Admin</a>

        </nav>
        <button>Let's Talk</button>
    </header>

    <div class="container">
        <div class="text-section">
            <h1>San Pascual <br />Parish Record Keeping</h1>
            <p>
                We provide secure and efficient digital record-keeping for your
                parish, with organized management and personalized support for your
                church community.
            </p>
            <a href="#" class="appointment-btn">Gets Started</a>
        </div>
        <div class="images">
            <div class="image-container">
                <img src="{{ asset('img/kayi.png') }}" alt="yi" />
                <img src="{{ asset('img/ben.jpg') }}" alt="ben" />
            </div>
            <img class="thirdwhee" src="{{ asset('img/thirdwheel.jpg') }}" alt="thirdwheel" />
        </div>
    </div>
</body>

</html>
