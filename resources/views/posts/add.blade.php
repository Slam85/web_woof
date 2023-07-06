@extends('layouts.app')
@section('title')
    
@section('content', 'Ajout Commentaire')
    <div>
@foreach ($comments as $comments)
    
<input type="text" action="{{route ('welcome.create')}}" method="post">
<button>Valider</button>

@endforeach
       