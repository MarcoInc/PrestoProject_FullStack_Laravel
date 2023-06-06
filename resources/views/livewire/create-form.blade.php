<form wire:submit.prevent="" enctype="multipart/form-data">
    @if(session('message'))
      <div>
        <p class="alert alert-warning">{{session('message')}}</p> 
      </div>
    @endif
    <div class="mb-3">
      <label for="place" class="form-label">Luogo</label>
      <input wire:model.debounced:300ms="place" type="text" class="form-control" id="place">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input wire:model.debounced:300ms="description" type="text" class="form-control" id="description">
      </div>

    <div class="mb-3">
      <label for="price" class="form-label">Prezzo per notte</label>
      <input wire:model.lazy="price" type="number" step="0.01" class="form-control" id="price">
    </div>

    <div class="mb-3">
        <label for="beds" class="form-label">Posti letto</label>
        <input wire:model.lazy="beds" type="number" step="1" class="form-control" id="beds">
      </div>

    {{-- TODO da aggiungere dopo --}}

    {{-- <div class="mb-3">
      <label for="img" class="form-label">Immagine</label>
      <input wire:model="img" type="file" class="form-control" id="img">
    </div> --}}

    {{-- <div class="mb-3">
      <p>Scegli un colore!</p>
      @foreach ($colors as $color)
      <div class="form-check">
        
        <input class="form-check-input" type="checkbox" wire:model="color_id" id="{{$color->id}}" value="{{$color->id}}">
        <label class="form-check-label" for="{{$color->id}}">
          {{$color->color}}
        </label>
      </div>
      @endforeach
      
      <div class="mb-3">
        <p>Seleziona Genere</p>
        
        @foreach ($genres as $genre)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" wire:model="genre_id" id="{{$genre->id}}" value="{{$genre->id}}">
          <label class="form-check-label" for="{{$genre->id}}">
            {{$genre->genre}}
          </label>
        </div>
        @endforeach  --}}
  
        
        
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Invia</button>
  </form>