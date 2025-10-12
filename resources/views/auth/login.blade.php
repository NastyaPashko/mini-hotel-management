@extends('layouts.app')

@section('content')
    <div class="container  py-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0 rounded-5">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 fw-bold">Login </h3>

                        <form method="POST" action="{{ route('login') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="you@example.com" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter password">
                            </div>


                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small text-success">
                                    Forgot password?
                                </a>
                            </div>

                            <button type="submit" class="btn w-100 site-btn site-btn-green fw-semibold">
                                Login
                            </button>

                            <div class="text-center mt-3">
                                <span>Don’t have an account? </span>
                                <a href="#" class="text-success fw-semibold text-decoration-none">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
