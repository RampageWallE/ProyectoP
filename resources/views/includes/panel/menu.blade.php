  <!-- Navigation -->
  @if (auth()->user()->role == 'admin')
  <h6 class="navbar-heading text-muted">Gestion administrador</h6>
  
  @elseif(auth()->user()->role == 'empleado')
  <h6 class="navbar-heading text-muted">Gestion empleado</h6>
  @elseif(auth()->user()->role == 'cliente')
  <h6 class="navbar-heading text-muted">Gestion cliente</h6>
  @endif
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="{{route('home')}}">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>  
  </ul>      
  {{-- ADMINS OPTIONS --}}
  @if (auth()->user()->role == 'admin')  
  <ul class="navbar-nav">
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
    <li class="nav-item">
      <a class="nav-link " href="{{route('reservas.view')}}">
        <i class="fas fa-stethoscope text-info"></i> Revisar reservas 
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('rrespuestas.view')}}">
        <i class="fas fa-bed text-warning"></i> Responder consultas 
      </a>
    </li>      
    {{-- CLIENTES GAAAAAAAAA --}}
  </ul>
  {{-- <h6 class="navbar-heading text-muted">CLIENTES VISTAS</h6>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link " href="{{route('reservas.view')}}">
        <i class="fas fa-bed text-warning"></i> Reservas clientes
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link " href="{{route('consultas.view')}}">
        <i class="fas fa-bed text-warning"></i> Consultas clientes 
      </a>
    </li>    --}}

  </ul>  
    {{-- END CLIENTES  --}}
    
    @endif
  @if (auth()->user()->role == 'empleado')
  <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link " href="{{route('restaurantes.view')}}">
        <i class="ni ni-briefcase-24 text-blue"></i> Restaurantes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('clientes.view')}}">
        <i class="fas fa-bed text-warning"></i> Clientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('reservas.view')}}">
        <i class="fas fa-stethoscope text-info"></i> Reservas v empleado
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('rrespuestas.view')}}">
        <i class="fas fa-bed text-warning"></i> Consultas 
      </a>
    </li> 
  </ul>   
  @endif
  @if (auth()->user()->role == 'cliente')
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link " href="{{route('reservas.view')}}">
        <i class="fas fa-bed text-warning"></i> Reservas clientes
      </a>
    </li>   
    <li class="nav-item">
      <a class="nav-link " href="{{route('consultas.view')}}">
        <i class="fas fa-bed text-warning"></i> Consultas clientes 
      </a>
    </li>   
    {{-- <li class="nav-item">
      <a class="nav-link " href="{{route('clientes.view')}}">
        <i class="fas fa-bed text-warning"></i> Restaurantes clientes  
      </a>
    </li>    --}}              
  </ul>
  @endif

  <!-- Divider -->
  <hr class="my-2">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Opciones</h6>
  {{-- OPTIONS FOR ALL USERS --}}

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


    <!-- Navigation -->

