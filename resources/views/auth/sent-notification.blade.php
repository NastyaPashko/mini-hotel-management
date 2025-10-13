@extends('layouts.app')

@section('content')
    <div class="container mt-2 mb-2 text-center p-5">

        <h2>Check your email</h2>
        <p>We have emailed your password reset link. Please check your inbox.</p>
        <a href="{{ route('login') }}"class="site-btn site-btn-green">Return to Login</a>
    </div>
@endsection
