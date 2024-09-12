@extends('template')

@section('title',' Voir les compétitions (Admin) - JeuxOlympeUPEC')


@section('content')

<div class="container">
    <table class="table">
        <thead>
        <th>id</th>
        <th>nom</th>
        </thead>
        
        
    @foreach($liste as $elem)
        <tr>
            <td>{{$elem->id}}</td>
            <td>{{$elem->nom}}</td>
            <td>{{$elem->prenom}}</td>
            <td>{{$elem->email}}</td>
            <td>{{$elem->competition->nom}}</td>
        
        </tr>
    @endforeach
    </table>
</div>

@endsection