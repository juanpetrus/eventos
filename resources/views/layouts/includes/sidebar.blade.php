<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Eventos <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('eventos.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Eventos
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-calendar-plus"></i>
      <span>Eventos</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Ações:</h6>
        <a class="collapse-item" href="{{ route('eventos.create') }}">Novo Evento</a>
        <a class="collapse-item" href="{{ route('eventos.index') }}">Meus Eventos</a>
        <a class="collapse-item" href="{{ route('eventos.convidado') }}">Eventos Convidado</a>
      </div>
    </div>
  </li>

  <div class="sidebar-heading">
    Convites
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('convites.index') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Convites</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->