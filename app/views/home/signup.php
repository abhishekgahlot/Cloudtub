<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub SignUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="home_static/css/signup.css"  />
    <?php

	 include 'static_css.php';
	 include 'header.php';

	  ?>


    <div id="box_sign">
        <div class="container">
            <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Create your account</h4>
                        </div>
                        <div class="form">
                            <form action="/signup" method="post" />
                            	<input type="text" name="name" placeholder="Name" required="required" />
                                <input type="text" name="email" placeholder="Email" required="required" />
                                <input type="password" name="pass" placeholder="Password" required="required" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="submit" class="btn btn-block btn-info" value="Sign up" />
                            </form>
                        </div>
                    </div>
                </div>
                <p class="already">Already have an account?
                    <a href="signin">Sign in</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>