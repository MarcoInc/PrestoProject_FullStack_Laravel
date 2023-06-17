<x-layout title="{{__('ui.categoriesTitle')}}">
    <div class="container">
        
        <div class="row">
            @livewire('category-bar')
        </div>
        
        <div class="row">
            <div class="col-12">
                <h2 class="pt-5">{{__('ui.explorerCategory')}}: 
                    {{-- {{$location->name}} --}}
                    @if(App::getLocale()=='it')
                        @if($location->name=='Mare')
                            Mare
                        @elseif($location->name=='Montagna')
                            Montagna
                        @elseif($location->name=='Lago')
                            Lago
                        @elseif($location->name=='Deserto')
                            Deserto
                        @elseif($location->name=='Campagna')
                            Campagna
                        @elseif($location->name=='Citta')
                            Città
                        @elseif($location->name=='Neve')
                            Neve
                        @endif
                    @elseif(App::getLocale()=='en')
                        @if($location->name=='Mare')
                            Beach
                        @elseif($location->name=='Montagna')
                            Mountain
                        @elseif($location->name=='Lago')
                            Lake
                        @elseif($location->name=='Deserto')
                            Desert
                        @elseif($location->name=='Campagna')
                            Countryside
                        @elseif($location->name=='Citta')
                            City
                        @elseif($location->name=='Neve')
                            Snow
                        @endif
                    @elseif(App::getLocale()=='es')
                        @if($location->name=='Mare')
                            Mar
                        @elseif($location->name=='Montagna')
                            Montaña
                        @elseif($location->name=='Lago')
                            Lago
                        @elseif($location->name=='Deserto')
                            Desierto
                        @elseif($location->name=='Campagna')
                            Campo
                        @elseif($location->name=='Citta')
                            Ciudad
                        @elseif($location->name=='Neve')
                        Nieve
                        @endif
                    @endif
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="row justify-content-center">
                    @forelse ($location->guest_houses->where('is_accepted',true) as $house)
                    <div class="col-12 col-md-5 col-lg-3 mx-3 my-3">
                        <div class="card cardBorder" >
                            {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                            <div class="cardBg" data-image="{{Storage::url($house->images()->first()->path)}}"></div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title fw-bold">{{$house->place}}</h5>
                                    <p class="btnLike" href=""><i class=" bi bi-suit-heart fs-5 mainColor"></i>
                                    </p>
                                </div>
                                <p class="card-text fs-6">
                                    <span class="fw-semibold">
                                        <i class="bi bi-house-heart-fill me-1 mainColor"></i>{{__('ui.location')}}: 
                                    </span>{{$house->location->name}}
                                </p>
                                <p class="card-text fs-6">
                                    <span class="fw-semibold fs-6">
                                        <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{__('ui.price')}}: 
                                    </span>{{$house->price}}/{{__('ui.night')}}
                                </p>
                                <p class="card-text fs-6"><span class="fw-semibold fs-6">
                                    <i class="fa-solid fs-6 fa-user me-0 pe-0 mainColor"></i>{{__('ui.publishBy')}}:
                                    <a href="{{ route('userProfile', ['id' => $house->user->id])}}"
                                        class="btn mainColor scale transition"></i>{{ $house->user->name }}
                                    </a>    
                                </p>
                                
                                <div class="d-flex justify-content-between">
                                    @if(Auth::id()==$house->user_id)
                                    <div class="d-flex align-items-center flex-md-row flex-column">
                                        <a href="{{route('show', ['id'=>$house->id])}}" class="p-0 btn btnCard fs-5 text-center">
                                        </a>
                                        
                                        <a href="{{ route('edit',compact('house')) }}" class="ms-1 p-0 btn btnCard fs-5 text-center">
                                            <i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.editArticle')}}
                                        </a>
                                    </div>
                                    <span class="d-flex align-items-center">
                                        
                                        <!-- Button trigger modal -->
                                        <a type="button" class="btn btnCard" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-trash3 mainColor fs-4"></i>
                                        </a>
                                        
                                        
                                        
                                        <form id="form-delete" class="d-none" method=POST action={{route('delete',compact('house'))}}>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        
                                        
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                </div>
                <div class="col-12 vhCustom d-flex justify-content-center align-items-center">
                    <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="text-white p-5">{{__('ui.noneArticleCategory')}}:</h2>
                        <i class="text-white fs-4 pb-2 bi bi-cloud-upload-fill"></i><a href="{{route('create')}}" class="btn opacity btnCustom p-2 fs-5">{{__('ui.CaricaAnnuncio')}}!</a>
                    </div>
                </div>
                @endforelse
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
                        <a type="button" class="btn btnCard mainColor fs-6 text-uppercase fw-semibold" data-bs-dismiss="modal">{{__('ui.close')}}
                        </a>
                        <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                        class="btn btnCard text-danger rounded-1 fs-6 text-uppercase fw-semibold">
                        {{__('ui.deleteArticle')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- {{ $guest_houses->links() }} --}}
</div>     {{-- JS per img di background --}}
</div>       
<x-script-card/>
</x-layout>