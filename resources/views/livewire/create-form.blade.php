<form wire:submit.prevent="store" enctype="multipart/form-data">
  @if(session('message'))
  <div>
    <p class="alert alert-warning">{{session('message')}}</p> 
  </div>
  @endif
  <div class="mb-3">
    <label for="place" class="form-label">{{__('ui.place')}}</label>
    <input class="form-control @error('place') is-invalid @enderror" placeholder="{{__('ui.whereIsIt')}}" wire:model.lazy="place" type="text"  id="place">
    @error('place')
    <p>{{$message}}</p>
    @enderror 
  </div>
  
  <div class="mb-3">
    <label for="description" class="form-label">{{__('ui.description')}}</label>
    <textarea placeholder="{{__('ui.smallDescription')}}" class="form-control @error('description') is-invalid @enderror" wire:model.debounce.500ms="description" id="description" cols="30" rows="10"></textarea>
    @error('description')
    <p>{{$message}}</p>
    @enderror 
  </div>
  
  {{-- <div class="mb-3">
    <label for="img" class="form-label">{{__('ui.addImage')}}</label>
    <input class="form-control @error('img') is-invalid @enderror" wire:model.lazy="img" type="file" id="img">
    @error('img')
    <p>{{$message}}</p>
    @enderror 
  </div> --}}

  <div class="mb-3">
    <label for="images">Carica Immmagine</label>
    <input id="images" wire:model='temporary_images' type="file" name='images' multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="IMMAGINI">
    @error('temporary_images.*')
    <p class="text-danger mt-2">{{$message}}</p>
    @enderror
  </div>
  @if(!empty($images))
    <div class="row justify-content-center">
      <div class="col-8">
        <p>Preview:</p>
        <div class="row border border-4 border-info py-4">
          @foreach ($images as $key => $image)
              <div class="col my-3">
                 <div class="img-preview mx-auto rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                 <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto " wire:click="removeImage({{$key}})">Cancella</button>
              </div>
          @endforeach
          
        </div>
      </div>
    </div>
  @endif
  
  <div class="mb-3">
    <label for="price" class="form-label">{{__('ui.priceNight')}}</label>
    <input placeholder="&euro;"  type="number" step="0.01" class="form-control @error('price') is-invalid  @enderror" wire:model.lazy="price" id="price">
    @error('price')
    <p>{{$message}}</p>
    @enderror 
  </div>
  
  <div class="mb-3">
    <label class="form-check-label" for="location_id">{{__('ui.location')}}</label>
    <select wire:model="location_id" id="location_id" class="form-control @error('location_id') is-invalid  @enderror">
      <option value="">{{__('ui.locationChoice')}}</option>
      @foreach ($locations as $location)
      <option value="{{$location->id}}">{{$location->name}}</option>
      @endforeach
    </select>
    @error('location_id')
    <p>{{$message}}</p>
    @enderror 
  </div>
  
  <div class="mb-3">
    <label for="beds" class="form-label">{{__('ui.bedsPlace')}}</label>
    <input placeholder="{{__('ui.howManyPeople')}}" wire:model.lazy="beds" type="number" step="1" class="form-control @error('beds') is-invalid  @enderror" id="beds">
    @error('beds')
    <p>{{$message}}</p>
    @enderror 
  </div>
  
  <button type="submit" class="btn btn-primary">{{__('ui.createArticle')}}</button>
</form>