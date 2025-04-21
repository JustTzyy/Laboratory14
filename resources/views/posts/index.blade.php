@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h2 class="fw-bold">Welcome, {{ auth()->user()->name }}!</h2>
                                <p class="text-muted mb-2">
                                    You are logged in as <strong>{{ auth()->user()->email }}</strong>
                                </p>
                            </div>
                            <form method="POST" action="/logout"  onclick="return confirm('Are you sure you want to logout?')">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="bi bi-exclamation-circle me-1"></i> {{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                            <h4 class="mb-0">📋 All Posts</h4>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary"
                                onclick="return confirm('Are you sure you want to create a new post?')">
                                <i class="bi bi-plus-circle me-1"></i> Create New Post
                            </a>
                        </div>

                        @if ($posts->isEmpty())
                            <div class="alert alert-warning mt-4 text-center">
                                <i class="bi bi-info-circle me-1"></i> No posts available.
                            </div>
                        @else
                            <div class="table-responsive mt-3">
                                <table class="table table-hover align-middle shadow-sm rounded-3">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Body</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td class="fw-semibold">{{ $post->title }}</td>
                                                <td>{{ Str::limit($post->body, 60) }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('posts.show', $post) }}"
                                                            class="btn btn-sm btn-outline-info"
                                                            onclick="return confirm('Do you want to view this post?')" title="View">
                                                            <i class="bi bi-eye"></i>
                                                        </a>

                                                        <a href="{{ route('posts.edit', $post) }}"
                                                            class="btn btn-sm btn-outline-warning"
                                                            onclick="return confirm('Proceed to edit this post?')" title="Edit">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>

                                                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this post?')"
                                                                title="Delete">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection