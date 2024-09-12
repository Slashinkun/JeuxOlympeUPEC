@extends('template')


@section('title')
 Modifier une compétition (Admin) - JeuxOlympeUPEC
@endsection



@section('content')

@auth

<div class="row">
    <div class="col">
        <h2>Modifier une compétition</h2>
        <p>Modifier seulement les champs que vous voulez modifier <br>Mettez l'id de la compétition que vous voulez modifier</br></p>
        <div class="container">
            <form action="{{route('admin.mjcomp')}}" method="post">
                <label class="form-label">Id</label>
                <input type="number" min="0" name="id"><br>
                <label class="form-label">Nouveau nom:</label>
                <input type="text" name="new_nom" > <br>
                <label class="form-label"> Nouveau sport:</label>
                <input type="text" name="new_sport"><br>
                <label class="form-label"> Nouveau lieu:</label>
                <input type="text" name="new_lieu"><br>
                <label class="form-label"> Nouveau jour:</label>
                <input type="text" name="new_jour"><br>
                <label class="form-label"> Nouveau heure de debut:</label>
                <input type="time" name="new_heure_d"><br>
                <label class="form-label">Nouveau heure de fin:</label>
                <input type="time" name="new_heure_f"><br>

                <input type="submit" value="Modifier" class="btn btn-primary">
            @csrf
            </form>
        </div>
    </div>
    <div class="col">
        <div class="container">
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