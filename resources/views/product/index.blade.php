<x-layout title="{{__('ui.allArticleTitle')}}">
    
    <div class="container-fluid">
        
        @livewire('category-bar', compact('locations'))
        
        
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row justify-content-md-center ">
                    @if(count($guest_houses)>0)
                        <div class="col-12">
                            <h4 class="text-center p-4 borderIndexh3">
                                
                                {{__('ui.dreamWithUs')}}
                            </h4>
                        </div>

                    @endif
                    
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

                                            
                                        </span>
                                        {{-- {{ $house->location->name }} --}}
                                        @if(App::getLocale()=='it')
                                            @if($house->location->name=='Mare')
                                                Mare
                                            @elseif($house->location->name=='Montagna')
                                                Montagna
                                            @elseif($house->location->name=='Lago')
                                                Lago
                                            @elseif($house->location->name=='Deserto')
                                                Deserto
                                            @elseif($house->location->name=='Campagna')
                                                Campagna
                                            @elseif($house->location->name=='Citta')
                                                Città
                                            @elseif($house->location->name=='Neve')
                                                Neve
                                            @endif
                                        @elseif(App::getLocale()=='en')
                                            @if($house->location->name=='Mare')
                                                Beach
                                            @elseif($house->location->name=='Montagna')
                                                Mountain
                                            @elseif($house->location->name=='Lago')
                                                Lake
                                            @elseif($house->location->name=='Deserto')
                                                Desert
                                            @elseif($house->location->name=='Campagna')
                                                Countryside
                                            @elseif($house->location->name=='Citta')
                                                City
                                            @elseif($house->location->name=='Neve')
                                                Snow
                                            @endif
                                        @elseif(App::getLocale()=='es')
                                            @if($house->location->name=='Mare')
                                                Mar
                                            @elseif($house->location->name=='Montagna')
                                                Montaña
                                            @elseif($house->location->name=='Lago')
                                                Lago
                                            @elseif($house->location->name=='Deserto')
                                                Desierto
                                            @elseif($house->location->name=='Campagna')
                                                Campo
                                            @elseif($house->location->name=='Citta')
                                                Ciudad
                                            @elseif($house->location->name=='Neve')
                                            Nieve
                                            @endif
                                        @endif
                                    
                                    
                                    </p>
                                        <p class="card-text">
                                            <span class="fw-semibold fs-6">
                                                <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i> {{__('ui.price')}}:
                                            </span>{{ $house->price }}/{{__('ui.night')}}
                                        </p>
                                        <p class="card-text fs-6">
                                            <span class="fw-semibold fs-6">
                                                <i class="fa-solid fs-6 fa-user me-0 pe-0 mainColor"></i>{{__('ui.publishBy')}}:
                                            </span>
                                            <a href="{{ route('userProfile', ['id' => $house->user])}}"
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
                    
                    <div class="col-12 vhCustom d-flex justify-content-center align-items-center">
                        <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
                            <h2 class="text-white p-5">{{__('ui.noneArticleCategory')}}:</h2>
                            <i class="text-white fs-4 pb-2 bi bi-cloud-upload-fill"></i><a href="{{route('create')}}" class="btn opacity btnCustom p-2 fs-5">Carica un annuncio!</a>
                        </div>
                    </div>
                    
                    @endforelse
                </div>
            </div>
            <!--Si lega al paginator per creare link di piu pagine (AppServiceProvider)-->
            {{ $guest_houses->links() }}
        </div>
    </div>
    
    
    
    
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-1">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('ui.deleteArticleModal')}} <i class="fa-solid text-danger fa-triangle-exclamation"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalCustom">
                    <p class="fs-5">{{__('ui.areYouSure?')}}</p>
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
