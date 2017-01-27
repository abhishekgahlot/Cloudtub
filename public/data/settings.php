<style>
.tab-content{
		padding:20px
	}
	.btn{
		color:white !important;
	}
@media (max-width: 767px) {

	#password-setting{
	margin-top:50px;
}
	}
</style>
<div id="settings-tab">
        <h2>Settings</h2>
</div>
    <div class="settings-tab">
        <div class="tabbable tabs-top">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#setting1" data-toggle="tab"><i class="icon-wrench"></i>  Account Settings</a></li>

                <li class=""><a href="#setting2" data-toggle="tab">API Settings</a></li>

                <li class=""><a href="#setting3" data-toggle="tab">Upload Settings</a></li>

                <li class=""><a href="#setting4" data-toggle="tab">Privacy Settings</a></li>

                 <li class=""><a href="#setting5" data-toggle="tab">Support</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="setting1">
                <div class="alert alert-info" ng-show="datasuccess">
                               <h5>  <i class="icon-ok-sign"></i>
                                {{datareceived}}</h5>
               </div>
               <div class="alert alert-error" ng-show="datafailed">
                               <h5> <i class="icon-remove-sign"></i>
                                {{datareceived}}</h5>
               </div>
               	<div id="basic-setting" class="span5 pull-left">
	                <h3>Basic settings</h3>
	                <hr/>
                                <label>Name:</label>
                                <input class="span4" type="text"  ng-model="name" />
                                <br/>
                                <label>Email:</label>
                                <input class="span4" type="text"   ng-model="email" disabled="disabled" />
                                <br/>
                                <br/>
                  				<h3>Change Password</h3>
                  				<hr/>
                                <label>Old Pass:</label>
                                <input class="span4" type="text" ng-model="oldpass" />
                                <br/>
                                <label>New Pass:</label>
                                <input class="span4" type="password" ng-model="newpass"  />
                                <br/>
                                <br/>
                                <input type="submit" ng-click="changeHandler(name,email,oldpass,newpass)" class="btn btn-large btn-flat primary" value="Change" />

                                  </div>


                </div>

                <div class="tab-pane" id="setting2">
                    <h4>API keys reset option not available in beta version.</h4>
                    <br/>
                   	 <label>API Key:</label>
                                <input class="span4" type="text"  ng-model="api" />
                                <br/>
                                <label>API Secret</label>
                                <input class="span4" type="text"   ng-model="apisecret" />
                                <br/>

                </div>

                <div class="tab-pane" id="setting3">
                    <h4>Sorry This Option Not available in beta</h4>
                </div>

                <div class="tab-pane" id="setting4">
                    <h4>Sorry This Option Not available in beta</h4>
                </div>

                <div class="tab-pane" id="setting5">
                    <h4>For Support Just Mail Us At <b>contact@cloudtub.com</b></h4>
                </div>

            </div>
        </div>
    </div>
