@extends('layouts.app')
@section('title', 'New Post')
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
    <div class="row d-flex justify-content-center">
        <div class="card" style="width: 40rem; height: 20rem;">
            <div class="card-body d-flex justify-content-center ">
                <form action="{{ route('posts.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group" style="width: 35rem;">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group ">
                        <label for="content">Content</label>
                        <textarea style=" height: 10rem;" name="content" class="form-control">{{ old('content') }}</textarea>
                    </div>
                    <div class="col-auto">
                        <label for="name">Post an image: </label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="file" name="image" accept="image/png, image/jpeg, image/jpg" />
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer')