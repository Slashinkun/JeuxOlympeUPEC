

@extends('template')


@section('title')
 Ajouter une compétition (Admin) - JeuxOlympeUPEC
@endsection


@section('content')

@auth

<div class="row">
    <div class="col">
        <div class="container">
            <h1 class="">Ajouter une competition :</h1>
            <form action="{{route('admin.addcomp')}}" method="post">
                <label class="form-label"> Nom </label>
            <input type="text" name="nom" ><br>
                <label class="form-label"> Sport </label>
            <input type="text" name="sport" ><br>
                <label class="form-label">Lieu </label>
                <input type="text" name="lieu"><br>
                <label class="form-label">Jour </label>
                <input type="text" name="jour" ><br>
                <label class="form-label"> Heure de debut</label>
            <input type="time" name="heure_debut" ><br>
                <label class="form-label"> Heure de fin</label>
            <input type="time" name="heure_fin" ><br>
                <label class="form-label">Prix</label>
                <input type="number" min="0" name='prix'><br>
                <input type="submit" value="Ajouter" class="btn btn-primary">
            @csrf
            </form>
        </div>
    </div>

    <div class="col">
        <div class="container p-3">
            <h3>Compétitons déja inscrites</h3>
            <table class="table table-bordered">
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
        </div>
    </div>


</div>

@endauth


@endsection