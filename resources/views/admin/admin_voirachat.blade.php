@extends('template')

@section('title',' Voir réservation (Admin) - JeuxOlympeUPEC')



@auth

@section('content')

<div class="container p-2">
    <h1>Réservations</h1>
    <table class="table table-bordered">
        <thead class="table-secondary">
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>comp</th>
        </thead>
    @foreach($liste as $elem)
        <tr>
            <td>{{$elem->id}}</td>
            <td>{{$elem->nom}}</td>
            <td>{{$elem->prenom}}</td>
            <td>{{$elem->email}}</td>
            <td>{{$elem->competition->first()->nom}}</td>
            
            
        </tr>
    @endforeach
    </table>
</div>



@endsection

@endauth