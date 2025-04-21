@extends('layout')

@section('content')

<h1>Welcome, {{ auth()->user()->name }}!</h1>
<p>You are logged in as {{ auth()->user()->email }}</p>

 
<form method="POST" action="/logout">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

    <h1 class="mt-5 pt-5">All Posts</h1>
    <div class="row-6 text-end">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    </div>
    
    @if($posts->isEmpty())
        <div class="alert alert-info">No posts available.</div>
    @else
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{$post->body }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info"><i class="bi bi-view-list"></i></a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection