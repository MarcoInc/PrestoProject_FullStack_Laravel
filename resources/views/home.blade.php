<x-layout title='Homepage'>
  
  <!-- carosel -->
  <x-carousel></x-carousel>
  
  <div class="container-fluid">
    <div class="row vh-50 justify-content-around">
      @foreach ($guest_houses as $house)
      <div class="col-3">
        <div class="card">
          <img src="https://picsum.photos/200" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$house->place}}</h5>
            <p class="card-text">{{$house->description}}</p>
            <div class="d-flex">
              <p>Luogo:</p>
              <p class="card-text">&nbsp;{{$house->location->name}}</p>
            </div>
            <a href="#" class="btn btn-info">Detail</a>
            <p class="card-footer">Pubblicato il: {{$house->created_at->format('d/m/Y')}}</p>
            <p class="card-footer">Pubblicato da: {{$house->user->name}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  
  
  
</x-layout>