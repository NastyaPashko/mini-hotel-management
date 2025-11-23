@extends('layouts.app')

@section('content')
    <div class="container booking-container py-4 bg-white mt-3">

        <nav class="breadcrumbs mb-3" aria-label="Breadcrumb">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z" />
                <path d="M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21" />
            </svg>
            &raquo;
            <a href="{{ route('show.rooms') }}">Rooms</a> &raquo;
            <span>Booking Room {{ $room->number }}</span>
        </nav>

        <h1 class="mb-2">Book Room {{ $room->number }}</h1>
        <p class="text-muted">Confirm your stay by selecting dates and guest details below.</p>


        <div class="booking-wrapper d-flex flex-column flex-md-row align-items-start gap-4 mt-4">

            <div class="booking-image">
                <img src="{{ asset('storage/' . $room->photo) }}" alt="Room photo"
                    style="width: 350px; height: 250px; object-fit: cover; border-radius: 12px;">
            </div>

            <div class="booking-form flex-grow-1 ">

                <h3>{{ ucfirst($room->roomType->name) }}</h3>
                <p><strong>Capacity:</strong> {{ $room->places }} persons</p>
                <p><strong>Price:</strong> ${{ $room->base_price }} / night</p>

                <form action="{{ route('booking.store', $room->id) }}" method="POST" class="mt-3"> @csrf
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Check-in</label>
                        <input type="date" name="date_from" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Check-out</label>
                        <input type="date" name="date_to" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Guests</label>
                        <input type="number" name="guests_count" class="form-control" min="1"
                            max="{{ $room->places }}" value="1" required>
                    </div>

                    <button class="card-btn mx-auto green-btn w-50 mt-2" type="submit">
                        Create Booking
                    </button>
                </form>

            </div>

        </div>

    </div>
@endsection
