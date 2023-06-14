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
                {{-- <img src="{{Storage::url($house->images()->first()->path)}}" class="card-img-top img-fluid imgCustom" alt="Immagine annuncio"> --}}
                <img src="{{$house->images()->first()->getUrl(400,300)}}" class="card-img-top imgCustom" alt="">
                
                <div class="card-body  borderCardHome">
                  <div class="text-start py-3">
                    <h5 class="card-title fs-5 fw-semibold text-uppercase">{{$house->place}}</h5>
                  </div>
                  
                  <div class="d-flex">
                    <p class="card-text mainColor fs-5">{{__('ui.location')}}:</p>
                    <p class="card-text fs-5">&nbsp;{{$house->location->name}}</p>
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