<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to {{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/login.css')) !!}

        /* Error message styling */
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: none;
            text-align: left;
            padding-left: 5px;
        }

        .name-box, .email-box, .pass-box {
            position: relative;
            margin-bottom: 15px;
        }

        .name-box input, .email-box input, .pass-box input {
            width: 100%;
            margin-bottom: 5px;
        }

        /* Password Toggle Styles */
        .password-input-container, .input-container {
            position: relative;
            width: 100%;
        }

        .password-input-container input, .input-container input {
            width: 100%;
            padding-right: 15px; /* Consistent padding */
        }

        .password-input-container input {
            padding-right: 45px; /* Extra space for the eye icon */
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 16px;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .password-toggle:hover {
            color: #393733;
        }

        .password-toggle i {
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="registerForm">
                <h1>CREATE ACCOUNT</h1>

                <div class="name-box">
                    <div class="input-container">
                        <input type="text" id="registerName" placeholder="Username" required>
                    </div>
                    <div class="error-message" id="registerNameError"></div>
                </div>

                <div class="email-box">
                    <div class="input-container">
                        <input type="email" id="registerEmail" placeholder="Email" required title="Please include '@' in the email address">
                    </div>
                    <div class="error-message" id="registerEmailError"></div>
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input type="password" id="registerPassword" placeholder="Password" required minlength="8" title="Password must be at least 8 characters long">
                        <span class="password-toggle" onclick="togglePassword('registerPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="error-message" id="registerPasswordError"></div>
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input
                            type="password"
                            id="registerPasswordConfirm"
                            placeholder="Confirm Password"
                            required
                            title="Please confirm your password"
                        >
                        <span class="password-toggle" onclick="togglePassword('registerPasswordConfirm', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="error-message" id="registerPasswordConfirmError"></div>
                </div>

                <div class="btn-sign">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>

        <div class="form-container login">
            <form id="loginForm">
                <h1>LOGIN</h1>

                <div class="name-box">
                    <div class="input-container">
                        <input
                            type="email"
                            id="loginEmail"
                            placeholder="Email"
                            required
                            title="Please enter a valid email address"
                        >
                    </div>
                    <div class="error-message" id="loginEmailError"></div>
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input
                            type="password"
                            id="loginPassword"
                            placeholder="Password"
                            required
                            title="Please enter your password"
                        >
                        <span class="password-toggle" onclick="togglePassword('loginPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="error-message" id="loginPasswordError"></div>
                </div>

                <!-- Email not registered error message -->
                <div class="error-message" id="emailNotRegisteredError" style="display: none; margin-bottom: 1rem; color: #dc3545; font-size: 14px; text-align: center;">
                    Your email is not registered, please register first, you can press the sign up button
                </div>

                <div class="btn-sign">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome!</h1>
                    <p>Enter your personal details to use all of the features</p>
                    <button class="hidden" id="login">Login</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Holla, Amigo!</h1>
                    <p>Register with your personal details to use all of the features</p>
                    <button class="hidden" id="sign">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('sign');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
            clearErrors();
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
            clearErrors();
        });

        // Form Handlers
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            clearErrors();

            console.log('Login form submitted'); // Debug log

            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            // Client-side validation for login
            // Email validation
            if (!email.includes('@')) {
                showError('loginEmailError', "Please include '@' in the email address");
                return;
            }

            // Basic email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('loginEmailError', 'Please enter a valid email address');
                return;
            }

            console.log('Login credentials:', { email, password: '***' }); // Debug log

            try {
                console.log('Sending login request...'); // Debug log
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });

                console.log('Login response status:', response.status); // Debug log
                const data = await response.json();
                console.log('Login response data:', data); // Debug log

                if (response.ok) {
                    console.log('Login successful!'); // Debug log
                    // Save auth data
                    localStorage.setItem('auth_token', data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.user));

                    // Check for redirect parameter
                    const urlParams = new URLSearchParams(window.location.search);
                    const redirect = urlParams.get('redirect');

                    console.log('Redirect parameter:', redirect); // Debug log

                    // Redirect to specified page or home
                    const redirectUrl = redirect || '/';
                    console.log('Redirecting to:', redirectUrl); // Debug log
                    window.location.href = redirectUrl;
                } else {
                    console.log('Login failed:', data); // Debug log

                    // Clear any previous error messages
                    clearErrors();

                    // Handle specific field errors from validation
                    if (data.errors) {
                        // Handle email field error (email not found)
                        if (data.errors.email) {
                            showError('emailNotRegisteredError', 'Your email is not registered, please register first, you can press the sign up button');
                        }
                        // Handle password field error (incorrect password)
                        if (data.errors.password) {
                            showError('loginPasswordError', 'Password is incorrect. Please check your password.');
                        }
                        // Handle other validation errors
                        showFieldErrors(data.errors);
                    } else {
                        // Fallback for unexpected errors
                        showError('loginEmailError', data.message || 'Login failed!');
                    }
                }
            } catch (error) {
                console.error('Login error:', error); // Debug log
                showError('loginEmailError', 'Terjadi kesalahan jaringan!');
            }
        });

        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            clearErrors();

            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const passwordConfirm = document.getElementById('registerPasswordConfirm').value;

            // Client-side validation
            // Email validation
            if (!email.includes('@')) {
                showError('registerEmailError', "Please include '@' in the email address");
                return;
            }

            // Basic email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('registerEmailError', 'Please enter a valid email address');
                return;
            }

            // Password validation
            if (password.length < 8) {
                showError('registerPasswordError', 'Password must be at least 8 characters long');
                return;
            }

            if (password !== passwordConfirm) {
                showError('registerPasswordConfirmError', 'Password confirmation does not match!');
                return;
            }

            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name,
                        email,
                        password,
                        password_confirmation: passwordConfirm
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    // Save auth data
                    localStorage.setItem('auth_token', data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.user));

                    // Check for redirect parameter
                    const urlParams = new URLSearchParams(window.location.search);
                    const redirect = urlParams.get('redirect');

                    // Redirect to specified page or home
                    window.location.href = redirect || '/';
                } else {
                    if (data.errors) {
                        showFieldErrors(data.errors);
                    } else {
                        showError('registerNameError', data.message || 'Registrasi gagal!');
                    }
                }
            } catch (error) {
                showError('registerNameError', 'Terjadi kesalahan jaringan!');
                console.error('Register error:', error);
            }
        });

        function showFieldErrors(errors) {
            Object.keys(errors).forEach(field => {
                const errorElement = document.getElementById(field + 'Error') ||
                                   document.getElementById('register' + field.charAt(0).toUpperCase() + field.slice(1) + 'Error') ||
                                   document.getElementById('login' + field.charAt(0).toUpperCase() + field.slice(1) + 'Error');
                if (errorElement) {
                    errorElement.textContent = errors[field][0];
                    errorElement.style.display = 'block';
                }
            });
        }

        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(element => {
                element.textContent = '';
                element.style.display = 'none';
            });
        }

        // Password toggle function
        function togglePassword(inputId, toggleIcon) {
            const passwordInput = document.getElementById(inputId);
            const icon = toggleIcon.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Add custom validation to prevent browser default messages
        document.addEventListener('DOMContentLoaded', function() {
            const registerPasswordInput = document.getElementById('registerPassword');
            const registerEmailInput = document.getElementById('registerEmail');
            const loginEmailInput = document.getElementById('loginEmail');

            // Register Email validation
            registerEmailInput.addEventListener('invalid', function(e) {
                e.preventDefault();
                const emailValue = this.value;

                if (!emailValue.includes('@')) {
                    showError('registerEmailError', "Please include '@' in the email address");
                } else if (!this.checkValidity()) {
                    showError('registerEmailError', 'Please enter a valid email address');
                }
            });

            // Clear register email error when user starts typing
            registerEmailInput.addEventListener('input', function() {
                const errorElement = document.getElementById('registerEmailError');
                if (errorElement && this.value.includes('@') && this.checkValidity()) {
                    errorElement.style.display = 'none';
                }
            });

            // Login Email validation
            loginEmailInput.addEventListener('invalid', function(e) {
                e.preventDefault();
                const emailValue = this.value;

                if (!emailValue.includes('@')) {
                    showError('loginEmailError', "Please include '@' in the email address");
                } else if (!this.checkValidity()) {
                    showError('loginEmailError', 'Please enter a valid email address');
                }
            });

            // Clear login email error when user starts typing
            loginEmailInput.addEventListener('input', function() {
                const errorElement = document.getElementById('loginEmailError');
                if (errorElement && this.value.includes('@') && this.checkValidity()) {
                    errorElement.style.display = 'none';
                }
            });

            // Password validation - Remove default validation to use custom messages
            registerPasswordInput.addEventListener('invalid', function(e) {
                e.preventDefault();
                if (this.value.length < 8) {
                    showError('registerPasswordError', 'Password must be at least 8 characters long');
                }
            });

            // Clear password error when user starts typing
            registerPasswordInput.addEventListener('input', function() {
                const errorElement = document.getElementById('registerPasswordError');
                if (errorElement && this.value.length >= 8) {
                    errorElement.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
