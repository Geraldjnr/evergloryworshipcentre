@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-md-1 text-white">

                <!-- Social Icons -->
                <div class="social-icons mb-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
            <!-- CENTRE RANK -->
            <div class="col-md-6 text-white">

                <!-- Welcome Text -->
                <h1 class="display-4 fw-bold">
                    Welcome to Everglory Worship Center
                </h1>

                <p class="lead">
                    A place of worship, love, and spiritual growth.
                </p>

                <!-- Buttons -->
                <div class="mt-4">
                    <a href="/teachings" class="btn btn-primary me-3">Get Started</a>
                    <a href="/contact" class="btn btn-outline-light">Talk to Us</a>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-4">

                <div class="signup-card p-4">
                    <h4 class="text-center mb-3">Become Part of Us</h4>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form method="POST" action="/visitors">
                        @csrf

                        <input type="text" name="name" class="form-control mb-2" placeholder="Full Name">
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email">
                        <input type="text" name="location" class="form-control mb-2" placeholder="Location">
                        <input type="text" name="phone" class="form-control mb-3" placeholder="Phone Number">

                        <button class="btn btn-primary w-100">Sign Up</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection
