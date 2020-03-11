<nav class="home-navbar navbar fixed-top navbar-expand-lg navbar-light">
  <a href="{{ url('/') }}"><img class="img-fluid logo" src="https://i2.wp.com/supportdriven.com/wp-content/uploads/2018/05/Belo.png?fit=301%2C323&ssl=1&w=640" alt="logo-bianco"></a>
  <a href="{{ url('/') }}"><img class="img-fluid logoBlue" src="https://imageog.flaticon.com/icons/png/512/1724/1724634.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF" alt="logo-blue"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-globe"></i> Italiano (IT) <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">€ EUR</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Offri una casa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Offri un'esperienza</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Aiuto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
      </li>
    </ul>
  </div>
</nav>
