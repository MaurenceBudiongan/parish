<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>San Pascual Parish Records - Modern Digital Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --secondary-light: #8b5cf6;
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            
            --dark: #0f172a;
            --gray-900: #1e293b;
            --gray-800: #334155;
            --gray-700: #475569;
            --gray-600: #64748b;
            --gray-500: #94a3b8;
            --gray-400: #cbd5e1;
            --gray-300: #e2e8f0;
            --gray-200: #f1f5f9;
            --gray-100: #f8fafc;
            --white: #ffffff;
            
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            
            --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            --gradient-hero: linear-gradient(135deg, var(--primary) 0%, var(--accent) 50%, var(--secondary) 100%);
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.18);
            
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--gray-100) 0%, var(--white) 100%);
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Enhanced Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid var(--gray-200);
            transition: var(--transition);
        }

        header.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-lg);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
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
            width: 45px;
            height: 45px;
            border-radius: 12px;
            transition: var(--transition);
        }

        .logo img:hover {
            transform: scale(1.05) rotate(5deg);
        }

        .logo-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo-text p {
            font-size: 0.75rem;
            color: var(--gray-600);
            margin-top: -0.25rem;
        }

        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 500;
            font-size: 0.95rem;
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
            left: 50%;
            background: var(--gradient-primary);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        nav a:hover::after {
            width: 100%;
        }

        .header-cta {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
        }

        /* Mobile menu */
        .menu-toggle {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            background: var(--gray-100);
            color: var(--primary);
            font-size: 1.25rem;
            transition: var(--transition);
        }

        .menu-toggle:hover {
            background: var(--gray-200);
        }

        /* Enhanced Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--white) 0%, var(--gray-50) 50%, var(--gray-100) 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23f1f5f9" fill-opacity="0.3" points="0,1000 1000,1000 1000,0 0,0"/><polygon fill="%23e2e8f0" fill-opacity="0.2" points="500,0 1000,500 500,1000 0,500"/></svg>') no-repeat center center;
            background-size: cover;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            animation: slideInLeft 1s ease-out;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 2.5rem;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat {
            text-align: left;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Hero Images */
        .hero-visual {
            position: relative;
            animation: slideInRight 1s ease-out;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
            z-index: 1;
        }

        .hero-card {
            background: var(--white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(20px);
            border: 1px solid var(--gray-200);
            transition: var(--transition-slow);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .hero-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .hero-card.large {
            grid-column: span 2;
        }

        .hero-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .hero-card.large img {
            height: 150px;
        }

        .hero-card h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .hero-card p {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Enhanced Features Section */
        .features {
            padding: 6rem 0;
            background: var(--white);
            position: relative;
        }

        .section-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-badge {
            display: inline-block;
            background: var(--primary);
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: var(--white);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            transition: var(--transition-slow);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-primary);
            opacity: 0;
            transition: var(--transition);
        }

        .feature-card:hover::before {
            opacity: 0.05;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            color: var(--gray-600);
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-top: 1rem;
            transition: var(--transition);
            position: relative;
            z-index: 1;
        }

        .feature-link:hover {
            gap: 1rem;
        }

        /* Stats Section */
        .stats {
            padding: 4rem 0;
            background: var(--gradient-primary);
            color: var(--white);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .stat-card .number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-card .label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Enhanced Footer */
        footer {
            background: var(--gray-900);
            color: var(--gray-300);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            max-width: 350px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
        }

        .footer-logo h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--white);
        }

        .footer-brand p {
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: var(--gray-800);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
        }

        .footer-section h4 {
            color: var(--white);
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.125rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section li {
            margin-bottom: 0.75rem;
        }

        .footer-section a {
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--primary);
            padding-left: 0.5rem;
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: var(--gray-400);
        }

        .footer-contact i {
            width: 16px;
            color: var(--primary);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid var(--gray-800);
            text-align: center;
            color: var(--gray-500);
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-container {
                max-width: 1000px;
            }
            
            .section-container {
                max-width: 1000px;
            }
        }

        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .hero-visual {
                order: -1;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem;
            }

            nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                justify-content: center;
                padding: 2rem;
                transition: var(--transition);
                box-shadow: var(--shadow-xl);
                z-index: 999;
            }

            nav.active {
                right: 0;
            }

            .menu-toggle {
                display: flex;
                z-index: 1000;
            }

            .hero {
                padding: 6rem 1rem 2rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.125rem;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                transform: none;
            }

            .hero-card {
                padding: 1.5rem;
            }

            .feature-card {
                padding: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Loading Animation */
        .loading {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .loading:nth-child(1) { animation-delay: 0.1s; }
        .loading:nth-child(2) { animation-delay: 0.2s; }
        .loading:nth-child(3) { animation-delay: 0.3s; }
        .loading:nth-child(4) { animation-delay: 0.4s; }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            animation: modalFadeIn 0.3s ease-out;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--white);
            margin: 2rem;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.4s ease-out;
            box-shadow: var(--shadow-xl);
        }

        .modal-header {
            background: var(--gradient-primary);
            color: var(--white);
            padding: 2rem;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .modal-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-features {
            display: grid;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .modal-feature {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            background: var(--gray-50);
            border-radius: 12px;
            border-left: 4px solid var(--primary);
        }

        .modal-feature-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1rem;
            flex-shrink: 0;
        }

        .modal-feature-content h4 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .modal-feature-content p {
            color: var(--gray-600);
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .modal-benefits {
            background: var(--gray-50);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }

        .modal-benefits h4 {
            color: var(--gray-900);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-benefits ul {
            list-style: none;
            padding: 0;
        }

        .modal-benefits li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            color: var(--gray-700);
        }

        .modal-benefits li:before {
            content: '✓';
            background: var(--success);
            color: var(--white);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        .modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--gray-200);
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Image positioning fixes */
        .hero-card img,
        .feature-card img,
        .modal img {
            position: relative;
            z-index: 1;
        }

        /* Ensure proper stacking */
        .hero-visual {
            position: relative;
            animation: slideInRight 1s ease-out;
            z-index: 1;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="header-container">
            <div class="logo">
                <img src="{{ asset('img/Trinidad.jpg') }}" alt="San Pascual Parish Logo">
                <div class="logo-text">
                    <h1>San Pascual Parish</h1>
                    <p>Digital Records System</p>
                </div>
            </div>

            <nav id="navbar">
                <a href="#services">Services</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
                <a href="{{ route('priests.login.form') }}">Priest</a>
                <a href="{{ route('staffclick') }}">Staff</a>
                <a href="{{ route('adminaccess.login') }}">Admin</a>
            </nav>

            <div class="header-cta">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Get Started
                </a>
                <div class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-shield-alt"></i>
                    Secure & Reliable Records
                </div>
                
                <h1>Modern Parish Record Management System</h1>
                
                <p>
                    Transform your parish administration with our comprehensive digital record-keeping solution. 
                    Secure, efficient, and designed specifically for modern church communities.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        Start Your Journey
                    </a>
                    <a href="#services" class="btn btn-outline">
                        <i class="fas fa-play"></i>
                        Learn More
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number" data-count="1000">1000+</span>
                        <span class="stat-label">Records Managed</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number" data-count="99">99.9%</span>
                        <span class="stat-label">Uptime</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number" data-count="24">24/7</span>
                        <span class="stat-label">Support</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-grid">
                    <div class="hero-card loading">
                        <img src="{{ asset('img/records.jpg') }}" alt="Parish Services">
                        <h3>Sacramental Records</h3>
                        <p>Complete digital archive of baptisms, confirmations, and marriages</p>
                    </div>
                    <div class="hero-card loading">
                        <img src="{{ asset('img/event.png') }}" alt="Parish Events">
                        <h3>Event Management</h3>
                        <p>Streamlined scheduling and organization of parish activities</p>
                    </div>
                    <div class="hero-card large loading">
                        <img src="{{ asset('img/Trinidad.jpg') }}" alt="Parish Community">
                        <h3>Community Dashboard</h3>
                        <p>Centralized hub for all parish administrative needs and member services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="section-container">
            <div class="stats-grid">
                <div class="stat-card loading">
                    <span class="number" data-count="1500">1,500+</span>
                    <span class="label">Active Members</span>
                </div>
                <div class="stat-card loading">
                    <span class="number" data-count="500">500+</span>
                    <span class="label">Baptismal Records</span>
                </div>
                <div class="stat-card loading">
                    <span class="number" data-count="200">200+</span>
                    <span class="label">Marriage Certificates</span>
                </div>
                <div class="stat-card loading">
                    <span class="number" data-count="100">100%</span>
                    <span class="label">Digital Security</span>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="services">
        <div class="section-container">
            <div class="section-header">
                <div class="section-badge">Our Services</div>
                <h2 class="section-title">Comprehensive Parish Solutions</h2>
                <p class="section-subtitle">
                    Everything you need to manage your parish records efficiently and securely
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Baptismal Records</h3>
                    <p>Secure digital storage and instant retrieval of baptismal certificates. Search by name, date, or parents' information with advanced filtering options.</p>
                    <a href="#" class="feature-link" data-modal="baptismal-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-ring"></i>
                    </div>
                    <h3>Marriage Certificates</h3>
                    <p>Complete documentation system for marriage records with automated certificate generation and digital signature capabilities.</p>
                    <a href="#" class="feature-link" data-modal="marriage-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-hands-praying"></i>
                    </div>
                    <h3>Confirmation Records</h3>
                    <p>Organized tracking of confirmation sacraments with sponsor information and ceremony details for comprehensive record keeping.</p>
                    <a href="#" class="feature-link" data-modal="confirmation-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Member Management</h3>
                    <p>Complete parishioner database with contact information, family relationships, and sacramental history all in one place.</p>
                    <a href="#" class="feature-link" data-modal="member-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Scheduling</h3>
                    <p>Advanced scheduling system for masses, events, and ceremonies with automated reminders and conflict detection.</p>
                    <a href="#" class="feature-link" data-modal="event-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card loading">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Secure Access</h3>
                    <p>Role-based access control with encryption and backup systems ensuring your parish data is always safe and accessible.</p>
                    <a href="#" class="feature-link" data-modal="security-modal">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modals -->
    <!-- Baptismal Records Modal -->
    <div id="baptismal-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-certificate"></i> Baptismal Records System</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Advanced Search Capabilities</h4>
                            <p>Find baptismal records instantly using multiple search criteria including name, date, parents' information, godparents, and officiating priest.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Digital Certificate Generation</h4>
                            <p>Generate official baptismal certificates instantly with church seal, signatures, and proper formatting for legal documents.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Secure Cloud Storage</h4>
                            <p>All records are stored securely in the cloud with automatic backups and encryption to ensure data integrity and accessibility.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>Instant access to baptismal records from anywhere</li>
                        <li>Reduced waiting time for certificate requests</li>
                        <li>Automatic record validation and verification</li>
                        <li>Integration with other sacramental records</li>
                        <li>Mobile-friendly access for staff and administrators</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Marriage Certificates Modal -->
    <div id="marriage-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-ring"></i> Marriage Certificate System</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Complete Wedding Documentation</h4>
                            <p>Comprehensive records including couple's information, witnesses, ceremony details, and officiating minister information.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-signature"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Digital Signatures</h4>
                            <p>Secure digital signature capabilities for priests and administrators with legal validity and authenticity verification.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Anniversary Tracking</h4>
                            <p>Automatic anniversary reminders and celebration planning tools to maintain connection with married couples.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>Streamlined marriage preparation process</li>
                        <li>Automated certificate generation</li>
                        <li>Witness and sponsor information tracking</li>
                        <li>Integration with civil registration systems</li>
                        <li>Historical marriage record preservation</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Confirmation Records Modal -->
    <div id="confirmation-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-hands-praying"></i> Confirmation Records System</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Sponsor Management</h4>
                            <p>Track confirmation sponsors, their qualifications, and relationship to candidates with comprehensive sponsor database.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Preparation Tracking</h4>
                            <p>Monitor confirmation preparation classes, attendance, and candidate readiness with detailed progress reports.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-church"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Ceremony Management</h4>
                            <p>Organize confirmation ceremonies with seating arrangements, group assignments, and special instructions.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>Automated confirmation certificate printing</li>
                        <li>Class attendance and progress tracking</li>
                        <li>Sponsor verification and approval workflow</li>
                        <li>Integration with baptismal records</li>
                        <li>Confirmation name selection and approval</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Member Management Modal -->
    <div id="member-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-users"></i> Parish Member Management</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Comprehensive Member Database</h4>
                            <p>Complete parishioner profiles with contact information, family relationships, and sacramental history all in one system.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-family"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Family Connections</h4>
                            <p>Link family members together with detailed relationship mapping and household information for better pastoral care.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Communication Tools</h4>
                            <p>Send announcements, newsletters, and important updates to specific groups or entire parish community.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>Centralized member information management</li>
                        <li>Advanced search and filtering capabilities</li>
                        <li>Automated birthday and anniversary reminders</li>
                        <li>Donation and tithing history tracking</li>
                        <li>Ministry and volunteer activity tracking</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Event Scheduling Modal -->
    <div id="event-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-calendar-alt"></i> Event & Mass Scheduling</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Smart Scheduling</h4>
                            <p>Advanced scheduling system with conflict detection, resource management, and automatic reminder notifications.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Venue Management</h4>
                            <p>Manage multiple venues, their capacity, availability, and special requirements for different types of events.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-microphone"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Ministry Coordination</h4>
                            <p>Coordinate with different ministries, volunteers, and staff for seamless event execution and planning.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>Automated mass schedule generation</li>
                        <li>Special event planning and coordination</li>
                        <li>Resource and equipment booking</li>
                        <li>Volunteer and ministry scheduling</li>
                        <li>Event attendance tracking and reporting</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <!-- Security Modal -->
    <div id="security-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-shield-alt"></i> Security & Access Control</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-features">
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Role-Based Access</h4>
                            <p>Granular permission system ensuring only authorized personnel can access sensitive parish information.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Data Encryption</h4>
                            <p>Bank-level encryption for all data transmission and storage, ensuring complete privacy and security.</p>
                        </div>
                    </div>
                    <div class="modal-feature">
                        <div class="modal-feature-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="modal-feature-content">
                            <h4>Audit Trail</h4>
                            <p>Complete activity logging and audit trails to track all system access and modifications for accountability.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-benefits">
                    <h4><i class="fas fa-star"></i> Key Benefits</h4>
                    <ul>
                        <li>GDPR and privacy compliance</li>
                        <li>Automatic data backup and recovery</li>
                        <li>Multi-factor authentication support</li>
                        <li>Regular security updates and monitoring</li>
                        <li>Secure API access for integrations</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline modal-close">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>

    <footer id="contact">
        <div class="section-container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="{{ asset('img/Trinidad.jpg') }}" alt="San Pascual Parish Logo">
                        <h3>San Pascual Parish</h3>
                    </div>
                    <p>
                        Providing modern digital solutions for parish record-keeping and administrative management. 
                        Serving the community with dedication and innovation.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="{{ route('login') }}">Member Portal</a></li>
                        <li><a href="{{ route('adminaccess.login') }}">Admin Login</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Baptismal Records</a></li>
                        <li><a href="#">Marriage Certificates</a></li>
                        <li><a href="#">Confirmation Records</a></li>
                        <li><a href="#">Member Management</a></li>
                        <li><a href="#">Event Scheduling</a></li>
                    </ul>
                </div>

                <div class="footer-section footer-contact">
                    <h4>Contact Information</h4>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        San Pascual, Ubay, Bohol
                    </p>
                    <p>
                        <i class="fas fa-phone"></i>
                        +63 912 345 6789
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i>
                        info@sanpascualparish.org
                    </p>
                    <p>
                        <i class="fas fa-clock"></i>
                        Mon - Fri: 8:00 AM - 5:00 PM
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 San Pascual Parish Records System. All rights reserved. | Built with ❤️ for our community</p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const navbar = document.getElementById('navbar');

        menuToggle.addEventListener('click', () => {
            navbar.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            
            if (navbar.classList.contains('active')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        });

        // Close mobile menu when clicking on links
        navbar.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') {
                navbar.classList.remove('active');
                menuToggle.querySelector('i').className = 'fas fa-bars';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const text = counter.textContent;
                const hasPlus = text.includes('+');
                const hasPercent = text.includes('%');
                const hasSlash = text.includes('/');
                
                let count = 0;
                const increment = target / 50;
                
                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        let displayCount = Math.ceil(count);
                        
                        if (hasSlash) {
                            counter.textContent = `${displayCount}/7`;
                        } else if (hasPercent) {
                            counter.textContent = `${displayCount}%`;
                        } else if (hasPlus) {
                            counter.textContent = `${displayCount.toLocaleString()}+`;
                        } else {
                            counter.textContent = displayCount.toLocaleString();
                        }
                        
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = text;
                    }
                };
                
                updateCounter();
            });
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    
                    // Animate counters when stats section is visible
                    if (entry.target.classList.contains('stats')) {
                        animateCounters();
                    }
                }
            });
        }, observerOptions);

        // Observe all loading elements
        document.querySelectorAll('.loading').forEach(el => {
            observer.observe(el);
        });

        // Observe stats section
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Add loading class to feature cards with staggered delay
        document.addEventListener('DOMContentLoaded', () => {
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach((card, index) => {
                card.style.animationDelay = `${0.1 * (index + 1)}s`;
            });
        });

        // Modal functionality
        document.addEventListener('DOMContentLoaded', () => {
            // Get all feature links and modals
            const featureLinks = document.querySelectorAll('[data-modal]');
            const modals = document.querySelectorAll('.modal');
            const modalCloses = document.querySelectorAll('.modal-close');

            // Open modal when feature link is clicked
            featureLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalId = link.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden'; // Prevent background scrolling
                    }
                });
            });

            // Close modal when close button is clicked
            modalCloses.forEach(closeBtn => {
                closeBtn.addEventListener('click', () => {
                    const modal = closeBtn.closest('.modal');
                    if (modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = 'auto'; // Restore scrolling
                    }
                });
            });

            // Close modal when clicking outside the modal content
            modals.forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = 'auto'; // Restore scrolling
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const activeModal = document.querySelector('.modal.active');
                    if (activeModal) {
                        activeModal.classList.remove('active');
                        document.body.style.overflow = 'auto'; // Restore scrolling
                    }
                }
            });
        });
    </script>
</body>

</html>
