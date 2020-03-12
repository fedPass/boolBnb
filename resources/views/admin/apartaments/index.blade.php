{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="float-left">Gestisci i tuoi appartamenti</h1>
                {{-- <a class="btn btn-info float-right" href="{{ route('adminapartments.create') }}">Aggiungi appartamento</a> --}}
                <a class="btn btn-info float-right" href="{{ route('admin-create') }}">Aggiungi appartamento</a>
            </div>
        </div>
        <hr>
        <div class="row mt-3 mb-3">
            @forelse ($apartments as $apartament)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card">
                      <img class="img-thumbnail" src="{{ $apartament->img }}" alt="Immagine appartamento">
                      <div class="card-body">
                        <h5 class="card-title">{{ $apartament->titolo }}</h5>
                        <p class="card-text">{{ $apartament->descrizione }}</p>
                        {{-- <a href="{{ route('adminapartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">Modifica</a>
                        <a href="{{ route('adminapartments.show', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-right">Statistiche</a> --}}
                        <a href="#" class="btn btn-primary float-left">Modifica</a>
                        <a href="#" class="btn btn-primary float-right">Statistiche</a>
                        <div class="custom-control custom-switch text-center mt-2">
                            <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>
                          <input type="checkbox" class="custom-control-input" id="visibilita">
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
