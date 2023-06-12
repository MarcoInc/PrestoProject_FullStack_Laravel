<form wire:submit.prevent="send">
     @if (session('sendEmail'))
        <div>
            <p class="alert alert-warning">{{ session('sendEmail') }}</p>
        </div>
    @endif
    <div class="mb-3">
        <label for="email" class="form-label">Tua email</label>
        <input class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email" type="email"
            id="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="user" class="form-label">Tuo nome</label>
        <input class="form-control @error('user') is-invalid @enderror" wire:model.lazy="user" type="text"
            id="user">
        @error('user')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Messaggio</label>
        <textarea class="form-control @error('body') is-invalid @enderror" wire:model.debounce.500ms="body" id="description"
            cols="30" rows="10"></textarea>
        @error('body')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Invia messaggio</button>
</form>
