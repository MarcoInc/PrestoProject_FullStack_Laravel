<form wire:submit.prevent="houseUpdate" enctype="multipart/form-data">
    @if(session('message'))
      <div>
        <p class="alert alert-warning">{{session('message')}}</p> 
      </div>
    @endif
    <div class="mb-3">
      <label for="place" class="form-label">Luogo</label>
      <input class="form-control @error('place') is-invalid @enderror" placeholder="Dove si trova?" wire:model.lazy="place" type="text"  id="place">
      @error('place')
        <p>{{$message}}</p>
      @enderror 
    </div>
    
    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea placeholder="Breve descrizione dell'abitazione.." class="form-control @error('description') is-invalid @enderror" wire:model.debounce.500ms="description" id="description" cols="30" rows="10"></textarea>
      @error('description')
        <p>{{$message}}</p>
      @enderror 
    </div>
    
    <div class="mb-3">
      <label for="price" class="form-label">Prezzo per notte</label>
      <input placeholder="&euro;"  type="number" step="0.01" class="form-control @error('price') is-invalid  @enderror" wire:model.lazy="price" id="price">
      @error('price')
        <p>{{$message}}</p>
      @enderror 
    </div>
    
    
    
    <div class="mb-3">
      <label class="form-check-label" for="location_id">Località</label>
      <select wire:model="location_id" id="location_id" class="form-control @error('location_id') is-invalid  @enderror">
        @foreach ($locations as $location)
        <option value="{{$location->id}}">{{$location->name}}</option>
        @endforeach
      </select>
      @error('location_id')
      <p>{{$message}}</p>
      @enderror 
    </div>
    
    
    
    
    <div class="mb-3">
      <label for="beds" class="form-label">Posti letto</label>
      <input placeholder="Quante persone può ospitare?" wire:model.lazy="beds" type="number" step="1" class="form-control @error('beds') is-invalid  @enderror" id="beds">
      @error('beds')
      <p>{{$message}}</p>
      @enderror 
    </div>


    <img src="{{Storage::url($house->img)}}" class="card-img-top" alt="..."> 

    <div class="mb-3">
        <label for="img" class="form-label">Aggiungi immagine</label>
        <input class="form-control @error('img') is-invalid @enderror" wire:model.lazy="img" type="file" id="img">
        @error('img')
          <p>{{$message}}</p>
        @enderror 
      </div>

    <button type="submit" class="btn btn-primary">Crea annuncio</button>
  </form>