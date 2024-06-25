<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-brand.png') }}" type="image/x-icon">

    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

        * {
            font-family: 'DM Sans', sans-serif;
        }

        .navbar {
            background: linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%);
            backdrop-filter: blur(10px);
            transition: background 0.3s ease;
            box-shadow: none;
        }

        .navbar-brand img {
            max-height: 40px;
            margin-right: 10px;
            transition: transform 0.5s;
        }

        .navbar-brand:hover img {
            animation: shake 1s ease;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            10%, 90% { transform: translateX(-5px); }
            20%, 80% { transform: translateX(5px); }
            30%, 50%, 70% { transform: translateX(-5px); }
            40%, 60% { transform: translateX(5px); }
            100% { transform: translateX(0); }
        }

        .hover-animate {
            transition: transform 0.3s ease;
        }

        .hover-animate:hover {
            transform: scale(1.05);
        }

        .card {
            background-color: #f8f9fa;
        }

        .card-header {
            border: none;
        }

        .card-header h3 {
            font-size: 24px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .lead {
            color: #6c757d;
        }

        footer {
            background-color: transparent;
            color: #adb5bd;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
        }

        .section {
            padding: 60px 0;
            background-color: #f8f9fa; /* Warna dasar abu */
        }

        .bg-light-gray {
            background-color: #f8f9fa;
        }

        .heading {
            font-family: 'Poppins', sans-serif;
            margin-top: 80px;
        }

        .image-wrapper img {
            max-width: 100%;
        }

        .image-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 15px;
        }

        .login-box {
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
        }

        .combined-section {
            border-radius: 10px;
            margin-top: 120px;
            padding: 30px;
            background-color: #f8f9fa; /* Warna dasar abu */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
            <div class="container mx-auto px-4 d-flex justify-content-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-brand.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary" onclick="scrollToLogin()">Login</button>
                    <a href="{{ route('registerForm') }}" class="ml-3 text-primary" style="text-decoration: none;">Register</a>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container combined-section">
                <!-- Body 1 -->
                <section class="section text-center heading">
                <div class="container">
                    <h1 class="display-4 fw-bold">Selamat Datang di Aplikasi Zidane Farma</h1>
                    <p style="margin-bottom: 20px;"></p>
                    <p class="lead" style="margin-top: 20px;">Tempat terpercaya untuk memenuhi kebutuhan kesehatan Anda dengan berbagai jenis obat dan produk farmasi</p>
                </div>

                </section>

                <!-- Body 2 -->
                <section class="section text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4 image-wrapper">
                                <img src="{{ asset('images/logo_1.png') }}" alt="Logo 1" class="img-fluid hover-animate" style="width: 66%;">
                            </div>
                            <div class="col-md-4 image-wrapper">
                                <img src="{{ asset('images/logo_2.png') }}" alt="Logo 2" class="img-fluid hover-animate" style="width: 66%;">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-4 image-wrapper">
                                <img src="{{ asset('images/logo_3.png') }}" alt="Logo 3" class="img-fluid hover-animate" style="width: 80%;">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Body 3 -->
                <section class="section bg-light-gray" id="login-section">
                    <div class="container">
                        <div class="row text-center justify-content-center">
                            <div class="col-md-5 mb-3 login-box d-flex flex-column align-items-center">
                                <h3>Login as Admin</h3>
                                <img src="{{ asset('images/logo_5.png') }}" alt="Logo 1" class="img-fluid hover-animate" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                                <a href="/admin/login" class="btn btn-primary mt-2"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            </div>
                            <div class="col-md-5 mb-3 login-box d-flex flex-column align-items-center">
                                <h3>Login as Kasir</h3>
                                <img src="{{ asset('images/logo_5.png') }}" alt="Logo 1" class="img-fluid hover-animate" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                                <a href="/cashier/login" class="btn btn-primary mt-2"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Body 4 -->
                <footer class="section bg-light-gray">
                    <div class="container">
                        <p class="text-center">Presented by Kelompok 6 Rekayasa Perangkat Lunak &copy;2024</p>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <!-- Include the Tailwind CSS script -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleNavbarTransparency() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0.8) 100%)';
            } else {
                navbar.style.background = 'linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%)';
            }
        }

        function scrollToLogin() {
            document.getElementById('login-section').scrollIntoView({ behavior: 'smooth' });
        }

        window.addEventListener('scroll', handleNavbarTransparency);
        document.addEventListener('DOMContentLoaded', function() {
            handleNavbarTransparency();
        });
    </script>
</body>
</html>
