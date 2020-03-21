{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12 col-md-9">
                <h1 class="text-center float-md-left">Promuovi il tuo appartamento</h1>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <a class="btn btn-info float-md-right btn-return" href="{{ route('admin.index') }}">Torna alla Dashboad</a>
            </div>
            <hr style="width: 100%">
            <div class="row mb-5 d-flex justify-content-center">
                <div class="col-8 add-product">
                    <div class="row form-group">
                        <div class="col-12">
                            {{-- <p>Seleziona la promozione che vuoi attivare per il tuo appartamento <strong>{{$apartment->titolo}}</strong>:</p> --}}
                            <p>Seleziona la promozione che vuoi attivare per il tuo appartamento TITOLO APPARTAMENTO</p>
                        </div>
                    </div>
                    <form class="" action="" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                  <input type="radio" id="promo_1" name="promo" value="">
                                  <label for="promo_1"><strong>Basic:</strong> 24h di sponsorizzazione-2,99€</label><br>
                                  <input type="radio" id="promo_2" name="promo" value="">
                                  <label for="promo_2"><strong>Standard:</strong> 72h di sponsorizzazione / 5,99€</label><br>
                                  <input type="radio" id="promo_3" name="promo" value="">
                                  <label for="promo_3"><strong>Premium:</strong> 144h di sponsorizzazione / 9,99€</label><br><br>
                            </div>
                        </div>
                        <div class="row form-group payment-info">
                            <div class="col-12 text-center">
                                <p>Inserisci i dati della tua Carta:</p>
                            </div>
                            <div class="col-12 text-center">
                                <input id="CC-numb" type="text" name="" placeholder="Numero CC">
                            </div>
                            <div class="col-12 col-md-6 text-center text-md-right">
                                <input type="date" name="" placeholder="Scadenza">
                            </div>
                            <div class="col-12 col-md-6 text-center text-md-left">
                                <input type="text" name="" placeholder="CVC">
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="#" class="btn btn-info float-right">Prosegui con il pagamento</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
