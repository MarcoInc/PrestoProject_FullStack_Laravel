<x-layout title="Tutti gli articoli">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-around py-2">
                    @foreach ($locations as $location)
                    <div class="col-1">
                        <a href="{{route('categoryShow', compact('location'))}}">
                            <div class="borderCategory card " onmouseover="changeBorderColor(this)" onmouseout="resetBorderColor(this)" id="{{$location->id}}" >
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <div class=""><i class="fa-solid  {{$icons[$loop->index]}} fs-3"></i></div>
                                    <p class="card-text fs-5">{{$location->name}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($guest_houses as $house)
            <div class="col-3">
                <div class="card w-100" style="width: 18rem;">
                    <div class="row">
                        
                        <img src="{{Storage::url($house->img)}}" class="card-img-top w-100" alt="..."> 
                        
                    </div>                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fw-bold">{{$house->place}}</h5>
                            <a class="btnLike" href=""><i class=" bi bi-suit-heart fs-5 mainColor"></i></a>
                        </div>
                        <p class="card-text fs-5"> <span class="fw-semibold"><i class="bi bi-house-heart-fill me-1 mainColor"></i>Location: </span>{{$house->location->name}}</p>
                        <p class="card-text fs-5"><span class="fw-semibold fs-5"><i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>Prezzo: </span>{{$house->price}}/notte</p>
                        <div class="d-flex justify-content-between">
                            <span class="d-flex align-items-center">
                                <a href="{{route('show', ['id'=>$house->id])}}" class="p-0 btn btnCard fs-5 text-center"><i class="bi bi-chevron-compact-right mainColor"></i>Dettaglio</a>
                                @if(Auth::id()==$house->user_id)
                                <a href="{{ route('edit',compact('house')) }}" class="ms-1 p-0 btn btnCard fs-5 text-center"><i class="bi bi-chevron-compact-right mainColor"></i>Modifica</a>
                            </span>
                            <span class="d-flex align-items-center">
                                <a onclick="event.preventDefault();getElementById('form-delete').submit();" class="btn btnCard fs-5 fw-semibold"><span><i class="bi bi-trash3 fs-3"></i></span></a>
                                <form id="form-delete" class="d-none" method=POST action={{route('delete',compact('house'))}}>
                                    @csrf
                                    @method('delete')
                                </form>
                                @endif
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>  
            @endforeach
            <!--Si lega al paginator per creare link di piu pagine (AppServiceProvider)-->
            {{$guest_houses->links()}}
        </div>
    </div>
    
    <script>
        function changeBorderColor(element) {
            element.classList.add('hovered');
        }
        
        function resetBorderColor(element) {
            element.classList.remove('hovered');
        }
        
        
        
    </script>
</x-layout>