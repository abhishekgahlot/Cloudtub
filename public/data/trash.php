<style>
	.modal-backdrop,
.modal-backdrop.fade.in {
  opacity: 0.8;
  filter: alpha(opacity=80);
  background: white;
}
#rename,#newFolder
{top:25%;}
.alertify-inner {
	font-size: 18px;
}
</style>
<div id="files-setting" class="dropdown">
	   <h2 class="pull-left" href="#/trash">Trash</h2>

	   <a  class="btn pull-right" id="sort"  ng-click="order='filename';reverse=!reverse">Sort </a>
	    <a  class="btn dropdown-togglen pull-right" id="sort" data-toggle="dropdown" href="#">Options<span class="caret"></span></a>
		  		<ul class="dropdown-menu pull-right">
                  <li><a href="" ng-click="deletetrash();">Delete</a></li>
                  <li><a href="" ng-click="recovertrash();">Restore</a></li>
                </ul>
      <span><button id="refresh" class="btn pull-right" ng-click="reload();"><i class="icon-refresh"></i> </button></span>
      <a class="btn btn-large btn-flat white pull-right" id="new-folder" ng-click="recovertrash('all');">Restore All</a>
      <a class="btn btn-large btn-flat white pull-right" id="new-folder" ng-click="deletetrash('all');">Delete All</a>
   	</div>
 	<hr/>
   	<div id="files-view" class="grid">
	   	<div ng-repeat="file in files | orderBy:order:reverse ">
		   	<div class="well span3 file" id="file-well" ng-right-click="rightclk($event,file.guid,file.key);">
			   	<a onclick="alertify.alert('This item can\'t be Opened ,because its in Trash.');"><div class="file-data">
				   	<center><img ng-src="https://www.cloudtub.com/thumb/{{file.thumb}}"/></center>
				   		<h5 class="file-name">{{file.filename}}</h5>
				</div></a>
					<span class="pull-right"><input  type="checkbox" class="check-single" ng-model="file.key" /></span>
				<hr/>

			</div>
	 </div>
</div>