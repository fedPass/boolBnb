{{-- foresle per visualizzare tutti i messaggi --}}
@extends('layouts.admin')
@section('content')
  @forelse ($leads as $lead)
    <p>messaggio per appartamento: {{$lead->apartment_id}}</p>
    <p>da: {{$lead->name}}</p>
    <p>email: {{$lead->email_mittente}}</p>
    <p>oggetto: {{$lead->oggetto}}</p>
    <p>messaggio: {{$lead->messaggio}}</p>
    <hr>
  @empty
    <p>non ci sono messaggi da visualizzare</p>
  @endforelse
@endsection
