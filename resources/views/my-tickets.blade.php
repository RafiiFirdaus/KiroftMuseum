<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets - Kiroft Museum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

        /* Page background */
        body {
            background: linear-gradient(135deg, #afa597 0%, #d4cfc7 50%, #afa597 100%);
            color: #afa597;
            font-family: 'Rubik', sans-serif;
            min-height: 100vh;
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

        .main-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 3rem 2rem;
            margin: 2rem 0;
        }

        .notification-card {
            background-color: #2c2a26;
            border: 2px solid #afa597;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .notification-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: #afa597;
        }

        .notification-title {
            color: #393733;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .notification-message {
            color: #5a5550;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Lighter colors for no tickets notification */
        #noTickets .notification-title {
            color: #6b6560; /* Lighter brown tone */
        }

        #noTickets .notification-message {
            color: #8a7f75; /* Lighter brownish-gray */
        }

        /* Lighter colors for not logged in notification */
        #notLoggedIn .notification-title {
            color: #6b6560; /* Lighter brown tone */
        }

        #notLoggedIn .notification-message {
            color: #8a7f75; /* Lighter brownish-gray */
        }

        .btn-custom {
            background-color: #afa597;
            color: #393733;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #d4c4a8;
            color: #393733;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(175, 165, 151, 0.3);
        }

        .ticket-card {
            background: linear-gradient(135deg, #fff 0%, #f8f6f3 100%);
            border: 2px solid #afa597;
            border-radius: 20px;
            padding: 0;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
        }

        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .ticket-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #393733 0%, #afa597 100%);
        }

        .ticket-header {
            background: linear-gradient(135deg, #393733 0%, #2c2a26 100%);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            border: none;
        }

        .ticket-title {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .ticket-title i {
            font-size: 1.5rem;
            color: #afa597;
        }

        .ticket-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-active {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }

        .status-used {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
        }

        .ticket-body {
            padding: 2rem;
        }

        .ticket-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .detail-item {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 12px;
            border-left: 4px solid #afa597;
        }

        .detail-label {
            font-weight: 600;
            color: #393733;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #2c2a26;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .ticket-qr {
            text-align: center;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 15px;
            margin-top: 1.5rem;
            border: 2px dashed #afa597;
        }

        .qr-code {
            width: 120px;
            height: 120px;
            background: #393733;
            margin: 0 auto 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }

        .ticket-footer {
            background: #f8f9fa;
            padding: 1rem 2rem;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .ticket-id {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #393733;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .spinner-border {
            color: #afa597;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .ticket-details {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .ticket-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .ticket-title {
                font-size: 1.2rem;
            }

            .ticket-body {
                padding: 1.5rem;
            }

            .qr-code {
                width: 100px;
                height: 100px;
                font-size: 2rem;
            }
        }

        /* Animation for new tickets */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ticket-card {
            animation: slideInUp 0.5s ease-out;
        }

        /* Print styles for tickets */
        @media print {
            .ticket-card {
                break-inside: avoid;
                box-shadow: none;
                border: 2px solid #000;
            }

            .ticket-header {
                background: #000 !important;
                color: #fff !important;
            }
        }

        /* Hide search button */
        .navbar-icons .btn[title="Search"] {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-sm" id="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">KIROFT MUSEUM</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ route('museums') }}">Museums</a>
                    <a class="nav-link active" aria-current="page" href="/my-tickets">My Tickets</a>
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </div>

                <div class="navbar-icons d-flex align-items-center" id="navbarButtons">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Loading Spinner -->
                    <div id="loadingSpinner" class="loading-spinner">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading your tickets...</p>
                    </div>

                    <!-- Not Logged In Notification -->
                    <div id="notLoggedIn" class="notification-card" style="display: none; margin-top: 4rem;">
                        <div class="notification-icon">🔒</div>
                        <h2 class="notification-title">Please Login</h2>
                        <p class="notification-message">
                            You need to login to view your tickets. Please sign in to access your ticket history and manage your museum visits.
                        </p>
                        <a href="/login?redirect=/my-tickets" class="btn-custom">Login Now</a>
                    </div>

                    <!-- No Tickets Notification -->
                    <div id="noTickets" class="notification-card" style="display: none; margin-top: 4rem;">
                        <div class="notification-icon">🎫</div>
                        <h2 class="notification-title">You Haven't Purchased a Ticket</h2>
                        <p class="notification-message">
                            You don't have any tickets yet. Explore our amazing museums and purchase tickets to start your cultural journey!
                        </p>
                        <a href="/museums" class="btn-custom">Browse Museums</a>
                    </div>

                    <!-- Tickets List -->
                    <div id="ticketsList" style="display: none; margin-top: 4rem;">
                        <div class="text-center mb-4">
                            <h1 class="notification-title">My Tickets</h1>
                            <p class="notification-message">Here are all your purchased tickets</p>
                        </div>
                        <div id="ticketsContainer">
                            <!-- Tickets will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('My Tickets page loaded');
            loadNavbar();
            loadMyTickets();
        });

        function loadNavbar() {
            const token = localStorage.getItem('auth_token');
            const user = JSON.parse(localStorage.getItem('user') || 'null');
            const navbarButtons = document.getElementById('navbarButtons');

            if (token && user) {
                navbarButtons.innerHTML = `
                    <button class="btn" title="Search">
                        <i class="fas fa-search"></i>
                    </button>
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
                navbarButtons.innerHTML = `
                    <button class="btn" title="Search">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="/login" class="btn" title="Login">
                        <i class="fas fa-user-circle"></i>
                    </a>
                `;
            }
        }

        async function loadMyTickets() {
            const token = localStorage.getItem('auth_token');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const notLoggedIn = document.getElementById('notLoggedIn');
            const noTickets = document.getElementById('noTickets');
            const ticketsList = document.getElementById('ticketsList');

            // Show loading spinner
            loadingSpinner.style.display = 'block';

            // Check if user is logged in
            if (!token) {
                loadingSpinner.style.display = 'none';
                notLoggedIn.style.display = 'block';
                return;
            }

            try {
                // Fetch user's tickets
                const response = await fetch('/api/purchases', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log('API Response:', data); // Debug log
                    loadingSpinner.style.display = 'none';

                    if (data.purchases && data.purchases.length > 0) {
                        console.log('Tickets found:', data.purchases.length); // Debug log
                        // Show tickets list
                        ticketsList.style.display = 'block';
                        displayTickets(data.purchases);
                    } else {
                        console.log('No tickets found'); // Debug log
                        // No tickets found
                        noTickets.style.display = 'block';
                    }
                } else if (response.status === 401) {
                    // Token expired or invalid
                    localStorage.removeItem('auth_token');
                    loadingSpinner.style.display = 'none';
                    notLoggedIn.style.display = 'block';
                } else {
                    console.error('API Error:', response.status, response.statusText); // Debug log
                    const errorText = await response.text();
                    console.error('Error response:', errorText); // Debug log
                    throw new Error('Failed to fetch tickets');
                }
            } catch (error) {
                console.error('Error loading tickets:', error);
                loadingSpinner.style.display = 'none';
                // Show error message instead of no tickets
                noTickets.style.display = 'block';
                // Update error message temporarily for debugging
                const noTicketsCard = document.getElementById('noTickets');
                const errorMsg = noTicketsCard.querySelector('.notification-message');
                if (errorMsg) {
                    errorMsg.innerHTML = `Error loading tickets: ${error.message}<br>Check console for details.`;
                }
            }
        }

        function displayTickets(purchases) {
            console.log('displayTickets called with:', purchases); // Debug log
            console.log('Number of purchases to display:', purchases.length); // Debug log

            const ticketsContainer = document.getElementById('ticketsContainer');
            ticketsContainer.innerHTML = '';

            purchases.forEach((purchase, index) => {
                console.log(`Processing purchase ${index + 1}:`, purchase); // Debug log
                const ticketCard = document.createElement('div');
                ticketCard.className = 'ticket-card';

                const purchaseDate = new Date(purchase.created_at).toLocaleDateString('en-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                const visitDate = new Date(purchase.visit_date).toLocaleDateString('en-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                // Generate ticket ID
                const ticketId = `TKT-${purchase.id.toString().padStart(6, '0')}`;                // Determine museum name and ticket type from purchase data
                const museumName = purchase.museum_name || 'Museum 10 Nopember';
                const ticketType = purchase.ticket_type || 'General';
                const timeSlot = purchase.time_slot || '09:00 - 17:00';
                const paymentMethod = purchase.payment_method || 'Cash';

                // Format price to Indonesian Rupiah
                const price = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(purchase.total_price);

                ticketCard.innerHTML = `
                    <div class="ticket-header">
                        <h3 class="ticket-title">
                            <i class="fas fa-ticket-alt"></i>
                            ${museumName}
                        </h3>
                        <span class="ticket-status status-active">Valid</span>
                    </div>

                    <div class="ticket-body">
                        <div class="ticket-details">
                            <div class="detail-item">
                                <span class="detail-label">Ticket Type</span>
                                <div class="detail-value">${ticketType} Admission</div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Visit Date</span>
                                <div class="detail-value">${visitDate}</div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Time Slot</span>
                                <div class="detail-value">${timeSlot}</div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Total Price</span>
                                <div class="detail-value">${price}</div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Quantity</span>
                                <div class="detail-value">${purchase.quantity} Ticket(s)</div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Payment Method</span>
                                <div class="detail-value">${paymentMethod.toUpperCase()}</div>
                            </div>
                        </div>

                        <div class="ticket-qr">
                            <div class="qr-code">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <p style="margin: 0; color: #6c757d; font-size: 0.9rem;">
                                <strong>Show this QR code at the museum entrance</strong><br>
                                Valid for single entry on visit date
                            </p>
                        </div>
                    </div>

                    <div class="ticket-footer">
                        <div>
                            <strong>Ticket ID:</strong> <span class="ticket-id">${ticketId}</span>
                        </div>
                        <div>
                            Purchased: ${purchaseDate}
                        </div>
                    </div>
                `;

                ticketsContainer.appendChild(ticketCard);
            });
        }

        async function logout() {
            // Show confirmation dialog
            const confirmLogout = confirm('Are you sure you want to log out?');
            if (!confirmLogout) {
                return; // Cancel logout if user clicks "Cancel"
            }

            const token = localStorage.getItem('auth_token');

            if (token) {
                try {
                    await fetch('/api/logout', {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });
                } catch (error) {
                    console.error('Logout error:', error);
                }
            }

            localStorage.removeItem('auth_token');
            localStorage.removeItem('user');
            alert('Logged out successfully');
            window.location.href = '/';
        }
    </script>
</body>
</html>
