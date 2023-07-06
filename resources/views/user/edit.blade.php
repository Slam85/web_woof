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
            <form class="row g-3 d-flex flex-column  "  action="{{route('user.update', Auth::user()->id)}} " method="post">
            @method('put')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="email" value="{{Auth::user()->email}}" required />
                
                <div class="col-auto">
                    <input type="text" name="username" value="{{Auth::user()->username}}"required/>
                </div>
                <div class="col-auto">
                    <input type="text" name="email-fake" value="{{Auth::user()->email}}" disabled/>
                </div>
                <div class="col-auto">
                    <input type="password" name="password" placeholder="Mot de passe" required/>
                </div>
                <div class="col-auto">
                <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required/>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-danger mb-3">Modifier</button>
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