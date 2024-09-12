@extends('template')


@section('title')
Accueil - JeuxOlympeUPEC
@endsection


@section('content')

<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/imagejo.jpg" class="d-block w-100" alt="Image des Jeux Olympiques">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="text-light fw-bold">Bienvenue aux jeux Olympiques de UPEC</h3>
          <p>Ici, vous pouvez commander des billets afin d'assister aux matchs de la compétition</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/seine.jpg" class="d-block w-100" alt="Image de la Seine">
        <div class="carousel-caption d-none d-md-block">
          <h5>Calendrier</h5>
          <p>Mais vous pouvez aussi consulter le calendrier des matchs à venir</p>
        </div>
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  
    <style>.carousel .carousel-item {
      height: 500px;
    }
    
    .carousel-item img {
        position: absolute;
        top: 0;
        left: 0;
        min-height: 500px;
    }</style>

  <script src="{{URL::asset('assets/js/test.js')}}"></script>
  </div>

{{-- <div class="">
 <div class=" text-img">
    <div class="container p-3">
    <h3>Bienvenue aux jeux Olympiques de UPEC,</h3> 
    <p>Ici, vous pouvez commander des billets afin d'assister aux matchs de la compétition.
    <br>Mais vous pouvez aussi consulter le calendrier des matchs à venir.</p>
    </div>
</div>
</img>
</div>


<style>.text-img{
    background-image: url("images/imagejo.jpg");
    background-size: cover;
    height:800px;

    


}
</style> --}}


@endsection