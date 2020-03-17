{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')
@section('content')
<div class="container">
  <div class="row">
    <div class="results-container">
      @forelse ($apartments as $apartment)
      <div class="col-sm-12 col-md-3 col-lg-3">
        <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
        <div class="card btn btn-primary card-results">
            <img class="img-thumbnail" src="{{ $apartment->img }}" alt="Immagine appartamento">
            <div class="card-body">
              <h5 class="card-title">{{ $apartment->titolo }}</h5>
              {{-- <p class="card-text">{{ $apartment->descrizione }}</p> --}}
            </div>
        </div>
        </a>
      </div>
      @empty
      <p>Non ci sono ancora appartamenti da mostrare</p>
      @endforelse
      {{$apartments->links()}}
    </div>
  </div>
</div>
@endsection
