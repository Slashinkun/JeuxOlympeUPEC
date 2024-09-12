@extends("template")

@section("title", "Votre réservation - JeuxOlympeUPEC")

@section("content")

<p class="p-3">Votre réservation a bien été enregistré. Voici un récapitulatif de votre réservation.
    <br><b>Si il y a une erreur sur votre réservation, veuillez prendre contact avec le service client.</b></br>
</p>


<h2 class=''>Votre réservation</h2>
<div>Vous etes : <b>{{$liste->nom}} , {{$liste->prenom}}</b></div>
<div>Email : <b>{{$liste->email}}</b></div>
<div>Téléphone : <b>{{$liste->tel}}</b> </div>

<h4>Vous avez reserver pour :</h4>
@foreach($liste->competition as $elem)
<b>{{$elem->nom}}</b><br>   
@endforeach









@endsection