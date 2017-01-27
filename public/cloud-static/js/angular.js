window.page=1;
angular.module('cloudtub', ['$strap.directives','ajoslin.promise-tracker','XHR','ngSanitize'])

.config(function ($routeProvider){

	$routeProvider
		.when('/',{
			controller:'Home',
			templateUrl:'data/files.php'
		})
		.when('/files',{

			templateUrl:'data/files.php',
			controller:'Files',
			reloadOnSearch: false,

		})
		.when('/trash',{

			templateUrl:'data/trash.php',
			controller:'Trash',
			reloadOnSearch: true
		})

		.when('/files/*path',{

			templateUrl:'data/files.php',
			controller:'Files',
			reloadOnSearch: true,
			caseInsensitiveMatch: true
		})

		.when('/calendar',{

			templateUrl:'data/calendar.php',
			controller:'Calendar',
			reloadOnSearch: false

		})
		.when('/settings',{

			templateUrl:'data/settings.php',
			controller:'Settings'

		})
		.when('/view/*file',{
			templateUrl:'data/view.php',
			controller:'View',
			caseInsensitiveMatch: true

		});
})


.controller('Home',function($scope,$modal,$routeParams,$location){
	$location.path('/files');
})
.controller('Files',function($scope,$routeParams,$http,promiseTracker,$timeout,$location,$route){
	if(window.page>1)
	{
		$scope.filepagename=true;
		$scope.page=window.page;
	}
	$http.get('/basic').then(function(res)
	{
		if(res.data.verified==0)
		{
			$scope.unverified=true;
		}
	});

	$scope.ninjaTracker = promiseTracker('loader');

	function fetchData(url)
	{
		    url  = typeof  url  !== 'undefined' ? url   : 'Lw==';
		$http.get('/file/'+url+'/'+window.page).then(function(res){

	          if(res.data.error==='file')
	          {
	          	  $scope.files=false;
		          $scope.fileempty=true;
	          }
	          else if(res.data.error==='null')
	          {
		          $scope.files=false;
		          $scope.fileexist=true;
	          }
	           else if(res.data.error==='invalid')
	          {
		          $scope.files=false;
		          $scope.fileinvalid=true;
	          }
	          else if(res.data.error!=='file')
	          {
	          $scope.files = res.data;
	          }
	        });
	}

	$scope.pagination=function(page)
	{
		if(page==-1){
			//Decrement
			window.page-=1;

		}else
		{	//Increment
			window.page+=1;

		}
		$route.reload();
	}


	if(typeof $routeParams.path === 'undefined')
	{
		fetchData(Base64.encode('/'));

	}
	else if(typeof $routeParams.path !== 'undefined')
	{
		x=$routeParams.path;
		x.lastIndexOf("/")===x.length-1 ? null : $routeParams.path=x+'/';
		$scope.level=($routeParams.path.split("/").length-2);
		fetchData(Base64.encode($routeParams.path));
	}

   function downloadVal(val)
   {
	  return '/view/'+Base64.encode(val.substr(val.indexOf('/')+1,val.length));
   }
   function filename(val)
   {
	   return val.substr(val.lastIndexOf('/')+1,val.length)
   }

   $scope.deletefile=function(){
	   window.checkedfile.forEach(function(val) {
			    $http.get('/edit/'+val+'/delete').then(function(res)
			    {$route.reload();});
			});
			alertify.success(window.checkedfile.length+' items moved to trash.');
   }
   $scope.rename=function(renamed)
   {
	   if(typeof  renamed  !== 'undefined')
	   {
		 $http.get('/edit/'+window.renamekey+'/rename?value='+renamed).then(function(res){
		 	if(res.data.response=='success')
		 	{
			 	$('#rename').modal('hide');
		 	}
		 });
	   }else
	   {
		   $('#rename').modal('hide');
	   }
   }

   $scope.copylink=function()
   {


   }

   $scope.rightclk= function($event,guid,key,copy_link) {
	 			 $("#view-right").attr("href", '#/'+key);
	 			 $("#renameField").val(filename(key));
	 			 $("#download-right").attr("href", downloadVal(key)+'?download=true');
	 			 $('#rightclk-menu').hide();
 				 $('#rightclk-menu').css({top: $event.pageY+'px',left: $event.pageX+'px'});
 				 $('#rightclk-menu').show();
 				 window.renamekey=guid;
 				 $scope.copy_link_input="https://www.cloudtub.com/download/"+copy_link;
								   };

   $scope.leftclk= function($event,guid,key,copy_link) {
	 			 $("#view-right").attr("href", '#/'+key);
	 			 $("#renameField").val(filename(key));
	 			 $("#download-right").attr("href", downloadVal(key)+'?download=true');
	 			 $('.single-file-setting-option').click(function(e){
	 				e.stopPropagation();
	 				});
 				 $('#rightclk-menu').css({top: $event.pageY-100+'px',left: $event.pageX+'px'});
 				 $('#rightclk-menu').show();
 				 window.renamekey=guid;
 				 $scope.copy_link_input="https://www.cloudtub.com/download/"+copy_link;
    									   };
    $scope.foldercheck=function(foldername){
	    $.post("foldercheck",{ foldername:foldername },function( data ) {
	    				 if(data==0)
	    				 {
		    				 var info='<div class="alert alert-error"><i class="icon-remove-sign"></i>Folder Already Exists</div>';
	    				 }
	    				 else if(data==1)
	    				 {
		    				 var info='<div class="alert alert-info"><i class="icon-ok-sign"></i>Folder Created</div>';
	    				 }
	    				 else if(data.error=='invalid')
	    				 {
		    				var info='<div class="alert alert-error"><i class="icon-remove-sign"></i>Invalid Folder Name.Theses Chracters Are Not Allowed <br/> <pre class="alert-error"> . \ / ? * : | \ " < > </pre> </div>';
	    				 }
	    				 else
	    				 {
		    				var info='<div class="alert alert-error"><i class="icon-remove-sign"></i>Some Error Occured</div>';
	    				 }
					  $("#folder-notice").html(info);
				});
				}
	$scope.reload=function(){
		$route.reload();
	}
})
.controller('Trash',function($scope,$routeParams,$http,promiseTracker,$timeout,$location,$route,$filter){

		$http.get('/trash/show/all').then(function(res){
	          if(res.data.error==='file')
	          {
	          	  $scope.files=false;
		          $scope.fileempty=true;
	          }
	          else if(res.data.error==='null')
	          {
		          $scope.files=false;
		          $scope.fileexist=true;
	          }
	           else if(res.data.error==='invalid')
	          {
		          $scope.files=false;
		          $scope.fileinvalid=true;
	          }
	          else if(res.data.error!=='file')
	          {
	          $scope.files = res.data;
	          }
	        });


	 $scope.$watch('files', function(check, uncheck) {
      if (check !== uncheck) {
         $scope.checked = [];
         angular.forEach($filter('filter')(check, {key:true}), function(file) {
         $scope.checked.push(file.guid);
         	});
       	}
      }, true);

	 $scope.deletetrash=function(p)
	 {
		 if(p==='all')
	 	{
	 		$http.get('/trash/delete/all').then(function(res)
			    {});
		 	alertify.alert('All items permanently deleted.');
		 	$route.reload();

	 	}else
	 	{
			 $scope.checked.forEach(function(val) {
			    $http.get('/trash/delete/'+val).then(function(res)
			    {});
			});
			alertify.alert($scope.checked.length+' items permanently deleted.');
			$route.reload();
		}
	 }

	 $scope.recovertrash=function(p){
	 	if(p==='all')
	 	{
	 		$http.get('/trash/recover/all').then(function(res)
			    {});
		 	alertify.alert('All items restored.');
		 	$route.reload();

	 	}else
	 	{
			 $scope.checked.forEach(function(val) {
			    $http.get('/trash/recover/'+val).then(function(res)
			    {});
			});
			alertify.alert($scope.checked.length+' items restored.');
			$route.reload();
		}
	 }
	 $scope.reload=function(){
		$route.reload();
	}

})
.controller('Sort',function($scope,$routeParams){


})
.controller('Calendar',function($scope,$routeParams){


})
.controller('Settings',function($scope,$routeParams,$http){

$http.get('/settings/name,email,api').then(function(res){
				        	$scope.name=res.data.name;
				        	$scope.email=res.data.email;
				        	$scope.api=res.data.api;
				        	$scope.apisecret=res.data.apisecret;
				     });
$scope.changeHandler=function(name,email,oldpass,newpass)
	{
			var array=new Array();
			array[0]=name;array[1]=oldpass;array[2]=newpass;
			array.forEach(function(e,i){if(typeof  e  === 'undefined'){array[i]='';}});
			var postdata = {
			      'name' : array[0],
			      'oldpass':array[1],
			      'newpass':array[2]
			    };
			$http.post('settings',postdata).then(function(res){
				$scope.datareceived=res.data;
				if(res.data=='success'){
					$scope.datasuccess=true;
					$scope.datafailed=false;
					$scope.datareceived="Changes Saved";
				}else
				{	$scope.datasuccess=false;
					$scope.datafailed=true;
				}
			});


	}

})
.controller('View',function($scope,$routeParams,$http,promiseTracker){

	filename=$routeParams.file;
	$scope.filename=filename.substr(filename.lastIndexOf('/')+1,filename.length);
	$scope.fileurl=Base64.encode($routeParams.file);
	$scope.filedownload=$scope.fileurl+'?download=true';
	$scope.fileoriginal=$scope.fileurl;
	$http.get('/view/'+$scope.fileurl+'?data=true').then(function(res)
	{
		if(res.data.type=='image')
		{
			$scope.file_is_image=true;
		}else if(res.data.type.code)
		{
			$scope.file_is_code=true;
			$scope.file_code_val=res.data.type.code;
			PrismXHR();
		}else if(res.data.type=='downloadable')
		{
			$scope.file_is_dl=true;
		}

	});

})

