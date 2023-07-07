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
            <form class="row g-3 d-flex flex-column  "  action="{{route('user.update')}} " method="post" enctype="multipart/form-data">
            @method('put')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="email" value="{{Auth::user()->email}}" required />
                <input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" required />
                
                <div class="col-auto">
                    <input class="form-control" type="text" name="username" value="{{Auth::user()->username}}"required/>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" name="email-fake" value="{{Auth::user()->email}}" disabled/>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="password" name="password" placeholder="Password" required/>
                </div>
                <div class="col-auto">
                    <input  class="form-control"type="password" name="password_confirmation" placeholder="Password" required/>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="file" name="image" accept="image/png, image/jpeg, image/jpg" />
                </div>
                <div class="col-auto">
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