<div>

<form action"{{route('authenticate')}}" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required  />
    <label for="password ">Mot De Passe</label>
    <input  type="password" name="password"  required/>
    <input type="submit" value="connexion" />
    <input type="reset" value="Effacer" />
</form

<p>Pas encore de Compte? <a href="{{route('register')}}">Cliquez ici!</a></p>
</div>