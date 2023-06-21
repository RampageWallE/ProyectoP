        <!-- Navigation -->
        <h6 class="navbar-heading text-muted">Gestion</h6>
        <ul class="navbar-nav">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="./index.html">
                <i class="ni ni-tv-2 text-danger"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('restaurantes.view')}}">
                <i class="ni ni-briefcase-24 text-blue"></i> Restaurantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('empleados.view')}}">
                <i class="fas fa-stethoscope text-info"></i> Empleados
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('clientes.view')}}">
                <i class="fas fa-bed text-warning"></i> Clientes
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link " href="./examples/tables.html">
                <i class="ni ni-bullet-list-67 text-red"></i> Tables
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="./examples/login.html">
                <i class="ni ni-key-25 text-info"></i> Login
              </a>
            </li> --}}
          </ul>
          <!-- Divider -->
          <hr class="my-2">
          <!-- Heading -->
          <h6 class="navbar-heading text-muted">Opciones</h6>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}"
                onclick="event.preventDefault(); document.getElementById('formLogout').submit();"  
              >
                <i class="fas fa-sign-in-alt"></i> Cerrar sesion
              </a>
                <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
                    @csrf            
                </form>
            </li>
          </ul>
          <h6 class="navbar-heading text-muted">Documentation</h6>
          <!-- Navigation -->

          <ul class="navbar-nav mb-md-3">            
            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="ni ni-books text-default"></i> Getting started
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="ni ni-chart-bar-32 text-warning"></i> Foundation
              </a>
            </li>
          </ul>
