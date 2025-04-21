@extends('layout')

@section('content')

<div class="mt-5 pt-5">
<a href="/register" class="btn btn-primary ">go to Register</a>
</div>

<form method="POST" action="/login" class="mt-5">
    @csrf
    <input name="email" type="email" placeholder="Email" class="form-control" required>
    <input name="password" type="password" placeholder="Password" class="form-control mt-3" required>
    <button type="submit" class="btn btn-success mt-3">Login</button>
</form>

@endsection