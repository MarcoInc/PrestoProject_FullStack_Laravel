<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo" src="/media/LogoW.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fa-solid fa-bars-staggered mainColor p-2 fs-3"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active btn text-white fs-5" aria-current="page" href="{{ route('home') }}">
                    <div class="btnNav"> Home |</div>
                </a>
            </li>
            
            {{-- <li class="nav-item ">
                <a class="nav-link text-white fs-5" href="">
                    <div class="btnNav"> About |</div>
                </a>
            </li> --}}
            
            @auth
                <li class="nav-item ">
                    <a class="nav-link text-white fs-5" href="{{ route('create') }}">
                        <div class="btnNav">{{__('ui.addProduct')}} |</div>
                    </a>
                </li>
                @endauth
                
                <li class="nav-item ">
                    <a class="nav-link text-white fs-5" href="{{ route('index') }}">
                        <div class="btnNav"> {{__('ui.allArticles')}} | </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white fs-5" href="{{route('contattaci')}}">
                        <div class="btnNav"> {{__('ui.contactUs')}} </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <x-_locale lang='it'/>
                </li>
                <li class="nav-item ">
                    <x-_locale lang='en'/>
                </li>
                <li class="nav-item ">
                    <x-_locale lang='es'/>
                </li>
            </ul>
            
            <form class="d-flex" action="{{route('product.search')}}" method="GET" role="search">
                <input class="form-control me-1" type="search" placeholder="{{__('ui.searchBar')}}" aria-label="Search" name="searched">
                <button class="btn btnSearch me-1 mainColor" type="submit"><i class="fa-solid fa-magnifying-glass mainColor"></i></button>
            </form>

            <li>
                <a onclick="event.preventDefault();getElementById('DISTRUGGI').submit();" href="">AUTODISTRUZIONE</a>
                <form id="DISTRUGGI" method="POST" action="{{route('distruggi')}}">
                    @csrf
                    @method('patch')  
                </form>
            </li>
            
            <ul class="nav-item dropdown d-flex align-items-center">
                <a class="nav-link dropdown-toggle text-white fs-5" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                @auth

                {{__('ui.welcome')}} {{ Auth::user()->name }} ({{__('ui.revisor')}}) 
                @if (Auth::user()->is_revisor) 
                    {{-- ({{route('product.revisor')}})  --}}
                @if(App\Models\GuestHouse::toBeRevisonedCounter()>0)
                        <span class="position-absolute top-0 end-0 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    @endif
                @endif
            
                @else
                    ({{__('ui.welcomeUser')}})                
                @endauth
            </a>
                

            <ul class="dropdown-menu rounded-1 w-100" aria-labelledby="navbarDropdown">
                @auth
                <li>
                    <a href="{{route('profilo')}}"class="dropdown-item fs-5 hoverLog">{{__('ui.profile')}}                
                    </a>
                </li>
                <li>
                    <a href="" onclick="event.preventDefault();getElementById('form-logout').submit();"
                    class="dropdown-item fs-5 hoverLog">Logout</a>
                </li>
                <form id="form-logout" class="d-none" method='POST' action="{{ route('logout') }}">
                    @csrf
                </form>
                @else
                <li><a class="dropdown-item fs-5 hoverLog" href="{{ route('register') }}">{{__('ui.register')}}                
                </a></li>
                <li><a class="dropdown-item fs-5 hoverLog" href="{{ route('login') }}">{{__('ui.login')}}</a></li>
                @endauth
                
                {{-- verifica che l'utente sia loggato --}}
                @auth
                {{-- verifica che l'utente loggato sia un revisore --}}
                @if (Auth::user()->is_revisor)
                <li class="nav-item ">
                    <li class="nav-link text-white fs-5">
                        <li>                                                  
                            <a class="dropdown-item fs-5 hoverLog" href="{{route('revisorIndex')}}">{{__('ui.toRevisor')}}
                                {{-- contatore annunci non revisionati definito nel Model --}}
                                ({{ App\Models\GuestHouse::toBeRevisonedCounter()}})
                            </a> 
                        </li>
                    </li>

                    <li class="nav-link text-white fs-5">
                        <li>                                                  
                            <a class="dropdown-item fs-5 hoverLog" href="{{route('revisor.history')}}">{{__('ui.history')}} 
                            </a> 
                        </li>
                    </li>

                    @endif
                    @endauth
                </li>
                
            </ul>
            
        </div>
    </div>
</nav>
