{{--<section class="container" id="resultApartmentSection">--}}

    @forelse ($apartments as $apartment)
        <div class="col-12 col-sm-9 col-md-5 col-lg-4">
            <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
                <div class="btn btn-primary card-results">
                    <div class="card-body">
                        @if (($apartment->images)->isNotEmpty())
                            <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/' . $apartment->images->first()->filename)}}" alt="Immagine appartamento . {{$apartment->titolo}}">
                        @else
                            <img class="custom-img" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Immagine appartamento . {{$apartment->titolo}}">
                        @endif
                        <h5 class="text-white promo-title">{{ $apartment->titolo }}</h5>
                    <div class="card-text">
                        <h5 class="card-title customJS">{{ $apartment->titolo }}</h5>
                        <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
                        <p class="small-text smallJS">{{$apartment->indirizzo}}</p>
                    </div>
                </div>
                </div>
            </a>
        </div>

    @empty
        <p class="text-center">Non ci sono ancora appartamenti da mostrare</p>
    @endforelse
      <div class="paginate mx-auto mt-3">
        {{$apartments->links()}}
      </div>


