<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/asset/css/login.css">
</head>
<body>
    <div class="login-container">
        <img src="/asset/img/logo-Dinoyo-Ceramic-white2.png" alt="Logo Dinoyo Ceramic" class="logo">
        <h2>Sign in to your account</h2>
        <p>Ready to explore the goodness in ceramic art Dinoyo?</p>

        <div class="login-box">
            <form action="login_function.php" method="POST" id="login-form">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <button type="submit" class="btn-signin">Sign In</button>
            </form>

            <div class="google-signin">
                <button class="btn-google">
                    <img src="/asset/img/Google_Icons.webp" alt="Logo Google" class="google-logo">Sign in with Google</button>
            </div>

            <p class="register-link">Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>
</body>
</html>
