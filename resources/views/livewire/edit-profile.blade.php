<form wire:submit.prevent="profileUpdate" enctype="multipart/form-data">
    @if(session('message'))
    <div>
        <p class="alert alert-warning">{{session('message')}}</p> 
    </div>
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome e Cognome</label>
        <input class="form-control" wire:model="name" type="text"  id="name">
      
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Anni</label>
        <input class="form-control" wire:model="age" type="number"  id="age">
    </div>
 

    <div class="mb-3">
        <label for="language" class="form-label">Lingue parlate</label>
        <input class="form-control" wire:model="language" type="text"  id="language">
    </div>

    <div class="mb-3">
        <label for="work" class="form-label">Attività lavorativa</label>
        <input class="form-control" wire:model="work" type="text"  id="work">
    </div>

    <div class="mb-3">
        <label for="contact" class="form-label">Contatti</label>
        <textarea class="form-control" wire:model="contact" type="text"  id="contact"></textarea>

    </div>
    <div class="mb-3">
        <label for="from" class="form-label">Residenza</label>
        <input class="form-control" wire:model="from" type="text"  id="from">

    </div>
    <div class="mb-3">
        <label for="info" class="form-label">Descrizione</label>
        <textarea class="form-control" wire:model="info" type="text"  id="info"></textarea>

    </div>



    <div class="mb-3">
        <label for="img">{{__('ui.uploadImg')}}</label>
        <input id="img" wire:model='img' type="file" name='img' class="form-control shadow">
        
    </div>

    {{-- @if(!empty($images))
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
    @endif --}} 
    

    
    
    
    
    

    
 
    
    <button type="submit" class="btn btn-primary">{{__('ui.editArticle')}}</button>
</form>