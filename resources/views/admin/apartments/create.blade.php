{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <div class="col-12">
                    <h1 class="text-center pb-3">Aggiungi un appartamento</h1>
                </div>
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
                <form id="create" action="{{ route('admin.apartments.store')}}" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
                    @csrf
                    @method("POST")
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="titolo">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-12 col-md-9" id="titolo" placeholder="Titolo" name="titolo" value="{{ old('titolo') }}" required autofocus>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">Ok!</div>
                      <div class="invalid-feedback col-12 col-md-9 offset-md-3">Aggiungi un titolo</div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="stanze">Numero di stanze</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="stanze" placeholder="Numero di stanze" name="stanze" value="{{ old('stanze') }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di stanze
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="posti_letto">Numero posti letto</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="posti_letto" placeholder="Numero di posti letto" name="posti_letto" value="{{ old('posti_letto') }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il numero di posti letto
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="bagni">Numero di bagni</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="bagni" placeholder="Numero di bagni" name="bagni" value="{{ old('bagni') }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di bagni
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="dimensioni">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="dimensioni" placeholder="Dimensioni in mq" name="dimensioni" value="{{ old('dimensioni') }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi la dimensione in metri quadrati
                          </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="descrizione">Descrizione</label>
                      <textarea type="text" class="form-control col-12 col-md-9" id="descrizione" placeholder="Descrizione" name="descrizione" rows="5" required>{{ old('descrizione') }}</textarea>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi una descrizione
                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="search-dove">Indirizzo</label>
                      <input id="via" type="text" class="form-control via col-12 col-md-9" placeholder="Indirizzo" name="indirizzo" value="{{ old('via') }}" required>
                       <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi l'indirizzo'
                        </div>
                      <input id="lat-create" type='hidden' name='lat'>
                      <input id="lon-create" type='hidden' name='lon'>
                      <div id="via-list">
                      </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="paese">Paese</label>
                      <input type="text" class="form-control col-12 col-md-9" id="paese" placeholder="Paese" name="paese" value="{{ old('paese') }}" required>
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
                                    {{-- recuperare check selezionati in caso di errore --}}
                                    {{ in_array($option->id, old('nome_id', array())) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nome_{{ $option->id }}">
                                        {{ $option->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                      <div class="input-group control-group increment" >
                        <input type="file" multiple="multiple" name="images[]" class="form-control">
                        <div class="input-group-btn">
                          <button class="btn btn-success" type="button">Add</button>
                        </div>
                          {{-- <div class="input-group control-group increment" >
                              <label class="col-12 " for="images[]">Aggiungi fino a 5 immagini</label>
                            <input type="file" multiple="multiple" name="images[]" class="form-control col-12" required>
                            <div class="input-group-btn">
                              <button class="btn btn-primary" type="button">Carica</button>
                            </div>
                           <div class="clone d-none">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="images[]" class="form-control">
                              <div class="input-group-btn">
                                <button class="btn btn-danger" type="button">Remove</button>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="clone d-none">
                        <div class="control-group input-group" style="margin-top:10px">
                          <input type="file" name="images[]" class="form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-danger" type="button">Remove</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row form-group d-flex justify-content-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox"  name="visibilita" checked="checked" class="js-switch">
                            <label class="js-switch" for="visibilita">Visibilità annuncio</label>
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
@section('script')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' ,color:'#237DC7'});
        });

        $(document).ready(function() {

        $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){
            $(this).parents(".control-group").remove();
        });
      });
    </script>
@endsection
