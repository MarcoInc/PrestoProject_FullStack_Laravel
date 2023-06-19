<x-layout title="{{ $house->place }}">
    <div class="container">

        @livewire('category-bar', compact('locations'))
        <div class="row justify-content-center justify-content-md-around align-items-center p-3 mb-5 mt-3 shadow">
            <div class="col-md-5 col-12">
                @if (session('editOk'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ session('editOk') }} </p>
                    </div>
                @endif
                <h2 class="borderCardHome pb-0">{{ $house->place }}</h2>
                <p><strong class="mainColor"><i class="bi bi-house-heart-fill me-1"></i>{{ __('ui.location') }}:</strong>
                    {{-- {{$house->location->name}} --}}
                    
                    <x-locationTranslate :house="$house"/>         

                </p>

                <p><strong class="mainColor"><i class="fa-solid fa-bed me-1"></i>{{ __('ui.bedsPlace') }}:</strong> {{ $house->beds }}</p>
                <p><strong class="mainColor"><i class="bi bi-currency-euro me-1"></i>{{ __('ui.price') }}:</strong> {{ $house->price }}/{{ __('ui.night') }}</p>
                <p><strong class="mainColor"><i class="bi bi-book me-1"></i>{{ __('ui.description') }}:</strong> {{ $house->description }}</p>
                <p><strong class="mainColor">{{ __('ui.publishBy') }}:</strong>
                    <a href="{{ route('userProfile', ['id' => $house->user->id]) }}"
                        class="btn mainColor fw-semibold fs-6">
                        <i class="bi bi-person-lines-fill"></i> {{ $house->user->name }}
                    </a>
                </p>

                @if (Auth::id() == $house->user_id)
                    <a href="{{ route('edit', compact('house')) }}" class="btn btnCard fs-6 mainColor">
                        <i class="bi bi-chevron-compact-right mainColor fs-6"></i> {{ __('ui.editArticle') }}
                    </a>

                    <!-- Button trigger modal -->
                    <a type="button" class="btn btnCard fs-6 mainColor" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-chevron-compact-right mainColor fs-6"></i>
                        <span>{{ __('ui.deleteArticle') }}</span>
                        <i class="bi bi-trash3 text-danger fs-5"></i>
                    </a>


                    <form id="form-delete" class="d-none" method=POST action={{ route('delete', compact('house')) }}>
                        @csrf
                        @method('delete')
                    </form>
                @endif
            </div>
            <div class="col-md-5 col-12">


                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($house->images as $image)
                            <div class="carousel-item @if ($loop->first) active @endif"
                                data-bs-interval="3000">
                                <img src="{{ Storage::url($image->path) }}" class="fotoCarousel aiuto imgCustom"
                                    alt="Immagini">
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>



                {{-- <img class="img-fluid" src="{{Storage::url($house->images()->first()->path)}}" alt="{{$house->name}}"> --}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-1">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('ui.deleteArticleModal')}}<i
                            class="fa-solid text-danger fa-triangle-exclamation"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalCustom">
                    <p class="fs-5"> {{ __('ui.areYouSure?') }}</p>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btnCard mainColor fs-6 text-uppercase fw-semibold"
                        data-bs-dismiss="modal">{{ __('ui.close') }}</a>
                    <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                        class="btn btnCard text-danger rounded-1 fs-6 text-uppercase fw-semibold">
                        {{ __('ui.deleteArticle') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
