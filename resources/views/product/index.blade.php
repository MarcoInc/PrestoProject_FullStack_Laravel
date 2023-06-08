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
        <div class="row">
            @foreach ($guest_houses as $house)
            <div class="col-3">
                <div class="card">
                    <img src="{{Storage::url($house->img)}}" class="card-img-top" alt="..."> 
                    <div class="card-body">
                        <h5 class="card-title">{{$house->place}}</h5>
                        <p class="card-text">Location: {{$house->location->name}}</p>
                        <div>
                            <a href="{{route('show', ['id'=>$house->id])}}" class="btn btnCard fs-5 text-center">Dettaglio</a>
                            @if(Auth::id()==$house->user_id)
                            <a href="{{ route('edit',compact('house')) }}" class="btn btnCard fs-5 text-center">Modifica</a>
                            <form class="d-flex justify-content-end" method=POST action={{route('delete',compact('house'))}}>
                                @csrf
                                @method('delete')
                                <button class="btn btnCard fs-5 fw-semibold"><span><i class="bi bi-trash3 fs-3"></i></span></button>
                            </form>
                            @endif
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