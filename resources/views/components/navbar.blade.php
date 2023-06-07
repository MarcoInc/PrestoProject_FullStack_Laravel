<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img class="logo" src="/media/LogoW.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active text-white fs-5" aria-current="page" href="{{route('home')}}">Home |</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white fs-5" href="">About |</a>
            </li>
            
            
            @auth
            <li class="nav-item ">
                <a class="nav-link text-white fs-5" href="{{route('create')}}">Aggiungi articolo |</a>
            </li>
            @endauth
            <li class="nav-item ">
                <a class="nav-link text-white fs-5" href="{{route('index')}}">Tutti gli articoli |</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white fs-5" href="">Contattaci</a>
            </li>
            
        </ul>
        <li class="nav-item dropdown d-flex align-items-center">
            <a class="nav-link dropdown-toggle text-white fs-5" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            @auth
            Benvenuto {{ Auth::user()->name }}
            @else
            Benvenuto utente
            @endauth 
        </a>
        
        
        
        
        <ul class="dropdown-menu rounded-1 w-100" aria-labelledby="navbarDropdown">
            @auth
            
            
            <li>
                <a href="" onclick="event.preventDefault();getElementById('form-logout').submit();" class="dropdown-item fs-5 hoverLog">Logout</a>
            </li>
            <form id="form-logout" class="d-none" method='POST' action="{{ route('logout') }}">
                @csrf
            </form>
            @else
            <li><a class="dropdown-item fs-5 hoverLog" href="{{ route('register') }}">Registrati</a></li>
            <li><a class="dropdown-item fs-5 hoverLog" href="{{ route('login') }}">Login</a></li>
            @endauth
        </ul>
    </li>
</div>
</div>
</nav>
