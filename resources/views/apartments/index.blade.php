{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')
@section('content')
<nav class="nav-options navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="input-group num-select">
    {{-- <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">N° min di stanze</label>
    </div> --}}
    <select class="custom-select border-custom" id="inputGroupSelect01">
      <option selected>N° Stanze</option>
      @for ($i=0; $i <= 10; $i++)
        <option value="{{$i}}"> {{$i}}</option>
      @endfor
    </select>
  </div>
  <div class="input-group num-select">
    <select class="custom-select border-custom" id="inputGroupSelect01">
      <option selected>N° Letti</option>
      @for ($i=0; $i <= 10; $i++)
        <option value="{{$i}}"> {{$i}}</option>
      @endfor
    </select>
  </div>
  {{-- @foreach ($options as $option)
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="customCheck1">
      <label class="custom-control-label" for="customCheck1">{{$option->nome}}</label>
    </div>
  @endforeach --}}
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="results-container">
      <div class="col-sm-12 col-md-7 col-lg-7 card-container">
      @forelse ($apartments as $apartment)
        <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
          <div class="card-results mb-6" >
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{ $apartment->img }}" class="img-thumbnail" alt="Immagine appartamento">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ $apartment->titolo }}</h5>
                <p class="card-text">{{$apartment->cita}}, {{$apartment->provincia}}, {{$apartment->paese}}.</p>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="card btn btn-primary card-results">
          <div class="card-body">
            <img class="img-thumbnail" src="{{ $apartment->img }}" alt="Immagine appartamento">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $apartment->titolo }}</h5>
            <p class="card-text">{{$apartment->cita}}, {{$apartment->provincia}}, {{$apartment->paese}}.</p>
          </div>
        </div> --}}
        </a>
      @empty
      <p>Non ci sono ancora appartamenti da mostrare</p>
      @endforelse
      </div>
      <div class="col-sm-12 col-md-5 col-lg-5 maps-results">
        <div class="maps-cont">
          <img class="img-responsive" src="https://lh3.googleusercontent.com/-k27ZcQz74do/WBTMfNqXCgI/AAAAAAAABWg/-SilmtHyUwYgfb74aVBkEQnuRBk1BNvygCLcB/s1600/Schermata%2B2016-10-29%2Balle%2B18.20.20.png" alt="">
        </div>
      </div>
    </div>
    <div class="page-number mx-auto">
      {{$apartments->links()}}
    </div>
  </div>
</div>
@endsection
