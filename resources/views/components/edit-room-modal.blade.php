<div class="modal fade" id="editRoomModal-{{ $room->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Room Number</label>
                        <input type="text" name="number" class="form-control" value="{{ $room->number }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Room Type</label>
                        <select name="room_type_id" class="form-select" required>
                            @foreach ($roomTypes as $type)
                                <option value="{{ $type->id }}" @selected($room->room_type_id == $type->id)>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Places</label>
                        <input type="number" name="places" class="form-control" min="1"
                            value="{{ $room->places }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Base Price ($)</label>
                        <input type="number" name="base_price" class="form-control" step="0.01"
                            value="{{ $room->base_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Room Photo</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">

                        @if ($room->photo)
                            <img src="{{ asset('storage/' . $room->photo) }}" class="room-thumbnail mt-2"
                                alt="Room Photo">
                        @endif
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
