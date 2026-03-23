<!DOCTYPE html>
<html>
<head>
    @yield('styles')

    <title>Everglory Worship Centre</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Google Outfit Font ---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <!-- Logo + Name -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                Everglory Worship Center
            </a>

            <!-- Toggle button (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>

                    <li class="nav-item">
                        <a href="/teachings" class="nav-link">Teachings</a>
                    </li>

                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        @guest
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                        @else
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                        @endguest
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <!---- <footer class="bg-dark text-white pt-4 mt-5">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h5>MySite</h5>
                    <p>Your trusted website built with Laravel.</p>
                </div>

                <div class="col-md-4">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="/about" class="text-white">About</a></li>
                        <li><a href="/contact" class="text-white">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@mysite.com</p>
                    <p>Phone: +265 999 000 000</p>
                </div>

            </div>

            <hr class="bg-white">

            <div class="text-center pb-2">
                <p class="mb-0">&copy; 2026 MySite. All rights reserved.</p>
            </div>
        </div>
    </footer>
    ------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
