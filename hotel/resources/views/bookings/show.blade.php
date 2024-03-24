@extends('layouts.main')

@section('main')
<div class="wrapper">
    <h2 class="text-center mb-4">Booking id: {{ $booking->id }}</h2>
    <div class="d-flex flex-column mt-3">
        <span><strong>Customer:</strong> {{ $booking->customerFirstName.' '.$booking->customerLastName }}</span>
        <span><strong>Customer email:</strong> {{ $booking->customerEmail }}</span>
        <span><strong>Customer phone:</strong> {{ $booking->customerPhone }}</span>
        <span><strong>When was made:</strong> {{ $booking->booked_at }}</span>
        <span><strong>Booking until:</strong> {{ $booking->booked_until }}</span>
        <span><strong>Room id:</strong> {{ $booking->customerPhone }}</span>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a class="btn btn-warning me-4" href={{ route('bookings.edit', $booking->id) }}>Update</a> 
        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger p-2">
        </form>
    </div>
    <a class="btn btn-success mt-3" href="{{ route('bookings.index') }}">Return Back to bookings</a>
</div>
@endsection