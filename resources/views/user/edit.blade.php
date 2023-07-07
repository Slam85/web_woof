@extends('layouts.app')
@section('title', 'Modification du profil')
@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
</div>
@endforeach
</div>

@endif
<div class="row d-flex justify-content-center">
    <div class="card" style="width: 40rem;">
        <div class="card-body d-flex justify-content-center ">
            <form class="row g-3 d-flex flex-column" action="{{route('user.update', Auth::user()->id)}} " method="post">
                @method('put')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="email" value="{{Auth::user()->email}}" placeholder="E-mail" required />

                <div class="col-auto">
                    <input class="form-control" type="text" name="username" value="{{Auth::user()->username}}" placeholder="Username" required />
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" name="email-fake" value="{{Auth::user()->email}}" disabled />
                </div>
                <div class="col-auto">
                    <input class="form-control" type="password" name="password" placeholder="Password" required />
                </div>
                <div class="col-auto">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required />
                </div>
                <div class="col-auto d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-warning mt-2">Update</button>
                </div>
            </form>

        </div>
        <div>
            <sub style="color:grey;"><em>ID n° {{Auth::user()->uuid}}</em></sub>
        </div>
    </div>
</div>

@endsection
@section('footer')