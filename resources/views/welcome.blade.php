@extends('layouts.app')
@section('title', 'Latest Posts')
@section('content')
<section>

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-sm-6 mb-3 mb-m-0">
            <div class="card" style="min-height:350px;">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text">Posted by: {{ $post->user->username }}</p>
                </div>
                @if (Route::has('login'))
                @auth
                <div class="row commentslikes">
                    <div class="col-auto mb-3 ms-3">

                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="row d-flex align-items-center mt-2">
                                <div class="col-auto">
                                    <input class="form-control" type="text" name="content" placeholder="Add comment"
                                        value="{{ old('content') }}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="add" class="btn btn-outline-danger">Add</button>

                                </div>
                                <div class="col-auto">
                                    <a style="text-decoration:none; color:black;"
                                        href="{{route('likes.create', $post->id)}}" class="likes">
                                        <img src="/images/images.png" />
                                        <p class="m-2">{{$post->like}}</p>
                                    </a>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="accordion" id="{{$post->title}}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">

                                <a style="text-decoration:none; color:black;" class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$post->id}}"
                                    aria-expanded="true" aria-controls="collapse{{$post->id}}">
                                    Comments
                                </a>
                            </h2>
                            <div id="collapse{{$post->id}}" class="accordion-collapse collapse "
                                data-bs-parent="#{{$post->id}}">
                                <div class="accordion-body">
                                    @foreach ($comments as $comment)
                                    @if ($comment->post_id == $post->id)
                                    <span class="me-2" style="height:25px;"> {{$comment->content}}
                                        @if ($comment->user_id == Auth::id())

                                        <form action="{{ route('comment.destroy', $comment) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="delete" class="btn btn-outline-danger"
                                                style="border-radius: 50px;--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">X</button>
                                        </form>

                                        <form action="{{ route('comment.destroy', $comment) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="delete" class="btn btn-outline-danger"
                                                style="border-radius: 50px;--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">X</button>
                                        </form>

                                    </span>
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection
@section('footer')