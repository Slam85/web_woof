@extends('layouts.app')
@section('title')
    
@section('content', 'Ajout Commentaire')
    <div>

        @if($comment 'create')
       <input type="text" action="{{route ('welcome.create')}}" method="post">
       <button>Valider</button>
        @csrf
        @endif
        @if($comment =='show')
        <input/>  
        @csrf
        @endif

    </div>
@endsection