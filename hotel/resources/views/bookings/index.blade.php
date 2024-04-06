@extends('layouts.main')

@section('main')

<h2 class="text-center mb-4">Bookings</h2>

<div class="text-center"><a class="btn btn-success m-3 text-center" href="{{ route('bookings.create') }}">Book a room</a></div>

<table class="table table-bordered" >
    <thead class="table-dark align-center">
        <tr>
        <th >№</th>
        <th scope="col">Customer FullName</th>
        <th scope="col">CustomerEmail</th>
        <th scope="col">CustomerPhone</th>
        <th scope="col">Booked_at</th>
        <th scope="col">Booked_until</th>
        <th scope="col">Room Number</th>
        <th scope="col" class="text-center" colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($bookings as $booking)
          <tr>
            <th scope="row">{{ $booking->id }}</th>
            <td>{{ $booking->customerFirstName.' '.$booking->customerLastName }}</td>
            <td>{{ $booking->customerEmail }}</td>
            <td>{{ $booking->customerPhone }}</td>
            <td>{{ $booking->booked_at }}</td>
            <td>{{ $booking->booked_until }}</td>
            <td><a href={{ route('rooms.show', $booking->room_id) }}>{{ $booking->room_id }}</a></td>
            <td class="text-center">
              <a class="btn btn-info" href={{ route('bookings.show', $booking->id) }}>Show</a> <br>
            </td>
            <td class="text-center">
              <a class="btn btn-warning m-1" href={{ route('bookings.edit', $booking->id) }}>Update</a> <br>
            </td>
            <td class="text-center">
              <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger p-2">
              </form>
            </td>
      @endforeach
    </tbody>
  </table>
@endsection