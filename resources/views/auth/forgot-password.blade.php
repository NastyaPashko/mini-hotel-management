@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0 rounded-5">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 fw-bold text-success">Forgot Password</h3>

                        {{-- Success Message --}}
                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @error('email')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your email address" required autofocus>
                            </div>

                            <button type="submit" class="btn w-100 site-btn site-btn-green fw-semibold">
                                Send Password Reset Link
                            </button>

                            <div class="text-center mt-3">
                                <a href="{{ route('login.form') }}" class="text-success fw-semibold text-decoration-none">
                                    Back to Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
