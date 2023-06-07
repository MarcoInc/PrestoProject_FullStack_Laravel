<x-layout title="Tutti gli articoli">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-evenly">
                    @foreach ($locations as $location)
                    <div class="col-1">
                        <div id="{{$location->id}}" class="card">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <p><i class="fa-solid fa-water my-3 fs-5"></i></p>
                                <p class="card-text mb-3 fs-5">{{$location->name}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @foreach ($guest_houses as $house)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($house->img)}}" class="card-img-top" alt="..."> 
                    <div class="card-body">
                        <h5 class="card-title">{{$house->place}}</h5>
                        <p class="card-text">Location: {{$house->location->name}}</p>
                        <a href="{{route('show', ['id'=>$house->id])}}" class="btn btn-primary">Dettaglio</a>
                        @if(Auth::id()==$house->user_id)
                        <a href="{{ route('edit',compact('house')) }}" class="btn btn-warning">Modifica</a>
                        <form method=POST action={{route('delete',compact('house'))}}>
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>  
            @endforeach
            {{$guest_houses->links()}}
        </div>
    </div>
</x-layout>