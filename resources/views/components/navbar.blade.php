<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo" src="/media/LogoW.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa-solid fa-bars-staggered mainColor p-2 fs-3"></i></span>
        </button>
        <div class="collapse navbar-collapse w-75" id="navbarSupportedContent">


            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active btn text-white fs-5 text-start" aria-current="page"
                        href="{{ route('home') }}">
                        <div class="btnNav"> Home |</div>
                    </a>
                </li>


                @auth
                    <li class="nav-item ">
                        <a class="nav-link text-white fs-5" href="{{ route('create') }}">
                            <div class="btnNav">{{ __('ui.addProduct') }} |</div>
                        </a>
                    </li>
                @endauth

                <li class="nav-item ">
                    <a class="nav-link text-white fs-5" href="{{ route('index') }}">
                        <div class="btnNav"> {{ __('ui.allArticles') }} | </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white fs-5" href="{{ route('contattaci') }}">
                        <div class="btnNav"> {{ __('ui.contactUs') }} | </div>
                    </a>
                </li>





            </ul>
            <form class="d-flex align-items-center " action="{{ route('product.search') }}" method="GET"
                role="search">
                <input class="form-control me-1 w-75" type="search" placeholder="{{ __('ui.searchBar') }}"
                    aria-label="Search" name="searched">
                <button class="btn btnSearch me-md-2 m-0 mainColor" type="submit">
                    <i class="fa-solid fa-magnifying-glass mainColor"></i>
                </button>
            </form>


            {{-- <li>
            <a onclick="event.preventDefault();getElementById('DISTRUGGI').submit();" href="">AUTODISTRUZIONE</a>
            <form id="DISTRUGGI" method="POST" action="{{route('distruggi')}}">
                @csrf
                @method('patch')  
            </form>
            </li> --}}

            <ul class="nav-item  list-unstyled dropdown transition d-flex align-items-center me-2 mb-0">
                <li class="nav-item  dropdown py-3 py-md-0 me-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-earth-americas mainColor text-center align-middle fs-5"></i>
                    </a>
                    <ul class="dropdown-menu  bg-dark border-0">
                        <li class="dropdown-item zIndex  p-0 m-0">
                            <x-_locale lang='it' />
                        </li>
                        <li class="dropdown-item zIndex  p-0 m-0">
                            <x-_locale lang='en' />
                        </li>
                        <li class="dropdown-item zIndex  p-0 m-0">
                            <x-_locale lang='es' />
                        </li>
                    </ul>
                </li>

            </ul>
            <ul class="nav-item list-unstyled dropdown">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle pt-3 text-white fs-5" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth


                            {{ __('ui.welcome') }} {{ Auth::user()->name }}

                            @if (Auth::user()->is_revisor)
                                {{-- ({{ __('ui.revisor') }}) --}}
                                <i class="bi bi-star-fill fs-6"></i>
                                {{-- ({{route('product.revisor')}})  --}}
                                @if (App\Models\GuestHouse::toBeRevisonedCounter() > 0)
                                    <span
                                        class="position-absolute top-0 end-0 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    </span>
                                @endif
                            @endif
                        @else
                            {{ __('ui.welcomeUser') }}

                        @endauth
                    </a>


                    <ul class="dropdown-menu p-1 align-middle rounded-1" aria-labelledby="navbarDropdown">
                        @auth

                            <li>

                                <a
                                    href="{{ route('userProfile', ['id' => Auth::user()]) }}"class="dropdown-item fs-5 mainColor hoverLog">
                                    {{ __('ui.profiloPubblico') }} <i class="bi bi-person-check-fill"></i>

                                </a>
                            </li>

                            <li>
                                <a href="{{ route('wishlist') }}"class="dropdown-item fs-5 mainColor hoverLog">
                                    {{ __('ui.wishlist') }}<i
                                        class="ms-2 fs-6 fa-solid fa-heart fa-flip-horizontal"></i>

                                </a>
                            </li>


                            <li>

                                <a href="{{ route('profilo') }}"class="dropdown-item fs-5 mainColor hoverLog">
                                    {{ __('ui.yourArticles') }}<i
                                        class="ms-2 fs-6 fa-solid fa-list fa-flip-horizontal"></i>

                                </a>
                            </li>



                            <li>
                                <a href="" onclick="event.preventDefault();getElementById('form-logout').submit();"
                                    class="dropdown-item fs-5 hoverLog mainColor">Logout
                                    <i class="bi bi-box-arrow-left"></i>
                                </a>
                            </li>
                            <form id="form-logout" class="d-none mainColor" method='POST' action="{{ route('logout') }}">
                                @csrf
                            </form>
                        @else
                            <li><a class="dropdown-item fs-5 hoverLog mainColor"
                                    href="{{ route('register') }}">{{ __('ui.register') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item fs-5 hoverLog mainColor"
                                    href="{{ route('login') }}">{{ __('ui.login') }}
                                    <i class="bi bi-box-arrow-in-right"></i>
                                </a>

                            </li>
                        @endauth

                        {{-- verifica che l'utente sia loggato --}}
                        @auth
                            {{-- verifica che l'utente loggato sia un revisore --}}
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item ">
                                <li class="nav-link text-white fs-5">
                                <li>
                                    <a class="dropdown-item fs-5 hoverLog mainColor"
                                        href="{{ route('revisorIndex') }}">{{ __('ui.toRevisor') }}
                                        {{-- contatore annunci non revisionati definito nel Model --}}
                                        ({{ App\Models\GuestHouse::toBeRevisonedCounter() }})
                                    </a>
                                </li>
                    </li>

                    <li class="nav-link text-white fs-5">
                    <li>
                        <a class="dropdown-item fs-5 hoverLog mainColor"
                            href="{{ route('revisor.history') }}">{{ __('ui.history') }}
                            <i class="bi bi-book"></i>
                        </a>
                    </li>
                    </li>
                    @endif
                @endauth





            </ul>












        </div>

    </div>
</nav>
