<!DOCTYPE html>
<html>
<head>
	<title>Cloudtub Cloud Storage</title>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <head>
       <?php include 'static-css.php'; ?>
	  <body>
	   <!-- Login Modal -->
<div aria-hidden='true' class='modal fade' id='loginModal' role='dialog' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
        <h4 class='modal-title'>Sign In </h4>
      </div>
      <div class='modal-body'>
        <form action='/signin' role='form' method="post">
          <div class='row'>
            <div class='col-md-6'>
              <label class='control-label'>Email</label>
              <input class='form-control' id="email" name="email" placeholder='Email' type='email' required="required">
            </div>
            <div class='col-md-6'>
              <label class='control-label'>Password</label>
              <input class='form-control' id="pass" name='pass' placeholder='Password' type='password' required="required">
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          </div>
      </div>
      <div class='modal-footer'>
      	<button class='btn btn-primary' type='submit'>Sign In</button>
      	  </form>
        <button class='btn btn-default' data-dismiss='modal' type='button'>Close</button>
      </div>
    </div>
  </div>
</div>
<div class="noise-wrapper">
  <div class="header-main">
    <div class="container">
	    <?php include 'header.php'; ?>
	</div>
  </div>
  <div class="separator-shadow-bottom">
    <img alt="" src="home-static/data/shadow-separator-wide-bottom.png">
  </div>
  <section class="leaderboard leaderboard-style-one">
    <div class="container">
      <h1 class="animated fadeInDown">Welcome to Cloudtub Storage</h1>
      <h2 class="animated fadeInDown">Elegant Cloud Storage with Fast & Beautiful Interface</h2>
      <div class="relative-w">
        <div class="frame-browser animated bounceInUp">
          <div class="frame-buttons">
            <div class="frame-button-close"></div>
            <div class="frame-button-max"></div>
            <div class="frame-button-min"></div>
          </div>
          <div class="frame-browser-image">
            <img alt="" src="home-static/data/showcase.png">
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="separator-shadow-top above-screenshot-shadow">
    <img alt="" src="home-static/data/shadow-separator-wide-top.png">
  </div>
</div>
<div class="area-content">
  <div class="container">
    <div class="separator-shadow-top sub-screenshot-shadow">
      <img alt="" src="home-static/data/shadow-separator-wide-top.png">
    </div>
    <div class="iconed-features lift-on-hover style-1">
      <div class="row">
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="feature-icon-w">
              <i class="icon-cloud"></i>
            </div>
            <h4>Your Files On Cloud</h4>
            <p>Access Files on everything from desktops to mobile devices.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="feature-icon-w">
              <i class="icon-lock"></i>
            </div>
            <h4>Security Guaranteed</h4>
            <p>Your data is fully Encrypted and Secured with Cloudtub. No chance of losing data.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="feature-icon-w">
             <i class="icon-code"></i>
            </div>
            <h4>Developer Friendly</h4>
            <p>API and Files Accessibility for Your App. Making your app work smarter.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator-shadow-bottom bottom-margin">
      <img alt="" src="home-static/data/shadow-separator-wide-bottom.png">
    </div>
    <div class="row bottom-margin" id="about">
      <div class="col-md-5">
        <h2 class="header-lined">Cloud Storage</h2>
        <ul class="list-checkmarked text-bigger">
          <li>Your Files are stored as Multiple Copies so you dont have to worry about Data loss.</li>
          <li>
          We Store your files securely with the help of encryption so that your data is safe and private.
          </li>
        </ul>
        <!-- %a.btn.btn-default{:href => "#"} Show me Example -->
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <div class="relative-w">
          <div class="frame-browser animated-when-visible animated bounceInRight" data-animation-type="bounceInRight">
            <div class="frame-buttons">
              <div class="frame-button-close"></div>
              <div class="frame-button-max"></div>
              <div class="frame-button-min"></div>
            </div>
            <div class="frame-browser-image">
              <img alt="" src="home-static/pics/globalcloud.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="separator-shadow-top bottom-margin">
      <img alt="" src="home-static/data/shadow-separator-wide-top.png">
    </div>
    <div class="slogan text-center">
      <h2 class="header-highlighted">Great for Everyone including Developers and Company! </h2>
      <p>Just Give it a Try, You will love its Interface ,Flexibility and Features.</p>
      <div class="slogan-buttons">
        <a class="btn btn-primary btn-cta btn-lg animated swing" href="signup">
         Sign Up Now
        </a>
      </div>
    </div>
    <div class="separator-shadow-bottom bottom-margin">
      <img alt="" src="home-static/data/shadow-separator-wide-bottom.png">
    </div>
    <!- -->
     <div class="row bottom-margin">
      <div class="col-md-6">
        <div class="relative-w">
          <div class="frame-browser animated-when-visible animated bounceInRight" data-animation-type="bounceInRight">
            <div class="frame-buttons">
              <div class="frame-button-close"></div>
              <div class="frame-button-max"></div>
              <div class="frame-button-min"></div>
            </div>
            <div class="frame-browser-image">
              <img alt="" src="home-static/pics/ctc.jpg">
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
      <h2 class="header-lined">Cloud Accessibility</h2>
        <ul class="list-checkmarked text-bigger">
          <li>Your Files are available wherever you go on any device.</li>
          <li>
          Files can also be shared over social media such as Facebook, Twitter.
          </li>
        </ul>
        <!-- %a.btn.btn-default{:href => "#"} Show me Example -->
        </div>
    </div>
