@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4 text-success text-center">Staff Dashboard</h2>

    <div class="alert alert-light border rounded-4 shadow-sm p-3">
        <h4 class="fw-semibold mb-1 text-center">
            Welcome, {{ Auth::user()->full_name }}!
        </h4>
    </div>


    <div class="row g-4 mt-2">


        @if(in_array(Auth::user()->role, ['admin','manager','receptionist']))
        @include('staff.partials.card', [
            'title' => 'Analytics',
            'icon'  => 'bar-chart',
            'text'  => 'Occupancy, revenue, trends & reports.',
            'btn'   => 'View Analytics',
            'link'  => '#'
        ])
        @endif


        @if(in_array(Auth::user()->role, ['admin','manager','receptionist']))
        @include('staff.partials.card', [
            'title' => 'All Bookings',
            'icon'  => 'calendar',
            'text'  => 'View, confirm or cancel hotel bookings.',
            'btn'   => 'Manage Bookings',
            'link'  => '#'
        ])
        @endif

        @if(in_array(Auth::user()->role, ['admin','manager','receptionist']))
        @include('staff.partials.card', [
            'title' => 'Services',
            'icon'  => 'bell',
            'text'  => 'Attach services to bookings or update status.',
            'btn'   => 'Services',
            'link'  => '#'
        ])
        @endif


        @if(in_array(Auth::user()->role, ['admin','manager']))
        @include('staff.partials.card', [
            'title' => 'Guests',
            'icon'  => 'users',
            'text'  => 'Add or edit guest profiles (Admin can delete).',
            'btn'   => 'Manage Guests',
            'link'  => '#'
        ])
        @endif

        @if(in_array(Auth::user()->role, ['admin','manager']))
        @include('staff.partials.card', [
            'title' => 'Rooms',
            'icon'  => 'bed',
            'text'  => 'Full control of hotel rooms.',
            'btn'   => 'Manage Rooms',
            'link'  => route('rooms.index')
        ])
        @endif

        @if(Auth::user()->role === 'admin')
        @include('staff.partials.card', [
            'title' => 'Users & Roles',
            'icon'  => 'shield',
            'text'  => 'Assign roles & manage staff access.',
            'btn'   => 'Manage Users',
            'link'  => '#'
        ])
        @endif

    </div>
</div>
@endsection
