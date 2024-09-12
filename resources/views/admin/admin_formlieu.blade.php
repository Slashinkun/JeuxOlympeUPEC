@extends('template')


@section('title')
 Ajouter un lieu (Admin) - JeuxOlympeUPEC
@endsection




@section('content')

@auth

<div class="row">
    <div class="col">
        <div class="container">
        <h1 class="">Ajouter un lieu :</h1>
            <form action="{{route('admin.addlieu')}}" method="post">
                <label class="form-label">Nom du lieu </label>
                <input type="text" name="nom" class="form-control"><br>
                <label class="form-label">Capacité max</label>
                <input type="number"  min="0" name="capacite_max" class="form-control"><br>
                <input type="submit" value="Ajouter" class="btn btn-primary">
            @csrf
            </form>
        </div>
    </div>
    
    <div class="col">
        <div class="container p-3">
            <h3>Liste des lieux</h3>
            <table class="table table-bordered">
                <thead class="table-secondary">
                <th>id</th>
                <th>nom</th>
                <th>capacite_max</th>
                </thead>
            @foreach($liste as $elements)
                <tr>
                    <td>{{$elements->id}}</td><td>{{$elements->nom}}</td><td>{{$elements->capacite_max}}</td>
                </tr>
            @endforeach
            </table>
        </div> 
    </div>
</div>



        
    


@endauth


@endsection