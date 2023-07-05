<p>Edition du Profil</p>
@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div style="color:red">{{$error}}</div>
    @endforeach
@endif
<form action="{{route('user.update', Auth::user()->id)}} " method="post">
    @method('put')  
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input type="text" name="username" value="{{Auth::user()->username}}"required/>
    <input type="text" name="email-fake" value="{{Auth::user()->email}}" disabled/>
    <input type="hidden" name="email" value="{{Auth::user()->email}}" required />
    <input type="password" name="password" placeholder="Mot de passe" required/>
    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required/>
    <input type="submit" value="Modifier"/>
</form>
    