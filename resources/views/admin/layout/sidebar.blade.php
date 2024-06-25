<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
          <i class="bi bi-person-circle"></i>
      </div>
      <div class="sidebar-brand-text mx-3">DB ADMIN</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dbadmin*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/dbadmin') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Data Fitur
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::is('dbartikels*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dbartikels.index') }}">
          <i class="fas fa-fw fa-file-lines"></i>
          <span>Artikel</span>
      </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item {{ Request::is('dbvideos*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dbvideos.index') }}">
          <i class="fas fa-fw fa-file-video"></i>
          <span>Video</span>
      </a>
  </li>

</ul>