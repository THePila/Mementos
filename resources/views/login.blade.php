@extends('layout.app')
@push('styles')
    <link rel="stylesheet" href="/dist/css/login.css">
@endpush
@section('content')
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please enter your credentials to login</p>
        </div>
        
        <form class="login-form">
            <div class="form-group">
                <label for="email">Email or Username</label>
                <input type="text" id="email" placeholder="Enter your email or username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
                <span class="password-toggle" onclick="togglePassword()">Show</span>
            </div>

            <div class="form-checkbox">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="login-button">Login</button>

            <div class="login-links">
                <a href="#">Forgot Password?</a>
                <a href="{{route("register")}}">Create Account</a>
            </div>

            <div class="divider">OR</div>

            <div class="social-login">
                <div class="social-button">G</div>
                <div class="social-button">f</div>
                <div class="social-button">in</div>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.querySelector('.password-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                passwordToggle.textContent = 'Show';
            }
        }
    </script>
@endsection
