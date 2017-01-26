<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub - Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <?php
	 include 'static-css.php';
	 echo '<link rel="stylesheet" type="text/css" href="home-static/css/signup.css" /><style>';
		  		$array=array('01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', '06.jpg', '07.jpg', '08.jpg', '09.jpg', '10.jpg','landscape.png');
		  		shuffle($array);
		  ?>
		  body{
			  	background-image: url("home-static/img/bg/<?php echo $array[0]; ?>");
			  	background-size: cover;
			  }
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
    <div id="box_sign">
        <div class="container">
            <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Create your account</h4>
                        </div>
                        <div id="alert">
                        <?php if(Session::get('error')){
                        	echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';
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
                            <form action="/signup" method="post" id="signup" />
                            	<input type="text" name="name" placeholder="Name" required="required" id="name" />
                                <input type="email" name="email" placeholder="Email" required="required" id="email" />
                                <input type="password" name="pass" placeholder="Password" required="required" id="password" />
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
<?php include 'footer.php'; ?>