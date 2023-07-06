@extends('layouts.app')
@section('title', 'Latest Posts')
@section('content')
<section>

    @foreach ($posts as $post)
    <div class="row">
        <div class="col-sm-6 mb-3 mb-m-0">
            <div class="card h-40">
                <div class="card-body">
                    <h5 class="card-title">POST TITLE</h5>
                    <p class="card-text">This is a post about how wonderful dogs are. Real content to come later...
                    </p>
                </div>
                @if (Route::has('login'))
                @auth
                <div class="row commentslikes">
                    <div class="col-auto mb-3 ms-3">
                        <a href="#" class="btn btn-danger">Comment</a>
                    </div>
                    <div class="col-auto fakebtnlikes m-3">
                        <a href="#" class="likes"><img src="/images/images.png" /> </a>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection
@section('footer')