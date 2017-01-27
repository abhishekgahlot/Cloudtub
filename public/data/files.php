<style>
	.modal-backdrop,
.modal-backdrop.fade.in {
  opacity: 0.8;
  filter: alpha(opacity=80);
  background: white;
}
#rename,#newFolder
{top:25%;}
.caret.y{
	border-bottom-color: white;
	border-top-color: white;
}
.btn-group.open .dropdown-toggle  {
	background-color: rgb(56, 155, 235);
}
</style>
<div id="files-setting" class="dropdown">
	   <h2 class="pull-left" ><a href="#/files">Files</a></h2>
	    <div class="btn-group pull-right" data-toggle="buttons-radio">
			<a id="grid-btn" class=" active btn btn-small glow"><i class="icon-th-large icon-2"></i></a>
			<a id="list-btn" class="btn btn-small glow"><i class="icon-align-justify icon-2"></i></a>
		</div>
		<div class="btn-group pull-right">
		<a  class="btn-glow primary dropdown-toggle" id="sort" data-toggle="dropdown" href="#">Options<span class="caret y"></span></a>
		  		<ul class="dropdown-menu">
                  <li><a href="" ng-click="deletefile();"><i class="icon-remove"></i>  Delete</a></li>
                </ul>
		</div>
		<div class="btn-group pull-right">
	   <a  class="btn dropdown-toggle" id="sort" data-toggle="dropdown" href="#">Sort <span class="caret" color="white"></span></a>
		  		<ul class="dropdown-menu">
                  <li><a href="" ng-click="order='filename';reverse=!reverse">Sort By Name</a></li>
                  <li><a href="" ng-click="order='filename';reverse=!reverse">Sort By Date</a></li>
                  <li><a  href="" ng-click="order='filename';reverse=!reverse">Sort By Size</a></li>
                </ul>
		</div>
      <span><button id="check-all-btn" class="btn pull-right"> <input type="checkbox" id="check-all" /></button></span>
      <span><button id="refresh" class="btn pull-right" ng-click="reload();"><i class="icon-refresh"></i> </button></span>
      <a class="btn btn-large btn-flat white pull-right" id="new-folder" href="#newFolder" data-toggle="modal">New Folder</a>
   	</div>
 	<hr/>
 	<h3 ng-show="fileempty"><center>No File Has Been Uploaded! How about clicking On Upload Button.</center></h3>
 	<h3 ng-show="fileexist"><center>No Such Folder!</center></h3>
 	<h3 ng-show="fileinvalid"><center>Invalid Folder</center></h3>
 	<h3 ng-show="filepagename">Page : {{page}}</h3>
   	<div id="files-view" class="grid">
	   	<div ng-repeat="file in files | orderBy:order:reverse ">
		   	<div class="well span3 file" id="file-well" ng-right-click="rightclk($event,file.guid,file.key,file.direct_access);">
			   	<a href="#/{{file.key}}"><div class="file-data">
				   	<center><img ng-src="https://www.cloudtub.com/thumb/{{file.thumb}}"/></center>
				   		<h5 class="file-name">{{file.filename}}</h5>
				</div></a>
				<hr/>
				<div class="single-file-setting">
					<span><input type="checkbox" class="check-single" id="filename" value="{{file.guid}}" /></span>
					<span><a class="single-file-setting-option" ng-click="leftclk($event,file.guid,file.key,file.direct_access);"><i class="icon-cogs icon-2 pull-right"></i></a></span>
				</div>
			</div>
	 </div>
</div>
<!--New folder -->
<div id="newFolder" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Folder Name: {{text}}</h3>
  </div>
  <div class="modal-body">
  	<div id="folder-notice">
    </div>

    <input type="text" class="span3" name="createfolder" ng-model="text" placeholder="Enter Folder Name" /><br/>
  </div>
  <div class="modal-footer">
    <button class="btn btn-flat primary" ng-click="foldercheck(text)">Create Folder</button>
    <button class="btn btn-flat white" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<!--Rename-->
<div id="rename" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  	<div id="folder-notice">
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Rename File</h3>
  </div>
  <div class="modal-body">
  	<div id="folder-notice">
    </div>
    <input type="text" class="span4" name="renameFile" id="renameField" ng-model="renamed"/>
    <button class="btn-flat default" style="margin-top:-8px;margin-left:5px;" ng-click="rename(renamed)">Rename</button>
  </div>
</div>

<!--Copy Link-->
<div id="copylink" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  	<div id="folder-notice">
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Copy Link</h3>
  </div>
  <div class="modal-body">
  	<h5>Please Note : This Link is Valid for 24 Hours Only</h5><br/>
    <input type="text" class="span5" name="copy_link_input" id="copy_link_input" ng-model="copy_link_input"/>
  </div>
</div>

<script type="text/javascript">
window.copy_link_initialise=function()
{
	$('#copy_link_btn').zclip({

	        	path:'cloud-static/js/ZeroClipboard.swf',

	        	copy:$('#copy_link_input').val()

	        });
}
$(window).ready(function() {
			window.checkedfile=[];
			//check box selector
        	$('#check-all').click(function() {
        		$(".check-single").trigger('click').prop('checked', $(this).prop('checked'));
        		if(!document.getElementById('check-all').checked)
        		{
	        		window.checkedfile=[];
        		}
        	})
        	///grid view -list view
        	$('#grid-btn').click(function() {
        		$('#files-view').removeClass('list').addClass('grid');
        	});
        	$('#list-btn').click(function() {
        		$('#files-view').removeClass('grid').addClass('list');
        	});
        	$('#newFolder,#rename').on('hidden', function () {
	        		$( "#refresh" ).trigger( "click" );
			});
			$('#files-view').on('change', 'input[type=checkbox]', function(e) {

				if(this.checked&&window.checkedfile.indexOf(this.value) == -1)
					{
						window.checkedfile.push(this.value);
					}
				if(!this.checked)
				{
					window.checkedfile.splice(window.checkedfile.indexOf(this.value),1);
				}
        });
 });
</script>

<ul class="pager" style="position: absolute; bottom: 0;width:100%;">
<hr/>
  <li class="previous pull-left">
    <a ng-click="pagination(-1)">&larr; Older</a>
  </li>
  <li class="next pull-right" style="margin-right:50px;">
    <a ng-click="pagination(+1)">Newer &rarr;</a>
  </li>
</ul>
