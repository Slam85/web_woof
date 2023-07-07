@extends('layouts.app')
@section('title', 'Latest Posts')
@section('content')
<section>

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-sm-6 mb-3 mb-m-0">
            <div class="card h-40">
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
                        <form action="{{route ('comments.store', $post->id)}}" method="post">
                            @csrf
                            <input class="form-control" type="text" name='content' placeholder="Ajouter un commentaire" value="{{ old ('content')}}">
                            <button type="submit" class="btn btn-outline-danger mt-2">Comment</button>
                        </form>

                        @foreach ($comments as $comment)
                        <li>{{$comment->content}}</li>
                        @endforeach
                    </div>

                    <div class=" col-auto fakebtnlikes m-3">
                        <a href="{{route('likes.create', $post->id)}}" class="likes"><img src="/images/images.png" />
                        </a>
                        <p class="m-2">{{$post->like}}</p>
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