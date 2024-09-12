@extends('template')

@section('title','Spectateur par compétitions (Admin) - JeuxOlympeUPEC')



@auth

@section('content')

<div class="container p-2">
    <h1>Nombre de spectateur par compétitions</h1>
    <table class="table table-bordered">
        <thead class="table-secondary">
        <th>id</th>
        <th>nom</th>
        <th>nb_spectateurs</th>
        </thead>
    
    
    @foreach($liste as $elem)
        <tr>
            <td>{{$elem->id}}</td>
            <td>{{$elem->nom}}</td>
            <td>{{$elem->spectateur->count()}}</td>
            
            
        </tr>
    @endforeach
    </table>
</div>



@endsection

@endauth