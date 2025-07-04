<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Travel Explore</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/theme-default.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/boxicons.css') }}" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .hover-shadow {
      transition: 0.3s ease-in-out;
    }
    .hover-shadow:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    /* Sticky footer fix */
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1;
    }

    footer {
      background-color: #0d6efd;
      color: white;
    }

    footer a {
      color: #fff;
      text-decoration: underline;
    }

    footer a:hover {
      color: #dce7ff;
    }

    /* Dark mode */
    body.dark-mode {
      background-color: #121212 !important;
      color: #f5f5f5 !important;
    }

    body.dark-mode .navbar {
      background-color: #1c1c1c !important;
    }

    body.dark-mode .navbar .nav-link {
      color: #f5f5f5 !important;
    }

    body.dark-mode .navbar .nav-link:hover {
      color: #cfcfcf !important;
    }

    body.dark-mode footer {
      background-color: #1a1a1a !important;
      color: #e0e0e0;
    }
  </style>
</head>
<body class="bg-light">

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm w-100">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/">
        <i class="bi bi-box-seam"></i> Travel Explore
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav gap-2 align-items-center">
          <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/hr"><i class="bi bi-people-fill me-1"></i>HR</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/karyawan"><i class="bi bi-person-badge me-1"></i>Karyawan</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/cuti"><i class="bi bi-calendar-check me-1"></i>Cuti</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/penggajian"><i class="bi bi-cash-stack me-1"></i>Penggajian</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/jadwalkerja"><i class="bi bi-clock-history me-1"></i>Jadwal Kerja</a></li>
          <li class="nav-item">
            <button class="btn btn-sm btn-outline-light ms-3" onclick="toggleDarkMode()" title="Toggle Dark Mode">
              <i class="bi bi-moon-fill"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <main class="container py-4">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="text-white text-center py-3">
    <div class="container">
      <strong><i class="bi bi-box-seam me-1"></i> Travel Explore</strong><br>
      <small>Sistem Manajemen SDM dan Operasional |
        <a href="mailto:admin@travel.com" class="text-white text-decoration-underline">admin@travel.com</a>
      </small>
    </div>
  </footer>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
      const isDark = document.body.classList.contains('dark-mode');
      localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
    }

    window.addEventListener('DOMContentLoaded', () => {
      if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
      }
    });
  </script>
</body>
</html>
