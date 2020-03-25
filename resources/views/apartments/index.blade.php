{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')
@section('content')
<nav class="nav-options navbar navbar-expand-lg navbar-light bg-light fixed-top">
<a class="show-filters btn btn-primary btn-sm" href="#">Mostra Filtri</a>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="filters-container col-sm-12 col-lg-2 col-md-2">
      <h3>Filtri</h3>
      <div class="input-group num-select input-num-size">
        <select class="custom-select border-custom" id="inputGroupSelect01">
          <option selected>N° Stanze</option>
          @for ($i=0; $i <= 10; $i++)
            <option value="{{$i}}"> {{$i}}</option>
          @endfor
        </select>
      </div>
      <div class="input-group num-select input-num-size">
        <select class="custom-select border-custom" id="inputGroupSelect01">
          <option selected>N° Letti</option>
          @for ($i=0; $i <= 10; $i++)
            <option value="{{$i}}"> {{$i}}</option>
          @endfor
        </select>
      </div>
      @foreach ($options as $option)
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck1">
          <label class="custom-control-label" for="customCheck1">{{$option->nome}}</label>
        </div>
      @endforeach
        <div class="cucstom-cuntrol">
            <p>Max distance from your search: <span id="kmOutput"></span> KM</p>
            <input id="sliderKM" type="range" name="kmDistance" min="1" max="250" value="25">
        </div>
        <input id="latSearch" type='hidden' name='lat' value="{{$lat}}">
        <input id="lonSearch" type='hidden' name='lon' value="{{$lon}}">
        <div class="custom-control">
          <button id="searchDeepButton" class="apply-filters btn btn-primary">Applica Filtri</button>
        </div>
      <a class="hide-filters btn btn-primary btn-sm" href="#">Conferma/Nascondi</a>
    </div>
    <div class="results-container col-10">
      <div class="row justify-content-center evidence-container evidence">
          <h1>Appartamenti in promozione</h1>
        <div class="col-sm-12 in-evidenza mx-auto">
          @for ($i=0; $i < 4; $i++)
            <div class="col-lg-3 col-md-6">
              <img class="img-thumbnail" src="https://images.pexels.com/photos/279719/pexels-photo-279719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
              <a class="text-white" href="#">Titolo</a>
            </div>
          @endfor
        </div>
      </div>
      <div class="results-title col-12">
        <h1>Risultati di ricerca</h1>
      </div>
      @forelse ($apartments as $apartment)
        <div class="col-sm-9 col-md-5 col-lg-4">
          <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
          <div class="btn btn-primary card-results">
            <div class="card-img">
                <img class="custom-img" src="{{asset('storage/' . $apartment->img)}}" alt="Immagine appartamento">
            </div>
             <div class="card-body">
               <h5 class="card-title">{{ $apartment->titolo }}</h5>
               <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
               {{-- <p class="card-text descriprion">{{$apartment->descrizione}}</p> --}}
             </div>
          </div>
          </a>
        </div>
      @empty
      <p class="text-center">Non ci sono ancora appartamenti da mostrare</p>
      @endforelse
      <div class="paginate mx-auto">
        {{$apartments->links()}}
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>

        var slider = document.getElementById("sliderKM");
        var output = document.getElementById("kmOutput");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        };

        $('#searchDeepButton').click(function (event) {
            event.preventDefault();

            // let options = [];
            // $('.option-check-box').each(function () {
            //     if ($(this).is(":checked")){
            //         options.push($(this));
            //     }
            // })
            let latSearch = $('#latSearch').val() ? $('#latSearch').val() : 0;
            let lonSearch = $('#lonSearch').val() ? $('#lonSearch').val() : 0;
            let circle_radius = $('#sliderKM').val();
            // let visibilita = 1;
            // let posti_letto = 1;
            console.log(circle_radius,latSearch,lonSearch);
            $.ajax({
                type : 'get',

                url : '/apartments/search',

                data:{

                    lat:latSearch,
                    lon:lonSearch,
                    circle_radius:circle_radius,


                },

                success:function(data){
                    console.log(data);

                },
                error:function(err){
                    console.log(err)
                }

            })

        })
    </script>
    @endsection
