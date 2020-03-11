{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Aggiungi un appartamento</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Titolo</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control" id="title" placeholder="Titolo" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="rooms-number">Numero di stanze</label>
                        <input type="number" min="1" class="form-control" id="rooms-number" placeholder="Numero di stanze" name="rooms-number" value="{{ old('rooms-number') }}">
                    </div>
                    <div class="form-group">
                        <label for="beds-number">Numero posti letto</label>
                        <input type="number" min="1" class="form-control" id="beds-number" placeholder="Numero di posti letto" name="beds-number" value="{{ old('beds-number') }}">
                    </div>
                    <div class="form-group">
                        <label for="bathroom-number">Numero di bagni</label>
                        <input type="number" min="1" class="form-control" id="bathroom-number" placeholder="Numero di bagni" name="bathroom-number" value="{{ old('bathroom-number') }}">
                    </div>
                    <div class="form-group">
                        <label for="mq-room">Dimensioni (mq)</label>
                        <input type="number" min="1" class="form-control" id="mq-room" placeholder="Dimensioni in mq" name="mq-room" value="{{ old('mq-room') }}">
                    </div>
                    <div class="form-group">
                      <label for="cover_img">Immagine di copertina</label>
                      <input type="file" class="form-control-file" id="cover_img" name="cover_img">
                    </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
