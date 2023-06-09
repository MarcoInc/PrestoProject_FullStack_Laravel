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
                            <img src="{{ Storage::url($house_toCheck->img) }}" alt="{{ $house_toCheck->name }}">

                            @if (Auth::id() == $house_toCheck->user_id)
                                <form method=POST action={{ route('revisor.accept', compact('house_toCheck')) }}>
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-info">Accetta annuncio</button>
                                </form>

                                <form method=POST action={{ route('revisor.reject', compact('house_toCheck')) }}>
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-danger">Rifiuta annuncio</button>
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
