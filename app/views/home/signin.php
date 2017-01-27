<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub - Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <link rel="stylesheet" type="text/css" href="home_static/css/signin.css" />
    <?php

	 include 'static_css.php';
	 include 'header.php';

	  ?>

    <div id="box_login">
        <div class="container">
            <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Sign In to your account</h4>
                        </div>
                        <div class="form">
                            <form action='/signin' method='post' />
                                <input type="text" name='email' placeholder="Email" required="required" />
                                <input type="password" name='pass' placeholder="Password" required="required"/>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="remember">
                                    <div class="left">
                                        <input id="remember_me" type="checkbox" />
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                    <div class="right">
                                        <a href="reset">Forgot password?</a>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-block btn-info" value="Sign in" />
                            </form>
                        </div>
                    </div>
                </div>
                <p class="already">Don't have an account? <a href="signup"> Sign up</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>