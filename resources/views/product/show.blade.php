<x-layout title="{{$house->place}} - {{$house->location->name}}">
    <div class="container">
        @livewire('category-bar', compact('locations'))
        <div class="row justify-content-around align-items-center my-5">
            <div class="col-5">
                <h2 class="borderCardHome pb-0">{{$house->place}}</h2>
                <p><strong>{{route('ui.bedsPlace')}}:</strong> {{$house->beds}}</p>
                <p><strong>{{route('ui.price')}}:</strong> {{$house->price}}/notte</p>
                <p><strong>{{route('ui.description')}}:</strong> {{$house->description}}</p>
                <p><strong>{{route('ui.publishBy')}}:</strong> 
                    <a href="{{ route('userProfile', ['id' => $house->user->id]) }}"
                    class="btn btn-info">
                    </i>{{ $house->user->name }}</a>
                </p>


                
                
                <!--AGGIUNGI DESCRIZIONE-->
            
                @if(Auth::id()==$house->user_id)
                        <a href="{{ route('edit',compact('house')) }}" class="btn btn-warning">{{route('ui.editArticle')}}</a>
                        <form method=POST action={{route('delete',compact('house'))}}>
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger">{{route('ui.deleteArticle')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-5">
                <img class="img-fluid" src="{{Storage::url($house->img)}}" alt="{{$house->name}}">
            </div>
        </div>
    </div>
</x-layout>