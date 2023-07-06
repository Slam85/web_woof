@extends('layouts.app')
@section('title', 'Create and publish Post')
@section('content')

<section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-danger mt-2">Create</button>
    </form>
</section>
@endsection
@section('footer')