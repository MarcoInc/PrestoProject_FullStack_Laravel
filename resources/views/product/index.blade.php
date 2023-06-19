<x-layout title="{{ __('ui.allArticleTitle') }}">

    <div class="container-fluid">

        @livewire('category-bar', compact('locations'))


        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('message'))
                    <div class="container mt-2">
                        <p class="alert alert-warning">{{ __('messages.AnnuncioEliminato') }}</p>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="row justify-content-md-center ">
                    @if (count($guest_houses) > 0)
                        <div class="col-12">
                            <h4 class="text-center p-4 borderIndexh3">

                                {{ __('ui.dreamWithUs') }}
                            </h4>
                        </div>
                    @endif

                    @forelse ($guest_houses as $house)
                        <div class="col-11 hCard col-md-6 col-lg-3 mx-3 my-3">
                            <div class="card h-100 cardBorder">
                                {{-- @dd(Storage::url($house->images()->first()->path)) --}}

                                {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                                <div class="cardBg" data-image="{{ Storage::url($house->images()->first()->path) }}">
                                </div>
                                {{-- <img src="{{$house->images()->first()->getUrl(400,300)}}" class="card-img-top imgCustom" alt=""> --}}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">{{ $house->place }}</h5>
                                        {{-- <p class="btnLike" href=""><i
                                        class=" bi bi-suit-heart fs-5 mainColor"></i></p> --}}
                                    </div>
                                    <p class="card-text fs-6">
                                        <span class="fw-semibold fs-6">
                                            <i
                                                class="bi bi-house-heart-fill me-1 mainColor"></i>{{ __('ui.location') }}:

                                            <x-locationTranslate :house="$house" />

                                        </span>
                                        {{-- {{ $house->location->name }} --}}



                                    </p>
                                    <p class="card-text">
                                        <span class="fw-semibold fs-6">
                                            <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>
                                            {{ __('ui.price') }}:
                                        </span>{{ $house->price }}/&euro;{{ __('ui.night') }}
                                    </p>
                                    <p class="card-text fs-6">
                                        <span class="fw-semibold fs-6">
                                            <i
                                                class="fa-solid fs-6 fa-user me-0 pe-0 mainColor"></i>{{ __('ui.publishBy') }}:
                                        </span>
                                        <a href="{{ route('userProfile', ['id' => $house->user]) }}"
                                            class="btn mainColor ps-1 p-0  scale transition"></i>{{ $house->user->name }}
                                        </a>


                                    <div class="d-flex justify-content-between">
                                        <span class="d-flex align-items-center flex-md-row flex-column">
                                            <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-0 btn btnCard fs-6 text-center">
                                                <i
                                                    class="bi bi-chevron-compact-right mainColor fs-6"></i>{{ __('ui.detail') }}
                                            </a>
                                            @if (Auth::id() == $house->user_id)
                                                <a href="{{ route('edit', compact('house')) }}"
                                                    class="ms-1 p-0 btn btnCard fs-6 text-center">
                                                    <i
                                                        class="bi bi-chevron-compact-right mainColor fs-6"></i>{{ __('ui.editArticle') }}
                                                </a>
                                        </span>
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
@empty

    <div class="col-12 vhCustom d-flex justify-content-center align-items-center">
        <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-white p-5">{{ __('ui.noneArticleCategory') }}:</h2>
            <i class="text-white fs-4 pb-2 bi bi-cloud-upload-fill"></i><a href="{{ route('create') }}"
                class="btn opacity btnCustom p-2 fs-5">{{ __('ui.CaricaAnnuncio') }}</a>
        </div>
    </div>
    @endforelse
    </div>
    </div>
    <!--Si lega al paginator per creare link di piu pagine (AppServiceProvider)-->
    {{ $guest_houses->links() }}
    </div>
    </div>








    <x-script-card />
</x-layout>
