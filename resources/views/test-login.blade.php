<!DOCTYPE html>
<html>
<head>
    <title>Test Login Fix</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Test Login Error Messages</h2>

    <form id="testForm">
        <div>
            <label>Email:</label>
            <input type="email" id="email" value="nonexistent@test.com" />
            <div style="color: red;" id="emailError"></div>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" id="password" value="123" />
            <div style="color: red;" id="passwordError"></div>
        </div>

        <button type="submit">Test Login</button>
    </form>

    <div id="result" style="margin-top: 20px; padding: 10px; border: 1px solid #ddd;"></div>

    <script>
        document.getElementById('testForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const resultDiv = document.getElementById('result');

            // Clear previous errors
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (response.ok) {
                    resultDiv.innerHTML = '<div style="color: green;">✅ Login successful!</div>';
                } else {
                    resultDiv.innerHTML = '<div style="color: red;">❌ Login failed</div>';

                    if (data.errors) {
                        if (data.errors.email) {
                            document.getElementById('emailError').textContent = data.errors.email[0];
                        }
                        if (data.errors.password) {
                            document.getElementById('passwordError').textContent = data.errors.password[0];
                        }
                    }

                    console.log('Error details:', data);
                }
            } catch (error) {
                resultDiv.innerHTML = '<div style="color: red;">Network error: ' + error.message + '</div>';
            }
        });
    </script>
</body>
</html>
