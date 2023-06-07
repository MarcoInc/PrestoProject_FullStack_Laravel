<x-layout title="Tutti gli articoli">
    <h1>Tutti i prodotti</h1>
    <div class="container">
        <div class="row">
            @foreach ($guest_houses as $house)

            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($house->img)}}" class="card-img-top" alt="..."> 
                    <div class="card-body">
                        <h5 class="card-title">{{$house->place}}</h5>
                        <p class="card-text">Location: {{$house->location->name}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
</x-layout>