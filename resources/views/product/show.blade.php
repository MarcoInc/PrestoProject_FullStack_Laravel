<x-layout title="{{$house->place}} - {{$house->location->name}}">

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>{{$house->place}}</h2>
            <h2>{{$house->name}}</h2>
            <h2>{{$house->beds}}</h2>
            <h2>{{$house->price}}</h2>
            <img src="{{Storage::url($house->img)}}" alt="{{$house->name}}">
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

</x-layout>