<x-layout title="Categorie">
    <div class="container">

        

        <div class="row">
            <div class="col-12">
                <h2>Esplora la categoria: {{$location->name}}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($location->guest_houses as $house)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{Storage::url($house->img)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$house->place}}</h5>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>Non sono presenti annunci per questa categoria</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>