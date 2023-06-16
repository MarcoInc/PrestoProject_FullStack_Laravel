        <div class="rowScrollX bg-white d-block d-md-flex justify-content-md-around">
            @foreach ($locations as $location)
            <div class=" colScrollX">
                <a class="text-decoration-none" href="{{route('categoryShow', compact('location'))}}">
                    <div class="borderCategory card "
                        onmouseover="changeBorderColor(this)" onmouseout="resetBorderColor(this)" id="{{$location->id}}" >
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class=""><i class="fa-solid  {{$icons[$loop->index]}} fs-3"></i></div>
                            <p class="card-text fs-5">
                                @if(App::getLocale()=='it')
                                    @if($location->name=='Mare')
                                        Mare
                                    @elseif($location->name=='Montagna')
                                        Montagna
                                    @elseif($location->name=='Lago')
                                        Lago
                                    @elseif($location->name=='Deserto')
                                        Deserto
                                    @elseif($location->name=='Campagna')
                                        Campagna
                                    @elseif($location->name=='Citta')
                                        Città
                                    @elseif($location->name=='Neve')
                                        Neve
                                    @endif
                                @elseif(App::getLocale()=='en')
                                    @if($location->name=='Mare')
                                        Beach
                                    @elseif($location->name=='Montagna')
                                        Mountain
                                    @elseif($location->name=='Lago')
                                        Lake
                                    @elseif($location->name=='Deserto')
                                        Desert
                                    @elseif($location->name=='Campagna')
                                        Countryside
                                    @elseif($location->name=='Citta')
                                        City
                                    @elseif($location->name=='Neve')
                                        Snow
                                    @endif
                                @elseif(App::getLocale()=='es')
                                    @if($location->name=='Mare')
                                        Mar
                                    @elseif($location->name=='Montagna')
                                        Montaña
                                    @elseif($location->name=='Lago')
                                        Lago
                                    @elseif($location->name=='Deserto')
                                        Desierto
                                    @elseif($location->name=='Campagna')
                                        Campo
                                    @elseif($location->name=='Citta')
                                        Ciudad
                                    @elseif($location->name=='Neve')
                                    Nieve
                                    @endif
                                @endif
                        
            
                                
                                {{-- {{$location->name}}</p> --}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
