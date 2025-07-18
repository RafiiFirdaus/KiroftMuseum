<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

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

            <a class="navbar-brand" href="{{ url('/') }}">KIROFT MUSEUM</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    <a class="nav-link" href="{{ route('museums') }}">Museums</a>
                    <a class="nav-link" href="/my-tickets">My Tickets</a>
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </div>

                <div class="navbar-icons d-flex align-items-center">
                    <button class="btn" title="Search">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Auth Section - akan diubah via JavaScript -->
                    <div id="authSection">
                        <!-- Login Button (jika belum login) -->
                        <a href="/auth" class="btn" title="Login" id="loginBtn">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="container-fluid px-0">
        <div class="row align-items-center content" id="home">
            <div class="col-sm-6" id="gambar-1">
                <img class="img-fluid" src="{{ asset('images/11.png') }}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="blurb text-center d-none d-lg-block" id="title-head">
                    <h1 class="mt-4">Welcome to</h1>
                    <h1 class="fw-bold">KIROFT MUSEUM</h1>
                    <img src="{{ asset('images/1.png') }}" height="60" alt="" class="d-none d-lg-inline">
                    <p class="desc-1">Your Gateway to Museums</p>
                    <p class="desc-1">Discover the richness of history, art,</p>
                    <p class="desc-1">and culture from Indonesia</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center content">
            <div class="col-md-6 text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-lg-80 blurb pt-3">
                        <h2>🎟 Book Museum Tickets Easily</h2>
                        <img src="{{ asset('images/1.png') }}" height="60" alt="" class="d-none d-lg-inline">
                        <p class="lead">
                            No more long lines. Just choose your favorite museum, pick a date, and receive your digital
                            ticket directly to your email or WhatsApp.
                        </p>
                        <p>🔹 Instant digital tickets (QR Code) — no printing required</p>
                        <p>🔹 Secure payment via e-wallet, QRIS, or bank transfer</p>
                        <p>🔹 Automatic visit reminders to your phone</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 align-items-end">
                <img src="{{ asset('images/lukisan.png') }}" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row align-items-center content" id="about2">
            <div class="col-sm-6 align-items-end order-2 order-sm-1">
                <img src="{{ asset('images/patung.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 text-center order-1">
                <div class="row justify-content-center">
                    <div class="col-10 col-lg-80 blurb pt-3">
                        <h3>Featured Exhibitions This Month!!</h3>
                        <p class="mt-3"></p>
                        <img src="{{ asset('images/1.png') }}" height="60" alt="" class="d-none d-lg-inline">
                        <p class="mb-3"></p>
                        <h4>Modern Pop Art Exhibition</h4>
                        <h5 style="color: #d8332d;">National Art Museum, Jakarta</h5>
                        <h5 style="color: #d8332d;">May 10 to June 30, 2025</h5>
                        <h4>Explore vibrant visual works from emerging Southeast Asian artists</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-5 mt-5 blurb col-xl-6 text-center mx-auto">
            <h1>Prepare for your journey</h1>
        </div>

        <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h5 class="fw-bold blurb-1 card-title">Plan your visit </h5>
                        <p class="card-text mb-4">Find our location and choose the best date to visit</p>
                        <button class="btn" onclick="window.location.href='{{ route('museums') }}'" type="button">Book now</button>
                    </div>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                        <h5 class="fw-bold card-title">FAQ</h5>
                        <p class="card-text mb-4">All the information you need on tickets and more</p>
                        <button class="btn" onclick="window.location.href='{{ route('faq') }}'" type="button">Find the answers</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row mb-5 blurb">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold mb-2" id="rate">Testimonials</h2>
                    <h1>What People Say About us</h1>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col-12 col-md-6 mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-rate border rounded border-dark p-4">
                            "Super convenient! I booked tickets for 3 museums in one go. No queues, no hassle."</p>
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{ asset('images/jinshi.jpeg') }}" />
                            <div>
                                <p class="fw-bold text-light-emphasis mb-0">Jinshi Husband</p>
                                <p class="text-muted mb-0">Pro Player Wuthering Waves</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-rate border rounded border-dark p-4">
                            "The interface is clean and easy to use. Payment was smooth, even from abroad."</p>
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{ asset('images/mia_profile.png') }}" />
                            <div>
                                <p class="fw-bold text-light-emphasis mb-0">Mia</p>
                                <p class="text-muted mb-0">Veterinarian</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-rate border rounded border-dark p-4">
                            "Perfect for last-minute plans. I booked 10 minutes before arrival and got in with the QR code."</p>
                        <div class="d-flex">
                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{ asset('images/JOMOCC.jpeg') }}" />
                            <div>
                                <p class="fw-bold text-light-emphasis mb-0">JOccaMOCca</p>
                                <p class="text-muted mb-0">Pro Player Honkai Star Rail</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub d-flex mt-5 flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5">
            <div class="text-center text-lg-start py-3 py-lg-1">
                <h1 class="text-b">Subscribe to Kiroft Museum updates</h1>
            </div>
            <form class="d-flex justify-content-center flex-wrap flex-lg-nowrap" id="subscribeForm">
                <div class="my-2">
                    <input class="form form-control me-3 border rounded-5" type="email" name="email" id="subscribeEmail" placeholder="Your Email" required />
                </div>
                <div class="my-2">
                    <button class="btn btn-outline-success ms-3" type="submit">Subscribe</button>
                </div>
            </form>
        </div>
    </section>

    <section id="copyright">
        <nav id="copyright2025">
            <div class="container py-5 py-sm-5">
                <div class="text-muted d-flex justify-content-center align-items-center pt-3">
                    <p class="text-b">Copyright © 2025 Kiroft Museum</p>
                </div>
            </div>
        </nav>
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
        })

        // Authentication Management
        document.addEventListener('DOMContentLoaded', function() {
            updateAuthUI();
        });

        function updateAuthUI() {
            const token = localStorage.getItem('auth_token');
            const user = JSON.parse(localStorage.getItem('user') || 'null');
            const authSection = document.getElementById('authSection');
            // const myTicketsLink = document.getElementById('myTicketsLink'); // Commented out

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

                // Update My Tickets link behavior - Commented out
                // myTicketsLink.href = '#';
                // myTicketsLink.onclick = function(e) {
                //     e.preventDefault();
                //     openTicketsModal();
                // };
            } else {
                // User is not logged in
                authSection.innerHTML = `
                    <a href="/auth" class="btn" title="Login" id="loginBtn">
                        <i class="fas fa-user-circle"></i>
                    </a>
                `;

                // Update My Tickets link to redirect to login - Commented out
                // myTicketsLink.href = '/auth';
                // myTicketsLink.onclick = null;
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
                // Optional: show logout success message
                showAlert('Successfully logged out!', 'success');
            }
        }

        function showAlert(message, type = 'info') {
            // Create alert element
            const alertContainer = document.createElement('div');
            alertContainer.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
            alertContainer.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;

            document.body.appendChild(alertContainer);

            // Auto remove after 3 seconds
            setTimeout(() => {
                if (alertContainer.parentNode) {
                    alertContainer.parentNode.removeChild(alertContainer);
                }
            }, 3000);
        }

        // Subscribe form handler
        document.addEventListener('DOMContentLoaded', function() {
            const subscribeForm = document.getElementById('subscribeForm');

            if (subscribeForm) {
                subscribeForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const emailInput = document.getElementById('subscribeEmail');
                    const email = emailInput.value.trim();

                    if (email && emailInput.checkValidity()) {
                        // Show success popup
                        showAlert('You will receive emails about updates on kiroft museum', 'success');

                        // Clear the input
                        emailInput.value = '';
                    } else {
                        // Show error popup for invalid email
                        showAlert('Please enter a valid email address', 'danger');
                    }
                });
            }
        });
    </script>
</body>

</html>
