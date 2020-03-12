{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <h1 class="text-center pb-3">Aggiungi un appartamento</h1>
                <hr>
                <form action="adminapartments.store" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row form-group">
                      <label class="col-3" for="titolo">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-9" id="titolo" placeholder="Titolo" name="titolo" value="{{ old('titolo') }}" required>
                      <div class="invalid-feedback">
                              Titolo non valido
                      </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="stanze">Numero di stanze</label>
                        <input type="number" min="1" class="form-control col-9" id="stanze" placeholder="Numero di stanze" name="stanze" value="{{ old('stanze') }}" required>
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="posti_letto">Numero posti letto</label>
                        <input type="number" min="1" class="form-control col-9" id="posti_letto" placeholder="Numero di posti letto" name="posti_letto" value="{{ old('posti_letto') }}" required>
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="bagni">Numero di bagni</label>
                        <input type="number" min="1" class="form-control col-9" id="bagni" placeholder="Numero di bagni" name="bagni" value="{{ old('bagni') }}" required>
                    </div>
                    <div class="row form-group">
                        <label class="col-3" for="dimensioni">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control col-9" id="dimensioni" placeholder="Dimensioni in mq" name="dimensioni" value="{{ old('dimensioni') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="descrizione">Descrizione</label>
                      <textarea type="text" class="form-control col-9" id="descrizione" placeholder="Descrizione" name="descrizione" rows="5">{{ old('descrizione') }}</textarea required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="via">Via</label>
                      <input type="text" class="form-control col-9" id="via" placeholder="Via/Piazza" name="via" value="{{ old('via') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="civico">N. civico</label>
                      <input type="text" class="form-control col-9" id="civico" placeholder="N. civico" name="via" value="{{ old('civico') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="cap">CAP</label>
                      <input type="text" class="form-control col-9" id="cap" placeholder="CAP" name="cap" value="{{ old('cap') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="cita">Città</label>
                      <input type="text" class="form-control col-9" id="cita" placeholder="Città" name="cita" value="{{ old('cita') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="provincia">Provincia</label>
                      <input type="text" class="form-control col-9" id="provincia" placeholder="Provincia" name="provincia" value="{{ old('provincia') }}" required>
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="paese">Paese</label>
                      <input type="text" class="form-control col-9" id="paese" placeholder="Paese" name="paese" value="{{ old('paese') }}" required>
                    </div>
                    <hr>
                    <div class="row form-group">
                        {{-- @foreach ($options as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nome_{{ $option->id }}" name="nome_id[]" value="{{ $option->id }}"
                                {{ in_array($option->id, old('nome_id', array())) ? 'checked' : '' }}>
                                <label class="form-check-label" for="nome_{{ $option->id }}">
                                    {{ $option->nome }}
                                </label>
                            </div>
                        @endforeach --}}
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-3" for="img-1">Immagine 1</label>
                        <input class="col-9" type="file" class="form-control-file" id="img-1" name="img-1" required>

                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="img-2">Immagine 2</label>
                      <input class="col-9" type="file" class="form-control-file" id="img-2" name="img-2">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="img-3">Immagine 3</label>
                      <input class="col-9" type="file" class="form-control-file" id="img-3" name="img-3">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="img-4">Immagine 4</label>
                      <input class="col-9" type="file" class="form-control-file" id="img-4" name="img-4">
                    </div>
                    <div class="row form-group">
                      <label class="col-3" for="img-5">Immagine 5</label>
                      <input class="col-9" type="file" class="form-control-file" id="img-5" name="img-5">
                    </div>
                    <hr>
                    <div class="row form-group d-flex justify-content-center">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="visibilita">
                          <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Aggiungi un nuovo appartamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
