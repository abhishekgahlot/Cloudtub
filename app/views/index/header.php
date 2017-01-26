  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="current navbar-brand" href="http://www.cloudtub.com">
        Cloudtub
      </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php
      if(Auth::check())
      {
      echo '<a class="btn btn-default navbar-btn navbar-right" href="cloud">
        My Account
        <i class="icon-share"></i>
      </a>';
      }else
      {
      echo '
       <a class="btn btn-success navbar-btn navbar-right"  data-toggle="modal" href="#loginModal" id="tryit">
        Try It!
        <i class="icon-thumbs-up"></i>
      </a>
      <a class="btn btn-default navbar-btn navbar-right" href="signup">
        Sign Up
        <i class="icon-share"></i>
      </a>
      <a class="btn btn-default navbar-btn navbar-right"  data-toggle="modal" href="#loginModal">
        Sign In
        <i class="icon-signin"></i>
      </a>
     ';
      }

      ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="current active">
          <a class="current" href="index">Home</a>
        </li>
        <li>
          <a href="#about">About Us</a>
        </li>
        <li>
          <a  href="#features">Features</a>
        </li>
      </ul>
    </div>
  </nav>
