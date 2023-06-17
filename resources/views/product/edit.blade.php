<x-layout title="{{__('ui.editArticleTitle')}}">

<div class="container-fluid bg-light">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <h2 class="pt-4 text-center me-1">{{__('ui.editArticleTitle')}}<i class="mainColor fs-5 fa-solid fa-bolt"></i></h2>
        </div>
        <div class="col-12 col-md-8 rounded-1 formCustom my-3 p-4">
            @livewire('edit-form', compact('house','locations'))
        </div>
    </div>
</div>

</x-layout>