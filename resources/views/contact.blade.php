@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

<h1 class="text-center mb-4 mt-4 ms-5"><b>Contact Us</b></h1>

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="container py-2 contact-container">

    <!-- Contact Form Left -->
    <div class="contact-form">
        <form method="POST" action="/contact">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <textarea name="message" class="form-control" placeholder="Your Message">{{ old('message') }}</textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button class="btn btn-primary btn-lg w-20 send_btn">Send Message</button>
        </form>
    </div>

    <!-- Contact Info Right -->
    <div class="contact-info">

        <div class="card p-3 text-center">
            <i class="bi bi-envelope-fill fs-3 mb-2"></i>
            <h5>Email</h5>
            <p>evergloryinfo@gmail.com</p>
        </div>

        <div class="card p-3 text-center">
            <i class="bi bi-telephone-fill fs-3 mb-2"></i>
            <h5>Phone</h5>
            <p>+265 995 597 155</p>
        </div>

        <div class="card p-3 text-center">
            <i class="bi bi-geo-alt-fill fs-3 mb-2"></i>
            <h5>Location</h5>
            <p>Lilongwe, Malawi</p>
        </div>

    </div>

</div>

@endsection
