{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')
@section('content')
<div class="container">
  <div class="row">
    <div class="results-container">
      @forelse ($apartments as $apartment)
      <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          <a href="{{route('apartments.show', ['apartment'=>$apartment->id])}}" class="btn btn-primary">
          <img class="img-thumbnail" src="{{ $apartment->img }}" alt="Immagine appartamento">
          <div class="card-body">
            <h5 class="card-title">{{ $apartment->titolo }}</h5>
            <p class="card-text">{{ $apartment->descrizione }}</p>
            <a href="{{route('apartments.show', $apartment->id)}}" class="btn btn-primary">Visualizza dettagli</a>
          </div>
        </div>
      </div>
      @empty
      <p>Non ci sono ancora appartamenti da mostrare</p>
      @endforelse
      {{$apartments->links()}}
    </div>
  </div>
</div>
@endsection
