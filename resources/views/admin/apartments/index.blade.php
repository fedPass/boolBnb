{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="float-left">Gestisci i tuoi appartamenti</h1>
                <a class="btn btn-info float-right" href="{{ route('admin.apartments.create') }}">Aggiungi appartamento</a>
            </div>
        </div>
        <hr>
        <div class="row mt-3 mb-3">
            @forelse ($apartments as $apartment)
                <div class="col-6 col-md-4 mb-3">
                    <div class="card">
                      <img class="img-thumbnail" src="{{ $apartment->img }}" alt="Immagine appartamento">
                      <div class="card-body">
                        <h5 class="card-title">{{ $apartment->titolo }}</h5>
                        <p class="card-text">{{ $apartment->descrizione }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">Modifica</a>
                            <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-right">Statistiche</a>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="visibilita">
                              <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            @empty
                <p>Non ci sono ancora appartamenti da mostrare</p>
            @endforelse
        </div>
    </div>
@endsection
