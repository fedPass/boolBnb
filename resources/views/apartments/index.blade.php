{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')
@section('cdn')
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
@endsection

@section('content')
<nav class="nav-options navbar navbar-expand-lg navbar-light bg-light fixed-top">
<a class="show-filters btn btn-primary btn-sm" href="#">Mostra Filtri</a>
</nav>
<div class="container-fluid">
  <div class="row">
{{--      start filter area     --}}
    <div class="filters-container col-sm-12 col-lg-2 col-md-2">
      <h3>Filtri</h3>
      <div class="input-group num-select input-num-size">
        <select class="custom-select border-custom" id="roomsNumSelect">
          <option selected>N° Stanze</option>
          @for ($i=1; $i <= 10; $i++)
            <option value="{{$i}}"> {{$i}}</option>
          @endfor
        </select>
      </div>
      <div class="input-group num-select input-num-size">
        <select class="custom-select border-custom" id="bedsNumSelect">
          <option selected>N° Letti</option>
          @for ($i=1; $i <= 10; $i++)
            <option value="{{$i}}"> {{$i}}</option>
          @endfor
        </select>
      </div>
      @foreach ($options as $option)
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input option-check-box" name="optionsCheckBox" id="customCheck{{$option->id}}" value="{{$option->nome}}">
            <label class="custom-control-label" for="customCheck{{$option->id}}">{{$option->nome}}</label>
        </div>
      @endforeach
        <div class="cucstom-cuntrol">
            <p>Max distance from your search: <span id="kmOutput"></span> KM</p>
            <input id="sliderKM" type="range" name="kmDistance" min="1" max="250" value="25">
        </div>

        <div class="custom-control">
            <input id="latSearch" type='hidden' name='lat' value="{{$lat}}">
            <input id="lonSearch" type='hidden' name='lon' value="{{$lon}}">
             <button id="searchDeepButton" class="apply-filters btn btn-primary">Applica Filtri</button>
        </div>
      <a class="hide-filters btn btn-primary btn-sm" href="#">Conferma/Nascondi</a>
    </div>
      {{--      end filter area     --}}
    <div class="results-container col-10">
      <div class="row justify-content-center evidence-container">
          <h1>Appartamenti in evidenza</h1>
        <div class="col-sm-12 mx-auto evidence">
          @foreach ($apartmentsAll as $apartment)
            @if (($apartment->sponsors)->isNotEmpty())
              @foreach ($apartment->sponsors as $time)
                @php
                    $expired_date = $time->pivot->due_date;
                    // // $current_date = Carbon::now();
                    // // $diff_in_hours = $to->diffInHours($from);
                    $diff_in_hours = now()->diffInHours($expired_date);
                @endphp
                @if (now() <= $expired_date)
            <div class="col-lg-3 col-md-6 text-center">
              <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
              @if ($apartment->visibilita == 1)
                  @if (($apartment->images)->isNotEmpty())
                      @php
                          $copertina = $apartment->images->first()->filename
                          // $copertina = $apartment->images()->first()
                      @endphp
                  @endif
                  <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento . {{$apartment->title}}">
                  <h5 class="text-white promo-title">{{ $apartment->titolo }}</h5>
              @endif
              </a>
            </div>
              @endif
            @endforeach
          @endif
        @endforeach
        </div>
      </div>
      <div class="results-title col-12">
        <h1>Risultati di ricerca</h1>
      </div>
      <section class="container" id="resultApartmentSection">

         @forelse ($apartments as $apartment)
          {{--   @foreach ($apartment->sponsors as $time)
                @php
                    $expired_date = $time->pivot->due_date;
                    // // $current_date = Carbon::now();
                    // // $diff_in_hours = $to->diffInHours($from);
                    $diff_in_hours = now()->diffInHours($expired_date);
                @endphp
            @endforeach
                {{-- @if (($apartment->sponsors)->isEmpty())
                @if ((($apartment->sponsors)->isEmpty()) || (($apartment->sponsors)->isNotEmpty() && now() > $expired_date)) --}}
        <div class="col-12 col-sm-9 col-md-5 col-lg-4">
          <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
          <div class="btn btn-primary card-results">
            <div class="card-body">
                @if (($apartment->images)->isNotEmpty())
                    @php
                        $copertina = $apartment->images->first()->filename
                        // $copertina = $apartment->images()->first()
                    @endphp
                @endif
                <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento . {{$apartment->title}}">
            </div>
             <div class="card-text">
               <h5 class="card-title customJS">{{ $apartment->titolo }}</h5>
               <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
              <p class="small-text smallJS">{{$apartment->indirizzo}}</p>
             </div>
          </div>
          </a>
        </div>
      {{-- @endif --}}
          @empty
          <p class="text-center">Non ci sono ancora appartamenti da mostrare</p>
          @endforelse
      </section>
      <div class="paginate mx-auto mt-3">
        {{$apartments->links()}}
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

    <script>

        $(document).ready(function() {
            //   Slider in searchsidebar
            let slider = document.getElementById("sliderKM");
            let output = document.getElementById("kmOutput");
            output.innerHTML = slider.value;

            slider.oninput = function () {
                output.innerHTML = this.value;
            };

            // compile the template
            let source = $('#apartment-template').html();

            let template = Handlebars.compile(source);
            // execute the compiled template and print the output to the console
            console.log(template({doesWhat: "rocks!"}));

            function getFilterResult(results){
                for (let i = 0; i < results.length; i++) {
                    console.log(results[i])
                }

            }

            //   Sidebar search ajax call
            $('#searchDeepButton').click(function (event) {
                event.preventDefault();
                console.log('test')
                let options = [];
                $('.option-check-box').each(function () {
                    if ($(this).is(":checked")) {
                        options.push($(this).val());
                    }
                });

                let latSearch = $('#latSearch').val() ? $('#latSearch').val() : 0.0;
                let lonSearch = $('#lonSearch').val() ? $('#lonSearch').val() : 0.0;
                let circle_radius = $('#sliderKM').val();
                let stanze = $.isNumeric($('#roomsNumSelect').val()) ? $('#roomsNumSelect').val() : 1;
                let posti_letto = $.isNumeric($('#bedsNumSelect').val()) ? $('#bedsNumSelect').val() : 1;
                $.ajax({
                    type: 'get',

                    url: '/apartments/search',

                    data: {
                        lat: latSearch,
                        lon: lonSearch,
                        circle_radius: circle_radius,
                        options: options,
                        posti_letto: posti_letto,
                        stanze: stanze,

                    },

                    success: function (data) {
                        $('#resultApartmentSection').empty();
                        getFilterResult(data);

                    },
                    error: function (err) {
                        console.log(err)
                    }

                })

            });


        });

    </script>
    {{--    Tempalte Hendelbars--}}
    <script id="apartment-template" type="text/x-handlebars-template">
              <div class="col-12 col-sm-9 col-md-5 col-lg-4">
                  <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
                  <div class="btn btn-primary card-results">
                    <div class="card-body">
                      <img class="img-thumbnail" src="{{asset('storage/' . $apartment->img)}}" alt="Immagine appartamento">
                    </div>
                     <div class="card-text">
                       <h5 class="card-title customJS">{{ $apartment->titolo }}</h5>
                       <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
                      <p class="small-text smallJS">{{$apartment->indirizzo}}</p>
                     </div>
                  </div>
                  </a>
               </div>
     </script>


    @endsection
