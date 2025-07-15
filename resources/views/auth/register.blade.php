<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to {{ config('app.name', 'Kiroft Museum') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        {!! file_get_contents(resource_path('css/login.css')) !!}

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
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <h1>CREATE ACCOUNT</h1>

                <div class="name-box">
                    <div class="input-container">
                        <input type="text" name="name" placeholder="Username" required value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="email-box">
                    <div class="input-container">
                        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input type="password" id="registerPassword" name="password" placeholder="Password" required>
                        <span class="password-toggle" onclick="togglePassword('registerPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                        <span class="password-toggle" onclick="togglePassword('confirmPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="btn-sign">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>

        <div class="form-container login">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <h1>LOGIN</h1>

                <div class="name-box">
                    <div class="input-container">
                        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pass-box">
                    <div class="password-input-container">
                        <input type="password" id="loginPassword" name="password" placeholder="Password" required>
                        <span class="password-toggle" onclick="togglePassword('loginPassword', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

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
    </script>
</body>

</html>
