<?php require_once('header.php'); ?>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Welcome</h2>
            <form method="post" action="">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Email" required>
                </div>
                <button type="submit" id="login" name="login">Login</button>
                <p class="signup-text">Don't have an account? <a href="#">Sign up</a></p>
            </form>
        </div>
    </div>
<?php require_once('footer.php'); ?>
