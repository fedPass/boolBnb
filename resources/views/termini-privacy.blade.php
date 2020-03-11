@extends('layouts.public')

@section('content')
    <div class="container mt-5">
        <div class="row mt-3">
          <div class="col-4 mt-5 mb-5">
            <div class="list-group" id="list-tab" role="tablist">

              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Termini del Servizio</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Politiche di non discriminazione</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Termini di Pagamento</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Informativa sulla Privacy</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Garanzia Host</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Rimborso Ospite</a>
            </div>
          </div>
          <div class="col-8 mt-5 mb-5">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <h2 class="text-primary">Termini del Servizio per Utenti europei</h2>
                     <p> Leggi attentamente i presenti Termini del Servizio per Utenti europei (“Termini”) in quanto forniscono informazioni importanti riguardanti diritti, rimedi giuridici e obblighi pertinenti all’utente. Accedendo o utilizzando la Piattaforma Airbnb, accetti di rispettare e di essere vincolato dai presenti Termini.</p>
          </div>
              <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                  <h2 class="text-primary">Politiche di non discriminazione</h2>
                  <p>Il nostro impegno a favore dell'inclusione e del rispetto tra membri
              L'essenza di Airbnb è quella di essere una community aperta che facilita gli scambi internazionali e rende possibili esperienze importanti e condivise tra persone di tutto il mondo. Di tale community fanno parte milioni di utenti, provenienti in pratica da ogni Paese del globo. La composizione della community è estremamente varia e i suoi membri hanno culture, valori e regole diversissimi tra loro.</p></div>
              <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                  <h2 class="text-primary">Termini del Servizio di Pagamento</h2>
                  <p>Leggi attentamente i presenti Termini del Servizio di Pagamento (“Termini di Pagamento”) in quanto forniscono informazioni importanti riguardanti diritti, rimedi e obblighi dell’utente. Utilizzando i Servizi di Pagamento (come definiti di seguito), l’utente accetta di rispettare e di essere vincolato dai presenti Termini di Pagamento.
              La Sezione 22 dei presenti Termini del Servizio di Pagamento contiene una clausola sull’arbitrato e sulla rinuncia a class action o azioni collettive che si applica a tutti i Membri di Airbnb. Se il paese di residenza dell’utente si trova negli Stati Uniti, tale disposizione si applica a tutte le controversie con Airbnb Payments. Se il paese di residenza dell’utente si trova al di fuori degli Stati Uniti, tale disposizione si applica a qualsiasi azione intentata contro Airbnb Payments negli Stati Uniti. La suddetta clausola si applica alla risoluzione delle controversie con Airbnb Payments. Accettando i presenti Termini di Pagamento, l’utente accetta di essere vincolato a tale clausola sull’arbitrato e sulla rinuncia ad azioni collettive. Si prega di leggerla attentamente.
              Se il paese di residenza dell’utente si trova nello Spazio economico europeo (“SEE”), l’utente può accedere alla piattaforma di risoluzione online delle controversie della Commissione europea qui: https://ec.europa.eu/consumers/odr. Si prega di notare che Airbnb Payments non è impegnata o tenuta a utilizzare un organismo per la risoluzione delle controversie alternativo per risolvere le controversie coi consumatori.</p></div>
          </div>
        </div>
        {{-- <div class="row">
            @foreach ($datas as $key => $termini)
                <div class="col-4">
                    <h2>{{$termini['label']}}</h2>
                </div>
                <div class="col-8">
                    <p>{{$termini['text']}}</p>
                </div>
            @endforeach
            @foreach ($datas as $key => $privacy)
                <div class="col-4">
                    <h2>{{$privacy['label']}}</h2>
                </div>
                <div class="col-8">
                    <p>{{$privacy['text']}}</p>
                </div>
            @endforeach
        </div> --}}
    </div>
@endsection
