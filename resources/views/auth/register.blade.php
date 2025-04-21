@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 450px; border-radius: 1rem;">
            <div class="card-body">
                <h3 class="text-center mb-4 text-primary">
                    <i class="bi bi-person-plus me-2"></i>Register
                </h3>

                <div class="text-end mb-3">
                    <a href="/login" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="bi bi-exclamation-circle me-1"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Enter full name"
                            value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="Enter email"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" id="password" type="password" class="form-control"
                            placeholder="Enter password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control"
                            placeholder="Re-enter password" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-check-circle-fill me-1"></i> Register
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection