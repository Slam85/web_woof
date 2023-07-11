@extends('layouts.app')
@section('title', 'My Posts')
@section('content')


@if(session('success'))
<div id="success-message" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 2000); // Modifier le délai en millisecondes
</script>

<div class="row d-flex wrap m-3">
    @foreach($posts as $post)
    <div class="card mb-2 m-2" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning mt-2">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection