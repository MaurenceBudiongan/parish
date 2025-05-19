<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>San Pascual Parish Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        :root {
            --primary: #5468e7;
            --primary-light: #6678e8;
            --secondary: #e866a3;
            --secondary-light: #ff80b5;
            --dark: #333333;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --white: #ffffff;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: var(--white);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            padding: 1rem 5%;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            width: 50px;
            height: 50px;
            transition: var(--transition);
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        .logo h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin: 0;
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: var(--gray);
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: var(--transition);
        }

        nav a:hover {
            color: var(--primary);
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: var(--transition);
        }

        nav a:hover::after {
            width: 100%;
        }

        .contact-btn {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .contact-btn:hover {
            background-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(84, 104, 231, 0.3);
        }

        /* Mobile menu toggle */
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--primary);
        }

        /* Hero Section */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 4rem 5%;
            gap: 4rem;
            min-height: calc(100vh - 80px);
        }

        .hero-text {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--primary);
        }

        .hero-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .cta-btn {
            display: inline-block;
            background-color: var(--secondary);
            color: var(--white);
            text-decoration: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            margin-top: 1rem;
            text-align: center;
            max-width: 200px;
            transition: var(--transition);
        }

        .cta-btn:hover {
            background-color: var(--secondary-light);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(232, 102, 163, 0.3);
        }

        /* Hero Images Grid */
        .hero-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 1.5rem;
            position: relative;
        }

        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .image-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .image-container:hover img {
            transform: scale(1.05);
        }

        .image-1 {
            grid-column: 1;
            grid-row: 1;
            aspect-ratio: 1;
        }

        .image-2 {
            grid-column: 2;
            grid-row: 1;
            aspect-ratio: 1;
        }

        .image-3 {
            grid-column: 1 / span 2;
            grid-row: 2;
            aspect-ratio: 2/1;
        }

        /* Features Section */
        .features {
            background-color: var(--light);
            padding: 5rem 5%;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 2rem;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: var(--dark);
        }

        .feature-card p {
            color: var(--gray);
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--white);
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .footer-logo img {
            width: 40px;
            height: 40px;
            filter: brightness(0) invert(1);
        }

        .footer-logo h2 {
            font-size: 1.5rem;
            color: var(--white);
        }

        .footer-contact p {
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-links h3,
        .footer-contact h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-links h3::after,
        .footer-contact h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 0.5rem;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 2rem;
        }

        /* Responsive */
        @media only screen and (max-width: 992px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 2rem 5%;
            }

            .hero-images {
                order: -1;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media only screen and (max-width: 768px) {
            header {
                padding: 1rem;
            }

            nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background-color: var(--white);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: var(--transition);
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            }

            nav.active {
                right: 0;
            }

            .menu-toggle {
                display: block;
                z-index: 1000;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        @media only screen and (max-width: 576px) {
            .hero-text h1 {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/trinidad.png') }}" alt="San Pascual Parish Logo">
            <h1>San Pascual Parish</h1>
        </div>

        <nav id="navbar">
            <a href="#">Services</a>
            <a href="#">About Us</a>
            <a href="#">Location & Hours</a>
             <a href="{{ route('priests.login.form') }}">Priest</a>
            <a href="{{ route('staffclick') }}">Staff</a>
            <a href="{{ route('authentication.adminform') }}">Admin</a>
        </nav>

        <button class="contact-btn">Let's Talk</button>
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>San Pascual Parish Record Keeping</h1>
            <p>
                We provide secure and efficient digital record-keeping for your parish, with organized management 
                and personalized support for your church community. Our system ensures that important sacramental 
                records are maintained accurately and accessible when needed.
            </p>
            <a href="{{route('login')}}" class="cta-btn">Get Started</a>
        </div>

        <div class="hero-images">
            <div class="image-container image-1">
                <img src="{{ asset('img/kayi.png') }}" alt="Parish Services">
            </div>
            <div class="image-container image-2">
                <img src="{{ asset('img/ben.jpg') }}" alt="Parish Events">
            </div>
            <div class="image-container image-3">
                <img src="{{ asset('img/Trinidad.jpg') }}" alt="Parish Community">
            </div>
        </div>
    </section>

    <section class="features">
        <h2 class="section-title">Our Services</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Baptismal Records</h3>
                <p>Secure storage and retrieval system for baptismal certificates and records.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ring"></i>
                </div>
                <h3>Marriage Certificates</h3>
                <p>Complete documentation system for marriage records and certificates.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hands"></i>
                </div>
                <h3>Confirmation Records</h3>
                <p>Organized tracking of confirmation sacraments and certificates.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <div class="footer-logo">
                    <img src="{{ asset('img/trinidad.png') }}" alt="San Pascual Parish Logo">
                    <h2>San Pascual Parish</h2>
                </div>
                <p>Providing digital solutions for parish record-keeping and sacramental documentation.</p>
            </div>

            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="{{ route('authentication.adminform') }}">Admin Login</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> San Pascual Parish, La Trinidad, Benguet</p>
                <p><i class="fas fa-phone"></i> +63 912 345 6789</p>
                <p><i class="fas fa-envelope"></i> info@sanpascualparish.org</p>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2023 San Pascual Parish. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const navbar = document.getElementById('navbar');

        menuToggle.addEventListener('click', () => {
            navbar.classList.toggle('active');
            menuToggle.innerHTML = navbar.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
    </script>
</body>

</html>
