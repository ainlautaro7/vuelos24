<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 ms-5">{{ $section }}</span>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle me-5"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <strong class="me-2">{{ auth()->user()->usuario }}</strong>
                {{-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle"> --}}
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('usuario.cerrarSesion') }}">Cerrar Sesion</a></li>
            </ul>
        </div>

    </div>
</nav>
