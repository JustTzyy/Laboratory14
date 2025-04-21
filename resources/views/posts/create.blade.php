@extends('layout')

@section('content')
    <div class="card mt-5 pt-5">
        <div class="card-body">
        <h3 class="mb-5">Create New Post</h3>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Body</label>
                    <input type="text" name="body" class="form-control" rows="5" required></input>
                </div>

                <input type="text" value="{{  auth()->user()->id }}" name="userID" hidden>

                <button type="submit" class="btn btn-success">Create Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
@endsection
