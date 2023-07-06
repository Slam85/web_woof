@extends('layouts.app')
@section('title', 'Feed')

@section('content')

@forelse ($posts as $post)
<div class="row">
    <div class="col-sm-6 mb-3 mb-m-0">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                @isset($post->user)
                <p class="card-text">Posted by: {{ $post->user->username }}</p>
                @endisset
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse
@endsection