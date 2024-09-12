@extends('template')


@section('title')
Billetterie - JeuxOlympeUPEC
@endsection



@section('content')
<div class="container">
    <h1>Billetterie</h1>
    <div class="row m-3">
        <div class="col">
            <table class="table table-bordered">
            <thead class="table-success">
            <th>Nom</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Prix</th>
            </thead>
           
            @foreach($liste as $elem)

            <tr>
                <td>{{$elem->nom}}</td>
                <td>{{$elem->lieu->nom}}</td>
                <td>{{$elem->jour}}</td>
                <td>{{$elem->heure_debut}}</td>
                <td>{{$elem->heure_fin}}</td>
                <td>{{$elem->prix}} euros</td>
                

            </tr>


            @endforeach

            </table>
        </div>
        <div class="col">
            <div class="container border border-secondary-subtle">
            <div class="fs-3">Chercher par prix</div>
            <form action="{{route('client.chercherprix')}}" method="post">
                <label class="form-label">Prix minimum</label>
                <input type="number" name="prix_min" min=0 >
                <label class="form-label">Prix maximum</label>
                <input type="number" name="prix_max" min=0 >
                <input type="submit" class="btn btn-success" alt="Bouton pour chercher par prix"value="Chercher">
                @csrf
            </form>
            </div><br>
            <div class="container border border-secondary-subtle">
                <div class="fs-3">Réserver</div>
                <form action="{{route('client.achat')}}" method="post">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" >
                    <label class="form-label">Prenom</label>
                    <input type="text" name="prenom"><br>
                    <label class="form-label">Email</label>
                    <input type="email" name="email">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="tel"> <br>
                    <div class="container">
                        <div class='row'>
                            <p>Remplissez le nombre de champs selon le nombre de compétitions que voulez reserver</p>
                            <div class="col">
                    <label class="form-label">Compétition 1</label><br>
                    <input type="text" name="comp"> 
                    {{-- <label class=form-label>Nombre de billet pour la compétition 1</label>
                    <input type="number" name="quan_1">  --}}
                            </div>
                            <div class="col">
                    <label class="form-label">Compétition 2</label>
                    <input type="text" name="comp2"> <br>
                    
                    
                        </div>
                        </div>
                    </div>

                    <div class="fs-4">Réserver pour quelqu'un</div>
                    <p>Remplissez ces champs que si vous reservez pour quelqu'un d'autre<p>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="fs-5">Personne 1</div>
                                <label class="form-label">Nom de la personne 1</label>
                                <input type="text" name="nom1" > <br>
                                <label class="form-label">Prenom de la personne 1</label>
                                <input type="text" name="prenom1" >
                            </div>
                            <div class="col">
                                <div class="fs-5">Personne 2</div>
                                <label class="form-label">Nom de la personne 2</label>
                                <input type="text" name="nom2" > <br>
                                <label class="form-label">Prenom de la personne 2</label>
                                <input type="text" name="prenom2" > 
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" alt="Bouton pour acheter" class="btn btn-success" value="Acheter">
                    @csrf
                </form>
                </div>
        
        </div>
    

    </div>
</div>

@endsection