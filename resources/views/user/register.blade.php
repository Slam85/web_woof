<div>
@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div style="color:red">{{$error}}</div>
    @endforeach
@endif
    <form action="{{route('create')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <input type="text" name="username" placeholder="Pseudo" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <input type="password" name="password" placeholder="Mot de passe" required/>
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required/>
        <input type="submit" value="Créer un compte"/>
    </form>
</div>