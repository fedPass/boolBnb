{{--<section class="container" id="resultApartmentSection">--}}

    @forelse ($apartments as $apartment)
        <div class="col-12 col-sm-9 col-md-5 col-lg-4">
            <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
                <div class="btn btn-primary card-results">
                    <div class="card-body">
{{--                        <img class="img-thumbnail" src="{{asset('storage/' . $apartment->img)}}" alt="Immagine appartamento">--}}
                    </div>
                    <div class="card-text">
                        <h5 class="card-title customJS">{{ $apartment->titolo }}</h5>
                        <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
                        <p class="small-text smallJS">{{$apartment->indirizzo}}</p>
                    </div>
                </div>
            </a>
        </div>

    @empty
        <p class="text-center">Non ci sono ancora appartamenti da mostrare</p>
    @endforelse
        {{  $apartments->links() }}

