<?php require_once( 'header.php' ); ?>
    <body>
    <div class="divider"></div>
    <div class="container login_box">
        <h3 align="center">SIM Tool</h3>
        <div class="alert alert-info">
            <span>Login to Dashboard</span>
        </div>
        <div class="">
            <form method="post" action="">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="button-addon2">
                    <button class="btn btn-dark" type="submit" id="login" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
<?php require_once( 'footer.php' ); ?>