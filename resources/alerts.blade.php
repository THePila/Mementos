<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectHub - Custom Alerts</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #0a0a0a;
            color: #f5f5f5;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            margin: 30px 0 15px;
            color: #cccccc;
        }

        /* Custom Bootstrap-inspired Alerts */
        .alert {
            position: relative;
            padding: 16px;
            margin-bottom: 20px;
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

        .alert-warning {
            color: #ffffff;
            background-color: #2a2215;
            border-color: #e69900;
            border-left-width: 4px;
        }

        .alert-success {
            color: #ffffff;
            background-color: #152a1e;
            border-color: #00cc66;
            border-left-width: 4px;
        }

        .alert-info {
            color: #ffffff;
            background-color: #15222a;
            border-color: #0099e6;
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

        .alert-warning .alert-icon {
            background-color: #e69900;
            color: #ffffff;
        }

        .alert-success .alert-icon {
            background-color: #00cc66;
            color: #ffffff;
        }

        .alert-info .alert-icon {
            background-color: #0099e6;
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

        .alert-warning .alert-heading {
            color: #ffcc00;
        }

        .alert-success .alert-heading {
            color: #33ff99;
        }

        .alert-info .alert-heading {
            color: #33ccff;
        }

        .alert-text {
            font-size: 14px;
            line-height: 1.5;
        }

        /* Alert links */
        .alert a {
            font-weight: 600;
            text-decoration: underline;
            transition: opacity 0.3s ease;
        }

        .alert a:hover {
            opacity: 0.8;
        }

        .alert-danger a {
            color: #ff6666;
        }

        .alert-warning a {
            color: #ffcc33;
        }

        .alert-success a {
            color: #66ffaa;
        }

        .alert-info a {
            color: #66d9ff;
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
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert {
            animation: fadeIn 0.3s ease forwards;
        }

        /* Fade out animation */
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-10px); }
        }

        .alert.fade-out {
            animation: fadeOut 0.3s ease forwards;
        }

        /* Form styles (for demo) */
        .form-container {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #cccccc;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #e60000;
            box-shadow: 0 0 0 2px rgba(230, 0, 0, 0.2);
        }

        .btn {
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background-color: #e60000;
            color: white;
        }

        .btn-primary:hover {
            background-color: #cc0000;
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
</head>
<body>
    <div class="container">
        <h1>ConnectHub Custom Alerts</h1>

        <!-- Basic Alerts -->
        <h2>Basic Alerts</h2>

        <!-- Error Alert -->
        <div class="alert alert-danger">
            <div class="alert-icon">!</div>
            <div class="alert-content">
                <div class="alert-text">
                    <strong>Error!</strong> There was a problem with your submission. Please check your information and try again.
                </div>
            </div>
        </div>

        <!-- Warning Alert -->
        <div class="alert alert-warning">
            <div class="alert-icon">⚠</div>
            <div class="alert-content">
                <div class="alert-text">
                    <strong>Warning!</strong> Your account is about to expire. <a href="#">Renew now</a> to avoid interruption.
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        <div class="alert alert-success">
            <div class="alert-icon">✓</div>
            <div class="alert-content">
                <div class="alert-text">
                    <strong>Success!</strong> Your profile has been updated successfully.
                </div>
            </div>
        </div>

        <!-- Info Alert -->
        <div class="alert alert-info">
            <div class="alert-icon">i</div>
            <div class="alert-content">
                <div class="alert-text">
                    <strong>Info!</strong> A new feature has been added to your dashboard. <a href="#">Check it out</a>.
                </div>
            </div>
        </div>

        <!-- Dismissible Alerts -->
        <h2>Dismissible Alerts</h2>

        <!-- Dismissible Error Alert -->
        <div class="alert alert-danger alert-dismissible" id="dismissibleError">
            <div class="alert-icon">!</div>
            <div class="alert-content">
                <div class="alert-heading">Form Validation Error</div>
                <div class="alert-text">
                    We couldn't process your registration because there are errors in your form.
                </div>
            </div>
            <button type="button" class="close" onclick="dismissAlert('dismissibleError')" aria-label="Close">✕</button>
        </div>

        <!-- Dismissible Warning Alert -->
        <div class="alert alert-warning alert-dismissible" id="dismissibleWarning">
            <div class="alert-icon">⚠</div>
            <div class="alert-content">
                <div class="alert-heading">Session Timeout Warning</div>
                <div class="alert-text">
                    Your session will expire in 5 minutes. <a href="#">Click here</a> to extend your session.
                </div>
            </div>
            <button type="button" class="close" onclick="dismissAlert('dismissibleWarning')" aria-label="Close">✕</button>
        </div>

        <!-- Alerts with Additional Content -->
        <h2>Alerts with Additional Content</h2>

        <!-- Error Alert with List -->
        <div class="alert alert-danger">
            <div class="alert-icon">!</div>
            <div class="alert-content">
                <div class="alert-heading">Form Validation Error</div>
                <div class="alert-text">
                    We couldn't process your registration because there are errors in your form. Please fix the following issues:
                </div>
                <ul class="alert-list">
                    <li>Email address is invalid or missing</li>
                    <li>Password must be at least 8 characters long</li>
                    <li>You must agree to the Terms of Service</li>
                </ul>
            </div>
        </div>

        <!-- Success Alert with Additional Content -->
        <div class="alert alert-success">
            <div class="alert-icon">✓</div>
            <div class="alert-content">
                <div class="alert-heading">Registration Successful!</div>
                <div class="alert-text">
                    Your account has been created successfully. We've sent a confirmation email to your inbox.
                    <br><br>
                    <strong>What's next?</strong> Complete your profile to get the most out of ConnectHub.
                </div>
            </div>
        </div>

        <!-- Demo Form with Alert -->
        <div class="form-container">
            <h2 style="margin-top: 0;">Registration Form</h2>
            <div id="formAlert" style="display: none;"></div>
            
            <form id="demoForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Create a password">
                </div>
                <button type="button" class="btn btn-primary" onclick="validateForm()">Submit Form</button>
            </form>
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
</body>
</html>