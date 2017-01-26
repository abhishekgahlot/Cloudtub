<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub | Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <?php

	 include 'static-css.php';
	 echo '<link rel="stylesheet" type="text/css" href="home-static/css/reset.css" />';

	  ?>
	  <style>
		  <?php
		  		$array=array('01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', '06.jpg', '07.jpg', '08.jpg', '09.jpg', '10.jpg','landscape.png');
		  		shuffle($array);
		  		echo 'body{
			  		background-image: url("home-static/img/bg/'.$array[0].'");
			  		background-size: cover;
			  		}';
		  ?>
	  </style>
 <body>
	   <div class="header-main">
    <div class="container">
	    <?php include 'header-user.php'; ?>
	</div>
  </div>
  <div class="separator-shadow-bottom">
    <img alt="" src="home-static/data/shadow-separator-wide-bottom.png">
  </div>

    <div id="box_reset">
        <div class="container">
            <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Enter your email address below to reset your password.</h4>
                        </div>
                        <?php if(Session::get('error')){
                        	echo '<div class="alert alert-info"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';
	                        	 echo '<center><strong>'.htmlspecialchars(Session::get('error'),ENT_QUOTES, 'UTF-8').'</strong></center>';
	                        	 echo '</div>';
	                        	 }
	                       ?>
                        <div class="form">
                            <form method="post" action="reset"/>
                                <input type="email" name="email" placeholder="Email address" required="required" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="submit" class="btn btn-info btn-block" value="Reset password" />
                            </form>
                        </div>
                    </div>
                </div>
                <p class="already">Know your password? <a href="signin"> Sign in</a></p>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>