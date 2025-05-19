<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectHub - Register</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Header styles */
        .header {
            margin-bottom: 30px;
            text-align: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .logo span {
            color: #e60000;
        }

        .header p {
            color: #b3b3b3;
            font-size: 16px;
            max-width: 500px;
        }

        /* Container styles */
        .register-container {
            background-color: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 800px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: #e60000;
        }

        /* Form styles */
        .register-form {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .form-subtitle {
            color: #b3b3b3;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #cccccc;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23cccccc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 15px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #e60000;
            box-shadow: 0 0 0 2px rgba(230, 0, 0, 0.2);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 40px;
            cursor: pointer;
            color: #888888;
            user-select: none;
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 5px;
            border-radius: 3px;
            background-color: #2a2a2a;
            overflow: hidden;
            position: relative;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 5px;
            color: #888888;
        }

        /* Date of birth section */
        .dob-inputs {
            display: flex;
            gap: 10px;
        }

        .dob-inputs .form-group {
            flex: 1;
        }

        /* Checkbox styles */
        .form-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .form-checkbox input {
            appearance: none;
            width: 18px;
            height: 18px;
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            border-radius: 3px;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .form-checkbox input:checked {
            background-color: #e60000;
            border-color: #e60000;
        }

        .form-checkbox input:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-checkbox label {
            font-size: 14px;
            color: #cccccc;
            cursor: pointer;
            line-height: 1.4;
        }

        .form-checkbox a {
            color: #e60000;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .form-checkbox a:hover {
            opacity: 0.8;
        }

        /* Button styles */
        .register-button {
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .register-button:hover {
            background-color: #cc0000;
        }

        .register-button:active {
            transform: translateY(1px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #666666;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #3a3a3a;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        /* Social login */
        .social-register {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-button {
            flex: 1;
            max-width: 120px;
            padding: 12px;
            border-radius: 5px;
            background-color: #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #3a3a3a;
            color: #ffffff;
            font-size: 14px;
        }

        .social-button:hover {
            background-color: #333333;
            transform: translateY(-3px);
        }

        .social-icon {
            font-size: 18px;
        }

        /* Login link */
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #b3b3b3;
        }

        .login-link a {
            color: #e60000;
            text-decoration: none;
            transition: opacity 0.3s ease;
            font-weight: 600;
        }

        .login-link a:hover {
            opacity: 0.8;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .register-container {
                padding: 30px;
            }

            .form-row {
                flex-direction: column;
                gap: 20px;
            }

            .social-register {
                flex-wrap: wrap;
            }

            .social-button {
                flex: 1 0 calc(50% - 10px);
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 25px 20px;
            }

            .header .logo {
                font-size: 24px;
            }

            .header p {
                font-size: 14px;
            }

            .form-title {
                font-size: 20px;
            }

            .dob-inputs {
                flex-direction: column;
                gap: 20px;
            }

            .social-button {
                flex: 1 0 100%;
            }
        }

        /* Error styles */
        .error-message {
            color: #e60000;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .form-group.error input {
            border-color: #e60000;
        }

        .form-group.error .error-message {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Connect<span>Hub</span></div>
        <p>Join our community and connect with friends, share moments, and discover new opportunities.</p>
    </header>

    <!-- Registration Container -->
    <div class="register-container">
        <h1 class="form-title">Create Your Account</h1>
        <p class="form-subtitle">Fill in the details below to get started with ConnectHub</p>

        <form class="register-form">
            <!-- Name Row -->
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" placeholder="Enter your first name" required>
                    <div class="error-message">Please enter your first name</div>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" placeholder="Enter your last name" required>
                    <div class="error-message">Please enter your last name</div>
                </div>
            </div>

            <!-- Email & Username Row -->
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Enter your email address" required>
                    <div class="error-message">Please enter a valid email address</div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Choose a username" required>
                    <div class="error-message">Username must be 3-20 characters</div>
                </div>
            </div>

            <!-- Password Row -->
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Create a strong password" required onkeyup="checkPasswordStrength()">
                    <span class="password-toggle" onclick="togglePassword('password', this)">Show</span>
                    <div class="password-strength">
                        <div class="strength-meter" id="strengthMeter"></div>
                    </div>
                    <div class="strength-text" id="strengthText">Password strength</div>
                    <div class="error-message">Password must be at least 8 characters</div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                    <span class="password-toggle" onclick="togglePassword('confirmPassword', this)">Show</span>
                    <div class="error-message">Passwords do not match</div>
                </div>
            </div>

            <!-- Date of Birth & Gender Row -->
            <div class="form-row">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <div class="dob-inputs">
                        <div class="form-group">
                            <select id="dobMonth" required>
                                <option value="" disabled selected>Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="dobDay" required>
                                <option value="" disabled selected>Day</option>
                                <!-- Days 1-31 -->
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="dobYear" required>
                                <option value="" disabled selected>Year</option>
                                <!-- Years from current year - 100 to current year - 13 -->
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <!-- Add more years as needed -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="non-binary">Non-binary</option>
                        <option value="other">Other</option>
                        <option value="prefer-not">Prefer not to say</option>
                    </select>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="form-checkbox">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. I understand how ConnectHub processes my data as described in the <a href="#">Data Processing Agreement</a>.</label>
            </div>

            <!-- Newsletter Subscription -->
            <div class="form-checkbox">
                <input type="checkbox" id="newsletter">
                <label for="newsletter">I would like to receive news, tips and updates from ConnectHub via email.</label>
            </div>

            <!-- Register Button -->
            <button type="submit" class="register-button">Create Account</button>

            <!-- Social Registration -->
            <div class="divider">OR REGISTER WITH</div>
            <div class="social-register">
                <button type="button" class="social-button">
                    <span class="social-icon">G</span>
                    <span>Google</span>
                </button>
                <button type="button" class="social-button">
                    <span class="social-icon">f</span>
                    <span>Facebook</span>
                </button>
                <button type="button" class="social-button">
                    <span class="social-icon">in</span>
                    <span>LinkedIn</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Login Link -->
    <div class="login-link">
        Already have an account? <a href="index.html">Log in</a>
    </div>

    <script>
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

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const meter = document.getElementById('strengthMeter');
            const text = document.getElementById('strengthText');
            
            // Reset
            meter.style.width = '0%';
            meter.style.backgroundColor = '#2a2a2a';
            
            if (password.length === 0) {
                text.textContent = 'Password strength';
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
    </script>
</body>
</html>