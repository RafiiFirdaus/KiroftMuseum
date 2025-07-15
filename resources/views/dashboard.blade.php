<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

        /* Additional styles for search bar */
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

        /* Search bar focus effect */
        .search-input:focus {
            transform: scale(1.02);
            transition: transform 0.2s ease;
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
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: #afa597;
            border-radius: 2px;
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
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    <a class="nav-link" href="{{ route('museums') }}">Museums</a>
                    <a class="nav-link" href="#tickets">My Tickets</a>
                </div>

                <!-- Search Bar -->
                <form class="d-flex me-3 my-2 my-lg-0" role="search" style="flex-grow: 1; max-width: 400px;">
                    <div class="input-group">
                        <input class="form-control search-input" type="search" placeholder="Search museums... (Ctrl+K)" aria-label="Search" title="Press Ctrl+K to focus search">
                        <button class="btn btn-outline-secondary" type="submit" title="Search">
                            <i class="fas fa-search"></i>
                            <span class="d-none d-md-inline ms-1">Search</span>
                        </button>
                    </div>
                </form>

                <div class="navbar-nav">
                    <form method="POST" action="{{ route('logout') }}" class="d-flex">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="border: none; background: none;">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small">LOGOUT</span>
                            <img class="border rounded-circle img-profile" width="35" height="35" src="{{ asset('images/profile_blank.jpg') }}" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <section class="container-fluid px-0" style="padding-top: 80px;">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="blurb">Welcome to Your Dashboard</h1>
                    <p class="lead blurb">Manage your museum visits and tickets</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">📍 Browse Museums</h5>
                            <p class="card-text">Discover amazing museums and plan your next visit.</p>
                            <a href="#" class="btn">Explore Museums</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">🎫 My Tickets</h5>
                            <p class="card-text">View and manage your purchased tickets.</p>
                            <a href="#" class="btn">View Tickets</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">📊 Visit History</h5>
                            <p class="card-text">See your past museum visits and experiences.</p>
                            <a href="#" class="btn">View History</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">⚙️ Account Settings</h5>
                            <p class="card-text">Update your profile and preferences.</p>
                            <a href="#" class="btn">Settings</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">🔥 Popular Museums This Week</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">National Museum</h6>
                                            <p class="card-text">Jakarta's premier cultural institution.</p>
                                            <small class="text-muted">📍 Jakarta • 💰 Rp 15,000</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Geology Museum</h6>
                                            <p class="card-text">Explore Indonesia's geological wonders.</p>
                                            <small class="text-muted">📍 Bandung • 💰 Rp 10,000</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Fatahillah Museum</h6>
                                            <p class="card-text">Discover Jakarta's rich history.</p>
                                            <small class="text-muted">📍 Jakarta • 💰 Rp 12,000</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

            // Search functionality
            const searchInput = document.querySelector('.search-input');
            const searchForm = document.querySelector('form[role="search"]');

            // Sample museum data for search suggestions
            const museums = [
                'National Museum',
                'Geology Museum',
                'Fatahillah Museum',
                'Museum Wayang',
                'Museum Tekstil',
                'Museum Satria Mandala',
                'Museum Bank Indonesia',
                'Museum Sejarah Jakarta',
                'Museum Basoeki Abdullah',
                'Museum Nasional Indonesia'
            ];

            // Search input event listener
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase();
                if (query.length > 0) {
                    // Filter museums based on search query
                    const filteredMuseums = museums.filter(museum =>
                        museum.toLowerCase().includes(query)
                    );

                    // You can add dropdown suggestions here
                    console.log('Search suggestions:', filteredMuseums);
                }
            });

            // Search form submission
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query) {
                    // For now, just show an alert. In a real app, you'd redirect to search results
                    alert(`Searching for: "${query}"`);
                    // You can implement actual search functionality here
                    // window.location.href = `/search?q=${encodeURIComponent(query)}`;
                }
            });

            // Add keyboard shortcut for search (Ctrl+K or Cmd+K)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    searchInput.focus();
                }
            });
        })
    </script>
</body>

</html>
