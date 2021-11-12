<div class="Sidebar d-flex flex-column flex-shrink-0 pt-0 p-3 text-white bg-dark" style="width: 15%;">
    <a href="/" class="mx-auto text-center align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <h1 class="fs-4">Vuelos 24</h1>
      <h2 class="fs-5">Sistema de Gestion</h2>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ url('/gestion') }}" class="nav-link text-white inicio" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Inicio
        </a>
      </li>
      <li>
        <a href="{{ url('/gestion/reportes') }}" class="nav-link text-white reportes">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Reportes
        </a>
      </li>
      <li>
        <a href="{{ url('/gestion/administrarVuelos') }}" class="nav-link text-white administrarVuelos">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Administrar Vuelos
        </a>
      </li>
      <li>
        <a href="{{ url('/gestion/administrarEmpleados') }}" class="nav-link text-white administrarEmpleados">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Administrar Empleados
        </a>
      </li>
    </ul>
  </div>