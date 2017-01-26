<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub | Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <?php

 echo '<link href="http://www.cloudtub.com/home-static/css/bootstrap.css" type="text/css" rel="stylesheet" />
 	   <link href="http://www.cloudtub.com/home-static/css/style.css" type="text/css" rel="stylesheet" />
 	   <link href="http://www.cloudtub.com/home-static/css/font-awesome.css" type="text/css" rel="stylesheet" />
 	   <link rel="stylesheet" type="text/css" href="http://www.cloudtub.com/home-static/css/signin.css" />';
	  ?>
	  <style>
		  <?php
		  		$array=array('01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', '06.jpg', '07.jpg', '08.jpg', '09.jpg', '10.jpg','landscape.png');
		  		shuffle($array);
		  		echo 'body{
			  		background-image: url("http://www.cloudtub.com/home-static/img/bg/'.$array[0].'");
			  		background-size: cover;
			  		}';
		  ?>
	  </style>
 <body>
	   <div class="header-main">
    <div class="container">
	      <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="current navbar-brand" href="http://www.cloudtub.com/index.html">
        Cloudtub
      </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <a class="btn btn-default navbar-btn navbar-right" href="http://www.cloudtub.com/signup">
        Sign Up
        <i class="icon-share"></i>
      </a>
      <a class="btn btn-default navbar-btn navbar-right"  href="http://www.cloudtub.com/signin">
        Sign In
        <i class="icon-signin"></i>
      </a>
      <ul class="nav navbar-nav navbar-right">
        <li class="current active">
          <a class="http://www.cloudtub.com/current" href="index">Home</a>
        </li>
        <li>
          <a href="http://www.cloudtub.com/about">About Us</a>
        </li>
        <li>
          <a  href="http://www.cloudtub.com/contact">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>

	</div>
  </div>
  <div class="separator-shadow-bottom">
    <img alt="" src="http://www.cloudtub.com/home-static/data/shadow-separator-wide-bottom.png">
  </div>
    <div id="box_login">
        <div class="container">
            <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Enter your New password.</h4>
                        </div>
                        <div id="alert">
                        <?php if(Session::get('error')){
                        	echo '<div class="alert alert-info"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';
	                        	 echo '<center><strong>'.htmlspecialchars(Session::get('error'),ENT_QUOTES, 'UTF-8').'</strong></center>';
	                        	 echo '</div>';
	                        	 }
	                       ?>
	                       <div class="alert alert-info" id="emailis" style="display:none;">
	                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	                        <center><strong id="errorclient"></strong></center>
	                     </div>
                        </div>
                        <div class="form">
                            <form method="post" action="http://www.cloudtub.com/resetpass" id="resetpass"/>
                                <input type="password" name="newpass" placeholder="Enter New Password" id="np" required="required" />
                                <input type="password" name="newpassagain" placeholder="Enter New Password Again" id="npa" required="required" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="email" value="<?php echo base64_decode($email); ?>">
                                <input type="hidden" name="code" value="<?php echo $code; ?>">
                                <input type="submit" class="btn btn-info btn-block" value="Change password" />
                            </form>
                        </div>
                    </div>
                </div>
                <p class="already">Know your password? <a href="signin"> Sign in</a></p>
            </div>
        </div>
    </div>
	<script src="http://www.cloudtub.com/home-static/js/jquery-latest.js"></script>
    <script src="http://www.cloudtub.com/home-static/js/bootstrap.min.js"></script>
    <script src="http://www.cloudtub.com/home-static/js/script.js"></script>
</body>
</html>