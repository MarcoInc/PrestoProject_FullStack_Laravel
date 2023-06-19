<x-layout title="{{__('ui.categoriesTitle')}}">
    <div class="container">
        
        <div class="row">
            @livewire('category-bar')
        </div>
        
        <div class="row">
            <div class="col-12">
                <h2 class="pt-5">{{__('ui.explorerCategory')}}: 
                    {{-- {{$location->name}} --}}
                    
                    <x-locationTranslateCategory :location="$location"/>         

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
                                    {{-- <p class="btnLike" href=""><i class=" bi bi-suit-heart fs-5 mainColor"></i>
                                    </p> --}}
                                </div>
                                <p class="card-text fs-6">
                                    <span class="fw-semibold">
                                        <i class="bi bi-house-heart-fill me-1 mainColor"></i>{{__('ui.location')}}: 
                                    </span>{{$house->location->name}}
                                </p>
                                <p class="card-text fs-6">
                                    <span class="fw-semibold fs-6">
                                        <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{__('ui.price')}}: 
                                    </span>{{$house->price}}/&euro;{{__('ui.night')}}
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
                                    
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                </div>
                <div class="col-12 my-3 d-flex justify-content-center align-items-center">
                    <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="text-white text-center p-5">{{__('ui.noneArticleCategory')}}:</h2>
                        <i class="text-white fs-4 pb-2 bi bi-cloud-upload-fill"></i><a href="{{route('create')}}" class="btn opacity btnCustom p-2 fs-5">{{__('ui.CaricaAnnuncio')}}!</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
        
       
    </div>
    
    {{-- {{ $guest_houses->links() }} --}}
</div>     {{-- JS per img di background --}}
</div>       
<x-script-card/>
</x-layout>