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
                                    <th class="text-center" scope="col">Immagini</th>
                                    <th class="text-center" scope="col">Descrizione</th>
                                    
                                    <th class="text-center" scope="col">Accetta/Rifiuta</th>
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
                                            <p class="fw-semibold mainColor">Creato il:</p>
                                            <p class="fw-normal">
                                                {{$house->created_at->format('d/m/Y H:i')}}
                                            </p>
                                        </div>
                                        @if($house->created_at < $house->updated_at)
                                        <hr>
                                        <p class='mainColor bg-white rounded-2 borderCustom fw-semibold'>Modificato il:</p>
                                        <p class="fw-normal">
                                            {{$house->updated_at->format('d/m/Y H:i')}}
                                        </p>
                                        
                                        @endif
                                        
                                    </th>
                                    <td class="text-center align-middle sizeTd">
                                        
                                        <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                
                                                @foreach ($house->images as $image)
                                                <div class="carousel-item @if($loop->first)active @endif" data-bs-interval="5000">
                                                    <img src="{{$image->getUrl(400,300)}}" class="" alt="Immagini">

                                                    {{-- mostra safe search --}}
                                                    <div class='col-md-3'>
                                                        <div class='card-body'>
                                                            <h5 class='tc-accent'>REVISIONE</h5>
                                                            <p>NSFW: <span class="{{$image->adult}}"></span></p>
                                                            <p>Volgarità: <span class='{{$image->spoof}}'></span></p>
                                                            <p>Medicina: <span class='{{$image->medical}}'></span></p>
                                                            <p>Violenza: <span class='{{$image->violence}}'></span></p>
                                                            <p>Razzismo: <span class='{{$image->racy}}'></span></p>
                                                        </div>
                                                    </div>
                                                    
                                                    {{-- mostra i tag/labels --}}
                                                    @if ($image->labels)
                                                        <div class='col-md-3'>
                                                        <div class='card-body'>
                                                            <h5 class='tc-accent'>TAGS</h5>
                                                            @foreach ($image->labels as $label)
                                                                    <p class="d-inline">
                                                                        - {{ $label }}
                                                                    </p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                    
                                                    
                                                @endforeach
                                                
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        
                                        {{-- scegliere una delle due --}}
                                        {{-- <div class="cardBg" data-image="{{Storage::url($house->images()->first()->path)}}"></div> --}}
                                        {{-- <img class="img-fluid" src="{{Storage::url($house->images()->first()->path)}}" alt="{{ $house->name }}"> --}}
                                    </td>
                                    <td class=" align-middle text-center">
                                        <p class="text-center fw-semibold text-uppercase mainColor">
                                            {{$house->place}}
                                        </p>
                                        <p>
                                            {{$house->description}}
                                        </p>
                                        <p class="pt-4">
                                            <span class="fw-semibold mainColor">{{__('ui.price')}}:</span> {{$house->price}}&euro;/notte
                                        </p>
                                        
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
                                        
                                        <a onclick="event.preventDefault();getElementById('form-accept').submit()" class="btn form-accept fs-6 fw-semibold" type='submit'><i class="fa-solid fa-square-check mainColor fs-5"></i> Accetta</a>
                                        <form id="form-accept" class="d-none " method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house->id] )}}>
                                            @csrf
                                            @method('patch')
                                        </form>
                                        
                                        <a onclick="event.preventDefault();getElementById('form-reject').submit()" class="btn form-reject fs-6 fw-semibold" type='submit'><i class="fa-solid fa-square-xmark text-danger fs-5"></i> Rifiuta</a>
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
                                        <span><i class="fa-solid fa-paperclip text-white"></i></span> <a href="{{route('revisor.history')}}" class="btn fs-5">Vai allo storico</a>
                                        
                                    </div>
                                    <div class="scale transition">
                                        <span><i class="fa-solid fa-rotate-left text-white"></i></span><a href="{{route('revisorIndex')}}" class="btn fs-5">Refresh pagina</a>
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
    
    
    <script>
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
    </script>
</x-layout>
