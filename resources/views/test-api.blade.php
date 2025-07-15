<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        button { padding: 10px 20px; margin: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .output { background: #f8f9fa; padding: 15px; margin: 10px 0; border: 1px solid #ddd; }
        input { padding: 8px; margin: 5px; width: 200px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>API Test Page</h1>

        <div>
            <h3>1. Test Database</h3>
            <button onclick="testDatabase()">Test Database Connection</button>
            <div id="dbResult" class="output"></div>
        </div>

        <div>
            <h3>2. Register User</h3>
            <input type="text" id="regName" placeholder="Name" value="Test User">
            <input type="email" id="regEmail" placeholder="Email" value="test@example.com">
            <input type="password" id="regPassword" placeholder="Password" value="password123">
            <button onclick="registerUser()">Register</button>
            <div id="regResult" class="output"></div>
        </div>

        <div>
            <h3>3. Login User</h3>
            <input type="email" id="loginEmail" placeholder="Email" value="test@example.com">
            <input type="password" id="loginPassword" placeholder="Password" value="password123">
            <button onclick="loginUser()">Login</button>
            <div id="loginResult" class="output"></div>
        </div>

        <div>
            <h3>4. Test Authentication</h3>
            <button onclick="testAuth()">Test Auth</button>
            <div id="authResult" class="output"></div>
        </div>

        <div>
            <h3>5. Create Booking</h3>
            <button onclick="createBooking()">Create Test Booking</button>
            <div id="bookingResult" class="output"></div>
        </div>

        <div>
            <h3>6. Get My Purchases</h3>
            <button onclick="getPurchases()">Get My Purchases</button>
            <div id="purchaseResult" class="output"></div>
        </div>
    </div>

    <script>
        let authToken = null;

        async function testDatabase() {
            try {
                const response = await fetch('/api/test-db');
                const data = await response.json();
                document.getElementById('dbResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('dbResult').innerHTML = 'Error: ' + error.message;
            }
        }

        async function registerUser() {
            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: document.getElementById('regName').value,
                        email: document.getElementById('regEmail').value,
                        password: document.getElementById('regPassword').value,
                        password_confirmation: document.getElementById('regPassword').value
                    })
                });
                const data = await response.json();
                document.getElementById('regResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('regResult').innerHTML = 'Error: ' + error.message;
            }
        }

        async function loginUser() {
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: document.getElementById('loginEmail').value,
                        password: document.getElementById('loginPassword').value
                    })
                });
                const data = await response.json();

                if (data.access_token) {
                    authToken = data.access_token;
                    localStorage.setItem('auth_token', authToken);
                }

                document.getElementById('loginResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('loginResult').innerHTML = 'Error: ' + error.message;
            }
        }

        async function testAuth() {
            try {
                const token = authToken || localStorage.getItem('auth_token');
                const response = await fetch('/api/test-auth', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                document.getElementById('authResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('authResult').innerHTML = 'Error: ' + error.message;
            }
        }

        async function createBooking() {
            try {
                const token = authToken || localStorage.getItem('auth_token');
                const response = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        museum_name: 'Museum Test',
                        ticket_type: 'Dewasa',
                        quantity: 2,
                        total_price: 30000,
                        visit_date: '2025-07-20',
                        visitor_name: 'Test User',
                        visitor_phone: '08123456789',
                        visitor_email: 'test@example.com',
                        payment_method: 'Dana'
                    })
                });
                const data = await response.json();
                document.getElementById('bookingResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('bookingResult').innerHTML = 'Error: ' + error.message;
            }
        }

        async function getPurchases() {
            try {
                const token = authToken || localStorage.getItem('auth_token');
                const response = await fetch('/api/purchases', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                document.getElementById('purchaseResult').innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
            } catch (error) {
                document.getElementById('purchaseResult').innerHTML = 'Error: ' + error.message;
            }
        }

        // Auto-load token on page load
        window.onload = function() {
            const token = localStorage.getItem('auth_token');
            if (token) {
                authToken = token;
                console.log('Loaded auth token from localStorage');
            }
        };
    </script>
</body>
</html>
