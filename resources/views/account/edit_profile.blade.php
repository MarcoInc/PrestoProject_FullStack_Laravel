<x-layout title="{{__('ui.profileModifie')}}">
    
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 rounded-1 formCustom my-3 p-4">
                @livewire('edit-profile', compact('user'))
            </div>
        </div>
    </div>
    
</x-layout>