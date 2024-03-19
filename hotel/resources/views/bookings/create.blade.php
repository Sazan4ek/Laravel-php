@extends('layouts.main')

@section('main')
<form method="POST" action={{ route('bookings.store') }}>
    @csrf
    <div class="m-3">
        <label for="customerFirstName" class="form-label">Your FirstName <span class="text-danger">*</span></label>
        <input type="text" name="customerFirstName" class="form-control" id="customerFirstName" value={{ old('customerFirstName') }}>
    </div>
    @if($errors->has('customerFirstName'))
      <div class="alert alert-danger">
        @foreach ($errors->get('customerFirstName') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
        <label for="customerLastName" class="form-label">Your FirstName <span class="text-danger">*</span></label>
        <input type="text" name="customerLastName" class="form-control" id="customerLastName" value={{ old('customerLastName') }}>
    </div>
    @if($errors->has('customerLastName'))
      <div class="alert alert-danger">
        @foreach ($errors->get('customerLastName') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
      <label for="customerEmail" class="form-label">Email address <span class="text-danger">*</span></label>
      <input type="text" name="customerEmail" class="form-control" id="customerEmail" value={{ old('customerEmail') }}>
    </div>
    @if($errors->has('customerEmail'))
      <div class="alert alert-danger">
        @foreach ($errors->get('customerEmail') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
      <label for="customerPhone" class="form-label">Your phone <span class="text-danger">*</span></label>
      <input type="phone" name="customerPhone" class="form-control" id="customerPhone" value={{ old('customerPhone') }}>
    </div>
    @if($errors->has('customerPhone'))
      <div class="alert alert-danger">
        @foreach ($errors->get('customerPhone') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
        <label for="room_id" class="form-label">Id of room which you book <span class="text-danger">*</span></label>
        <input type="text" name="room_id" class="form-control" id="room_id" value={{ old('room_id') }}>
    </div>
    @if($errors->has('room_id'))
      <div class="alert alert-danger">
        @foreach ($errors->get('room_id') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
      <label for="booked_until" class="form-label">Date by which you book the room </label>
      <input type="date" max="" name="booked_until" class="form-control date" id="booked_until" value={{ old('booked_until') }}>
    </div>
    @if($errors->has('booked_until'))
      <div class="alert alert-danger">
        @foreach ($errors->get('booked_until') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <button type="submit" name="Create" class="m-3 btn btn-primary">Send</button>
  </form>
@endsection