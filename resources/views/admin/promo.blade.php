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
            <div class="row w-100 mb-5 d-flex justify-content-center">
                <div class="col-8 add-product">
                    <div class="row form-group">
                        <div class="col-12">
                            {{-- <p>Seleziona la promozione che vuoi attivare per il tuo appartamento <strong>{{$apartment->titolo}}</strong>:</p> --}}
                            <p>Seleziona la sponsorizzazione che vuoi attivare per il tuo appartamento TITOLO APPARTAMENTO</p>
                        </div>
                    </div>
                    <form class="" action="" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                  <input type="radio" id="promo_1" name="promo" value="">
                                  <label for="promo_1"><strong>Basic:</strong> 24h di sponsorizzazione / 2,99€</label><br>
                                  <input type="radio" id="promo_2" name="promo" value="">
                                  <label for="promo_2"><strong>Standard:</strong> 72h di sponsorizzazione / 5,99€</label><br>
                                  <input type="radio" id="promo_3" name="promo" value="">
                                  <label for="promo_3"><strong>Premium:</strong> 144h di sponsorizzazione / 9,99€</label><br>
                            </div>
                        </div>
                        <div class="row form-group payment-info">
                            <div class="col-12 text-center">
                                <p>Inserisci i dati della tua Carta:</p>
                            </div>
                            {{-- <div class="col-12 text-center">
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
                            </div> --}}
                            <div class="col-12">
                                <div id="dropin-container"></div>
                                <button id="submit-button" class="button button--small button--green">Procedi al pagamento</button>
                                <script>
                                var button = document.querySelector('#submit-button');

                                braintree.dropin.create({
                                  authorization: 'sandbox_v29ng9jm_bbbnd2tf5rgtx67j',
                                  selector: '#dropin-container'
                                }, function (err, instance) {
                                  button.addEventListener('click', function () {
                                    instance.requestPaymentMethod(function (err, payload) {
                                      // Submit payload.nonce to your server
                                      // When the user clicks on the 'Submit payment' button this code will send the
                                      // encrypted payment information in a variable called a payment method nonce
                                      $.ajax({
                                        type: 'POST',
                                        url: '/checkout',
                                        data: {'paymentMethodNonce': payload.nonce}
                                      }).done(function(result) {
                                        // Tear down the Drop-in UI
                                        instance.teardown(function (teardownErr) {
                                          if (teardownErr) {
                                            console.error('Could not tear down Drop-in UI!');
                                          } else {
                                            console.info('Drop-in UI has been torn down!');
                                            // Remove the 'Submit payment' button
                                            $('#submit-button').remove();
                                          }
                                        });

                                        if (result.success) {
                                          $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
                                        } else {
                                          console.log(result);
                                          $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
                                        }
                                      });
                                    });
                                  })
                                });
                                </script>                      
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
