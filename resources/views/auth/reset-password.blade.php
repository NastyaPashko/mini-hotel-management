@extends('layouts.app')

@section('content')
    <div class="container py-5 ">
        <div class="mx-auto">
            <div class=" card  p-4 auth-form  rounded-pill mx-auto">

                <div class="container mt-3 w-75 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-sm border-0 rounded-5">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4 fw-bold text-success">Forgot Password</h3>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button type="submit" class="btn w-100 site-btn site-btn-green fw-semibold">
                                    Reset Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
