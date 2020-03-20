@extends('layouts.public')
@section('content')

  <div class="container text-center contenitoreGrazie">
    <div class="row">
      <div class="col-sm-8 mx-auto grazie">
          <div class="title">
            <h2>Grazie! il tuo messaggio è stato inoltrato.</h2>
          </div>
          <div class="text">
            <h5 class="card-text">Il proprietario dell'appartamento ti risponderà al più presto possibile</p>
            <a class="btn btn-outline-primary" href="{{ route('public-home') }}">Torna in Homepage</a>
          </div>
      </div>
    </div>
  </div>

@endsection
