@extends('layouts.public')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" >

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->




<div class="container-fluid">
            <div class="accedi row">
                <div class="col-md-6">
                    <i class="close fas fa-times"></i>
                    <h3>Accedi</h3>
                    <hr>
                    <select class="form-control">
                      <option>Italia (+39)</option>
                      <option>Australia (+61)</option>
                      <option>Francia (+33)</option>
                      <option>Svizzera (+41)</option>
                      <option>Messico (+52)</option>
                    </select>
                    <input type="number" class="form-control" placeholder="Numero di telefono">
                    <small>Ti chiameremo o ti invieremo un messaggio per confermare il tuo numero. Sono previsti costi standard per messaggi e traffico dati.</small>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Continua</button>
                    <hr>
                    <button type="button" class="btn btn-light btn-lg btn-block">
                        <i class="far fa-envelope"></i>
                        Continua con un indirizzo e-mail</button>
                    <button type="button" class="btn btn-light btn-lg btn-block">
                        <i class="fab fa-facebook-square"></i>
                        Continua con Facebook</button>
                    <button type="button" class="btn btn-light btn-lg btn-block">
                        <i class="fab fa-google"></i>
                        Continua con Google</button>
                    <p>Non hai un account?</p>
                    <a href="#"> <p> Registrati</p></a>
                </div>

            </div>

        </div>

@endsection
