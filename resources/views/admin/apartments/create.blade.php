{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <h1 class="text-center pb-3">Aggiungi un appartamento</h1>
                <hr>
                <form action="{{ route('admin.apartments.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
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
                      <textarea type="text" class="form-control col-9" id="descrizione" placeholder="Descrizione" name="descrizione" rows="5">{{ old('descrizione') }}</textarea>
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
                    <hr>
                    <div class="row form-group">
                        <div class="col-3">Servizi</div>
                        <div class="col-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="nome_1" name="nome_id[]" value="1">
                            <label class="form-check-label" for="nome_1">
                              WiFi
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="nome_2" name="nome_id[]" value="2">
                            <label class="form-check-label" for="nome_2">
                              Posto auto
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="nome_3" name="nome_id[]" value="3">
                            <label class="form-check-label" for="nome_3">
                              Piscina
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="nome_4" name="nome_id[]" value="4">
                            <label class="form-check-label" for="nome_4">
                              Vista mare
                            </label>
                          </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="nome_5" name="nome_id[]" value="5">
                              <label class="form-check-label" for="nome_5">
                                Portineria
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="nome_6" name="nome_id[]" value="6">
                              <label class="form-check-label" for="nome_6">
                                Sauna
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="nome_7" name="nome_id[]" value="7">
                              <label class="form-check-label" for="nome_7">
                                Aria condizionata
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="nome_8" name="nome_id[]" value="8">
                              <label class="form-check-label" for="nome_8">
                                Cucina
                              </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-3" for="img-1">Immagine 1</label>
                        <input class="col-9" type="file" class="form-control-file" id="img-1" name="img-1">

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
