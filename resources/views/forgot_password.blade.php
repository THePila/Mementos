@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/forgot_password.css') }}">
@endpush
@section('content')
    <!-- Header -->
    <header class="header">
        <div class="logo">Connect<span>Hub</span></div>
        <p class="header-subtitle">Update your password to keep your account secure</p>
    </header>

    <!-- Change Password Container -->
    <div class="change-password-container">
        <!-- Steps Indicator -->
        <div class="steps-indicator">
            <div class="step active">
                <div class="step-number">1</div>
                <div class="step-text">Verify Identity</div>
            </div>
            <div class="step-connector"></div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-text">New Password</div>
            </div>
            {{-- <div class="step-connector"></div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-text">Confirmation</div>
            </div> --}}
        </div>


        <!-- Form State -->
        <div id="formState">
            <div class="form-header">
                <h1 class="form-title">Change Your Password</h1>
                <p class="form-subtitle">
                    Enter your current credentials and choose a new secure password for your account.
                </p>
            </div>

            <form class="change-password-form" id="changePasswordForm" method="POST">
                @csrf
                <!-- Email Input -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name= "email" placeholder="Enter your email address" required>
                    <div class="error-message">Please enter a valid email address</div>
                </div>

                <!-- Old Password Input -->
                <div class="form-group">
                    <label for="oldPassword">Current Password</label>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Enter your current password"
                        required>
                    <span class="password-toggle" onclick="togglePassword('oldPassword', this)">Show</span>
                    <div class="error-message">Please enter your current password</div>
                </div>

                <!-- New Password Input -->
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" id="newPassword" name ="newPassword" placeholder="Enter your new password"
                        required onkeyup="checkPasswordStrength()">
                    <span class="password-toggle" onclick="togglePassword('newPassword', this)">Show</span>
                    <div class="password-strength">
                        <div class="strength-meter" id="strengthMeter"></div>
                    </div>
                    <div class="strength-text" id="strengthText">Password strength</div>
                    <div class="error-message">Password must be at least 8 characters long</div>
                </div>

                <div class="info-box">
                    <span class="info-box-icon">ℹ️</span>
                    <div class="info-box-text">
                        Your new password should be at least 8 characters long and include a mix of letters, numbers,
                        and special characters for better security.
                    </div>
                </div>

                <button type="submit" class="submit-button" id="submitButton">
                    Change Password
                </button>
            </form>
        </div>

        <!-- Success State -->
        <div class="success-state" id="successState">
            <div class="success-icon">✓</div>
            <h2 class="success-title">Password Changed Successfully!</h2>
            <p class="success-message">
                Your password has been updated successfully. You can now use your new password to log in to your
                account.
            </p>
            <div class="info-box">
                <span class="info-box-icon">🔒</span>
                <div class="info-box-text">
                    For your security, you'll be logged out of all other devices. Please log in again with your new
                    password.
                </div>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="security-notice">
            <div class="security-notice-icon">🔒</div>
            <div class="security-notice-text">
                Your password is encrypted and stored securely. We recommend using a unique password that you don't use
                on other websites.
            </div>
        </div>
    </div>

    <!-- Back to Login Link -->
    <div class="form-links">
        <a href="{{ route('login') }}">
            <span>←</span>
            <span>Back to Login</span>
        </a>
    </div>
@endsection
<script>
    // Toggle password visibility
    function togglePassword(inputId, element) {
        const passwordInput = document.getElementById(inputId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            element.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            element.textContent = 'Show';
        }
    }

    // Check password strength
    function checkPasswordStrength() {
        const password = document.getElementById('newPassword').value;
        const meter = document.getElementById('strengthMeter');
        const text = document.getElementById('strengthText');

        // Reset
        meter.style.width = '0%';
        meter.style.backgroundColor = '#2a2a2a';

        if (password.length === 0) {
            text.textContent = 'Password strength';
            text.style.color = '#888888';
            return;
        }

        // Check strength
        let strength = 0;

        // Length check
        if (password.length >= 8) strength += 25;

        // Lowercase check
        if (/[a-z]/.test(password)) strength += 25;

        // Uppercase check
        if (/[A-Z]/.test(password)) strength += 25;

        // Number or special char check
        if (/[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) strength += 25;

        // Update meter
        meter.style.width = strength + '%';

        // Update color and text
        if (strength <= 25) {
            meter.style.backgroundColor = '#e60000';
            text.textContent = 'Weak';
            text.style.color = '#e60000';
        } else if (strength <= 50) {
            meter.style.backgroundColor = '#ff9900';
            text.textContent = 'Fair';
            text.style.color = '#ff9900';
        } else if (strength <= 75) {
            meter.style.backgroundColor = '#ffcc00';
            text.textContent = 'Good';
            text.style.color = '#ffcc00';
        } else {
            meter.style.backgroundColor = '#00cc00';
            text.textContent = 'Strong';
            text.style.color = '#00cc00';
        }
    }

    // Update steps indicator - MANTENER
    function updateStepsIndicator(activeStep) {
        const steps = document.querySelectorAll('.step');

        steps.forEach((step, index) => {
            step.classList.remove('active', 'completed');

            if (index + 1 < activeStep) {
                step.classList.add('completed');
            } else if (index + 1 === activeStep) {
                step.classList.add('active');
            }
        });
    }

    // Form submission handler básico - MANTENER (simplificado)
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto
            $.ajax({
                url: "{{ route('forgot.password') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Mostrar estado de éxito
                    document.getElementById('formState').style.display = 'none';
                    document.getElementById('successState').style.display = 'block';
                    console.log($(this).serialize()),
                        updateStepsIndicator(2);
                },
                error: function(xhr) {
                    console.error("Error al cambiar la contraseña:", xhr);
                    // Manejar errores
                    const errors = xhr.responseJSON.errors;
                    for (const key in errors) {
                        const errorMessage = errors[key][0];
                        alert(errorMessage); // Mostrar error (puedes personalizar esto)
                    }
                }
            })
        });
    });
</script>
