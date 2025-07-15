<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Museums - {{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

        /* Additional styles for museums page */
        .section-title {
            text-align: center;
            margin-top: 3rem;
            margin-bottom: 3rem;
            font-size: 3rem;
            font-weight: 300;
            color: #2f2b26;
            letter-spacing: 2px;
        }

        .destination-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            background: #fff;
            cursor: pointer;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .destination-card img {
            height: 280px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .destination-card:hover img {
            transform: scale(1.05);
        }

        .destination-card .card-body {
            padding: 2rem;
            background: linear-gradient(135deg, #fff 0%, #f8f6f3 100%);
        }

        .destination-card .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2f2b26;
            margin-bottom: 1rem;
            text-align: center;
        }

        .destination-card .card-text {
            color: #38342e;
            line-height: 1.7;
            font-size: 1rem;
            text-align: justify;
        }

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

        /* Custom responsive adjustments */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2.2rem;
                margin-top: 2rem;
                margin-bottom: 2rem;
            }

            .destination-card img {
                height: 220px;
            }

            .destination-card .card-body {
                padding: 1.5rem;
            }

            .destination-card .card-title {
                font-size: 1.5rem;
            }
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

        /* Dropdown menu styling */
        .dropdown-menu {
            background-color: white;
            border: 1px solid #393733;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #393733;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #afa597;
            color: white;
        }

        .dropdown-header {
            color: #393733;
            font-weight: 600;
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
            <h1 class="section-title">ALL DESTINATIONS</h1>

            <div class="row justify-content-center">
                <!-- East Java Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('museums.province', 'east-java') }}" class="text-decoration-none">
                        <div class="card destination-card">
                            <img src="{{ asset('images/province/east java.png') }}" class="card-img-top" alt="East Java Landscape"
                                 onerror="this.src='https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=400&fit=crop&crop=entropy'">
                            <div class="card-body">
                                <h5 class="card-title">East Java</h5>
                                <p class="card-text">
                                    Famous for volcanic landscapes and historical cities. Museums here preserve stories of ancient
                                    kingdoms like Majapahit and showcase the region's art, folklore, and independence-era history.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- West Java Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('museums.province', 'west-java') }}" class="text-decoration-none">
                        <div class="card destination-card">
                            <img src="{{ asset('images/province/west java.png') }}" class="card-img-top" alt="West Java Landscape"
                                 onerror="this.src='https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=600&h=400&fit=crop&crop=entropy'">
                            <div class="card-body">
                                <h5 class="card-title">West Java</h5>
                                <p class="card-text">
                                    Known for its Sundanese culture, scenic highlands, and traditional music. Museums in this
                                    province often showcase natural history, local crafts, and colonial-era artifacts.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Central Java Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('museums.province', 'central-java') }}" class="text-decoration-none">
                        <div class="card destination-card">
                            <img src="{{ asset('images/province/central java.png') }}" class="card-img-top" alt="Central Java Temples"
                                 onerror="this.src='https://images.unsplash.com/photo-1539650116574-75c0c6d90d24?w=600&h=400&fit=crop&crop=entropy'">
                            <div class="card-body">
                                <h5 class="card-title">Central Java</h5>
                                <p class="card-text">
                                    A region rich in Javanese culture and history, home to ancient temples like Borobudur and
                                    Prambanan. Museums here highlight royal heritage, traditional arts, and archaeological treasures.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $(document).scroll(function () {
                let $nav = $('#navbar')
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            })

            // Add smooth scroll animation for cards
            $(window).scroll(function() {
                $('.destination-card').each(function() {
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
                            <li><a class="dropdown-item" href="/my-tickets"><i class="fas fa-ticket-alt me-2"></i>My Tickets</a></li>
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

        function logout() {
            // Show confirmation dialog
            const confirmLogout = confirm('Are you sure you want to log out?');
            if (!confirmLogout) {
                return; // Cancel logout if user clicks "Cancel"
            }

            localStorage.removeItem('auth_token');
            localStorage.removeItem('user');
            alert('Logged out successfully');
            updateAuthUI();
        }
    </script>
</body>

</html>
