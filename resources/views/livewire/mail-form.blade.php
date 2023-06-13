<form wire:submit.prevent="send">
    @if (session('sendEmail'))
    <div>
        <p class="alert alert-warning">{{ session('sendEmail') }}</p>
    </div>
    @endif
    <div class="mb-3">
        <label for="email" class="form-label">{{__('ui.email')}}</label>
        <input class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email" type="email"
        id="email">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="user" class="form-label">{{__('ui.nameAndSurname')}}</label>
        <input class="form-control @error('user') is-invalid @enderror" wire:model.lazy="user" type="text"
        id="user">
        @error('user')
        <p>{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="body" class="form-label">{{__('ui.mailToSend')}}</label>
        <textarea class="form-control @error('body') is-invalid @enderror" wire:model.debounce.500ms="body" id="description"
        cols="30" rows="10"></textarea>
        @error('body')
        <p>{{ $message }}</p>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">{{__('ui.sendMail')}}</button>
</form>
