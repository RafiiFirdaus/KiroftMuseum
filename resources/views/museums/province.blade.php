<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Museums in {{ $provinceName }} - {{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

        /* Search bar styles - matching dashboard */
        .search-input {
            min-width: 200px;
            background-color: #9a958d;
            border-color: #9a958d;
            color: #333;
        }

        .search-input::placeholder {
            color: #2b2b2b;
        }

        .search-input:focus {
            background-color: #afa597;
            border-color: #393733;
            box-shadow: 0 0 0 0.2rem rgba(57, 55, 51, 0.25);
            transform: scale(1.02);
            transition: transform 0.2s ease;
        }

        .btn-outline-secondary {
            border-color: #9a958d;
            color: #393733;
        }

        .btn-outline-secondary:hover {
            background-color: #393733;
            border-color: #393733;
        }

        /* Responsive search bar */
        @media (max-width: 991.98px) {
            form[role="search"] {
                width: 100% !important;
                max-width: none !important;
                order: 3;
                margin-top: 10px;
            }

            .search-input {
                min-width: auto;
            }
        }

        @media (max-width: 768px) {
            .search-input {
                min-width: 150px;
            }
        }

        /* Active navigation link styling */
        .navbar-nav .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link.active {
            color: #afa597 !important;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: #afa597;
            border-radius: 2px;
        }

        /* Navbar icons styling */
        .navbar-icons .btn {
            background-color: #393733;
            color: #b2aca3;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            margin-left: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-icons .btn:hover {
            background-color: #afa597;
            color: #393733;
            transform: scale(1.1);
        }

        /* Special styling for user icon */
        .navbar-icons .btn .fa-user-circle {
            font-size: 2.5rem;
            margin-left: -9px;
            margin-top: -3.5px;
        }

        /* Province museums page styles */
        .section-title {
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            font-weight: 300;
            color: #2f2b26;
            letter-spacing: 2px;
        }

        .museum-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            background: #fff;
            cursor: pointer;
        }

        .museum-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .museum-card img {
            height: 200px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .museum-card:hover img {
            transform: scale(1.03);
        }

        .museum-card .card-body {
            padding: 1.5rem;
        }

        .museum-card .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2f2b26;
            margin-bottom: 0.5rem;
        }

        .museum-card .card-text {
            color: #38342e;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .museum-location {
            color: #afa597;
            font-size: 0.85rem;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .back-button {
            background-color: #393733;
            color: #fff;
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .back-button:hover {
            background-color: #afa597;
            color: #393733;
            transform: translateY(-2px);
        }

        .back-button i {
            margin-right: 0.5rem;
        }

        /* Page background */
        body {
            background: linear-gradient(135deg, #afa597 0%, #d4cfc7 50%, #afa597 100%);
            min-height: 100vh;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 3rem 2rem;
            margin: 2rem 0;
        }

        /* Hide search button */
        .navbar-icons .btn[title="Search"] {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-sm" id="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">KIROFT MUSEUM</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link active" aria-current="page" href="{{ route('museums') }}">Museums</a>
                    <a class="nav-link" href="/my-tickets">My Tickets</a>
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </div>

                <div class="navbar-icons d-flex align-items-center" id="authSection">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 100px;">
        <div class="main-content">
            <a href="{{ route('museums') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Back to All Destinations
            </a>

            <h1 class="section-title">Museums in {{ $provinceName }}</h1>

            <div class="row">
                @foreach($museums as $museum)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('museums.detail', [$province, \Str::slug($museum['name'])]) }}" class="text-decoration-none">
                            <div class="card museum-card">
                                <img src="{{ asset('images/' . $museum['image']) }}"
                                     class="card-img-top"
                                     alt="{{ $museum['name'] }}"
                                     onerror="this.src='https://images.unsplash.com/photo-1586881962883-4cced513b367?w=400&h=300&fit=crop&crop=entropy'">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $museum['name'] }}</h5>
                                    <p class="card-text">{{ $museum['description'] }}</p>
                                    <div class="museum-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $museum['location'] }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if(empty($museums))
                <div class="text-center py-5">
                    <h3 class="text-muted">No museums found in {{ $provinceName }}</h3>
                    <p class="text-muted">Check back later for more museums in this province.</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Authentication Management
        document.addEventListener('DOMContentLoaded', function() {
            updateAuthUI();
        });

        function updateAuthUI() {
            const token = localStorage.getItem('auth_token');
            const user = JSON.parse(localStorage.getItem('user') || 'null');
            const authSection = document.getElementById('authSection');

            if (token && user) {
                // User is logged in
                authSection.innerHTML = `
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="${user.name}">
                            <i class="fas fa-user-check"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><h6 class="dropdown-header">Hello, ${user.name}!</h6></li>
                            <li><a class="dropdown-item" href="/user-dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="#" onclick="openTicketsModal()"><i class="fas fa-ticket-alt me-2"></i>My Tickets</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                `;
            } else {
                // User is not logged in
                authSection.innerHTML = `
                    <a href="{{ route('login') }}" class="btn" title="Login">
                        <i class="fas fa-user-circle"></i>
                    </a>
                `;
            }
        }

        function openTicketsModal() {
            // Redirect to my tickets page
            window.location.href = '/my-tickets';
        }

        async function logout() {
            // Show confirmation dialog
            const confirmLogout = confirm('Are you sure you want to log out?');
            if (!confirmLogout) {
                return; // Cancel logout if user clicks "Cancel"
            }

            try {
                const token = localStorage.getItem('auth_token');
                if (token) {
                    await fetch('/api/logout', {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });
                }
            } catch (error) {
                console.error('Logout error:', error);
            } finally {
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                updateAuthUI();
                // Redirect to home page after logout
                window.location.href = '/';
            }
        }

        $(function () {
            $(document).scroll(function () {
                let $nav = $('#navbar')
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            })

            // Add smooth scroll animation for cards
            $(window).scroll(function() {
                $('.museum-card').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate__animated animate__fadeInUp');
                    }
                });
            });
        })
    </script>
</body>

</html>
