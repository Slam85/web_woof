@extends('layouts.app')

@section('content')
<h1>Posts</h1>
<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

@forelse ($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>
        @isset($post->user)
        <p class="card-text">Posted by: {{ $post->user->name }}</p>
        @endisset
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
</div>
@empty
@endforelse
@endsection