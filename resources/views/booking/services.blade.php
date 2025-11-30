@extends('layouts.app')

@section('content')
    @extends('layouts.app')

@section('content')
    <div class="container py-4 my-3 bg-white">

        <nav class="breadcrumbs mb-3" aria-label="Breadcrumb">
            <a href="{{ route('show.rooms') }}">Rooms</a> &raquo;
            <span>Services for Booking #{{ $booking->id }}</span>
        </nav>

        <h1 class="mb-3">Choose Additional Services</h1>
        <p class="text-muted">Select the extra services you'd like to include in your stay.</p>

        <form action="{{ route('booking.services.store', $booking->id) }}" method="POST">
            @csrf

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <label class="service-card d-block p-3 border rounded shadow-sm" style="cursor:pointer;">
                            <div class="d-flex flex-column align-items-center">

                                @if ($service->photo)
                                    <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}"
                                        style="width:120px; height:120px; object-fit:cover; border-radius:8px;">
                                @else
                                    <img src="/default-service.png" style="width:120px; height:120px; border-radius:8px;">
                                @endif

                                <h4 class="mt-3">{{ $service->name }}</h4>
                                <p class="text-muted">{{ $service->description }}</p>
                                <p><strong>${{ number_format($service->price, 2) }}</strong></p>

                                <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                    class="form-check-input mt-2">
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="card-btn green-btn mt-3">
                Continue
            </button>
        </form>

    </div>

    <style>
        .service-card:hover {
            background: #f6ffef;
            border-color: #22b358;
            transition: 0.2s ease;
        }
    </style>
@endsection
