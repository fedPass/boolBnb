<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top navbar-admin">
      <a class="navbar-brand" href="{{ route('admin-home') }}"><img class="img-fluid logo" src="https://i2.wp.com/supportdriven.com/wp-content/uploads/2018/05/Belo.png?fit=301%2C323&ssl=1&w=640" alt="logo-bianco"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="{{ route('admin-index') }}">Dashboard</a>
          <a class="nav-item nav-link" href="{{ route('admin-create') }}">Aggiungi appartamento</a>
          <a class="nav-item nav-link" href="#">Messaggi</a>
          <a class="nav-item nav-link" href="#">Pubblicità</a>
        </div>
      </div>
    </nav>
</header>
