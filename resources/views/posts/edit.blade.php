@extends('layout')

@section('content')
    <div class="card mt-5 pt-5">
        <div class="card-body">
        <h3 class="mb-5">Edit Post</h3>

            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                </div>

                <div class="mb-3">
                    <label>Body</label>
                    <input type="text" name="body" class="form-control" rows="5" required value="{{ $post->body }}"></input>
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
@endsection
