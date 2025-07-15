<!DOCTYPE html>
<html>
<head>
    <title>Quick Login Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        button { padding: 10px 20px; margin: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        .output { background: #f8f9fa; padding: 15px; margin: 10px 0; border: 1px solid #ddd; white-space: pre-wrap; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quick Login Test</h1>

        <button onclick="testLogin()">Test Login (test@example.com / password123)</button>
        <button onclick="testCreateBooking()">Test Create Booking</button>
        <button onclick="testAPI()">Test Get Purchases</button>
        <button onclick="redirectToMyTickets()">Go to My Tickets</button>

        <div id="output" class="output">Click buttons to test...</div>
    </div>

    <script>
        function log(message) {
            document.getElementById('output').textContent += new Date().toLocaleTimeString() + ': ' + message + '\n';
        }

        async function testLogin() {
            log('Testing login...');
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: 'test@example.com',
                        password: 'password123'
                    })
                });

                log('Response status: ' + response.status);
                const data = await response.json();
                log('Response data: ' + JSON.stringify(data, null, 2));

                if (data.access_token) {
                    localStorage.setItem('auth_token', data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.user));
                    log('✅ Login successful! Token saved.');
                } else {
                    log('❌ Login failed!');
                }
            } catch (error) {
                log('❌ Error: ' + error.message);
            }
        }

        async function testCreateBooking() {
            const token = localStorage.getItem('auth_token');
            if (!token) {
                log('❌ No token found. Login first.');
                return;
            }

            log('Testing create booking...');
            try {
                const response = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        museum_name: 'Museum Test',
                        ticket_type: 'general',         // Use consistent ticket type
                        quantity: 2,
                        total_price: 30000,            // 15000 * 2 = 30000 (consistent pricing)
                        visit_date: '2025-07-20',
                        visitor_name: 'Test User',
                        visitor_phone: '08123456789',
                        visitor_email: 'test@example.com',
                        payment_method: 'Dana'
                    })
                });

                log('Booking Response status: ' + response.status);
                const data = await response.json();
                log('Booking Response data: ' + JSON.stringify(data, null, 2));

                if (response.ok) {
                    log('✅ Booking created successfully!');
                } else {
                    log('❌ Booking failed!');
                }
            } catch (error) {
                log('❌ Booking Error: ' + error.message);
            }
        }

        async function testAPI() {
            const token = localStorage.getItem('auth_token');
            if (!token) {
                log('❌ No token found. Login first.');
                return;
            }

            log('Testing API with token...');
            try {
                const response = await fetch('/api/purchases', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                log('API Response status: ' + response.status);
                const data = await response.json();
                log('API Response data: ' + JSON.stringify(data, null, 2));
            } catch (error) {
                log('❌ API Error: ' + error.message);
            }
        }

        function redirectToMyTickets() {
            log('Redirecting to My Tickets...');
            window.location.href = '/my-tickets';
        }

        // Show current token status on load
        window.onload = function() {
            const token = localStorage.getItem('auth_token');
            const user = localStorage.getItem('user');

            if (token) {
                log('✅ Auth token found in localStorage');
                if (user) {
                    const userData = JSON.parse(user);
                    log('✅ User data: ' + userData.name + ' (' + userData.email + ')');
                }
            } else {
                log('❌ No auth token found');
            }
        };
    </script>
</body>
</html>
