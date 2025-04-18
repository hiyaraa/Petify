<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Petify - Login</title>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Special+Gothic&display&family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="background">

    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>

    <h2>Petify</h2>

    <div class="container" id="container">
        {{-- Sign Up Form --}}
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 style="margin-top: 40px">Sign up</h1>
                <div class="social-container">
                    {{-- Add social icons if needed --}}
                </div>
                <span>Create a Petify account</span>
                <input type="text" name="firstname" placeholder="First Name" required />
                <input type="text" name="lastname" placeholder="Last Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <!-- <input type="password" name="password" id="signup-password" placeholder="Password" minlength="8" required /> -->
                <div class="password-wrapper">
                    <input id="register-password" type="password" name="password" placeholder="Password" minlength="8" required />
                    <span class="toggle-password" onclick="togglePassword('register-password', this)">
                        Show
                    </span>
                </div>

                <button style="margin-bottom: 20px" type="submit">Create account</button>
            </form>
        </div>

        {{-- Sign In Form --}}
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 style="margin-top: 20px">Welcome</h1>

                <div class="social-container">
                    {{-- Add social icons if needed --}}
                </div>

                {{-- an imo ginpapa-ayos an placement ate jane --}}
                @if ($errors->has('email'))
                    <span style="color: red; font-size: 0.9rem;">
                        {{ $errors->first('email') }}
                    </span>
                @else
                    <span>Login to Petify</span>
                @endif

                <input type="email" name="email" placeholder="Email address" required />

                <!-- <input type="password" name="password" placeholder="Password" minlength="8" required /> -->
                <div class="password-wrapper">
                    <input id="login-password" type="password" name="password" placeholder="Password" minlength="8" required />
                    <span class="toggle-password" onclick="togglePassword('login-password', this)">
                        Show
                    </span>
                </div>

                <a href="#">Forgot your password?</a>
                <button type="submit">Login</button>
            </form>
        </div>



        {{-- Overlay Panel --}}
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img style="max-width: 55%; padding-bottom: 40px; padding-top: 40px" src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExdXh1anpnMjdmdWlnZDcxd2dtZmx6aHg1bHpjejM2M2RmODJ2dWhzMSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/AM0vh25MfVxTgL8UeR/giphy.gif"></img>
                    <h1>Welcome Back!</h1>
                    <p>To stay connected with us, please log in using your personal information.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="https://i.pinimg.com/originals/18/f5/66/18f566fa5cf046c1e81fc6c61ce5dc53.gif"></img>
                    <h1>Oh, Fur Parent!</h1>
                    <p>Provide your personal information and begin your journey with us.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <p style="margin-top: 50px">Made with 🩷 by Swifties</p>

	<script src="{{ asset('js/login.js') }}"></script>

    <script>
        function togglePassword(inputId, toggleIcon) {
            const input = document.getElementById(inputId);
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            toggleIcon.textContent = isPassword ? 'Hide' : 'Show';
        }
    </script>

    @if (session('registered'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "Account Created!",
            text: "You can now log in.",
            icon: "success",
            customClass: {
                popup: 'swal2-popup'
            }
        });
    </script>
    @endif

    @if ($errors->has('emailExists'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('container').classList.add('right-panel-active');
        Swal.fire({
            icon: 'error',
            title: 'Registration Error!',
            text: '{{ $errors->first('emailExists') }}',
            confirmButtonColor: '#d33',
        });
    </script>
    @endif
</body>
</html>
