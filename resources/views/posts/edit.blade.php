@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="mb-4 fw-bold text-warning">
                        <i class="bi bi-pencil-fill me-2"></i>Edit Post
                    </h3>

                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="body" class="form-label">Post Body</label>
                            <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i>Back to Posts
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save2-fill me-1"></i>Update Post
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
