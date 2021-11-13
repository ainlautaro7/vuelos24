<nav class="navbar navbar-expand-lg navbar navbar-light shadow-sm bg-light py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Vuelos24</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
                </li>
            </ul>
            @if (auth()->check())
                <span class="navbar-text">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->nombre }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('usuario.cerrarSesion') }}">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </span>
            @else
                <span class="navbar-text">
                    <a href="{{ url('/login') }}">Iniciar Sesion</a>
                </span>
            @endif
        </div>
    </div>
</nav>
