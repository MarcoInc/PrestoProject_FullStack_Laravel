<x-layout title="{{__('ui.homeTitle')}}">
  {{-- midlleware revisore --}}
  @if(session('access.denied'))
  <div>
    <p class="alert alert-warning mt-3 text-center"> {{session('access.denied')}} </p> 
  </div>
  @endif
  
  @if(session('messageRevisorOK'))
  <div>
    <p class="alert alert-warning mt-3 text-center"> {{session('messageRevisorOK')}} </p> 
  </div>
  @endif
  
  @if(session('messageNotFound'))
  <div>
    <p class="alert alert-warning mt-3 text-center"> {{session('messageNotFound')}} </p> 
  </div>
  @endif
  
  @if(session('messageRevisor'))
  <div>
    <p class="alert alert-warning mt-3 text-center"> {{session('messageRevisor')}} </p> 
  </div>
  @endif
  
  
  <!-- carosel -->
  <x-carousel/>
  
  <div class="container-fluid p-0">
    <div  id="scrollAnnunci" class="row me-0 mt-0 pt-0 position-sticky sticky-top borderRowHome">
      @livewire('category-bar')
    </div>
    
    <div class="row justify-content-center pt-5 pe-0 me-0">
      
      <!-- Swiper -->
      <div class="col-10">
        <div class="swiper">
          <div class="swiper-wrapper">
            
            @foreach ($guest_houses as $house)
            <div class="swiper-slide mb-2">
              <div class=" bg-light p-2 mx-2">
                
                
{{--                 
                <div id="" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    
                    @foreach ($house->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif" data-bs-interval="5000">
                      <img src="{{$image->getUrl(400,300)}}" alt="Immagini">
                    </div>
                    
                    @endforeach
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#pippo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#pippo" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div> --}}
                
                
                
                
                <img src="{{$house->images()->first()->getUrl(400,300)}}" class="card-img-top" alt="">
                
                <div class="card-body  borderCardHome">
                  <div class="text-start py-3">
                    <h5 class="card-title fs-5 fw-semibold text-uppercase">{{$house->place}}</h5>
                  </div>
                  
                  <div class="d-flex">
                    <p class="card-text mainColor fs-5">{{__('ui.location')}}:</p>
                    <p class="card-text fs-5">&nbsp;
                      {{-- {{$house->location->name}} --}}
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
                  </div>
                  <div class="d-flex">
                    <p class="fs-5 card-text mainColor">{{__('ui.price')}}:</p>
                    <p class="card-text">{{$house->price}}&euro;/{{__('night')}}</p>
                  </div>
                  <div class=" d-flex justify-content-between align-items-center w-100">
                    <!--Detail-->
                    <a href="{{route('show', ['id'=>$house->id])}}" class="p-0 btn btnCard fs-5 text-center"><i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.detail')}}</a>
                    <!--End Detail-->
                    
                    <p class="card-footer fs-5 mb-0"><span class="me-1"><i class="bi bi-calendar-check mainColor"></i></span>{{__('ui.publishAt')}}: {{$house->created_at->format('d/m/Y')}}</p>
                    <!--
                      <p class="card-footer">Pubblicato da: {{$house->user->name}}</p>
                    -->
                  </div>
                </div>
              </div>
              
            </div>
            @endforeach
            
          </div>
          
          
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
          
          
        </div>
        
      </div>
      
      
    </div>
  </div>
  
  
</x-layout>