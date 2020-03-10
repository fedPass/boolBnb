@extends('layouts.plubic')

@section('content')
    <div class="container">
        <div class="row">
            @include('../config/termini-privacy.php')
            @foreach ($datas as $dato => $termini)
                <div class="col-4">
                    <h2>{{$termini['label']}}</h2>
                </div>
                <div class="col-8">
                    <p>{{$termini['text']}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
