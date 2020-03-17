@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white title" {{--onclick="myFunction()"--}} href="#title">Panoramica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#services">Servizi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#graphic">Statistiche</a>
        </li>
      </ul>
    </div>
    <div class="ul-right col-lg-6">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-share-square"></i> Condividi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-heart"></i> Salva</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container stacca">
  <div class="row">
    <div class="col-lg-12 scrol-left">
      <div class="title" id="title">
        <h2>{{$apartment->titolo}}</h2>
        <div class="user-container float-right">
          <img class="user-img" src="https://a0.muscache.com/im/pictures/user/bbb4fb56-fdd7-4ee5-8cc6-fc03ffd4d7bf.jpg?aki_policy=profile_x_medium" alt="">
          <p class="text-center">{{$apartment->user->first_name}}</p>
        </div>
      </div>
      <div class="info section">
        <a href="#">{{$apartment->cita}}</a>
        <p>Stanze: {{$apartment->stanze}}, Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</p>
      </div>
      <div class="description section">
        <p>{{$apartment->descrizione}}</p>
      </div>
      <div class="services-container section" id="services">
        <strong>Servizi</strong>
        <div class="services">
          <div class="col-lg-6">
            @forelse ($apartment->options as $option)
              {{ $option->nome }}{{ $loop->last ? '' : ',' }}
            @empty
                -
            @endforelse
          </div>
        </div>
      </div>


      <!-- parte da implementare con le immagini -->
      <div class="room section">
        <p>Immagini appartamento</p>
        <div class="row container-admin-img container-fluid">
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->title}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
          <div class="col-sm-2">
            <!-- <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}"> -->
            <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
          </div>
        </div>
      </div>
      <!-- fine -->


      <div class="graphic " id="graphic">
        <div class="graphic-title">
          <h3>Visualizzazioni</h3>
        </div>
        <div class="grafici">
          <img src="https://lh3.googleusercontent.com/proxy/677Gcfcq6m0jUxE7pQG8HbQl436suKSrVXTYFRWkH43v4HlNfKVhbbh6XzwTz-kiBE9OtASW5rCidHkS6a-K0OmMNP8brmU3" alt="">
        </div>
      </div>

      <div class="graphic float-left" id="graphic">
        <div class="graphic-title">
          <h3>Messaggi</h3>
        </div>
        <div class="grafici">
          <img src="https://accentsconagua.com/img/images_6/how-to-create-a-line-chart-with-chartjs.png" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
