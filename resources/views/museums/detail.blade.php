<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $museum['name'] }} - {{ config('app.name', 'Kiroft Museum') }}</title>
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

        /* Detail page styles */
        .hero-section {
            background: linear-gradient(135deg, rgba(175, 165, 151, 0.9), rgba(212, 207, 199, 0.9)),
                        url('{{ asset('images/' . $museum['image']) }}') center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.3rem;
            opacity: 0.9;
        }

        .detail-section {
            padding: 4rem 0;
            background: #f8f6f3;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .info-card h3 {
            color: #2f2b26;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #afa597;
            padding-bottom: 0.5rem;
        }

        .ticket-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
        }

        .ticket-item:last-child {
            border-bottom: none;
        }

        .ticket-price {
            font-weight: 600;
            color: #d8332d;
        }

        .facility-item {
            padding: 0.5rem 0;
            font-size: 1.1rem;
        }

        .schedule-info {
            background: #afa597;
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            margin: 1rem 0;
        }

        .schedule-info h4 {
            margin-bottom: 1rem;
        }

        .schedule-time {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .location-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .location-card iframe {
            width: 100%;
            height: 300px;
            border: none;
        }

        .location-info {
            padding: 1.5rem;
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

        .book-now-btn {
            background-color: #393733;
            color: #b2aca3;
            border: 2px solid #afa597;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
            box-shadow: none;
            text-shadow: none;
        }

        .book-now-btn:hover {
            background-color: #afa597;
            color: #393733;
            border: 2px solid #393733;
            transform: translateY(-2px);
            box-shadow: none;
            text-shadow: none;
        }

        /* Page background */
        body {
            background: #f8f6f3;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .schedule-time {
                font-size: 1.5rem;
            }
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $museum['name'] }}</h1>
                <p><i class="fas fa-map-marker-alt"></i> {{ $museum['location'] }}</p>
                @if($museum['name'] === 'Museum 10 Nopember')
                    <a href="{{ route('museums.booking', ['province' => $province, 'slug' => 'museum-10-nopember-surabaya']) }}" class="book-now-btn">
                        <i class="fas fa-ticket-alt"></i>
                        Book Now
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Detail Information Section -->
    <section class="detail-section">
        <div class="container">
            <a href="{{ route('museums.province', $province) }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Back to {{ $provinceName }} Museums
            </a>

            <div class="row">
                <!-- Museum Information -->
                <div class="col-lg-8 mb-4">
                    <div class="info-card">
                        <h3><i class="fas fa-info-circle"></i> Museum Information</h3>
                        @if(isset($museum['detailed_info']['description']))
                            <p style="line-height: 1.8; font-size: 1.1rem;">{{ $museum['detailed_info']['description'] }}</p>
                        @else
                            <p style="line-height: 1.8; font-size: 1.1rem;">{{ $museum['description'] }}</p>
                        @endif
                    </div>

                    @if(isset($museum['detailed_info']['facilities']))
                    <div class="info-card">
                        <h3><i class="fas fa-building"></i> Museum Facilities</h3>
                        <div class="row">
                            @foreach($museum['detailed_info']['facilities'] as $facility)
                                <div class="col-md-6">
                                    <div class="facility-item">{{ $facility }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Tickets & Schedule -->
                <div class="col-lg-4 mb-4">
                    @if(isset($museum['detailed_info']['tickets']))
                    <div class="info-card">
                        <h3><i class="fas fa-ticket-alt"></i> Ticket Prices</h3>
                        <div class="ticket-item">
                            <span>General Ticket</span>
                            <span class="ticket-price">{{ $museum['detailed_info']['tickets']['general'] }}</span>
                        </div>
                        <div class="ticket-item">
                            <span>Student Ticket</span>
                            <span class="ticket-price">{{ $museum['detailed_info']['tickets']['student'] }}</span>
                        </div>
                        <small class="text-muted">{{ $museum['detailed_info']['tickets']['student_note'] }}</small>

                        @if(isset($museum['detailed_info']['special_offers']))
                        <div class="mt-3">
                            <h6>Special Offers:</h6>
                            <small class="text-success d-block">• {{ $museum['detailed_info']['special_offers']['group_discount'] }}</small>
                            <small class="text-success d-block">• {{ $museum['detailed_info']['special_offers']['senior_free'] }}</small>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if(isset($museum['detailed_info']['schedule']))
                    <div class="info-card">
                        <h3><i class="fas fa-clock"></i> Opening Hours</h3>
                        <div class="schedule-info">
                            <h4>{{ $museum['detailed_info']['schedule']['days'] }}</h4>
                            <div class="schedule-time">{{ $museum['detailed_info']['schedule']['hours'] }}</div>
                            <small>{{ $museum['detailed_info']['schedule']['note'] }}</small>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            @if(isset($museum['detailed_info']['location']))
            <!-- Location Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="info-card">
                        <h3><i class="fas fa-map-marked-alt"></i> Location</h3>
                        <div class="location-card">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3936084226434!2d112.74150377456327!3d-7.309012071933844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb91b27ddf93%3A0x166c81ec69b25b6e!2sMuseum%2010%20November!5e0!3m2!1sen!2sid!4v1721024567890!5m2!1sen!2sid"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            <div class="location-info">
                                <h5><i class="fas fa-map-marker-alt"></i> Address</h5>
                                <p>{{ $museum['detailed_info']['location']['address'] }}</p>
                                <a href="{{ $museum['detailed_info']['location']['maps_url'] }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i> Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

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
                $('.info-card').each(function() {
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
