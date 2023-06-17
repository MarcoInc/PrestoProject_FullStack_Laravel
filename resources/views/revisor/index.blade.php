<x-layout title="{{__('ui.historyIndexRevisorTitle')}}">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 overflow-auto">
                        <h1 class="py-4">{{ $house_toCheck ? __('ui.toReview') : __('ui.noneReview') }}</h1>
                        @if(App\Models\GuestHouse::toBeRevisonedCounter()>0)
                        {{-- <h2>{{ $house_toCheck->place }}</h2>
                        <h3>Posti letto : {{ $house_toCheck->beds }}</h3>
                        <h2>Prezzo a notte : {{ $house_toCheck->price }}</h2>
                        <h2>Creato il: {{ $house_toCheck->created_at }} da {{ $house_toCheck->user->name}} ({{$house_toCheck->user->email}})</h2>
                        <h2>Descrizione: {{ $house_toCheck->description }}</h2>
                        
                        <img src="{{ Storage::url($house_toCheck->img) }}" alt="{{ $house_toCheck->name }}">  --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">ID</th> --}}
                                    <th class="text-center" scope="col"><i class="bi bi-person-lines-fill mainColor"></i></th>
                                    <th class="text-center" scope="col">{{__('ui.Immagini')}}</th>
                                    {{-- <th class="text-center" scope="col">Sicurezza</th> --}}
                                    <th class="text-center" scope="col">{{__('ui.description')}}</th>
                                    
                                    <th class="text-center" scope="col">{{__('ui.Accetta')}}/{{__('ui.Rifiuta')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($house_toCheck as $house)
                                <tr>
                                    {{-- <td>{{$house->id}}</td> --}}
                                    <th class="text-center align-middle" scope="row">
                                        {{-- Creato da --}}
                                        <a href="{{ route('userProfile', ['id' => $house->user->id]) }}"
                                            class="btn pb-2">
                                            <p class="fw-semibold mainColor">User</p>
                                            <p>{{$house->user->name }}</p>
                                            
                                        </a>
                                        <div>
                                            <p class="fw-semibold mainColor">{{__('ui.createDate')}}:</p>
                                            <p class="fw-normal">
                                                {{$house->created_at->format('d/m/Y H:i')}}
                                            </p>
                                        </div>
                                        @if($house->created_at < $house->updated_at)
                                        <hr>
                                        <p class='mainColor bg-white rounded-2 borderCustom fw-semibold'>{{__('ui.editDate')}}:</p>
                                        <p class="fw-normal">
                                            {{$house->updated_at->format('d/m/Y H:i')}}
                                        </p>
                                        
                                        @endif
                                        
                                    </th>
                                    <td class="text-center align-middle sizeTd">
                                        
                                        <div id="{{$house->id}}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                
                                                @foreach ($house->images as $image)
                                                <div class="carousel-item  @if($loop->first)active @endif" >
                                                    
                                                    <div class="row justify-content-between">
                                                        <div class="col-12 py-2">
                                                            <img src="{{$image->getUrl(400,300)}}" class="" alt="Immagini">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center justify-content-center">
                                                        <div class="col-4 d-flex align-items-center  w-100">
                                                            <p class="m-0">NSFW:</p> <span class="{{$image->adult}} me-1"></span>
                                                            <p class="m-0">{{__('ui.Volgarità')}}:</p> <span class='{{$image->spoof}} me-1'></span>
                                                            <p class="m-0">{{__('ui.Medico')}}:</p> <span class='{{$image->medical}} me-1'></span>
                                                            <p class="m-0">{{__('ui.Violenza')}}:</p> <span class='{{$image->violence}} me-1'></span>
                                                            <p class="m-0">{{__('ui.Razzismo')}}:</p> <span class='{{$image->racy}}'></span>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                                
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#{{$house->id}}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#{{$house->id}}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            
                                        </div>
                                        
                                        {{-- scegliere una delle due --}}
                                        {{-- <div class="cardBg" data-image="{{Storage::url($house->images()->first()->path)}}"></div> --}}
                                        {{-- <img class="img-fluid" src="{{Storage::url($house->images()->first()->path)}}" alt="{{ $house->name }}"> --}}
                                    </td>  
                                    
                                    {{-- <td class="align-middle text-start sizeTd2"> --}}
                                        {{-- mostra safe search --}}
                                        
                                        
                                        {{-- <div id="{{$house->images->first()->id}}" class="carousel slide" data-bs-ride="carousel"> --}}
                                            {{-- <div class="carousel-inner">
                                                
                                                @foreach ($house->images as $image)
                                                <div class="carousel-item @if($loop->first)active @endif" >
                                                    <p class="m-0">NSFW:</p> <span class="{{$image->adult}}"></span>
                                                    <p class="m-0 mt-2">Volgarità:</p> <span class='{{$image->spoof}}'></span>
                                                    <p class="m-0 mt-2">Medicina:</p> <span class='{{$image->medical}}'></span>
                                                    <p class="m-0 mt-2">Violenza:</p> <span class='{{$image->violence}}'></span>
                                                    <p class="m-0 mt-2">Razzismo:</p> <span class='{{$image->racy}}'></span>
                                                    
                                                </div>
                                                
                                                @endforeach
                                            </div> --}}
                                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#{{$house->id}}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#{{$house->id}}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button> --}}
                                            
                                            {{-- </div> --}}
                                            
                                            
                                            {{-- </td> --}}
                                            
                                            
                                            
                                            <td class=" align-middle text-center p-5">
                                                <p class="text-center fw-semibold text-uppercase mainColor">
                                                    {{$house->place}}
                                                </p>
                                                <p>
                                                    {{$house->description}}
                                                </p>
                                                <p class="pt-4">
                                                    <span class="fw-semibold mainColor">{{__('ui.price')}}:</span> {{$house->price}}&euro;/{{__('ui.night')}}
                                                </p>
                                                
                                                {{-- mostra i tag/labels --}}
                                                <p class="text-center fw-semibold text-uppercase mainColor mb-1">Tag</p>
                                                @foreach ($house->images as $image)
                                                @if ($image->labels)
                                                @foreach ($image->labels as $key => $label)
                                                @if($key < 4)
                                                <span class="p-1">
                                                  <span class="fst-italic m-0">#</span> {{ $label }}
                                                    
                                                </span>
                                                @endif
                                                @endforeach
                                                @endif
                                                
                                                @endforeach
                                            </td>
                                            
                                            {{-- <td class="text-center align-middle">{{$house->price}}&euro;/notte</td> --}}
                                            
                                            {{-- <td class="text-center align-middle">{{$house->created_at->format('d/m/Y    H:i')}}
                                                @if($house->created_at < $house->updated_at)
                                                <hr>
                                                <p class='bg-warning'>Modificato il </p>
                                                {{$house->updated_at}} </p>
                                                
                                                @endif
                                            </td> --}}
                                            
                                            <td class="text-center align-middle">
                                                
                                                <a onclick="event.preventDefault();getElementById('form-accept').submit()" class="btn form-accept fs-6 fw-semibold" type='submit'><i class="fa-solid fa-square-check mainColor fs-5"></i> {{__('ui.Accetta')}}</a>
                                                <form id="form-accept" class="d-none " method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house->id] )}}>
                                                    @csrf
                                                    @method('patch')
                                                </form>
                                                
                                                <a onclick="event.preventDefault();getElementById('form-reject').submit()" class="btn form-reject fs-6 fw-semibold" type='submit'><i class="fa-solid fa-square-xmark text-danger fs-5"></i>{{__('ui.Rifiuta')}}</a>
                                                <form id="form-reject" class="d-none" method=POST action={{ route('revisor.reject', ['house_toCheck'=>$house->id]) }}>
                                                    @csrf
                                                    @method('patch')
                                                </form>
                                                
                                                
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                
                                
                                @else
                                
                                {{-- Se non ci sono articoli da revisionare --}}
                                <div class="col-12 vhCustom d-flex justify-content-center align-items-center">
                                    <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="text-white p-5">{{__('ui.noneReview')}}</h2>
                                        <div class="d-flex justify-content-around w-100">
                                            
                                            <div class="scale transition">
                                                <span><i class="fa-solid fa-paperclip text-white"></i></span> <a href="{{route('revisor.history')}}" class="btn fs-5">{{__('ui.Vaiallostorico')}}</a>
                                                
                                            </div>
                                            <div class="scale transition">
                                                <span><i class="fa-solid fa-rotate-left text-white"></i></span><a href="{{route('revisorIndex')}}" class="btn fs-5">{{__('ui.Refresh')}}</a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            {{-- <script>
                function changeBorderColor(element) {
                    element.classList.add('hovered');
                }
                
                function resetBorderColor(element) {
                    element.classList.remove('hovered');
                }
                
                document.addEventListener("DOMContentLoaded", function() {
                    let cards = document.querySelectorAll(".cardBg");
                    
                    cards.forEach(function(card) {
                        let imgUrl = card.dataset.image;
                        card.style.backgroundImage = "url('" + imgUrl + "')";
                    });
                });
            </script> --}}
        </x-layout>
        