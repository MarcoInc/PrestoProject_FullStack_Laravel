<x-layout title="Pagina revisore">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $house_toCheck ? 'Annunci da revisionare' : 'Nessun annucio da revisionare' }}</h1>
                        
                        
                        @if($house_toCheck)
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
                                    <th class="text-center" scope="col">Pubblicato da</th>
                                    <th class="text-center" scope="col">Luogo</th>
                                    <th class="text-center" scope="col">Prezzo</th>
                                    <th class="text-center" scope="col">Descrizione</th>
                                    <th class="text-center" scope="col">Creato il</th>
                                    <th class="text-center" scope="col">Immagine</th>
                                    <th class="text-center" scope="col">Accetta/Rifiuta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($house_toCheck as $house)
                                <tr>
                                    {{-- <td>{{$house->id}}</td> --}}
                                    <th class="text-center" scope="row">{{$house->user->name}}</th>
                                    <td class="text-center">{{$house->place}}</td>
                                    <td class="text-center">{{$house->price}}&euro;/notte</td>
                                    <td class="text-center">{{$house->description}}</td>
                                    <td class="text-center">{{$house->created_at}}</td>

                                    <td class="text-center"><img class="img-fluid" src="{{ Storage::url($house->img) }}" alt="{{ $house->name }}"></td>

                                    <td class="text-center text-uppercase">
                                        
                                        <a onclick="event.preventDefault();getElementById('form-accept').submit()" class="btn form-accept" type='submit'><i class="fa-solid fa-square-check mainColor"></i></i> Accetta</a>
                                        <form id="form-accept" class="d-none " method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house->id] )}}>
                                            @csrf
                                            @method('patch')
                                        </form>
                                        
                                        <a onclick="event.preventDefault();getElementById('form-reject').submit()" class="btn form-reject" type='submit'><i class="fa-solid fa-square-xmark text-danger"></i> Rifiuta</a>
                                        <form id="form-reject" class="d-none" method=POST action={{ route('revisor.reject', ['house_toCheck'=>$house->id]) }}>
                                            @csrf
                                            @method('patch')
                                        </form>
                                        
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                        {{--                         
                            @if ($house_toCheck)
                            <form method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house_toCheck] )}}>
                                @csrf
                                @method('patch')
                                <button class="btn btn-info" type='submit'>Accetta annuncio</button>
                            </form>
                            
                            <form method=POST action={{ route('revisor.reject', ['house_toCheck'=>$house_toCheck]) }}>
                                @csrf
                                @method('patch')
                                <button class="btn btn-danger" type='submit'>Rifiuta annuncio</button>
                            </form>
                            @endif  --}}
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
    