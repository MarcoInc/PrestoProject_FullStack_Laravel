    {{-- {{$house->location->name}} --}}
    @if (App::getLocale() == 'it')

    @if ($house->location->name == 'Mare')
        Mare
    @elseif($house->location->name == 'Montagna')
        Montagna
    @elseif($house->location->name == 'Lago')
        Lago
    @elseif($house->location->name == 'Deserto')
        Deserto
    @elseif($house->location->name == 'Campagna')
        Campagna
    @elseif($house->location->name == 'Citta')
        Città
    @elseif($house->location->name == 'Neve')
        Neve
    @endif
    @elseif(App::getLocale() == 'en')
    @if ($house->location->name == 'Mare')
        Beach
    @elseif($house->location->name == 'Montagna')
        Mountain
    @elseif($house->location->name == 'Lago')
        Lake
    @elseif($house->location->name == 'Deserto')
        Desert
    @elseif($house->location->name == 'Campagna')
        Countryside
    @elseif($house->location->name == 'Citta')
        City
    @elseif($house->location->name == 'Neve')
        Snow
    @endif
    @elseif(App::getLocale() == 'es')
    @if ($house->location->name == 'Mare')
        Mar
    @elseif($house->location->name == 'Montagna')
        Montaña
    @elseif($house->location->name == 'Lago')
        Lago
    @elseif($house->location->name == 'Deserto')
        Desierto
    @elseif($house->location->name == 'Campagna')
        Campo
    @elseif($house->location->name == 'Citta')
        Ciudad
    @elseif($house->location->name == 'Neve')
        Nieve
    @endif
    @endif

