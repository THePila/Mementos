@extends('layout.app')
@push('styles')
    <link rel="stylesheet" href="/dist/css/register.css">
@endpush
<!-- Header -->
<header class="header">
    <div class="logo">Memen<span>tos</span></div>
    <p>Take your Heart.</p>
</header>
<!-- revisar en el css los estilos de errorMessage-->
<!-- Registration Container -->
<div class="register-container">
    <h1 class="form-title">Create Your Account</h1>
    <p class="form-subtitle">Fill in the details below to get started with ConnectHub</p>

    <form class="register-form" action="{{ route('register.store') }}" method="POST">
        <!-- Name Row -->
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>

            </div>
        </div>

        <!-- Email & Username Row -->
        <div class="form-row">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>

            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
    
            </div>
        </div>

        <!-- Password Row -->
        <div class="form-row">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a strong password" 
                    onkeyup="checkPasswordStrength()">
                <span class="password-toggle" onclick="togglePassword('password', this)">Show</span>
                <div class="password-strength">
                    <div class="strength-meter" id="strengthMeter"></div>
                </div>
                <div class="strength-text" id="strengthText">Password strength</div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" name='confirmPassword'>
                <span class="password-toggle" onclick="togglePassword('confirmPassword', this)">Show</span>
            </div>
        </div>

        <!-- Date of Birth & Gender Row -->
        <div class="form-row">
            <div class="form-group">
                <label>Date of Birth</label>
                <div class="dob-inputs">
                    <div class="form-group">
                        <select id="dobMonth">
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
                        <select id="dobDay">
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
                        <select id="dobYear">
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
                <select id="gender">
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="non-binary">Non-binary</option>
                    <option value="other">Other</option>
                    <option value="prefer-not">Prefer not to say</option>
                </select>
            </div>
        </div>

        {{-- <!-- Terms and Conditions -->
        <div class="form-checkbox">
            <input type="checkbox" id="terms" required>
            <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                    Policy</a>. I understand how ConnectHub processes my data as described in the <a
                    href="#">Data Processing Agreement</a>.</label>
        </div>

        <!-- Newsletter Subscription -->
        <div class="form-checkbox">
            <input type="checkbox" id="newsletter">
            <label for="newsletter">I would like to receive news, tips and updates from ConnectHub via email.</label>
        </div> --}}

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
    Already have an account? <a href="/login">Log in</a>
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

</html>
