<form wire:submit.prevent="profileUpdate" enctype="multipart/form-data">
    @if (session('message'))
        <div>
            <p class="alert alert-warning">{{ session('message') }}</p>
        </div>
    @endif
    <div class="mb-3">
        <label for="name" class="form-label text-white fw-semibold">{{ __('ui.nameAndSurname') }}</label>
        <input class="form-control" wire:model="name" type="text" id="name">

    </div>
    <div class="mb-3">
        <label for="age" class="form-label text-white fw-semibold">{{ __('ui.age') }}</label>
        <input class="form-control" wire:model="age" type="number" step="0.01" id="age">
    </div>


    <div class="mb-3">
        <label for="language" class="form-label text-white fw-semibold">{{ __('ui.language') }}</label>
        <input class="form-control" wire:model="language" type="text" id="language">
    </div>

    <div class="mb-3">
        <label for="work" class="form-label text-white fw-semibold">{{ __('ui.occupation') }}</label>
        <input class="form-control" wire:model="work" type="text" id="work">
    </div>

    <div class="mb-3">
        <label for="contact" class="form-label text-white fw-semibold">{{ __('ui.contactMe') }}</label>
        <textarea class="form-control" wire:model="contact" type="text" id="contact"></textarea>

    </div>
    <div class="mb-3">
        <label for="from" class="form-label text-white fw-semibold">{{ __('ui.residenza') }}</label>
        <input class="form-control" wire:model="from" type="text" id="from">

    </div>
    <div class="mb-3">
        <label for="info" class="form-label text-white fw-semibold">{{ __('ui.aboutMe') }}</label>
        <textarea class="form-control" wire:model="info" type="text" id="info"></textarea>

    </div>



    <div class="mb-3">
        <label for="img" class="text-white fw-semibold">{{ __('ui.uploadImg') }}</label>
        <input id="img" wire:model='img' type="file" name='img' class="form-control d-none">
        <button class="btn border border-0 display-1"
            onclick="event.preventDefault();document.getElementById('img').click()">

            <i class="bi bi-cloud-plus-fill text-white fs-3 "></i>
        </button>
    
        @if($img)
            <p class="text-white fs-6">{{__('ui.imageUploaded')}}<i class="ms-1 fa-solid fa-circle-check"></i></p>
        @endif
    </div>
    



    <div class="w-100 text-center">

        <button type="submit" class="btn btnCustom">{{ __('ui.editArticle') }}</button>
    </div>


 

    
</form>
