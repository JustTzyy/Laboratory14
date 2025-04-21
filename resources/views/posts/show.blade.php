@extends('layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-sm w-75">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ $post->title }}</h4>
                <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm">← Back to Posts</a>
            </div>
            <div class="card-body text-center">
                <p class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</p>
                <p class="fs-5">{{ $post->body }}</p>
            </div>
        </div>
    </div>
@endsection
