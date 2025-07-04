@extends('layouts.app')

@section('title', 'Login HR')

@section('content')
<style>
  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(-45deg, #9bbbeb, #ebf3ba, #a4c1fb, #e9fbad);
    background-size: 400% 400%;
    animation: gradientShift 12s ease infinite;
    z-index: -1;
    opacity: 0.3;
  }

  @keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .login-box {
    max-width: 460px;
    margin: 100px auto;
    padding: 45px 35px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
    position: relative;
  }

  .login-title {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    color: #0d6efd;
    margin-bottom: 30px;
  }

  .form-label {
    font-weight: 600;
  }

  .btn-primary {
    border-radius: 30px;
    font-weight: 600;
    padding: 10px 0;
  }

  .form-control {
    border-radius: 10px;
    padding: 10px 15px;
  }

  .alert {
    font-size: 0.95rem;
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

  body.dark-mode .login-title {
    color: #90cdf4;
  }
</style>

<div class="container">
  <div class="login-box">
    <div class="login-title">
      <i class="bi bi-shield-lock-fill me-2"></i>Login HR
    </div>

    @if ($errors->any())
      <div class="alert alert-danger text-center">
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
