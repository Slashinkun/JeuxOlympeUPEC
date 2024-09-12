@extends('template')


@section('title')
 Ajouter un sport (Admin) - JeuxOlympeUPEC
@endsection


@section('content')

@auth


<div class="row">
    <div class="col">
        <div class="container">
        <h1 class="">Ajouter un sport</h1>
            <form action="{{route('admin.addsport')}}" method="post">
                <label class="form-label"> Nom du sport </label>
                <input type="text" name="nom" class="form-control" ><br>
                <input type="submit" value="Ajouter" class='btn btn-primary'>
            @csrf
            </form>
        </div>
    </div>
    
    <div class="col">
        <div class="container p-3">
            <h3>Liste des sports ajouté</h3>
            <table class="table table-bordered">
                <thead class="table-secondary">
                <th>id</th>
                <th>nom</th>
                </thead>
            @foreach($liste as $elements)
                <tr>
                    <td>{{$elements->id}}</td><td>{{$elements->nom}}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>


@endauth

@endsection