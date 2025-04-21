@extends('layout')

@section('content')

<div class="mt-5 pt-5">
<a href="/login" class="btn btn-primary ">go to Login</a>
</div>

<form method="POST" action="/register" class="mt-5">
    @csrf
    <input name="name" placeholder="Name" required class="form-control">
    <input name="email" type="email" placeholder="Email" required class="form-control mt-3">
    <input name="password" type="password" placeholder="Password" required class="form-control mt-3">
    <input name="password_confirmation" type="password" placeholder="Confirm Password" required class="form-control mt-3">
    <button type="submit" class="btn btn-success mt-3">Register</button>
</form>

@endsection