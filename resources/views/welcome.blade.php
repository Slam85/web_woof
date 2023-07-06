@extends('layouts.app')
@section('title', 'Latest Posts')
@section('content')
<section>
<div class="row">
            <div class="col-sm-6 mb-3 mb-m-0">
                <div class="card h-40">
                    <div class="card-body">
                        <h5 class="card-title">POST TITLE</h5>
                        <p class="card-text">This is a post about how wonderful dogs are. Real content to come later...
                        </p>
                    </div>
                    <div class="col-auto mb-3 ms-3">
                        <a href="#" class="btn btn-danger">Comment</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card h-40">
                    <div class="card-body">
                        <h5 class="card-title">POST TITLE</h5>
                        <p class="card-text">This is a post about how wonderful dogs are. Real content to come later...
                        </p>
                    </div>
                    <div class="col-auto mb-3 ms-3">
                        <a href="#" class="btn btn-danger">Comment</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-m-0">
                <div class="card h-40">
                    <div class="card-body">
                        <h5 class="card-title">POST TITLE</h5>
                        <p class="card-text">This is a post about how wonderful dogs are. Real content to come later...
                        </p>
                    </div>
                    <div class="col-auto mb-3 ms-3">
                        <a href="#" class="btn btn-danger">Comment</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card h-40">
                    <div class="card-body">
                        <h5 class="card-title">POST TITLE</h5>
                        <p class="card-text">This is a post about how wonderful dogs are. Real content to come later...
                        </p>
                    </div>
                    <div class="col-auto mb-3 ms-3">
                        <a href="{{route ('welcome.create')}}" class="btn btn-danger">Comment</a>
                        @foreach ($comments as $comments)
    
                        <input type="text" action="{{route ('welcome.create')}}" method="post">
                        <button type="submit" >Valider</button>
                        
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>

</section>
@endsection
@section('footer')