<x-layout title="{{$house->place}} - {{$house->location->name}}">

<div class="container">
    @livewire('category-bar', compact('locations'))
    <div class="row justify-content-around align-items-center my-5">
        <div class="col-5">
            <h2 class="borderCardHome pb-0">{{$house->place}}</h2>
            <p><strong>Posti letto:</strong> {{$house->beds}}</p>
            <p><strong>Prezzos:</strong> {{$house->price}}/notte</p>
            <p><strong>Descrizione:</strong> {{$house->description}}</p>
            
            <!--AGGIUNGI DESCRIZIONE-->
        
            @if(Auth::id()==$house->user_id)
                    <a href="{{ route('edit',compact('house')) }}" class="btn btn-warning">Modifica</a>
                    <form method=POST action={{route('delete',compact('house'))}}>
                        @csrf
                        @method('delete')
                    <button class="btn btn-danger">Elimina</button>
                </form>
            @endif
        </div>
        <div class="col-5">
            <img class="img-fluid" src="{{Storage::url($house->img)}}" alt="{{$house->name}}">
        </div>
    </div>
</div>

</x-layout>