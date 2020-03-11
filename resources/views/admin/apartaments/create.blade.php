{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <h1 class="text-center pb-3">Aggiungi un appartamento</h1>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                      <label class="col-3" for="titolo">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-9" id="titolo" placeholder="Titolo" name="titolo" value="{{ old('titolo') }}">
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="stanze">Numero di stanze</label>
                        <input type="number" min="1" class="form-control col-9" id="stanze" placeholder="Numero di stanze" name="stanze" value="{{ old('stanze') }}">
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="posti_letto">Numero posti letto</label>
                        <input type="number" min="1" class="form-control col-9" id="posti_letto" placeholder="Numero di posti letto" name="posti_letto" value="{{ old('posti_letto') }}">
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="bagni">Numero di bagni</label>
                        <input type="number" min="1" class="form-control col-9" id="bagni" placeholder="Numero di bagni" name="bagni" value="{{ old('bagni') }}">
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="dimensioni">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control col-9" id="dimensioni" placeholder="Dimensioni in mq" name="dimensioni" value="{{ old('dimensioni') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="descrizione">Descrizione</label>
                      <input type="text" class="form-control col-9" id="descrizione" placeholder="Descrizione" name="descrizione" value="{{ old('descrizione') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="via">Via</label>
                      <input type="text" class="form-control col-9" id="via" placeholder="Via/Piazza" name="via" value="{{ old('via') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="civico">N. civico</label>
                      <input type="number" min="1" class="form-control col-9" id="civico" placeholder="N. civico" name="via" value="{{ old('civico') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="cap">CAP</label>
                      <input type="number" min="1" class="form-control col-9" id="cap" placeholder="CAP" name="cap" value="{{ old('cap') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="cita">Città</label>
                      <input type="text" class="form-control col-9" id="cita" placeholder="Città" name="cita" value="{{ old('cita') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="provincia">Provincia</label>
                      <input type="text" class="form-control col-9" id="provincia" placeholder="Provincia" name="provincia" value="{{ old('provincia') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="paese">Paese</label>
                      <input type="text" class="form-control col-9" id="paese" placeholder="Paese" name="paese" value="{{ old('paese') }}">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="img">Immagine di copertina</label>
                      <input class="col-9" type="file" class="form-control-file" id="img" name="img">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Aggiungi un nuovo appartamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
