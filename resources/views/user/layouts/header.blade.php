<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAJU Career Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/maju_career_style.css') }}">
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logofavwhite.png') }}" alt="MAJU Logo" class="me-2" style="height: 60px;">
            MAJU Career
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center">

                {{-- When user is **not** logged in --}}
                @guest
                    <a href="{{ route('login.form') }}" class="btn btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </a>
                @endguest

                {{-- When user **is** logged in --}}
                @auth
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button"
                                id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ auth()->user()->username ?? auth()->user()->first_name ?? '' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            {{-- <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li> --}}
                            {{-- <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Find Your Dream Career at MAJU</h1>
            <p>Join Mohammad Ali Jinnah University as Faculty or Staff Member</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <form class="search-form" action="#" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="search" placeholder="Job title, keywords...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="job_type">
                            <option value="">All Job Types</option>
                            <option value="faculty">Faculty</option>
                            <option value="visiting">Visiting Faculty</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="department">
                            <option value="">All Departments</option>
                            <option value="cs">Computer Science</option>
                            <option value="business">Business Administration</option>
                            <option value="engineering">Engineering</option>
                            <option value="arts">Arts & Design</option>
                            <option value="social">Social Sciences</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-search w-100">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">150+</div>
                        <div class="stat-label">Active Job Openings</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Faculty Members</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Departments</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">25+</div>
                        <div class="stat-label">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
