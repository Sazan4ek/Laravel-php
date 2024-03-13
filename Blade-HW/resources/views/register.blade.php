@extends('layout.layouts')

@section('main')
<form method="POST" action="user/store">
    @csrf
    <div class="m-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" name="fullName" class="form-control" id="fullName">
      </div>
    <div class="m-3">
      <label for="email" class="form-label">Email address</label>
      <input type="text" name="email" class="form-control" id="email">
      <div id="email" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="m-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
      <div id="password" class="form-text">Your password - your secret.</div>
    </div>
    <div class="m-3">
        <label for="confirmPassword" class="form-label">Confirm your Password</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
    </div>
    <div class="m-3 form-check">
      <input type="checkbox" class="form-check-input" id="remember">
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" name="send" class="m-3 btn btn-primary">Send</button>
  </form>
@endsection