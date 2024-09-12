<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark " alt="Barre de navigation" >
    <div class="container-fluid">
      <a class="navbar-brand sm-3"><img src="/images/logojo.png" class="img-fluid me-3" alt="Logo du site" height="50" width="50">Jeux Olympiques</a>
      <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" alt="Accueil" href="{{route('accueil')}}">Accueil</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" alt="Calendrier" href="{{route('client.calendrier')}}">Calendrier</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" alt="Billeterie" href="{{route('client.billetterie')}}">Billetterie</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link text-danger" href="{{route('auth.compte')}}">Admin</a>
          </li>
          @endauth
        </ul>
        @guest
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
          <a class="btn btn-outline-danger" href='{{ route('auth.login')}}'>Organisateur : Se connecter</a>
        </div>
        @endguest
        @auth
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
          <a class="btn btn-outline-danger" href='{{ route('auth.createLogin')}}' >Cree un compte organisateur</a>
        </div>
        @endauth
      </div>
      
            
      
      
    </div>
</nav>
    
@yield('content')



<footer class="bg-dark p-3">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Service client</a></li>
  </ul>
  <p class="text-center text-light">© 2024 JeuxOlympeUPEC, Inc</p>
</footer> 
  


</body>
</html>