.controller('Sidebar', ['$scope', '$location', function ($scope, $location) {
    $scope.navClass = function (page) {
        var currentRoute = $location.path().substring(1) || '/';
        if(currentRoute != "/")
        {
         $( ".pointer" ).remove();
         var id=currentRoute.substring(0,currentRoute.indexOf('/'));
         if(id==="")
         {
         $("#"+currentRoute).append('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
         }else
         {
	       $("#"+id).append('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
         }
        }else if(currentRoute === "/"){
	     $( ".pointer" ).remove();
         $("#home").append('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        }
        return page === currentRoute ? 'active' : '';
    };
}])
//Directive for right click
.directive('ngRightClick', function($parse) {
    return function(scope, element, attrs) {
        var fn = $parse(attrs.ngRightClick);
        element.bind('contextmenu', function(event) {
            scope.$apply(function() {
                event.preventDefault();
                fn(scope, {$event:event});
            });
        });
    };
})
.directive("ngDelete", function($http)
{
	 return {
        restrict:'A',
        link:function (scope, element, attrs) {
           element.bind('click',function(){
           alertify.set({ labels: { ok  : "Yes", cancel : "No"} });
           alertify.set({ buttonReverse: true });
	       alertify.confirm("Are You Sure You Want to Delete This?", function (e) {
		    if (e) {
		       	     $http.get('/edit/'+window.renamekey+'/delete').then(function(res){
				        	alertify.success("Item Moved To Trash");
				     });
				     $( "#refresh" ).trigger( "click" );
		    }
		});
                   });
        }
    };
})
.directive('checkboxAll', function () {
  return function(scope, iElement, iAttrs) {
    var parts = iAttrs.checkboxAll.split('.');
    iElement.attr('type','checkbox');
    iElement.bind('change', function (evt) {
      scope.$apply(function () {
        var setValue = iElement.prop('checked');
        angular.forEach(scope.$eval(parts[0]), function (v) {
          v[parts[1]] = setValue;
        });
      });
    });
    scope.$watch(parts[0], function (newVal) {
      var hasTrue, hasFalse;
      angular.forEach(newVal, function (v) {
        if (v[parts[1]]) {
          hasTrue = true;
        } else {
          hasFalse = true;
        }
      });
      if (hasTrue && hasFalse) {
        iElement.attr('checked', false);
      } else {
        iElement.attr('checked', hasTrue);
      }
    }, true);
  };
});
