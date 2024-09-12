@extends('template')


@section('title')
 Supprimer une compétition (Admin) - JeuxOlympeUPEC
@endsection


@section('content')

@auth
<h1>Supprimer une compétition</h1>
<form action="{{route('admin.compdel')}}" method="post">
    <label class="form-label"> Nom de la compétition :</label>
    <input type="text"  name="nom">
    <input class="btn btn-primary" type="submit" value="Supprimer">
@csrf
</form>

<table class="table table-bordered p-2">
    <thead class="table-secondary">
        <th>id</th>
        <th>nom</th>
        <th>sport</th>
        <th>lieu</th>
        <th>jour</th>
        <th>heure_debut</th>
        <th>heure_fin</th>
    </thead>
    @foreach($liste as $elem)
        <tr>
            <td>{{$elem->id}}</td>
            <td>{{$elem->nom}}</td>
            <td>@if(empty($elem->sport->nom))
                    null
                @else
                {{$elem->sport->nom}}
                @endif
                </td>
            <td>@if(empty($elem->lieu->nom))
                    null
                @else
                {{$elem->lieu->nom}}
                @endif</td>
            <td>{{$elem->jour}}</td>
            <td>{{$elem->heure_debut}}</td>
            <td>{{$elem->heure_fin}}</td>
        
        </tr>
    @endforeach
    </table>
@endauth

@endsection