<!- -->
  </div>
  <div class="highlight-content bottom-margin light">
    <div class="carousel slide" id="carousel-testimonials">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carousel-testimonials"></li>
        <li data-slide-to="1" data-target="#carousel-testimonials"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <div class="container">
            <div class="testimonial">
              <div class="testimonial-icon">
                <i class="icon-quote-left"></i>
              </div>
              <p>"Cloudtub Has Awesome Interface, Responsive Design and
 great features. It handles all your important stuff and help you manage your files."</p>

            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="testimonial">
              <div class="testimonial-icon">
                <i class="icon-quote-left"></i>
              </div>
              <p>"Cloudtub Final Version Will support Mobile Platforms so that Users on Mobile can access their Files easily."</p>

            </div>
          </div>
        </div>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" data-slide="prev" href="#carousel-testimonials">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" data-slide="next" href="#carousel-testimonials">
        <span class="icon-next"></span>
      </a>
    </div>
  </div>
  <div class="container" id="features">
    <h2 class="header-lined has-sub-header text-center">More Features</h2>
    <h4 class="sub-lined-header text-center">Some Extended Features, Beta Support only few of them.</h4>
    <div class="iconed-features style-2">
      <div class="row">
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-folder-open"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Folder Sharing System</h4>
                <p>Our App lets you share folders with other accounts.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-key"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Security Included</h4>
                <p>Our app automatically encrypts data you upload and your private information.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-archive"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Archives</h4>
                <p>Cloudtub let archive all your files and you can download every data at once.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="iconed-features style-2">
      <div class="row">
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-desktop"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Responsive</h4>
                <p>Our App is responsive still Cloudtub Mobile Application is under Construction.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-calendar"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Calendars</h4>
                <p>Calendar help by managing your files for specific dates.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="iconed-feature">
            <div class="row">
              <div class="col-md-4">
                <div class="feature-icon-w animated-when-visible" data-animation-type="rollIn">
                  <i class="icon-code-fork"></i>
                </div>
              </div>
              <div class="col-md-8">
                <h4>Built By Developers, Built For Developers</h4>
                <p>Cloudtub Allow Flexibility and ease of access for developers.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <footer id="main-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="footer-menu">
            <!--<li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact Us</a></li>-->
            <h5 style="color:white">Cloudtub 2012-2013</h5>
          </ul>
        </div>
        <div class="col-md-6">
          <ul class="footer-social">
            <li><a href="//www.facebook.com/cloudtub"><i class="icon-facebook"></i></a></li>
            <li><a href="//www.twitter.com/cloudtub"><i class="icon-twitter"></i></a></li>
            <li><a href="//plus.google.com/114057120706005228626" rel="publisher"><i class="icon-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
<?php include 'footer.php'; ?>
