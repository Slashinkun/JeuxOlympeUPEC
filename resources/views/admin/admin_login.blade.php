@extends('template')

@section('title')
Se connecter (Admin) - JeuxOlympeUPEC
@endsection



@section('content')

@guest

<div class="container p-3">
    <h2>Se connecter</h2>
<form action="{{route('auth.login')}}" class="px-3" method="post">
    <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{old('email')}}">
    @error('email')
    {{$message}}
    @enderror
    </div>

    <div class="mb-3">
    <label class="form-label"> Mot de passe :</label>
    <input type="password" class="form-control" name="password" >
    @error("password")
    {{$message}}
    @enderror
    <br>
    </div>
    <input type="submit" class="btn btn-primary" value="Se connecter">
</div>




    @csrf
</form>

@endguest

@endsection