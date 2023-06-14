<x-layout title="{{$house->place}} - {{$house->location->name}}">
    <div class="container">
        @livewire('category-bar', compact('locations'))
        <div class="row justify-content-around align-items-center my-5">
            <div class="col-5">
                <h2 class="borderCardHome pb-0">{{$house->place}}</h2>
                <p><strong>{{__('ui.bedsPlace')}}:</strong> {{$house->beds}}</p>
                <p><strong>{{__('ui.price')}}:</strong> {{$house->price}}/notte</p>
                <p><strong>{{__('ui.description')}}:</strong> {{$house->description}}</p>
                <p><strong>{{__('ui.publishBy')}}:</strong> 
                    <a href="{{ route('userProfile', ['id' => $house->user->id]) }}"
                        class="btn btn-info">
                    </i>{{ $house->user->name }}</a>
                </p>
                
                
                
                
                <!--AGGIUNGI DESCRIZIONE-->
                
                @if(Auth::id()==$house->user_id)
                <a href="{{ route('edit',compact('house')) }}" class="btn btn-warning">{{__('ui.editArticle')}}</a>
                <form method=POST action={{route('delete',compact('house'))}}>
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">{{__('ui.deleteArticle')}}</button>
                </form>
                @endif
            </div>
            <div class="col-5">
                
                
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($house->images as $image)
                   
                        <div class="carousel-item @if($loop->first)active @endif" data-bs-interval="2000">
                            <img src="{{Storage::url($image->path)}}" class="img-fluid imgCustom" alt="Immagini">
                        </div>
                            
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
                
                
                
                {{-- <img class="img-fluid" src="{{Storage::url($house->images()->first()->path)}}" alt="{{$house->name}}"> --}}
            </div>
        </div>
    </div>
</x-layout>