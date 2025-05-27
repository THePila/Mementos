<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Custom Bootstrap-inspired Alerts */
    .alert {
        position: fixed;
        top: 15px;
        left: 15;
        transform: translateX(-50%);
        width: 90%;
        max-width: 500px;
        z-index: 9999;
        padding: 16px;
        margin-bottom: 0;
        border: 1px solid transparent;
        border-radius: 8px;
        display: flex;
        align-items: flex-start;
        gap: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Alert variants */
    .alert-danger {
        color: #ffffff;
        background-color: #2a1215;
        border-color: #e60000;
        border-left-width: 4px;
    }


    .alert-success {
        color: #ffffff;
        background-color: #152a1e;
        border-color: #00cc66;
        border-left-width: 4px;
    }


    /* Alert icons */
    .alert-icon {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .alert-danger .alert-icon {
        background-color: #e60000;
        color: #ffffff;
    }

    .alert-success .alert-icon {
        background-color: #00cc66;
        color: #ffffff;
    }


    /* Alert content */
    .alert-content {
        flex: 1;
    }

    .alert-heading {
        margin-bottom: 5px;
        font-weight: 600;
        font-size: 16px;
    }

    .alert-danger .alert-heading {
        color: #ff3333;
    }

    .alert-success .alert-heading {
        color: #33ff99;
    }



    .alert-text {
        font-size: 14px;
        line-height: 1.5;
    }


    /* Dismissible alerts */
    .alert-dismissible {
        padding-right: 40px;
    }

    .alert .close {
        position: absolute;
        top: 14px;
        right: 14px;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s ease;
        color: #ffffff;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .alert .close:hover {
        opacity: 1;
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Alert with list */
    .alert-list {
        margin-top: 10px;
        padding-left: 20px;
    }

    .alert-list li {
        margin-bottom: 5px;
        font-size: 14px;
    }

    /* Fade in animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert {
        animation: fadeIn 0.3s ease forwards;
    }

    /* Fade out animation */
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }

    .alert.fade-out {
        animation: fadeOut 0.3s ease forwards;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        body {
            padding: 20px;
        }

        .alert {
            padding: 12px;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .alert-dismissible {
            padding-right: 12px;
        }

        .alert .close {
            top: 10px;
            right: 10px;
        }

        .alert-icon {
            margin-bottom: 5px;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 15px;
        }

        h1 {
            font-size: 24px;
        }

        .form-container {
            padding: 20px;
        }
    }
</style>
<!-- Dismissible Error Alert -->
<div class="alert alert-{{ $type }} alert-dismissible" id="dismissibleError">
    <div class="alert-icon">
        @if ($type == 'danger')
            !
        @elseif($type == 'success')
            ✓
        @endif
    </div>
    <div class="alert-content">
        <div class="alert-text">
            @if (is_array($messages))
                <ul class="alert-list">
                    @foreach ($messages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ $messages }}
            @endif
        </div>
    </div>
    <button type="button" class="close" onclick="dismissAlert('dismissibleError')" aria-label="Close">✕</button>
</div>
</div>

<script>
    // Dismiss alert function
    function dismissAlert(alertId) {
        const alert = document.getElementById(alertId);
        alert.classList.add('fade-out');

        // Remove the alert after animation completes
        setTimeout(() => {
            alert.style.display = 'none';
        }, 300);
    }

    // Form validation with alert
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const formAlert = document.getElementById('formAlert');

        // Reset alert
        formAlert.style.display = 'none';
        formAlert.className = 'alert';

        // Validate form
        if (!email || !password) {
            // Show error alert
            formAlert.className = 'alert alert-danger';
            formAlert.innerHTML = `
                    <div class="alert-icon">!</div>
                    <div class="alert-content">
                        <div class="alert-heading">Form Validation Error</div>
                        <div class="alert-text">
                            Please fill in all required fields.
                        </div>
                        <ul class="alert-list">
                            ${!email ? '<li>Email address is required</li>' : ''}
                            ${!password ? '<li>Password is required</li>' : ''}
                            ${password && password.length < 8 ? '<li>Password must be at least 8 characters long</li>' : ''}
                        </ul>
                    </div>
                `;
            formAlert.style.display = 'flex';
        } else if (password.length < 8) {
            // Show warning alert
            formAlert.className = 'alert alert-warning';
            formAlert.innerHTML = `
                    <div class="alert-icon">⚠</div>
                    <div class="alert-content">
                        <div class="alert-heading">Password Too Short</div>
                        <div class="alert-text">
                            Your password should be at least 8 characters long for better security.
                        </div>
                    </div>
                `;
            formAlert.style.display = 'flex';
        } else {
            // Show success alert
            formAlert.className = 'alert alert-success';
            formAlert.innerHTML = `
                    <div class="alert-icon">✓</div>
                    <div class="alert-content">
                        <div class="alert-heading">Registration Successful!</div>
                        <div class="alert-text">
                            Your account has been created successfully. We've sent a confirmation email to ${email}.
                        </div>
                    </div>
                `;
            formAlert.style.display = 'flex';

            // Reset form
            document.getElementById('demoForm').reset();
        }
    }
</script>
