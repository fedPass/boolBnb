@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white {{Route::currentRouteName() == 'apartments/{id}#title' ? 'active' : ''}}" href="#title">Panoramica</a>
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
          <a class="nav-link text-white" href="#"><i class="far fa-share-square"></i> Condividi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="far fa-heart"></i> Salva</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid room">
  <div class="row">
    <div class="col-lg-6 col-md-6 previev">
      <img class="room-img-public" src="{{$apartment->img}}" alt="foto:{{$apartment->title}}">
    </div>
    <div class="col-lg-6 col-md-6 previev">
      <div class="col-lg-6 col-md-12 top">
        <img class="room-img-public" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
        <img class="room-img-public" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
      </div>
      <div class="col-lg-6 bottom">
        <img class="room-img-public" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
        <img class="room-img-public" src="{{$apartment->img}}" alt="foto:{{$apartment->titolo}}">
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
          <strong>Proprietario</strong>
          <p class="text-center">{{$apartment->user->first_name}}</p>
        </div>
      </div>
      <div class="info section">
        <a href="#">{{$apartment->cita}}</a>
        <p>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</p>
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
      <div class="other-info-container section">
        <div class="other-info">
          <h2>Ospitato da {{$apartment->user->first_name}}</h2>
        </div>
        <div class="other-info">
          Hello my name is {{$apartment->user->first_name}}. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
      @include('layouts/partials/maps')
    </div>
    <div class="col-lg-4 fix-right">
      <div class="card-scroll" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">Scrivi al proprietario</h5>
          <small>* Campi obbligatori</small>
          <form action="{{--inserire la rotta che ti porta alla view grazie--}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nome*</label>
              <input type="text" class="form-control" name='nome' id="name"  placeholder="Nome" required>
            </div>
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name='email_mittente' id="email" placeholder="{{ Auth::user() ? Auth::user()->email : 'email' }}" value="{{ Auth::user() ? Auth::user()->email : '' }}" required>
            </div>
            <div class="form-group">
              <label for="subject">Oggetto*</label>
              <input type="text" class="form-control" name='oggetto' id="subject" placeholder="Oggetto" required>
            </div>
            <div class="form-group">
              <label for="message">Messaggio*</label>
              <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="messaggio" rows="5" required></textarea>
              <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            @if(session()->has('message'))
            <div class="alert alert-danger disappear" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>{{ session()->get('message') }}</strong>
            </div>
          @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
