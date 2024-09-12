@extends('template')


@section('title')
S'enregistrer (Admin) - JeuxOlympeUPEC
@endsection


@section('content')


<div class="fs-2">S'enregistrer</div>

<div class="container">
<form action="{{route('auth.createLogin')}}" method="post">
    Nom :<input type="text" class="form-control" name="name"><br></br>
    Email :<input type="email" class="form-control" name="email"><br></br>
    Mot de passe :<input type="password" class="form-control" name="password"><br></br>
    <input type="submit"  class="btn btn-primary" value="S'enregistrer"><br>
@csrf    
</form>
</div>
@endsection