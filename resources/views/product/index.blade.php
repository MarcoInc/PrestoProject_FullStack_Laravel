<x-layout title="{{__('ui.allArticleTitle')}}">

    <div class="container-fluid">

        @livewire('category-bar', compact('locations'))
        @if (session('editOk'))
            <div>
                <p class="alert alert-warning mt-3 text-center"> {{ session('editOk') }} </p>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row justify-content-md-center ">
                    <div class="col-12">
                        <h4 class="text-center p-4 borderIndexh3">{{__('ui.dreamWithUs')}}
                        </h4>
                    </div>
                    @forelse ($guest_houses as $house)
                        <div class="col-12 hCard col-md-6 col-lg-3 mx-3 my-3">
                            <div class="card h-100 cardBorder">
                                {{-- @dd(Storage::url($house->images()->first()->path)) --}}

                                {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                                <div class="cardBg" data-image="{{ Storage::url($house->images()->first()->path) }}"></div>
                                {{-- <img src="{{$house->images()->first()->getUrl(400,300)}}" class="card-img-top imgCustom" alt=""> --}}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">{{ $house->place }}</h5>
                                        {{-- <p class="btnLike" href=""><i
                                                class=" bi bi-suit-heart fs-5 mainColor"></i></p> --}}
                                    </div>
                                <p class="card-text fs-5">
                                    <span class="fw-semibold">
                                        <i class="bi bi-house-heart-fill me-1 mainColor"></i>{{__('ui.location')}}:
                                    </span>{{ $house->location->name }}</p>
                                <p class="card-text fs-5"><span class="fw-semibold fs-5">
                                    <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{__('ui.price')}}:
                                    </span>{{ $house->price }}/{{__('ui.night')}}
                                </p>
                                <p class="card-text fs-5"><span class="fw-semibold fs-5">
                                    <i class="fa-solid fs-6 fa-user me-0 pe-0 mainColor"></i>{{__('ui.publishBy')}}:
                                    <a href="{{ route('userProfile', ['id' => $house->user->id])}}"
                                        class="btn btn-light"></i>{{ $house->user->name }}</a>    
                                </p>

                                <div class="d-flex justify-content-between">
                                    <span class="d-flex align-items-center flex-md-row flex-column">
                                        <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-0 btn btnCard fs-5 text-center">
                                        <i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.detail')}}
                                        </a>
                                        @if (Auth::id() == $house->user_id)
                                            <a href="{{ route('edit', compact('house')) }}"
                                                class="ms-1 p-0 btn btnCard fs-5 text-center">
                                                <i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.editArticle')}}
                                            </a>
                                    </span>
                                            <span class="d-flex align-items-center">
                                                    <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                                                        class="btn btnCard fs-5 fw-semibold">
                                                            <span><i class="bi bi-trash3 fs-3"></i></span>
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
                            <p>{{__('ui.noneArticle')}}</p>
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
