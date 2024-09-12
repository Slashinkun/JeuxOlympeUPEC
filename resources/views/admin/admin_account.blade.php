@extends('template')


@section('title', 'Admin - JeuxOlympeUPEC')




@section('content')

@auth
<div>
<h2 class="pt-2 m-2">Bienvenue {{Illuminate\Support\Facades\Auth::user()->name}},</h2>
<p class="pt-2 m-2">Ici, vous pouvez ajouter un sport, un lieu ou une competition. Mais aussi la modifier ou supprimer<br>
De plus, vous pouvez aussi voir les réservations fait par les clients.
</div>


</p></div>

<div class="fs-3">Que voulez-vous faire ?</div>

<div class="container border border-secondary-subtle m-2 p-1">
<div class="fs-4">Ajouter</div>
    <div class="px-3 mx-3">
    <a class="btn btn-dark" href="{{ route('admin.lieu')}}">Ajouter un lieu</a>
    </div>

    <div class="px-3 mx-3">
    <a class="btn btn-dark"  href="{{ route('admin.sport')}}">Ajouter un sport</a>
    </div>

    <div class="px-3 mx-3">
    <a class="btn btn-dark" href='{{ route('admin.comp')}}'>Ajouter une compétition</a>
    </div>
</div>

<div class="container border border-secondary-subtle m-2 p-1">
    <div class="fs-4">Supprimer/Modifier</div>
    <div class="px-3 mx-3">
    <a class="btn btn-dark" href='{{ route('admin.majcomp')}}'>Modifier une compétition</a>
    </div>
    <div class="px-3 mx-3">
    <a class="btn btn-dark" href='{{ route('admin.delcomp')}}'>Supprimer une compétition</a>
    </div>
</div>

<div class="container border border-secondary-subtle m-2 p-1">
    <div class="fs-4">Voir</div>
    <div class="px-3 mx-3">
    <a class="btn btn-dark" href='{{ route('admin.voirachat')}}'>Voir les réservations</a>
    </div>
    <div class="px-3 mx-3">
    <a class="btn btn-dark" href='{{ route('admin.voirplace')}}'>Voir le nombre de spectateur</a>
    </div>
    <div class="px-3 mx-3">
        <a class="btn btn-dark" href='{{ route('admin.voirplacerestant')}}'>Voir les places restants</a>
        </div>
    
</div>


<br>
<form action="{{route('auth.logout')}}" method="post">
    @method('delete')
    <input type="submit" class="btn btn-danger m-3" value="Se deconnecter">
    @csrf
</form>

@endauth

@endsection