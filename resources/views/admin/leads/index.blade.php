{{-- foresle per visualizzare tutti i messaggi --}}
@extends('layouts.admin')
@section('content')
  <div class="container leads-container">
      <div class="row pt-5">
          <div class="col-12">
              <h1 class="float-left">Leggi i tuoi messaggi</h1>
              <a class="btn btn-info float-right" href="{{ route('admin.index') }}">Torna alla dashboard</a>
          </div>
    </div>
    <hr>
    <div class="row">
    @forelse ($leads as $lead)
      <div class="col-12">
        <div class="card-header text-center message-recev bg-primary text-white border-white">
          <h5><strong>Messaggio da: </strong> {{$lead->nome}}</h5>
        </div>
        <div class="card-body mex-info">
          <blockquote class="blockquote mb-0">
            <p><strong>ID appartamento: </strong> {{$lead->apartment_id}}</p>
            <p><strong>Email: </strong> {{$lead->email_mittente}}</p>
            <p><strong>Oggetto: </strong> {{$lead->oggetto}}</p>
            <p><strong>Testo Messaggio: </strong><br> {{$lead->messaggio}}</p>
          </blockquote>
        </div>
      </div>
    @empty
      <p>non ci sono messaggi da visualizzare</p>
    @endforelse
    <div class="paginate mx-auto">
      {{$leads->links()}}
    </div>
    </div>
  </div>
@endsection
