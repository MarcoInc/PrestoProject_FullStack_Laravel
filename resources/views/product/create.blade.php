<x-layout title="{{__('ui.createArticleTitle')}}">
    <div class="container-fluid bg-light">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <h2 class="pt-4 text-center me-1">{{__('ui.CaricaAnnuncio')}}<i class="mainColor fs-5 fa-solid fa-bolt"></i></h2>
            </div>
            <div class="col-md-8 col-12 rounded-1 formCustom my-3 p-4">
                @livewire('create-form')
                

            </div>
        </div>
    </div>
</x-layout>