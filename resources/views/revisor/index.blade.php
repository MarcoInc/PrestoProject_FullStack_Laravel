<x-layout title="Pagina revisore">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $house_toCheck ? 'Annunci da revisionare' : 'Nessun annucio da revisionare' }}</h1>
                        @if($house_toCheck)
                            <h2>{{ $house_toCheck->place }}</h2>
                            <h3>Posti letto : {{ $house_toCheck->beds }}</h3>
                            <h2>Prezzo a notte : {{ $house_toCheck->price }}</h2>
                            <h2>Creato il: {{ $house_toCheck->created_at }} da {{ $house_toCheck->user->name}} ({{$house_toCheck->user->email}})</h2>
                            <h2>Descrizione: {{ $house_toCheck->description }}</h2>

                            <img src="{{ Storage::url($house_toCheck->img) }}" alt="{{ $house_toCheck->name }}">

                            @if ($house_toCheck)
                                <form method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house_toCheck] )}}>
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-info" type='submit'>Accetta annuncio</button>
                                </form>

                                <form method=POST action={{ route('revisor.reject', ['house_toCheck'=>$house_toCheck]) }}>
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-danger" type='submit'>Rifiuta annuncio</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        function changeBorderColor(element) {
            element.classList.add('hovered');
        }

        function resetBorderColor(element) {
            element.classList.remove('hovered');
        }

        document.addEventListener("DOMContentLoaded", function() {
            let cards = document.querySelectorAll(".cardBg");

            cards.forEach(function(card) {
                let imgUrl = card.dataset.image;
                card.style.backgroundImage = "url('" + imgUrl + "')";
            });
        });
    </script>
</x-layout>
