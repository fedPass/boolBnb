@extends('layouts.public')
@section('content')
<div class="container-fluid room">
  <div class="row">
    <div class="col-lg-6 col-md-6 previev">
      <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
    </div>
    <div class="col-lg-6 col-md-6 previev">
      <div class="col-lg-6 col-md-12 top">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
      </div>
      <div class="col-lg-6 bottom">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-8 scrol-left">
      <div class="title">
        <h2>Titolo stanza</h2>
        <div class="user-container float-right">
          <img class="user-img" src="https://a0.muscache.com/im/pictures/user/bbb4fb56-fdd7-4ee5-8cc6-fc03ffd4d7bf.jpg?aki_policy=profile_x_medium" alt="">
          <p class="text-center">Nome user</p>
        </div>
      </div>
      <div class="info">
        <a href="#">Città</a>
        <p>2 ospiti 1 camera da letto 1 letto 1 bagno</p>
      </div>
      <div class="other-info-container">
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
    </div>
    <div class="col-lg-4 fix-right">
      <div class="card" style="width: 20rem;">
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
