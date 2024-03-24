@extends('layouts.main')

@section('main')
<div class="wrapper">
    <h2 class="text-center mb-4">Booking id: {{ $room->id }}</h2>
    <div class="d-flex flex-column mt-3">
        <span><strong>Room Type:</strong> {{ $room->type }}</span>
        <span><strong>Price:</strong> {{ $room->price }}</span>
        <span><strong>Person Capacity:</strong> {{ $room->personCapacity }}</span>
        <span><strong>Description:</strong> {{ $room->description }}</span>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a class="btn btn-warning me-4" href={{ route('rooms.edit', $room->id) }}>Update</a> 
        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger p-2">
        </form>
    </div>
    <a class="btn btn-success mt-3" href="{{ route('rooms.index') }}">Return Back to rooms</a>
</div>
@endsection