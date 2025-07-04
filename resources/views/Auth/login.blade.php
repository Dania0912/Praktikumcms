@extends('layouts.app')

@section('content')

<style>
  /* Background gradien animasi */
  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(-45deg,rgb(155, 187, 235),rgb(235, 243, 186),rgb(164, 193, 251),rgb(233, 251, 173));
    background-size: 400% 400%;
    animation: gradientShift 12s ease infinite;
    z-index: -1;
    opacity: 0.2;
  }

  @keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .login-box {
    max-width: 420px;
    margin: 80px auto;
    padding: 40px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
  }

  body.dark-mode .login-box {
    background: #1e1e1e;
    color: #f5f5f5;
  }

  body.dark-mode input.form-control {
    background-color: #2c2c2c;
    color: #fff;
    border: 1px solid #444;
  }

  .form-label {
    font-weight: 600;
  }

  .login-title {
    font-size: 1.75rem;
    font-weight: bold;
    margin-bottom: 25px;
    text-align: center;
  }

  .btn-primary {
    border-radius: 30px;
    font-weight: 600;
  }

  .form-control {
    border-radius: 8px;
  }
</style>

<div class="container">
  <div class="login-box">
    <div class="login-title">Login HR</div>

    @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
</div>


      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
        </button>
      </div>
    </form>
  </div>
</div>

@endsection
