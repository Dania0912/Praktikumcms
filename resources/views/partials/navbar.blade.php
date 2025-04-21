<nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('dashboard') }}">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="30" height="30">
      <span class="ms-2">Travel Explore</span>
    </a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="bx bx-home-alt me-1"></i> Dashboard
          </a>
        </li>
        <!-- Employees -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('employees.index') }}">
            <i class="bx bx-user me-1"></i> Karyawan
          </a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link nav-link" type="submit">
              <i class="bx bx-log-out me-1"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
