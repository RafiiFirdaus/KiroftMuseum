<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ticket - Museum 10 Nopember - {{ config('app.name', 'Kiroft Museum') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}

        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar styles matching museums page */
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

        /* Body and booking specific styles */
        body {
            background: linear-gradient(135deg, #afa597 0%, #d4cfc7 50%, #afa597 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
            padding-top: 100px; /* Add space for fixed navbar */
        }

        .booking-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .booking-header {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .booking-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .booking-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        .booking-content {
            padding: 2rem;
        }

        .ticket-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .ticket-card {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .ticket-card:hover {
            border-color: #393733;
            box-shadow: 0 5px 15px rgba(57, 55, 51, 0.1);
        }

        .ticket-card.selected {
            border-color: #393733;
            background-color: #f5f4f2;
        }

        .ticket-card input[type="radio"] {
            position: absolute;
            top: 1rem;
            right: 1rem;
            transform: scale(1.2);
        }

        .ticket-type {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .ticket-includes {
            margin: 1rem 0;
        }

        .ticket-includes ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ticket-includes li {
            padding: 0.2rem 0;
            color: #666;
        }

        .ticket-includes li i {
            color: #28a745;
            margin-right: 0.5rem;
        }

        .ticket-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #393733;
            margin-top: 1rem;
        }

        .form-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #393733;
            box-shadow: 0 0 0 0.2rem rgba(57, 55, 51, 0.25);
        }

        .file-upload {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: #393733;
            background-color: #f5f4f2;
        }

        .file-upload i {
            font-size: 2rem;
            color: #393733;
            margin-bottom: 1rem;
        }

        /* File status indicator */
        #fileStatus {
            font-size: 0.9rem;
            font-weight: 500;
        }

        #fileStatus i {
            font-size: 1rem;
            margin-right: 0.5rem;
            margin-bottom: 0;
        }

        .calendar-container {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            background: white;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .calendar-nav {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #393733;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .calendar-nav:hover {
            background-color: #f8f9fa;
        }

        .calendar-month {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .calendar-day:hover {
            background-color: #f8f9fa;
        }

        .calendar-day.selected {
            background-color: #393733;
            color: white;
        }

        .calendar-day.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .calendar-day.other-month {
            color: #ccc;
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .time-slot {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .time-slot:hover {
            border-color: #393733;
        }

        .time-slot.selected {
            border-color: #393733;
            background-color: #f5f4f2;
        }

        .time-slot.full {
            border-color: #dc3545;
            background-color: #f8d7da;
            cursor: not-allowed;
        }

        .time-slot input[type="radio"] {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }

        .time-slot-time {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }

        .time-slot-status {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .time-slot.full .time-slot-status {
            color: #dc3545;
            font-weight: 600;
        }

        .promo-section {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .promo-input {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .promo-input input {
            flex: 1;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1rem;
        }

        .promo-btn {
            background: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .promo-btn:hover {
            background: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .booking-summary {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .summary-total {
            border-top: 2px solid #dee2e6;
            padding-top: 1rem;
            margin-top: 1rem;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .book-btn {
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .book-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(57, 55, 51, 0.3);
        }

        .back-button {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 2px solid #6c757d;
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .back-button:hover {
            color: #393733;
            border-color: #393733;
        }

        .back-button i {
            font-size: 1.1rem;
        }

        /* Payment Modal Styles */
        .payment-option {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: #afa597;
            background: #f5f5f5;
            transform: translateY(-2px);
        }

        .payment-option.selected {
            border-color: #393733;
            background: linear-gradient(135deg, #393733 0%, #afa597 100%);
            color: white;
        }

        .payment-icon {
            margin-bottom: 1rem;
        }

        .payment-icon img {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .payment-option:hover .payment-icon img {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .payment-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .payment-option.selected .payment-name {
            color: white;
        }

        .qr-container {
            display: flex;
            justify-content: center;
            align-items: center;
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
    <!-- Navigation -->
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

                <div class="navbar-icons d-flex align-items-center">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="booking-container">
            <!-- Header -->
            <div class="booking-header">
                <h1><i class="fas fa-ticket-alt"></i> Booking Your Ticket</h1>
                <p>Museum 10 Nopember - Surabaya</p>
            </div>

            <div class="booking-content">
                <!-- Hardcoded test -->
                <a href="/museum/east-java/museum-10-nopember" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Back to Museum Details
                </a>

                <form id="bookingForm" method="POST" action="{{ route('museums.booking.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="museum" value="{{ $slug ?? 'museum-10-nopember' }}">
                    <input type="hidden" name="province" value="{{ $province ?? 'east-java' }}">
                    <input type="hidden" name="slug" value="{{ $slug ?? 'museum-10-nopember' }}">

                    <!-- Ticket Selection -->
                    <div class="ticket-section">
                        <h2 class="section-title">
                            <i class="fas fa-tags"></i>
                            Select Ticket Type
                        </h2>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ticket-card" onclick="selectTicket('general')">
                                    <input type="radio" name="ticket_type" value="general" id="general">
                                    <div class="ticket-type">General Ticket</div>
                                    <div class="ticket-includes">
                                        <strong>Includes:</strong>
                                        <ul>
                                            <li><i class="fas fa-check"></i> 1 Adult entry</li>
                                            <li><i class="fas fa-check"></i> Free brochure / map</li>
                                            <li><i class="fas fa-check"></i> Access to all general areas</li>
                                        </ul>
                                    </div>
                                    <div class="ticket-price">Rp 15.000 / person</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="ticket-card" onclick="selectTicket('student')">
                                    <input type="radio" name="ticket_type" value="student" id="student">
                                    <div class="ticket-type">Student Ticket</div>
                                    <div class="ticket-includes">
                                        <strong>Includes:</strong>
                                        <ul>
                                            <li><i class="fas fa-check"></i> 1 Student entry</li>
                                            <li><i class="fas fa-check"></i> Free brochure / map</li>
                                            <li><i class="fas fa-check"></i> Access to all general areas</li>
                                        </ul>
                                    </div>
                                    <div class="ticket-price">Rp 10.000 / person</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visitor Details -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-user"></i>
                            Visitor Details
                        </h2>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" name="full_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3" id="studentIdSection" style="display: none;">
                                <label class="form-label">Student ID *</label>
                                <div class="file-upload" onclick="document.getElementById('student_id').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div id="uploadText">Upload your student ID photo</div>
                                    <small>Max: 10MB (JPG, PNG, PDF)</small>
                                    <input type="file" id="student_id" name="student_id" accept=".jpg,.jpeg,.png,.pdf" style="display: none;" required>
                                </div>
                                <div id="fileStatus" class="mt-2 text-success" style="display: none;">
                                    <i class="fas fa-check-circle"></i>
                                    <span id="fileName"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visit Date -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-calendar"></i>
                            Visit Date
                        </h2>

                        <div class="calendar-container">
                            <div class="calendar-header">
                                <button type="button" class="calendar-nav" onclick="previousMonth()">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <div class="calendar-month" id="currentMonth">July 2025</div>
                                <button type="button" class="calendar-nav" onclick="nextMonth()">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Calendar days will be generated by JavaScript -->
                            </div>
                            <input type="hidden" name="visit_date" id="selectedDate">
                        </div>
                    </div>

                    <!-- Available Time Slots -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <i class="fas fa-clock"></i>
                            Available Time Slots
                        </h2>

                        <div class="time-slots">
                            <div class="time-slot" onclick="selectTimeSlot('slot1')">
                                <input type="radio" name="time_slot" value="09:00-10:50" id="slot1">
                                <div class="time-slot-time">09:00 - 10:50</div>
                                <div class="time-slot-status text-success">Available</div>
                            </div>

                            <div class="time-slot" onclick="selectTimeSlot('slot2')">
                                <input type="radio" name="time_slot" value="13:00-14:50" id="slot2">
                                <div class="time-slot-time">13:00 - 14:50</div>
                                <div class="time-slot-status text-success">Available</div>
                            </div>

                            <div class="time-slot" onclick="selectTimeSlot('slot3')">
                                <input type="radio" name="time_slot" value="15:00-16:30" id="slot3">
                                <div class="time-slot-time">15:00 - 16:30</div>
                                <div class="time-slot-status text-success">Available</div>
                            </div>
                        </div>
                    </div>

                    <!-- Promo Code -->
                    <div class="promo-section">
                        <h3><i class="fas fa-percentage"></i> Promo Code</h3>
                        <p>Have a promo code? Enter it here to get a discount!</p>
                        <div class="promo-input">
                            <input type="text" name="promo_code" placeholder="Enter promo code">
                            <button type="button" class="btn promo-btn" onclick="applyPromo()">Apply</button>
                        </div>
                    </div>

                    <!-- Booking Summary -->
                    <div class="booking-summary">
                        <h3><i class="fas fa-receipt"></i> Booking Summary</h3>
                        <div class="summary-row">
                            <span>Ticket Type:</span>
                            <span id="summaryTicketType">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Visit Date:</span>
                            <span id="summaryDate">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Time Slot:</span>
                            <span id="summaryTimeSlot">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span id="summarySubtotal">Rp 0</span>
                        </div>
                        <div class="summary-row" id="discountRow" style="display: none;">
                            <span>Discount:</span>
                            <span id="summaryDiscount" class="text-success">- Rp 0</span>
                        </div>
                        <div class="summary-row summary-total">
                            <span>Total:</span>
                            <span id="summaryTotal">Rp 0</span>
                        </div>
                    </div>

                    <!-- Book Button -->
                    <button type="button" class="book-btn" onclick="handleBookingSubmission()">
                        <i class="fas fa-credit-card"></i>
                        Book Now & Pay
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Payment Method Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);">
                <div class="modal-header" style="background: linear-gradient(135deg, #393733 0%, #afa597 100%); color: white; border-radius: 20px 20px 0 0; border: none;">
                    <h5 class="modal-title" id="paymentModalLabel" style="font-weight: 600;">Choose Payment Method</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem;">
                    <!-- Payment Method Selection -->
                    <div id="paymentMethodSelection">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="payment-option" onclick="selectPaymentMethod('dana')" data-method="dana">
                                    <div class="payment-icon">
                                        <img src="/images/payment method/icon-dana.png" alt="DANA" style="width: 60px; height: 60px; object-fit: contain; border-radius: 12px;">
                                    </div>
                                    <div class="payment-name">DANA</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="payment-option" onclick="selectPaymentMethod('gopay')" data-method="gopay">
                                    <div class="payment-icon">
                                        <img src="/images/payment method/icon-gopay.png" alt="GoPay" style="width: 60px; height: 60px; object-fit: contain; border-radius: 12px;">
                                    </div>
                                    <div class="payment-name">GoPay</div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center mt-3 mb-0" style="font-size: 0.85rem; color: #666;">
                            For now payments can only be made by transfer via Dana and GoPay
                        </p>
                    </div>

                    <!-- QR Code Display -->
                    <div id="qrCodeDisplay" style="display: none;">
                        <div class="text-center">
                            <h6 class="mb-3" style="color: #393733; font-weight: 600;">Scan QR Code to Pay</h6>
                            <div class="qr-container" style="background: #f8f9fa; padding: 1.5rem; border-radius: 15px; margin-bottom: 1.5rem;">
                                <img id="qrCodeImage" src="" alt="QR Code" style="width: 200px; height: 200px; border-radius: 10px;">
                            </div>
                            <p style="color: #666; font-size: 0.9rem; margin-bottom: 1.5rem;">
                                Please complete your payment within <strong>15 minutes</strong>
                            </p>
                            <button type="button" class="btn btn-success btn-lg" onclick="confirmPayment()" style="border-radius: 25px; padding: 12px 30px; font-weight: 600;">
                                <i class="fas fa-check-circle me-2"></i>
                                Confirm Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // Debug: Check if jQuery and Bootstrap are loaded
        console.log('Script loading started');
        console.log('jQuery available:', typeof $ !== 'undefined');
        console.log('Bootstrap available:', typeof bootstrap !== 'undefined');

        // Calendar functionality
        let currentDate = new Date();
        let selectedDate = null;
        let selectedTicketType = null;
        let selectedTimeSlot = null;
        let ticketPrices = {
            'general': 15000,    // Seragam dengan database dan API submit
            'student': 10000     // Seragam dengan database dan API submit
        };

        console.log('Global variables initialized:', {
            selectedDate,
            selectedTicketType,
            selectedTimeSlot,
            ticketPrices
        });

        function initCalendar() {
            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        }

        function generateCalendar(year, month) {
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = firstDay.getDay();

            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];

            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;

            const calendarGrid = document.getElementById('calendarGrid');
            calendarGrid.innerHTML = '';

            // Add day headers
            const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            dayHeaders.forEach(day => {
                const dayHeader = document.createElement('div');
                dayHeader.textContent = day;
                dayHeader.style.fontWeight = '600';
                dayHeader.style.textAlign = 'center';
                dayHeader.style.padding = '0.5rem';
                dayHeader.style.color = '#666';
                calendarGrid.appendChild(dayHeader);
            });

            // Add empty cells for days before the first day of the month
            for (let i = 0; i < startingDayOfWeek; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day other-month';
                calendarGrid.appendChild(emptyDay);
            }

            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;
                dayElement.onclick = () => selectDate(year, month, day);

                // Disable past dates
                const today = new Date();
                const currentDay = new Date(year, month, day);
                if (currentDay < today.setHours(0, 0, 0, 0)) {
                    dayElement.classList.add('disabled');
                    dayElement.onclick = null;
                }

                calendarGrid.appendChild(dayElement);
            }
        }

        function selectDate(year, month, day) {
            // Remove previous selection
            document.querySelectorAll('.calendar-day.selected').forEach(el => {
                el.classList.remove('selected');
            });

            // Add selection to clicked day
            event.target.classList.add('selected');

            selectedDate = new Date(year, month, day);
            const formattedDate = selectedDate.toLocaleDateString('en-GB');
            document.getElementById('selectedDate').value = formattedDate;
            document.getElementById('summaryDate').textContent = formattedDate;
        }

        function previousMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        }

        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        }

        function selectTicket(type) {
            console.log('selectTicket called with type:', type);

            // Remove previous selections
            document.querySelectorAll('.ticket-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Add selection to clicked card
            event.currentTarget.classList.add('selected');
            document.getElementById(type).checked = true;

            selectedTicketType = type;
            console.log('selectedTicketType set to:', selectedTicketType);

            // Show/hide student ID section
            const studentIdSection = document.getElementById('studentIdSection');
            if (type === 'student') {
                studentIdSection.style.display = 'block';
                console.log('Student ID section shown');
            } else {
                studentIdSection.style.display = 'none';
                console.log('Student ID section hidden');
            }

            // Update summary
            const ticketTypeText = type === 'general' ? 'General Ticket' : 'Student Ticket';
            document.getElementById('summaryTicketType').textContent = ticketTypeText;
            updateTotal();
        }

        function selectTimeSlot(slotId) {
            if (event.currentTarget.classList.contains('full')) return;

            // Remove previous selections
            document.querySelectorAll('.time-slot').forEach(slot => {
                slot.classList.remove('selected');
            });

            // Add selection to clicked slot
            event.currentTarget.classList.add('selected');
            document.getElementById(slotId).checked = true;

            selectedTimeSlot = document.getElementById(slotId).value;
            document.getElementById('summaryTimeSlot').textContent = selectedTimeSlot;
        }

        function updateTotal() {
            if (!selectedTicketType) return;

            const price = ticketPrices[selectedTicketType];
            document.getElementById('summarySubtotal').textContent = `Rp ${price.toLocaleString()}`;
            document.getElementById('summaryTotal').textContent = `Rp ${price.toLocaleString()}`;
        }

        function applyPromo() {
            const promoCode = document.querySelector('input[name="promo_code"]').value.trim();

            if (promoCode.toLowerCase() === 'student10') {
                const discountAmount = Math.floor(ticketPrices[selectedTicketType] * 0.1);
                const newTotal = ticketPrices[selectedTicketType] - discountAmount;

                document.getElementById('discountRow').style.display = 'flex';
                document.getElementById('summaryDiscount').textContent = `- Rp ${discountAmount.toLocaleString()}`;
                document.getElementById('summaryTotal').textContent = `Rp ${newTotal.toLocaleString()}`;

                alert('Promo code applied! 10% discount for students.');
            } else if (promoCode.toLowerCase() === 'welcome20') {
                const discountAmount = Math.floor(ticketPrices[selectedTicketType] * 0.2);
                const newTotal = ticketPrices[selectedTicketType] - discountAmount;

                document.getElementById('discountRow').style.display = 'flex';
                document.getElementById('summaryDiscount').textContent = `- Rp ${discountAmount.toLocaleString()}`;
                document.getElementById('summaryTotal').textContent = `Rp ${newTotal.toLocaleString()}`;

                alert('Promo code applied! 20% welcome discount.');
            } else if (promoCode) {
                alert('Invalid promo code. Please try again.');
            }
        }

        // File upload handling - removed duplicate event listener

        // Payment method functions
        let selectedPaymentMethod = null;
        const qrCodes = {
            'dana': '/images/qr-codes/dana-qr.jpg',
            'gopay': '/images/qr-codes/gopay-qr.jpg'
        };

        function showPaymentModal() {
            console.log('showPaymentModal() called');
            console.log('Bootstrap object available:', typeof bootstrap !== 'undefined');
            console.log('Bootstrap.Modal available:', typeof bootstrap !== 'undefined' && typeof bootstrap.Modal !== 'undefined');

            const modalElement = document.getElementById('paymentModal');
            console.log('Modal element found:', modalElement);

            if (!modalElement) {
                console.error('Payment modal element not found!');
                alert('Error: Payment modal not found');
                return;
            }

            // Check if bootstrap is loaded
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap is not loaded!');
                alert('Error: Bootstrap is not loaded');
                return;
            }

            try {
                const modal = new bootstrap.Modal(modalElement);
                console.log('Bootstrap modal created:', modal);

                modal.show();
                console.log('Modal.show() called');

                // Reset modal state
                const paymentMethodSelection = document.getElementById('paymentMethodSelection');
                const qrCodeDisplay = document.getElementById('qrCodeDisplay');

                console.log('paymentMethodSelection element:', paymentMethodSelection);
                console.log('qrCodeDisplay element:', qrCodeDisplay);

                if (paymentMethodSelection) paymentMethodSelection.style.display = 'block';
                if (qrCodeDisplay) qrCodeDisplay.style.display = 'none';

                selectedPaymentMethod = null;

                // Reset payment options
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });

                console.log('Payment modal setup completed');
            } catch (error) {
                console.error('Error showing payment modal:', error);
                alert('Error showing payment modal: ' + error.message);
            }
        }

        function selectPaymentMethod(method) {
            selectedPaymentMethod = method;

            // Update UI to show selected method
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            document.querySelector(`[data-method="${method}"]`).classList.add('selected');

            // Show QR code after a short delay for better UX
            setTimeout(() => {
                showQRCode(method);
            }, 500);
        }

        function showQRCode(method) {
            document.getElementById('paymentMethodSelection').style.display = 'none';
            document.getElementById('qrCodeDisplay').style.display = 'block';

            // Set QR code image
            const qrImage = document.getElementById('qrCodeImage');
            qrImage.src = qrCodes[method];
            qrImage.alt = `${method.toUpperCase()} QR Code`;
        }        async function confirmPayment() {
            if (!selectedPaymentMethod) {
                alert('Please select a payment method first');
                return;
            }

            try {
                // Get auth token for API call
                const token = localStorage.getItem('auth_token');

                // Calculate total price using consistent pricing
                const ticketPrice = selectedTicketType === 'general' ? ticketPrices.general : ticketPrices.student;
                const quantity = parseInt(document.querySelector('input[name="quantity"]')?.value || '1');
                const totalPrice = ticketPrice * quantity;

                // Prepare booking data for API submission
                const bookingData = {
                    museum_name: 'Museum 10 Nopember',
                    ticket_type: selectedTicketType,
                    quantity: quantity,
                    total_price: totalPrice,
                    visit_date: selectedDate,
                    time_slot: selectedTimeSlot,
                    visitor_name: document.querySelector('input[name="full_name"]').value,
                    visitor_email: document.querySelector('input[name="email"]').value,
                    visitor_phone: document.querySelector('input[name="phone"]').value,
                    payment_method: selectedPaymentMethod
                };

                console.log('Submitting booking data:', bookingData); // Debug log
                console.log('Time slot being sent:', bookingData.time_slot); // Extra debug for time slot

                // Alert for debugging
                alert('About to submit booking with time slot: ' + bookingData.time_slot);

                // Submit to API
                const response = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`,
                    },
                    body: JSON.stringify(bookingData)
                });

                console.log('Booking response status:', response.status); // Debug log
                const responseData = await response.json();
                console.log('Booking response data:', responseData); // Debug log

                if (response.ok) {
                    // Close modal
                    bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();

                    // Show success message
                    alert('Payment confirmed successfully! Redirecting to your tickets...');

                    // Redirect to my tickets page
                    window.location.href = '/my-tickets';
                } else {
                    alert('Payment failed: ' + (responseData.message || 'Unknown error occurred'));
                }
            } catch (error) {
                console.error('Error confirming payment:', error);
                alert('An error occurred while processing your payment. Please try again.');
            }
        }

        // Navbar dynamic content
        function loadNavbar() {
            const token = localStorage.getItem('auth_token');
            const user = JSON.parse(localStorage.getItem('user') || 'null');
            const navbarButtons = document.querySelector('.navbar-icons');

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
            loadNavbar();
            location.reload();
        }

        // Initialize calendar when page loads
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');
            console.log('jQuery available after DOM load:', typeof $ !== 'undefined');
            console.log('Bootstrap available after DOM load:', typeof bootstrap !== 'undefined');

            initCalendar();
            loadNavbar();            // Add event listener for student ID file input
            const studentIdInput = document.getElementById('student_id');
            if (studentIdInput) {
                studentIdInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const uploadText = document.getElementById('uploadText');
                    const fileStatus = document.getElementById('fileStatus');
                    const fileName = document.getElementById('fileName');

                    if (file) {
                        // Check file size (max 10MB)
                        const fileSize = file.size / 1024 / 1024; // Size in MB
                        if (fileSize > 10) {
                            alert('File size must be less than 10MB');
                            e.target.value = '';
                            uploadText.textContent = 'Upload your student ID photo';
                            fileStatus.style.display = 'none';
                            return;
                        }

                        uploadText.textContent = 'File selected';
                        fileName.textContent = file.name;
                        fileStatus.style.display = 'block';
                        console.log('Student ID file selected:', file.name);
                    } else {
                        uploadText.textContent = 'Upload your student ID photo';
                        fileStatus.style.display = 'none';
                        console.log('Student ID file cleared');
                    }
                });
            }

            // Ensure form exists before adding event listener
            const bookingForm = document.getElementById('bookingForm');
            console.log('Booking form found:', bookingForm);

            if (!bookingForm) {
                console.error('Booking form not found!');
                return;
            }

            // Setup form submission event listener
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Form submission started');

                // Check if user is logged in first
                const token = localStorage.getItem('auth_token');
                if (!token) {
                    alert('Please login first to book a ticket');
                    window.location.href = '/login?redirect=' + encodeURIComponent(window.location.pathname);
                    return;
                }
                console.log('User is logged in');

                if (!selectedTicketType) {
                    alert('Please select a ticket type');
                    return;
                }
                console.log('Selected ticket type:', selectedTicketType);

                if (!selectedDate) {
                    alert('Please select a visit date');
                    return;
                }
                console.log('Selected date:', selectedDate);

                if (!selectedTimeSlot) {
                    alert('Please select a time slot');
                    return;
                }
                console.log('Selected time slot:', selectedTimeSlot);

                const fullName = document.querySelector('input[name="full_name"]').value.trim();
                const email = document.querySelector('input[name="email"]').value.trim();
                const phone = document.querySelector('input[name="phone"]').value.trim();

                console.log('Form data:', { fullName, email, phone });

                if (!fullName || !email || !phone) {
                    alert('Please fill in all required fields');
                    return;
                }

                if (selectedTicketType === 'student') {
                    const studentIdInput = document.getElementById('student_id');
                    const studentId = studentIdInput.files[0];
                    console.log('Student ID input element:', studentIdInput);
                    console.log('Student ID file:', studentId);
                    console.log('Student ID files length:', studentIdInput.files.length);

                    // Temporarily make student ID optional for testing
                    if (!studentId) {
                        const proceed = confirm('Student ID is required for student tickets. Do you want to proceed without uploading it? (For testing purposes only)');
                        if (!proceed) {
                            document.getElementById('studentIdSection').scrollIntoView({ behavior: 'smooth' });
                            return;
                        }
                    }
                    console.log('Student ID validation passed (or skipped)');
                }

                console.log('All validations passed, showing payment modal');
                // If all validations pass, show payment modal
                showPaymentModal();
            });
        });

        function handleBookingSubmission() {
            console.log('=== HANDLE BOOKING SUBMISSION ===');
            console.log('Function called directly from onclick');

            // Check if user is logged in first
            const token = localStorage.getItem('auth_token');
            if (!token) {
                alert('Please login first to book a ticket');
                window.location.href = '/login?redirect=' + encodeURIComponent(window.location.pathname);
                return;
            }
            console.log('User is logged in');

            if (!selectedTicketType) {
                alert('Please select a ticket type');
                return;
            }
            console.log('Selected ticket type:', selectedTicketType);

            if (!selectedDate) {
                alert('Please select a visit date');
                return;
            }
            console.log('Selected date:', selectedDate);

            if (!selectedTimeSlot) {
                alert('Please select a time slot');
                return;
            }
            console.log('Selected time slot:', selectedTimeSlot);

            const fullName = document.querySelector('input[name="full_name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const phone = document.querySelector('input[name="phone"]').value.trim();

            console.log('Form data:', { fullName, email, phone });

            if (!fullName || !email || !phone) {
                alert('Please fill in all required fields');
                return;
            }

            if (selectedTicketType === 'student') {
                const studentIdInput = document.getElementById('student_id');
                console.log('Student ID input element:', studentIdInput);
                console.log('Student ID input exists:', !!studentIdInput);
                console.log('Student ID files array:', studentIdInput ? studentIdInput.files : 'No input element');
                console.log('Student ID files length:', studentIdInput ? studentIdInput.files.length : 'No input element');

                const studentId = studentIdInput && studentIdInput.files.length > 0 ? studentIdInput.files[0] : null;
                console.log('Student ID file:', studentId);
                console.log('Student ID file name:', studentId ? studentId.name : 'No file selected');

                if (!studentId) {
                    alert('Student ID is required for student tickets. Please upload your student ID.');
                    if (document.getElementById('studentIdSection')) {
                        document.getElementById('studentIdSection').scrollIntoView({ behavior: 'smooth' });
                    }
                    return;
                }
                console.log('Student ID validation passed - File:', studentId.name);
            }

            console.log('All validations passed, showing payment modal');
            // If all validations pass, show payment modal
            showPaymentModal();
        }
    </script>
</body>
</html>
