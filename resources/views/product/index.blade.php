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
                    <div class="col-11 hCard col-md-6 col-lg-3 mx-3 my-3">
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
                                    <p class="card-text fs-6">
                                        <span class="fw-semibold fs-6">
                                            <i class="bi bi-house-heart-fill me-1 mainColor"></i>{{__('ui.location')}}:
                                        </span>{{ $house->location->name }}</p>
                                        <p class="card-text">
                                            <span class="fw-semibold fs-6">
                                                <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i> {{__('ui.price')}}:
                                            </span>{{ $house->price }}/{{__('ui.night')}}
                                        </p>
                                        <p class="card-text fs-6">
                                            <span class="fw-semibold fs-6">
                                                <i class="fa-solid fs-6 fa-user me-0 pe-0 mainColor"></i>{{__('ui.publishBy')}}:
                                            </span>
                                            <a href="{{ route('userProfile', ['id' => $house->user->id])}}"
                                                class="btn mainColor ps-1 p-0  scale transition"></i>{{ $house->user->name }}
                                            </a>    
                                            
                                            
                                            <div class="d-flex justify-content-between">
                                                <span class="d-flex align-items-center flex-md-row flex-column">
                                                    <a href="{{ route('show', ['id' => $house->id]) }}"
                                                        class="p-0 btn btnCard fs-6 text-center">
                                                        <i class="bi bi-chevron-compact-right mainColor fs-6"></i>{{__('ui.detail')}}
                                                    </a>
                                                    @if (Auth::id() == $house->user_id)
                                                    <a href="{{ route('edit', compact('house')) }}"
                                                    class="ms-1 p-0 btn btnCard fs-6 text-center">
                                                    <i class="bi bi-chevron-compact-right mainColor fs-6"></i>{{__('ui.editArticle')}}
                                                </a>
                                            </span>
                                            <span class="d-flex align-items-center">
                                                
                                                <!-- Button trigger modal -->
                                                <a type="button" class="btn btnCard" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-trash3 mainColor fs-4"></i>
                                                </a>
                                                
                                                
                                                {{-- <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                                                class="btn btnCard fs-5 fw-semibold">
                                                <span><i class="bi bi-trash3 mainColor fs-4"></i>
                                                </a> --}}
                                            </span>
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
    
    
    
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-1">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina articolo <i class="fa-solid text-danger fa-triangle-exclamation"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalCustom">
                    <p class="fs-5">L'annuncio non potrà essere recuperato. Sei sicuro di volerlo eliminare?</p>
                </div>
                
                <div class="modal-footer">
                    <a type="button" class="btn btnCard mainColor fs-6 text-uppercase fw-semibold" data-bs-dismiss="modal">{{__('ui.close')}}</a>
                    <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                    class="btn btnCard text-danger rounded-1 fs-6 text-uppercase fw-semibold">
                    <span>{{__('ui.deleteArticle')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-script-card />
</x-layout>
