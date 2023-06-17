<x-layout title="Profilo: {{ Auth::user()->name }}">

    @if (session('editProfileOk'))
        <div>
            <p class="alert alert-warning mt-3 text-center"> {{ session('editProfileOk') }} </p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 borderProfilo">
                <div class="row justify-content-md-center ">
                    <div class="col-12 py-3  formCustom mt-1 d-flex align-items-center justify-content-between">
                        <h2 class="display-1"><i class="text-white bi bi-person-circle ps-3 display-1"></i></h2>
                        <div class="pe-3">
                            <h2 class="py-3 text-white">Profilo: {{ Auth::user()->name }}</h2>
                            <a href="{{ route('edit_profile', ['user' => Auth::user()]) }}">EDIT</a>
                            @if (Auth::user()->is_revisor)
                                <p class="text-white fs-5">Ruolo: {{ __('ui.revisor') }}<i
                                        class="ps-2 bi bi-vector-pen"></i></p>
                            @endif
                        </div>
                    </div>

                    <div class="row vh-100">

                        <div class="col-4 bg-danger">
                            <h2>Chi sono</h2>
                            <ul class="list-unstyled">
                                <li class="list-item">Nome e cognome</li>
                                <li class="list-item">Nata il:</li>
                                <li class="list-item">Il mio lavoro: </li>
                                <li class="list-item">Lingue parlate:</li>
                                <li class="list-item">Luogo di residenza:</li>
                            </ul>
                            <h2>Contatti</h2>
                            <p>3333</p>
                        </div>
                        <div class="col-8 bg-info">
                            <h3 class="list-item">Vi parlo di me:</h3>
                        </div>
                    </div>





                    @forelse ($houses as $house)
                        <div class="col-12 hCard col-md-6 col-lg-3 mx-3 my-3">
                            <div class="card h-100 cardBorder">

                                {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                                {{-- togliere il commento --}}
                                <div class="cardBg" data-image="{{ Storage::url($house->images()->first()->path) }}">
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">{{ $house->place }}</h5>
                                        {{-- <p class="btnLike" href=""><i
                                        class=" bi bi-suit-heart fs-5 mainColor"></i></p> --}}
                                    </div>
                                    @if ($house->is_accepted === 0)
                                        <h5> <span class="badge bg-danger">{{ __('ui.notApproved') }}</span></h5>
                                    @elseif($house->is_accepted === null)
                                        <h5> <span class="badge bg-warning">{{ __('ui.inApprovation') }}</span></h5>
                                    @endif

                                    <p class="card-text fs-5">
                                        <span class="fw-semibold">
                                            <i class="bi bi-house-heart-fill me-1 mainColor"></i>Location:
                                        </span>
                                        {{-- {{ $house->location->name }} --}}
                                        @if (App::getLocale() == 'it')
                                            @if ($house->location->name == 'Mare')
                                                Mare
                                            @elseif($house->location->name == 'Montagna')
                                                Montagna
                                            @elseif($house->location->name == 'Lago')
                                                Lago
                                            @elseif($house->location->name == 'Deserto')
                                                Deserto
                                            @elseif($house->location->name == 'Campagna')
                                                Campagna
                                            @elseif($house->location->name == 'Citta')
                                                Città
                                            @elseif($house->location->name == 'Neve')
                                                Neve
                                            @endif
                                        @elseif(App::getLocale() == 'en')
                                            @if ($house->location->name == 'Mare')
                                                Beach
                                            @elseif($house->location->name == 'Montagna')
                                                Mountain
                                            @elseif($house->location->name == 'Lago')
                                                Lake
                                            @elseif($house->location->name == 'Deserto')
                                                Desert
                                            @elseif($house->location->name == 'Campagna')
                                                Countryside
                                            @elseif($house->location->name == 'Citta')
                                                City
                                            @elseif($house->location->name == 'Neve')
                                                Snow
                                            @endif
                                        @elseif(App::getLocale() == 'es')
                                            @if ($house->location->name == 'Mare')
                                                Mar
                                            @elseif($house->location->name == 'Montagna')
                                                Montaña
                                            @elseif($house->location->name == 'Lago')
                                                Lago
                                            @elseif($house->location->name == 'Deserto')
                                                Desierto
                                            @elseif($house->location->name == 'Campagna')
                                                Campo
                                            @elseif($house->location->name == 'Citta')
                                                Ciudad
                                            @elseif($house->location->name == 'Neve')
                                                Nieve
                                            @endif
                                        @endif

                                    </p>
                                    <p class="card-text fs-5"><span class="fw-semibold fs-5">
                                            <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{ __('ui.price') }}:
                                        </span>{{ $house->price }}/{{ __('ui.night') }}
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <span class="d-flex align-items-center flex-md-row flex-column">
                                            <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-0 btn btnCard fs-5 text-center">
                                                <i
                                                    class="bi bi-chevron-compact-right mainColor"></i>{{ __('ui.detail') }}
                                            </a>
                                            @if (Auth::id() == $house->user_id)
                                                <a href="{{ route('edit', compact('house')) }}"
                                                    class="ms-1 p-0 btn btnCard fs-5 text-center">
                                                    <i
                                                        class="bi bi-chevron-compact-right mainColor"></i>{{ __('ui.editArticle') }}
                                                </a>
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                                                class="btn btnCard fs-5 fw-semibold">
                                                <span><i
                                                        class="bi bi-trash3 fs-3"></i>{{ __('ui.deleteArticle') }}</span>
                                            </a>
                                            <form id="form-delete" class="d-none" method=POST
                                                action={{ route('delete', compact('house')) }}>
                                                @csrf
                                                @method('delete')
                                            </form>
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <p>{{ __('ui.notYetAnnouncements') }}</p>
    </div>
    @endforelse
    </div>
    </div>
    </div>
    </div>
    </div>

    <x-script-card />

</x-layout>
