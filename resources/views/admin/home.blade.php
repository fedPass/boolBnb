{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="float-left">Gestisci i tuoi appartamenti</h1>
                <a class="btn btn-info float-right" href="{{ route('admin-create') }}">Aggiungi appartamento</a>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                      <th scope="col" class="text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @for ($i=0; $i < 10; $i++)
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td class="text-right">
                              <a class="btn btn-info" href="#">Vedi dettagli</a>
                              <a class="btn btn-info" href="#">Modifica</a>
                              <a class="btn btn-info" href="#">Statistiche</a>
                              <div class="custom-control custom-switch d-inline">
                                  <label class="custom-control-label" for="customSwitch1">Visibilità annuncio</label>
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                              </div>
                            </td>
                          </tr>
                      @endfor
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
