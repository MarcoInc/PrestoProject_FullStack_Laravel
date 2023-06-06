<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create')}}">Aggiungi prodotto</a>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            Benvenuto {{ Auth::user()->name }}
                        @else
                            Benvenuto utente
                        @endauth

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <form method='POST' action="{{ route('logout') }}">
                                @csrf
                                <li>
                                    <button class="dropdown-item">Logout</button>
                                </li>
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endauth



                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
