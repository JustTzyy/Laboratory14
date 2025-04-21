@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0 rounded-4">
                    <div
                        class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                        <h4 class="mb-0">
                            <i class="bi bi-journal-text me-2"></i>{{ $post->title }}
                        </h4>
                        <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>Back to Posts
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}
                        </p>
                        <p class="fs-5">{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection