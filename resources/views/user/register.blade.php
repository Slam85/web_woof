@extends('layouts.app')
@section('title', 'Création de Compte')
@section('content')

<div>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
    @endforeach
</div>

@endif

</div>
<div class="row d-flex justify-content-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body d-flex justify-content-center ">
            <form class="row g-3 d-flex flex-column" action="{{route('create')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-auto">
                    <input type="text" name="username" placeholder="Username" required />
                </div>
                <div class="col-auto">
                    <input type="text" name="email" placeholder="E-mail" required />
                </div>
                <div class="col-auto">
                    <input type="password" name="password" placeholder="Password" required />
                </div>
                <div class="col-auto">
                    <input type="password" name="password_confirmation" placeholder="Confirm password" required />
                </div>
                <div class="col-auto">
                    <label for="name">Profile photo: </label>
                </div>
                <div class="col-auto">
                    <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" />
                </div>
                <div class="col-auto d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-danger mt-2">Create account</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('footer')