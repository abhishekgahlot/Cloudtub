<!DOCTYPE html>
<html ng-app="cloudtub">
<head>
	<title>Cloudtub Cloud Storage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <meta http-equiv="refresh" content="60;">-->
    <?php include_once('header.php'); ?>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" id="rightclk-menu" ng-controller="Files">
		  <li><a tabindex="-1" id="view-right" href=""><i class="icon-external-link"></i>  View</a></li>
		  <li><a tabindex="-1" id="copy-right" href="#copylink" data-toggle="modal"><i class="icon-copy"></i>  Copy Direct Link</a></li>
		  <li><a tabindex="-1" id="download-right" href=""><i class="icon-download-alt"></i>  Download</a></li>
		  <li class="divider"></li>
		  <li><a tabindex="-1" href="#rename" data-toggle="modal"><i class="icon-edit"></i>  Rename</a></li>
		  <li><a tabindex="-1"  ng-delete><i class="icon-remove"></i>  Delete</a></li>
    </ul>
    <div class="content">
    	<div id="loading-shell"><div class="loader"></div><br/><h3>Loading</h3></div>
        <div class="container-fluid">
        		<div id="uploader">
	        		<br/>
	        		<div id="uploader-animate" style="display: block">
		        		<h3>Drop Files Here</h3>
		        		<button id="clear-upload" class='btn-flat primary pull-right'>Clear</button>
		        		<br/><br/>
		        		<form name="upload" id="uploadBox" action="upload" class="uploader well"
		        		enctype="multipart/form-data">
			        		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		        		</form>
		        	 </div>
        		</div>
	        	<div ng-view=""></div>
        </div>
    </div>
    <?php
 $count=LMongo::collection('users')->where('email', Auth::user()->email)->pluck('login_attempt');
 if($count<5)
 {
    echo '
    <style type="text/css">#sidebar-nav {
	position: absolute;}</style>
    <ol id="joyRideTipContent">
       <li data-id="upload" data-text="Next" class="custom" data-options="tipLocation:right;tipAnimation:fade">
        <h2>Upload</h2>
        <p>Its Awesome Style Upload Are which can be minimised at any time.</p>
      </li>
      <li data-id="files" data-button="Next" data-options="tipLocation:right;tipAnimation:fade">
        <h2>Files</h2>
        <p>Here you see your files and folders.</p>
      </li>
      <li data-id="trash" data-button="Next" data-options="tipLocation:right;tipAnimation:fade" >
        <h2>Trash</h2>
        <p>Any file you delete can be seen here , of course that can be deleted permanently!</p>
      </li>
      <li data-id="calendar" data-button="Next" data-options="tipLocation:right;tipAnimation:fade">
        <h2>Calendar</h2>
        <p>Calendar tells on which day you uploaded which file. Its just like reminding you when you uploaded which files</p>
      </li>
      <li data-id="settings" data-options="tipLocation:right;tipAnimation:fade" data-button="Close">
        <h2>Settings</h2>
        <p>Your Profile, API and account settings Here.</p>
      </li>
    </ol>
    ';
    }
    ?>
</body>
	<script type="text/javascript" src="cloud-static/js/jquery.js"></script>
	<script type="text/javascript" src="cloud-static/js/ng.js"></script>
	<script type="text/javascript" src="cloud-static/js/ng-module.js"></script>
    <script type="text/javascript" src="cloud-static/js/uploader.js"></script>
    <script type="text/javascript" src="cloud-static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="cloud-static/js/angular.js"></script>
    <script type="text/javascript" src="cloud-static/js/alertify.min.js"></script>
    <script type="text/javascript" src="cloud-static/js/script.js"></script>
    <script type="text/javascript" src="cloud-static/js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="cloud-static/js/prism.js"></script>
    <script type="text/javascript" src="cloud-static/js/jquery.joyride-2.1.js"></script>
    <script type="text/javascript" src="cloud-static/js/jquery.zclip.min.js"></script>
    <?php

   if($count<5)
   {
   echo '<script type="text/javascript">
     $("#joyRideTipContent").joyride({
          autoStart : true,
          });
    </script>';
    }
    ?>

</html>