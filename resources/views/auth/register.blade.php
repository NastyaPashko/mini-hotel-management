@extends('layouts.app')

@section('content')
    <div class="container py-5 ">
        <div class="mx-auto">
            <div class=" card  p-4 auth-form  rounded-pill mx-auto">
                <h3 class=" mb-4 fw-bold text-center ">Register</h3>

                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your"
                            autofocus>
                        @error('full_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="you@example.com">

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Create password">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Confirm password">
                    </div>

                    <button type="submit" class="btn w-100 site-btn site-btn-green fw-semibold">
                        Register
                    </button>

                    <div class="text-center mt-3">
                        <span>Already have an account?</span>
                        <a href="#" class="text-success fw-semibold text-decoration-none">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
