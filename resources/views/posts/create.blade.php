@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h3 class="mb-4 fw-bold text-primary">
                            <i class="bi bi-pencil-square me-2"></i>Create New Post
                        </h3>

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter a post title" required>
                            </div>

                            <div class="mb-4">
                                <label for="body" class="form-label">Post Body</label>
                                <textarea name="body" id="body" class="form-control" rows="5"
                                    placeholder="Write something meaningful..." required></textarea>
                            </div>

                            <input type="hidden" name="userID" value="{{ auth()->user()->id }}">

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left-circle me-1"></i>Back to Posts
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-1"></i>Create Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection