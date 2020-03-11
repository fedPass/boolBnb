@extends('layouts.public')
@section('content')
@include('layouts.partials.navbar')
<div>
  <div class="container-fluid home">
    @include('layouts.partials.book')
  </div>
  <div class="container">
    <div class="row justify-content-center evidence-container">
        <h1>Appartamenti in evidenza</h1>
      <div class="col-sm-12 in-evidenza mx-auto">
        @for ($i=0; $i < 4; $i++)
          <div class="col-lg-3 col-md-6">
            <img class="img-thumbnail" src="https://images.pexels.com/photos/279719/pexels-photo-279719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            <a href="#">Titolo</a>
          </div>
        @endfor
      </div>
    </div>
  </div>
</div>
@endsection
