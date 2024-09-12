@extends('template')

@section('title','Place restantes par compétitions (Admin) - JeuxOlympeUPEC')



@auth

@section('content')

<div class="container p-2">
    <h1>Places restantes par compétitions</h1>
    <table class="table table-bordered">
        <thead class="table-secondary">
        <th>id</th>
        <th>nom</th>
        <th>place_restantes</th>
        </thead>
    @foreach($liste as $elem)
        <tr>
            <td>{{$elem->id}}</td>
            <td>{{$elem->nom}}</td>
            <td>{{$rest = ($elem->lieu->capacite_max) - $elem->spectateur->count()}}</td>
        </tr>
    @endforeach
    </table>
</div>



@endsection

@endauth