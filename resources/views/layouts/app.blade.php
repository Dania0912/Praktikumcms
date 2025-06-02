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

  <!-- Custom / Demo CSS -->
  <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/theme-default.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/boxicons.css') }}" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Dark mode styles */
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
    body.dark-mode .container {
      background-color: #1e1e1e;
    }
  </style>
</head>
<body class="bg-light">
  @include('partials.navbar')

  <main class="container py-4">
    @yield('content')
  </main>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
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
