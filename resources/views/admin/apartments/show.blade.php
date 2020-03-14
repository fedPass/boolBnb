@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white" href="#title">Panoramica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#services">Servizi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#maps">La posizione</a>
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
<div class="container-fluid room">
  <div class="row">
    <div class="col-lg-6 col-md-6 previev">
      <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->title}}">
    </div>
    <div class="col-lg-6 col-md-6 previev">
      <div class="col-lg-6 col-md-12 top">
        <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
        <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
      </div>
      <div class="col-lg-6 bottom">
        <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
        <img class="room-img" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-sm-12 scrol-left">
      <div class="title" id="title">
        <h2>{{$apartment->titolo}}</h2>
        <div class="user-container float-right">
          <img class="user-img" src="https://a0.muscache.com/im/pictures/user/bbb4fb56-fdd7-4ee5-8cc6-fc03ffd4d7bf.jpg?aki_policy=profile_x_medium" alt="">
          <p class="text-center">{{$apartment->user->name}}</p>
        </div>
      </div>
      <div class="info section">
        <a href="#">{{$apartment->cita}}</a>
        <p>Stanze:{{$apartment->stanze}}  Posti letto:{{$apartment->posti_letto}} Bagni:{{$apartment->bagno}}</p>
      </div>
      <div class="other-info-container section">
        <div class="other-info">
          <strong><i class="fas fa-home"></i> Casa intera</strong>
          <p>Appartamento: sarà a tua completa disposizione.</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-broom"></i> Pulizia perfetta</strong>
          <p>4 ospiti recenti hanno affermato che questo alloggio ha una pulizia impeccabile.</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-map-marker-alt"></i> Ottima posizione</strong>
          <p>Il 100% degli ospiti recenti ha valutato la posizione con 5 stelle.</p>
        </div>
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
      <div class="maps" id="maps">
        <div class="maps-title">
          <h3>Il quartiere</h3>
          <p>La casa di {{$apartment->user->name}} si trova a {{$apartment->cita}}, {{$apartment->provincia}}, {{$apartment->paese}}.</p>
        </div>
        <div class="maps-location">
          <img src="https://www.google.com/maps/d/thumbnail?mid=1eBOTPbXdQ5Zn4cj_n06wOPUVQHQ" alt="">
        </div>
      </div>
    </div>
    <div class="col-lg-4 fix-right">
      <div class="card card-scroll" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">Scrivi al proprietario</h5>
          <small>* Campi obbligatori</small>
          <form action="" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nome*</label>
              <input type="text" class="form-control" name='name' id="name"  placeholder="Nome" required>
            </div>
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="subject">Oggetto*</label>
              <input type="text" class="form-control" name='subject' id="subject" placeholder="Oggetto" required>
            </div>
            <div class="form-group">
              <label for="message">Messaggio*</label>
              <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
