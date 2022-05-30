<?php
session_start();
if(!isset($_SESSION['user']))
{
    $reference = '';
    if (isset($_GET['reference'])) {
        $reference = $_GET['reference'];
        
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Volunteer</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='css/index.css' rel='stylesheet'>
    </head>
    <body className='snippet-body'>
        <div class="container2" style="height:100%;">
            <div class="frame">
                <div class="nav">
                    <ul class="links">
                        <li class="signin-inactive"><a class="btn" id="signinBtn">Sign in</a></li>
                        <li class="signup-inactive"><a class="btn" id="signupBtn">Sign up </a></li>
                    </ul>
                </div>
                <div>
                    <div id="signinBox">
                        <form class="form-signin" id="login-form"  method="post" name="form">
                        <div id="passMsg"></div>
                        <label for="username">Email</label>
                        <input class="form-styling" type="email" name="email" placeholder=""/>
                        <label for="password">Password</label>
                        <input class="form-styling" id type="password" name="password" placeholder=""/>
                        
                        <div class="btn-animate">
                            <button id="login-btn" class="btn-signin">Sign in</button>
                        </div>
                        
                        <a href="auth/forgotPass.php?by=user" class="forgot">Forgot your password?</a>
                        
                        </form>
                    </div>
                    <div id="signupBox" style="display:none;">
                        <form class="form-signup" id="register-form" method="POST">
                            <input type="hidden" name="reference" value="<?= $reference ?>">
                            <div id="passMsg2"></div>
                            <label for="email">Full Name</label>
                            <input class="form-styling" type="text" name="fullname" placeholder=""/>
                            <label for="email">Email</label>
                            <input class="form-styling" type="email" name="email" placeholder=""/>
                            <label for="password">Password</label>
                            <input class="form-styling" id="r-password" type="password" name="password" placeholder=""/>
                            <label for="confirmpassword">Confirm password</label>
                            <input class="form-styling" id="cpassword" type="password" name="conf_pass" placeholder=""/>
                            <button id="register-btn" type="submit" name="signup" class="btn-signup">Register</button>
                        </form>
                    </div>
                </div>
            
        </div>
        <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
        <script src="js/jquery.js"></script>
        <script src='js/auth.js'></script>
    </body>
</html>
<?php
exit();
}

?>