<nav class="public-nav navbar fixed-top navbar-expand-lg navbar-light bg-white">
  <a href="{{ url('/') }}"><img class="img-fluid logoBlue-visible" src="https://imageog.flaticon.com/icons/png/512/1724/1724634.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF" alt="logo-blue"></a>
  <form id="search" class="form-inline my-2 my-lg-0" action="{{ route('apartments.index') }}" autocomplete="off" method="get" enctype="multipart/form-data">
    @csrf
    @method("GET")
      <input id="search-dove" class="form-control mr-sm-2 navsearch" type="text" name='place' id="place"  placeholder="Search" aria-label="Search">
      <input id="lat" type='hidden' name='lat'>
      <input id="lon" type='hidden' name='lon'>
      <input id="posti_letto" type='hidden' name='posti_letto'>
      <input id="visibilita" type='hidden' name='visibilita'>
      <div id="item-list">
      </div>
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active ita">
        <a class="nav-link" href="#">vuoto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-globe"></i> Italiano (IT) <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">€ EUR</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.apartments.create') }}">Offri una casa</a>
      </li>
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
      @else
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.apartments.index') }}">Dashboard</a></li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->first_name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          {{-- tasto Dashboard --}}
          <a class="dropdown-item" href="{{ route('admin.apartments.index') }}">
              {{ __('Dashboard') }}
          </a>
          {{-- tasto agg app --}}
          <a class="dropdown-item" href="{{ route('admin.apartments.create') }}">
              {{ __('Aggiungi appartamento') }}
          </a>
          {{-- tasto messaggi --}}
          <a class="dropdown-item" href="{{route('admin.leads.index')}}">
              {{ __('Messaggi') }}
          </a>
          {{-- tasto pubblicità --}}
          <a class="dropdown-item" href="#">
              {{ __('Pubblicità') }}
          </a>
          <hr>
          {{-- tasto logout --}}
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</nav>
