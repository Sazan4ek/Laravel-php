@extends('layouts.main')

@section('main')

<h2 class="text-center mb-4">Rooms</h2>

<div class="text-center"><a class="btn btn-success m-3 text-center" href="{{ route('rooms.create') }}">Create a room</a></div>

<table class="table table-bordered" >
    <thead class="table-dark align-center">
        <tr>
        <th >№</th>
        <th scope="col">Room Type</th>
        <th scope="col">Price</th>
        <th scope="col">Person Capacity</th>
        <th scope="col" class="text-center" colspan="4">Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($rooms as $room)
          <tr class="">
            <th scope="row">{{ $room->id }}</th>
            <td>{{ $room->type }}</td>
            <td>{{ $room->price }}</td>
            <td>{{ $room->personCapacity }}</td>

            <td class="text-center">
              @if($room->booking)
                <p class="text-danger">Booked</p>
              @else
                <a class="btn btn-primary" href={{ route('bookings.create') }}>Book</a> <br>
              @endif
            </td>
            <td class="text-center">
              <a class="btn btn-info" href={{ route('rooms.show', $room->id) }}>Show more</a> <br>
            </td>
            <td class="text-center">
              <a class="btn btn-warning m-1" href={{ route('rooms.edit', $room->id) }}>Update</a> <br>
            </td>
            <td class="text-center">
              <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger p-2">
              </form>
            </td>
      @endforeach
    </tbody>
  </table>
@endsection