@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0 rounded-5">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 fw-bold">Register</h3>

                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="you@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Create password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm password" required>
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
        </div>
    </div>
@endsection
