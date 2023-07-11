@extends('layouts.app')
@section('title', 'Page de Connexion')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body ">
            <form class="row g-3 d-flex flex-column" action="{{route('authenticate')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-auto">
                    <input type="email" name="email" class="form-control" id="staticEmail2" placeholder="Login" required>
                </div>
                <div class="col-auto">
                    <input type="password" name="password" class="form-control" id="inputPassword2" placeholder="Password" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-danger mt-2">Login</button>
                </div>
            </form>

            <p>No Account yet? <a href="{{route('register')}}">Click here!</a></p>
        </div>
    </div>
</div>
@endsection
@section('footer')