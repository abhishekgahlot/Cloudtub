  <link href="cloud-static/css/prism1.css" rel="stylesheet" />
  <style type="text/css">
	#back{
		color:rgb(0, 181, 240);
		text-decoration: none;
		margin-right: 30px;
	}
	#view-btn,#download-btn{
		margin-right: 10px;
		color: white !important;
	}

  </style>
   	<div class="well" style="background:none"><h3 class="pull-left"><a id="back" onclick="window.history.back();"><i class="icon-arrow-left"></i>  </a> <u>{{filename}}</u></h3>
   	<a class="btn-flat info pull-right" id="view-btn" ng-href="//www.cloudtub.com/view/{{filedownload}}"><i class="icon-download-alt"></i> Download</a>
   	<a class="btn-flat gray pull-right" id="download-btn" target="_blank" ng-href="//www.cloudtub.com/view/{{fileoriginal}}"><i class="icon-edit"></i> View Original</a>
   	</div>
   	<div class="well" style="background:none;height:100%;">
   		<pre id="code" ng-show="file_is_code" class="line-numbers language-{{file_code_val}}" data-src="https://www.cloudtub.com/view/{{fileurl}}"></pre>
	   	<center><img id="image" ng-show="file_is_image" ng-src="//www.cloudtub.com/view/{{fileurl}}" onload="$('#loading-shell').hide();"/>
		   	<a ng-show="file_is_dl" ng-href="//www.cloudtub.com/view/{{filedownload}}"><img ng-src="https://www.cloudtub.com/thumb/download.png"/>
		   	<h3>Download File</h3></a>
	   	</center>
   	</div>
   	<script type="text/javascript">
	   	$(document).ready(function(){
		   	$("#loading-shell").show();
	   	});
   	</script>
