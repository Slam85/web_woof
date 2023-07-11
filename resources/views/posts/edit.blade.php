@extends('layouts.app')
@section('title', 'Post Edit')
@section('content')


<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="hidden" name="title" value="{{ $post->title }}" required />
                <input type=" text" name="fakeTitle" class="form-control" value="{{ $post->title }}" disabled>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-success mt-2">Update</button>
        </form>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection