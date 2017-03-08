<?php
session_start();
include_once('../vendor/autoload.php');
use App\Model\Message\Message;
use App\Model\Utility\Utility;
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../Resources/css/normalize.css">
    <link rel="stylesheet" href="../Resources/css/login.css">
    <script src="../Resources/assets/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div id="message">
    <?php
    if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
        echo Message::message();
    }
    ?>
</div>


<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>
    <div class="tab-content">
        <div id="signup">
            <h1>Sign Up for Free</h1>
            <form action="registration.php" method="post">
                <div class="top-row">
                    <div class="field-wrap">
                        <label for="name">
                            Name<span class="req">*</span>
                        </label>
                        <input id="name" type="text" required autocomplete="off" name="name" />
                    </div>

                    <div class="field-wrap">
                        <label for="user_name">
                            User Name<span class="req">*</span>
                        </label>
                        <input id="user_name" type="text" required autocomplete="off" name="user_name"/>
                    </div>
                </div>

                <div class="field-wrap">
                    <label for="email">
                        Email<span class="req">*</span>
                    </label>
                    <input id="email" type="text" required autocomplete="on" name="email"/>
                </div>

                <div class="field-wrap">
                    <label for="password">
                        Set A Password<span class="req">*</span>
                    </label>
                    <input id="password" type="password" required autocomplete="off" name="password"/>
                </div>
                <input type="submit" class="button button-block" value="Sign Up"/>
            </form>
        </div>

        <div id="login">
            <h1>Welcome Back!</h1>
            <form action="login.php" method="post">
                <div class="field-wrap">
                    <label for="email">
                        Email Address<span class="req">*</span>
                    </label>
                    <input id="email" type="email" required autocomplete="off" name="email"/>
                </div>
                <div class="field-wrap">
                    <label for="password">
                        Password<span class="req">*</span>
                    </label>
                    <input id="password" type="password" required autocomplete="off" name="password"/>
                </div>
                <p class="forgot"><a href="#">Forgot Password?</a></p>
                <input type="submit" class="button button-block" value="Log In"/>
            </form>
        </div>
    </div><!-- tab-content -->
</div> <!-- /form -->
    <script src="../Resources/js/index.js"></script>
    <script>
        $('#message').show().delay(3000).fadeOut();
    </script>
</body>
</html>
