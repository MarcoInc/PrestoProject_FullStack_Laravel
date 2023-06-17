<x-layout title="{{__('ui.editProfile')}}">
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                @livewire('edit-profile', compact('user'))
            </div>
        </div>
    </div>
    
</x-layout>