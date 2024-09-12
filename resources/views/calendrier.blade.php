@extends('template')



@section('title')
Calendrier - JeuxOlympeUPEC

@endsection


@section('content')
<div class="row m-3">
    <h1>Calendrier</h1>
    <div class="col">
        <div class="container">
        
            <table class="table table-bordered" alt="Liste des compétitions">
                <thead class="table-success">
            <th>Compétition</th>
            <th>Sport</th>
            <th>Lieu</th>
            <th>Jour</th>
                </thead>
            @foreach($liste as $elem)

            <tr>
            <td>{{$elem->nom}}</td>
            <td>{{$elem->sport->nom}}</td>
            <td>{{$elem->lieu->nom}}</td>
            <td>{{$elem->jour}}</td>
            </tr>




            @endforeach
            </table>
        </div>
    </div>
    <div class="col">
        <div class="container border border-secondary-subtle p-2">
        <div class="fs-3">Chercher par sport</div>
        <form action="{{route('client.cherchersport')}}" method="post">
            <label class="form-label">Nom du sport</label>
            <input type="text" name="nom">
            <input type="submit" alt="Bouton pour chercher" class="btn btn-success" value="Chercher">
            @csrf
        </form>
        </div>
    
    </div>

</div>

@endsection