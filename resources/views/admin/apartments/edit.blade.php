{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <h1 class="text-center pb-3">Modifica dettagli appartamento</h1>
                <hr>
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> Controlla i tuoi dati.
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                 <form id="create" action="{{ route('admin.apartments.update' , ['apartment' => $apartment->id])}}" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation edit-form" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="titolo">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-12 col-md-9" id="titolo" placeholder="Titolo" name="titolo" value="{{ old('titolo', $apartment->titolo) }}" required autofocus>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">Ok!</div>
                      <div class="invalid-feedback col-12 col-md-9 offset-md-3">Aggiungi un titolo</div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="stanze">Numero di stanze</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="stanze" placeholder="Numero di stanze" name="stanze" value="{{ old('stanze', $apartment->stanze) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di stanze
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="posti_letto">Numero posti letto</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="posti_letto" placeholder="Numero di posti letto" name="posti_letto" value="{{ old('posti_letto', $apartment->posti_letto) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il numero di posti letto
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="bagni">Numero di bagni</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="bagni" placeholder="Numero di bagni" name="bagni" value="{{ old('bagni', $apartment->bagni) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di bagni
                          </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="dimensioni">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="dimensioni" placeholder="Dimensioni in mq" name="dimensioni" value="{{ old('dimensioni', $apartment->dimensioni) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi la dimensione in metri quadrati
                          </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="descrizione">Descrizione</label>
                      <textarea type="text" class="form-control col-12 col-md-9" id="descrizione" placeholder="Descrizione" name="descrizione" rows="5" required>{{ old('descrizione', $apartment->descrizione) }}</textarea>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi una descrizione
                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="indirizzo">Indirizzo</label>
                      <input type="text" class="form-control col-12 col-md-9" id="via" placeholder="Indirizzo" name="indirizzo" value="{{ old('via', $apartment->indirizzo) }}" autocomplete="off" required>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi l'indirizzo
                        </div>
                        <input id="lat-create" type='hidden' name='lat' value="{{ old('lat', $apartment->lat) }}">
                        <input id="lon-create" type='hidden' name='lon'value="{{ old('lon', $apartment->lon) }}">
                        <div id="via-list">

                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="paese">Paese</label>
                      <input type="text" class="form-control col-12 col-md-9" id="paese" placeholder="Paese" name="paese" value="{{ old('paese', $apartment->paese) }}" required>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il Paese
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-12 col-md-3">Servizi</label>
                        <div class="col-12 col-md-9 d-flex flex-row flex-wrap">
                            @foreach ($options as $option)
                                <div class="col-12 col-md-6">
                                    <input class="form-check-input" type="checkbox" id="nome_{{ $option->id }}" name="nome_id[]" value="{{ $option->id }}"
                                    @if ($errors->any())
                                        {{ in_array($option->id, old('nome_id', array())) ? 'checked' : '' }}
                                    @else
                                        {{ ($apartment->options)->contains($option) ? 'checked' : '' }}
                                    @endif >
                                    <label class="form-check-label" for="nome_{{ $option->id }}">
                                        {{ $option->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="custom-file">
                          <input type="file" multiple="multiple" name="images[]" class="custom-file-input" id="customFile" lang="it" required>
                          <label class="custom-file-label" for="customFile">Carica fino a 5 immagini</label>
                        </div>
                        {{-- se avevo caricato img mostramela --}}
                        @if (($apartment->images)->isNotEmpty())
                        @foreach ($apartment->images as $image)
                            @php
                                $pathImage = $image->filename
                            @endphp
                            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                <img class="room-img" src="{{ asset('uploads/images/'. $apartment->id . '/' . $pathImage) }}" alt="foto:{{$apartment->title}}">
                            </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-2">Immagine 2</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-2" name="img-2">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-3">Immagine 3</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-3" name="img-3">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-4">Immagine 4</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-4" name="img-4">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-5">Immagine 5</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-5" name="img-5">
                    </div> --}}
                    <hr>
                    <div class="row form-group d-flex justify-content-center">
                        <div class="custom-control custom-switch">
{{--                            <input type="checkbox" class="custom-control-input" id="visibilita" {{($apartment->visibilita == "1") ? 'checked' : ""}}>--}}
{{--                            <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>--}}
                            <input type="checkbox"  name="visibilita" {{$apartment->visibilita == 1 ? 'checked' : ''}} class="js-switch">
                            <label class="js-switch" for="visibilita">Visibilità annuncio</label>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Modifica dettagli dell'appartamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' ,color:'#237DC7'});
        });
    </script>
@endsection
