{{-- language flag --}}
    {{-- un form post-> deve inviare dei dati e modificarli--}}
                        {{-- alla funzione setLanguage passo come parametro $lang --}}

<form class='d-inline' action="{{route('setLanguage',$lang)}}" method='POST'>
    @csrf
    <button type='submit' class='btn'>
                {{-- ricostruisco il percorso dell'icona .svg per singola lingua scelta --}}
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width='32' height='32'>
    </button>
</form>
