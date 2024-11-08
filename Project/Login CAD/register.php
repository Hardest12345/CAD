<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/register.css">
    <title>Register - Ceramic Art Dinoyo</title>
</head>
<body>
    <div class="login-container">
        <img src="/asset/img/logo-Dinoyo-Ceramic-white2.png" alt="Logo Dinoyo Ceramic" class="logo">
        <h2>Create an Account</h2>
        <p>Join us to explore the goodness in ceramic art dinoyo!</p>

        <div class="login-box">
            <form action = "register_function.php" method="POST" id="register-form">
                <div class="input-group">
                    <input type="text" id="full_name" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group phone-group">
                    <select id="country-code"  name="country_code required">
                        <option value="+62" data-placeholder="(+62) 555-000-0000">Indonesia (+62)</option>
                        <option value="+91" data-placeholder="(+91) 555-000-0000">India (+91)</option>
                        <option value="+86" data-placeholder="(+86) 555-000-0000">China (+86)</option>
                        <option value="+81" data-placeholder="(+81) 555-000-0000">Japan (+81)</option>
                        <option value="+82" data-placeholder="(+82) 555-000-0000">South Korea (+82)</option>
                        <option value="+60" data-placeholder="(+60) 555-000-0000">Malaysia (+60)</option>
                        <option value="+63" data-placeholder="(+63) 555-000-0000">Philippines (+63)</option>
                        <option value="+65" data-placeholder="(+65) 555-000-0000">Singapore (+65)</option>
                        <option value="+66" data-placeholder="(+66) 555-000-0000">Thailand (+66)</option>
                        <option value="+84" data-placeholder="(+84) 555-000-0000">Vietnam (+84)</option>
                        <option value="+95" data-placeholder="(+95) 555-000-0000">Myanmar (+95)</option>
                        <option value="+880" data-placeholder="(+880) 555-000-0000">Bangladesh (+880)</option>
                        <option value="+94" data-placeholder="(+94) 555-000-0000">Sri Lanka (+94)</option>
                        <option value="+968" data-placeholder="(+968) 555-000-0000">Oman (+968)</option>
                        <option value="+973" data-placeholder="(+973) 555-000-0000">Bahrain (+973)</option>
                        <option value="+974" data-placeholder="(+974) 555-000-0000">Qatar (+974)</option>
                        <option value="+971" data-placeholder="(+971) 555-000-0000">United Arab Emirates (+971)</option>
                        <option value="+92" data-placeholder="(+92) 555-000-0000">Pakistan (+92)</option>
                        <option value="+960" data-placeholder="(+960) 555-000-0000">Maldives (+960)</option>
                        <option value="+856" data-placeholder="(+856) 555-000-0000">Laos (+856)</option>
                        <option value="+855" data-placeholder="(+855) 555-000-0000">Cambodia (+855)</option>
                        <option value="+98" data-placeholder="(+98) 555-000-0000">Iran (+98)</option>
                        <option value="+964" data-placeholder="(+964) 555-000-0000">Iraq (+964)</option>
                        <option value="+962" data-placeholder="(+962) 555-000-0000">Jordan (+962)</option> </select>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Create Password" required>
                </div>
                <button type="submit" class="btn-signin">Register</button>
                <p class="register-link">Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </div>

</body>
</html>
