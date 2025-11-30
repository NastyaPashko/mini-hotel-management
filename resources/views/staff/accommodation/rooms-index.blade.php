@extends('layouts.app')

@section('content')
    <div class="container p-3 m-3 mx-auto">
        <h1 class="text-center mb-4">Hotel Rooms</h1>

        <table class="table table-bordered table-striped ">
            <thead class="table-secondary mt-5">
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Number</th>
                    <th>Type</th>
                    <th>Places</th>
                    <th>Price ($)</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody class="table-light">
                @foreach ($rooms as $index => $room)
                    <tr>
                        <td>{{ $rooms->firstItem() + $index }}</td>

                        <td>
                            @if ($room->photo)
                                <img src="{{ asset('storage/' . $room->photo) }}" alt="Room Photo" class="room-thumbnail">
                            @else
                                <span class="text-muted">No photo</span>
                            @endif
                        </td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->roomType->name }}</td>
                        <td>{{ $room->places }}</td>
                        <td>{{ number_format($room->base_price, 2) }}</td>

                        <td>
                            <a href="#" class="action-btn btn-edit" data-bs-toggle="modal"
                                data-bs-target="#editRoomModal-{{ $room->id }}">
                                Edit
                            </a>

                            <x-edit-room-modal :room="$room" :roomTypes="$roomTypes" />

                            <form action="{{ route('rooms.delete', $room->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this room?');">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $rooms->links() }}
        </div>

        <div class="text-end mt-3">
            <a href="#" class="action-btn btn-add" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                Add New Room
            </a>
        </div>

        <x-add-room-modal :roomTypes="$roomTypes" />
    </div>
@endsection
