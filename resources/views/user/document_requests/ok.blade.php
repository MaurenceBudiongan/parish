<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Parish Records Dashboard - Manage your church-related documents and requests easily">
    <meta name="author" content="Parish System">
    <title>Dashboard | Parish Records</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1995/1995542.png" type="image/png">
    <script src="{{ asset('js/onclick.js') }}"></script>
    <style>
        :root {
            --bg: #f4f6f9;
            --text-main: #1e293b;
            --text-sub: #64748b;
            --primary: #4f46e5;
            --accent: #22d3ee;
            --white: #ffffff;
            --card: #ffffff;
            --shadow: rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --card-hover-shadow: rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--bg);
            color: var(--text-main);
            font-size: 16px;
            line-height: 1.5;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: #1e293b;
            color: #fff;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo img {
            width: 32px;
            margin-right: 10px;
        }

        .logo span {
            font-size: 22px;
            font-weight: 600;
            color: #fff;
        }

        .nav a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 14px;
            margin-bottom: 10px;
            display: block;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .nav a:hover {
            background-color: #334155;
        }

        .sidebar-footer {
            font-size: 12px;
            text-align: center;
            color: #94a3b8;
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header-info h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .header-info p {
            color: var(--text-sub);
            margin-top: 4px;
        }

        .user-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent);
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .card {
            background-color: var(--card);
            padding: 24px;
            border-radius: var(--radius);
            box-shadow: 0 6px 18px var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px var(--card-hover-shadow);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 600;
        }

        .card p {
            color: var(--text-sub);
            font-size: 14px;
        }

        .card button {
            margin-top: 15px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .card button:hover {
            opacity: 0.85;
        }

        /* Mobile-First Design */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 20px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1024px) {
            .logo span {
                font-size: 20px;
            }

            .header-info h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995542.png" alt="Parish Records Logo">
                <span>Parish Records</span>
            </div>
            <nav class="nav" aria-label="Main Navigation">
                <a href="#" aria-label="Request Document">📄 Request Document</a>
                <a href="#" aria-label="Check Status">📊 Check Status</a>
                <a href="#" aria-label="Mass Schedule">⛪ Mass Schedule</a>
                <a href="#" aria-label="My Records">💒 My Records</a>
                <a href="#" aria-label="Donate">💖 Donate</a>
                <a href="#" aria-label="Contact">📞 Contact</a>
            </nav>
        </div>
        <footer class="sidebar-footer" aria-label="Footer">© 2025 Parish System</footer>
    </div>

    <!-- Main Content -->
    <div class="main">
        <header class="header">
            <div class="header-info">
                <h1 id="greeting">Welcome!</h1>
                <p>Your records are safely stored and accessible here.</p>
            </div>
            <img src="{{ asset('img/kayi.png') }}" alt="User Photo" class="user-pic" loading="lazy">
        </header>

        <section class="dashboard-cards">
            <div class="card">
                <h3>📄 Request Document</h3>
                <p>Need your baptismal, confirmation, or marriage certificate? Request here.</p>
                <button onclick="goToRequestPage()">Request Now</button>
            </div>
            <div class="card">
                <h3>📊 Check Status</h3>
                <p>Track the progress of your document requests in real-time.</p>
                <button onclick="alert('Opening status page...')">View Status</button>
            </div>
            <div class="card">
                <h3>📅 Upcoming Masses</h3>
                <p>Don't miss the next parish event. Check mass and event schedules.</p>
                <button onclick="alert('Opening mass schedule...')">View Schedule</button>
            </div>
            <div class="card">
                <h3>💖 Tithes & Donations</h3>
                <p>Support your parish by making a donation online.</p>
                <button onclick="alert('Going to donation page...')">Donate</button>
            </div>
        </section>
    </div>

    <script>
        const greeting = document.getElementById("greeting");
        const hour = new Date().getHours();
        if (hour < 12) greeting.textContent = "Good morning, Kyla!";
        else if (hour < 18) greeting.textContent = "Good afternoon, Kyla!";
        else greeting.textContent = "Good evening, Kyla!";

        function goToRequestPage() {
            window.location.href = "{{ route('documentrequest.create') }}";
        }
    </script>

</body>

</html>
