<x-layout title="{{route('ui.editArticleTitle')}}">

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            @livewire('edit-form', compact('house','locations'))
        </div>
    </div>
</div>

</x-layout>