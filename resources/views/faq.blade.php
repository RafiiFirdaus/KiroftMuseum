<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Kiroft Museum</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

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

        .faq-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 3rem 2rem;
            margin: 2rem 0;
        }

        .faq-title {
            color: #393733;
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }

        .faq-subtitle {
            color: #666;
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 3rem;
        }

        .faq-category {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .faq-category-title {
            color: #393733;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .faq-category-icon {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .accordion-button {
            background: rgba(175, 165, 151, 0.1);
            border: none;
            color: #393733;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
            box-shadow: none;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .accordion-body {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 1.5rem;
            line-height: 1.6;
        }

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

        .contact-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            margin-top: 3rem;
        }

        .contact-title {
            color: #393733;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .contact-text {
            color: #666;
            margin-bottom: 2rem;
        }

        .contact-btn {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">KIROFT MUSEUM</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                    <a class="nav-link" href="{{ route('museums') }}">Museums</a>
                    <a class="nav-link" href="/my-tickets">My Tickets</a>
                    <a class="nav-link active" aria-current="page" href="{{ route('faq') }}">FAQ</a>
                </div>

                <div class="navbar-icons d-flex align-items-center">
                    <button class="btn" title="Search">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Auth Section - akan diubah via JavaScript -->
                    <div id="authSection">
                        <!-- Login Button (jika belum login) -->
                        <a href="{{ route('login') }}" class="btn" title="Login" id="loginBtn">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <section class="container-fluid px-0" style="padding-top: 80px;">
        <div class="container py-5">
            <div class="faq-container">
                <h1 class="faq-title">Frequently Asked Questions</h1>
                <p class="faq-subtitle">Find answers to common questions about visiting Kiroft Museum</p>

                <!-- Tickets & Pricing Category -->
                <div class="faq-category">
                    <div class="faq-category-title">
                        <div class="faq-category-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        Tickets & Pricing
                    </div>
                    <div class="accordion" id="ticketsAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tickets2">
                                    Can I buy tickets online?
                                </button>
                            </h2>
                            <div id="tickets2" class="accordion-collapse collapse" data-bs-parent="#ticketsAccordion">
                                <div class="accordion-body">
                                    Yes! You can purchase tickets online through our website. Online booking allows you to:
                                    <ul>
                                        <li>Skip the queue at the entrance</li>
                                        <li>Secure your preferred date and time slot</li>
                                        <li>Get confirmation via email</li>
                                        <li>Cancel or reschedule (subject to terms)</li>
                                    </ul>
                                    Simply create an account, choose your museum, select your date, and complete the payment.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tickets3">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="tickets3" class="accordion-collapse collapse" data-bs-parent="#ticketsAccordion">
                                <div class="accordion-body">
                                    We accept various payment methods for your convenience:
                                    <ul>
                                        <li>Credit/Debit Cards (Visa, Mastercard, JCB)</li>
                                        <li>Bank Transfer (BCA, Mandiri, BNI, BRI)</li>
                                        <li>E-wallets (GoPay, OVO, DANA, ShopeePay)</li>
                                        <li>Cash payment at the museum entrance</li>
                                    </ul>
                                    All online transactions are secured with SSL encryption.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visiting Information Category -->
                <div class="faq-category">
                    <div class="faq-category-title">
                        <div class="faq-category-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        Visiting Information
                    </div>
                    <div class="accordion" id="visitingAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#visiting2">
                                    How long does a typical visit take?
                                </button>
                            </h2>
                            <div id="visiting2" class="accordion-collapse collapse" data-bs-parent="#visitingAccordion">
                                <div class="accordion-body">
                                    A typical visit to our museum takes approximately:
                                    <ul>
                                        <li><strong>Quick Visit:</strong> 1-2 hours (main highlights)</li>
                                        <li><strong>Standard Visit:</strong> 2-3 hours (most exhibitions)</li>
                                        <li><strong>Comprehensive Visit:</strong> 3-4 hours (all exhibitions + special areas)</li>
                                    </ul>
                                    We recommend planning at least 2 hours to fully appreciate our collections and exhibitions.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Policies & Rules Category -->
                <div class="faq-category">
                    <div class="faq-category-title">
                        <div class="faq-category-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        Policies & Rules
                    </div>
                    <div class="accordion" id="policiesAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policies1">
                                    Can I take photos inside the museum?
                                </button>
                            </h2>
                            <div id="policies1" class="accordion-collapse collapse" data-bs-parent="#policiesAccordion">
                                <div class="accordion-body">
                                    Photography policies vary by exhibition:
                                    <ul>
                                        <li><strong>General Areas:</strong> Photography allowed (no flash)</li>
                                        <li><strong>Permanent Collections:</strong> Photography allowed for personal use</li>
                                        <li><strong>Special Exhibitions:</strong> May be restricted - check signage</li>
                                        <li><strong>Commercial Photography:</strong> Requires special permission</li>
                                    </ul>
                                    Please respect other visitors and follow staff instructions regarding photography.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policies2">
                                    What items are not allowed in the museum?
                                </button>
                            </h2>
                            <div id="policies2" class="accordion-collapse collapse" data-bs-parent="#policiesAccordion">
                                <div class="accordion-body">
                                    For the safety of our collections and visitors, the following items are prohibited:
                                    <ul>
                                        <li>Large bags or backpacks (lockers available)</li>
                                        <li>Food and beverages (except water bottles)</li>
                                        <li>Professional photography equipment</li>
                                        <li>Sharp objects or tools</li>
                                        <li>Pets (except service animals)</li>
                                    </ul>
                                    Free bag storage is available at the entrance.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policies3">
                                    Can I cancel or refund my ticket?
                                </button>
                            </h2>
                            <div id="policies3" class="accordion-collapse collapse" data-bs-parent="#policiesAccordion">
                                <div class="accordion-body">
                                    <strong>Cancellation Policy:</strong>
                                    <ul>
                                        <li>Free cancellation up to 24 hours before visit date</li>
                                        <li>50% refund for cancellations within 24 hours</li>
                                        <li>No refund for no-shows</li>
                                    </ul>
                                    <strong>Rescheduling:</strong> You can reschedule your visit once free of charge, subject to availability.
                                    Contact our customer service for assistance.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Support Category -->
                <div class="faq-category">
                    <div class="faq-category-title">
                        <div class="faq-category-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        Technical Support
                    </div>
                    <div class="accordion" id="techAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech1">
                                    I'm having trouble booking tickets online
                                </button>
                            </h2>
                            <div id="tech1" class="accordion-collapse collapse" data-bs-parent="#techAccordion">
                                <div class="accordion-body">
                                    If you're experiencing issues with online booking:
                                    <ul>
                                        <li>Clear your browser cache and cookies</li>
                                        <li>Try using a different browser or device</li>
                                        <li>Ensure your payment method has sufficient funds</li>
                                        <li>Check your internet connection</li>
                                    </ul>
                                    If problems persist, contact our support team at support@kiroftmuseum.com or call us during business hours.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech2">
                                    I didn't receive my booking confirmation email
                                </button>
                            </h2>
                            <div id="tech2" class="accordion-collapse collapse" data-bs-parent="#techAccordion">
                                <div class="accordion-body">
                                    If you haven't received your confirmation email:
                                    <ul>
                                        <li>Check your spam/junk folder</li>
                                        <li>Verify the email address you provided</li>
                                        <li>Wait up to 30 minutes for delivery</li>
                                        <li>Add noreply@kiroftmuseum.com to your contacts</li>
                                    </ul>
                                    You can also check your booking status by logging into your account on our website.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // Navbar scroll effect
        $(function () {
            $(document).scroll(function () {
                let $nav = $('#navbar')
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            })
        })

        // Authentication Management
        document.addEventListener('DOMContentLoaded', function() {
            // Wait a bit for DOM to be fully ready
            setTimeout(function() {
                updateAuthUI();
            }, 100);
        });

        function updateAuthUI() {
            try {
                const token = localStorage.getItem('auth_token');
                const user = JSON.parse(localStorage.getItem('user') || 'null');
                const authSection = document.getElementById('authSection');

                // Debug logging
                console.log('FAQ updateAuthUI - Token:', token ? 'exists' : 'not found');
                console.log('FAQ updateAuthUI - User:', user ? user.name : 'not found');
                console.log('FAQ updateAuthUI - AuthSection:', authSection ? 'found' : 'not found');

                if (!authSection) {
                    console.error('authSection not found in DOM');
                    return;
                }

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
                        <a href="{{ route('login') }}" class="btn" title="Login" id="loginBtn">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    `;
                }
            } catch (error) {
                console.error('Error in updateAuthUI:', error);
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
                // Redirect to home
                window.location.href = '/';
            }
        }
    </script>
</body>
</html>
