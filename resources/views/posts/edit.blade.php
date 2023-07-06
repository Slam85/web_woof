@extends('layouts.app')
@section('title', 'Post Edit')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}" disabled>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control">{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection