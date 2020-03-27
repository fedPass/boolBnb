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
                <form id="create" action="{{ route('admin.apartments.store')}}" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
                    @csrf
                    @method("POST")
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="titolo">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-12 col-md-9 @error('titolo') is-invalid @enderror" id="titolo" placeholder="Titolo" name="titolo" value="{{ old('titolo') }}" required autofocus>
                      @error('titolo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">Ok!</div>
                      <div class="invalid-feedback col-12 col-md-9 offset-md-3">Aggiungi un titolo</div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="stanze">Numero di stanze</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9 @error('stanze') is-invalid @enderror" id="stanze" placeholder="Numero di stanze" name="stanze" value="{{ old('stanze') }}" required>
                        @error('stanze')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di stanze
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="posti_letto">Numero posti letto</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9 @error('posti_letto') is-invalid @enderror" id="posti_letto" placeholder="Numero di posti letto" name="posti_letto" value="{{ old('posti_letto') }}" required>
                        @error('posti_letto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il numero di posti letto
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="bagni">Numero di bagni</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9 @error('bagni') is-invalid @enderror" id="bagni" placeholder="Numero di bagni" name="bagni" value="{{ old('bagni') }}" required>
                        @error('bagni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di bagni
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="dimensioni">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9 @error('dimensioni') is-invalid @enderror" id="dimensioni" placeholder="Dimensioni in mq" name="dimensioni" value="{{ old('dimensioni') }}" required>
                        @error('dimensioni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi la dimensione in metri quadrati
                          </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="descrizione">Descrizione</label>
                      <textarea type="text" class="form-control col-12 col-md-9 @error('descrizione') is-invalid @enderror" id="descrizione" placeholder="Descrizione" name="descrizione" rows="5" required>{{ old('descrizione') }}</textarea>
                      @error('descrizione')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi una descrizione
                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="search-dove">Indirizzo</label>
                      <input id="via" type="text" class="form-control via col-12 col-md-9 @error('via') is-invalid @enderror" placeholder="Indirizzo" name="indirizzo" value="{{ old('via') }}" required>
                      @error('via')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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
                      <input type="text" class="form-control col-12 col-md-9  @error('paese') is-invalid @enderror" id="paese" placeholder="Paese" name="paese" value="{{ old('paese') }}" required>
                      @error('paese')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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
                        {{-- <label class="col-12 col-md-3" for="img-1">Immagine 1</label>
                        <input class="col-12 col-md-9" type="file" class="form-control-file" id="img" name="img"> --}}
                        <div class="custom-file">
                          <input type="file" multiple="multiple" name="images[]" class="custom-file-input" id="customFile" lang="it" required>
                          <label class="custom-file-label" for="customFile">Carica fino a 5 immagini</label>
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
                            </div> --}}
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
                    </div>
                    <hr>
                    <div class="row form-group d-flex justify-content-center">
                        <div class="custom-control custom-switch">
{{--                          <input type="checkbox" class="custom-control-input input-visibilita" name="visibilitatoggle" id="visibilita" checked/>--}}
{{--                          <input id="realvis" type="hidden" name="visibilita" value="on">--}}
{{--                          <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>--}}
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


      //   Dropzone.autoDiscover = false;
      //   let token = $('meta[name="csrf-token"]').attr('content');
      //   $(function(){
      //     var myDropzone = new Dropzone("#dropzone", {
      //       paramName: 'file',
      //       url: "{{-- url('/admin/apartments/create/') --}}",
      //       previewsContainer: 'div.dropzone-previews',
      //       addRemoveLinks: true,
      //       autoPrecessQueue: false,
      //       uploadMultiple: true,
      //       parallelUploads: 1,
      //       maxFiles: 1,
      //       params:{
      //         _token: token
      //       },
      //       init: function(){
      //         var myDropzone = this;
      //         $("form[name='create']").submit(function(event){
      //
      //           URL = $("#create").attr('action');
      //           formData = $("#create").serialize();
      //           $.ajax({
      //             type:'POST',
      //             url: URL,
      //             data: formData,
      //             success: function(result){
      //               if(result.status == "success"){
      //
      //                 //process the queue
      //                 myDropzone.processQueue();
      //               }else{
      //                 console.log("error");
      //               }
      //             }
      //           });
      //         });
      //
      //       this.on("sending", function(file,xhr,formData){
      //
      //       });
      //       this.on("success", function(file, response){
      //
      //       });
      //       this.on("queuecomplete", function(){
      //
      //       });
      //       this.on("sendingmultiple", function(file,xhr,formData){
      //
      //
      //       });
      //       this.on("successmultiple", function(files, responses){
      //
      //       });
      //       this.on("errormultiple", function(files, responses){
      //
      //       });
      //     }
      //   });
      // });

    </script>
@endsection
