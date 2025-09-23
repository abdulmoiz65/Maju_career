<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAJU Career Portal – Verify Email</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/auth_style.css') }}">
</head>
<body>

<div class="signup-container">
  <!-- Left Panel -->
  <div class="promo">
    <img src="{{ asset('images/logofavwhite.png') }}" alt="Opportunities">
    <h2>Secure Your Account at MAJU</h2>
    <p>Please verify your email address to continue applying for jobs and exploring opportunities.</p>
  </div>

  <!-- Right Panel -->
  <div class="signup-form">
    <h3>Email Verification Required</h3>
    <p>We’ve sent a verification link to your email. Please check your inbox and click the link to activate your account.</p>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn btn-primary-gradient w-100 mb-3">
        Resend Verification Email
      </button>
    </form>

    <div class="login-link">
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
