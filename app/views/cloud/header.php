<link href="cloud-static/css/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="cloud-static/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
<link href="cloud-static/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
<link href="cloud-static/css/font-awesome.css" type="text/css" rel="stylesheet" />
<link href="cloud-static/css/layout.css" rel="stylesheet" type="text/css"  />
<link href="cloud-static/css/elements.css" rel="stylesheet" type="text/css"  />
<link href="cloud-static/css/icons.css" rel="stylesheet" type="text/css"  />
<link href="cloud-static/css/uploader.css" type="text/css" rel="stylesheet" />
<link href='cloud-static/css/lib/fullcalendar.css' rel='stylesheet' />
<link href='cloud-static/css/lib/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<link href="cloud-static/css/prism1.css" rel="stylesheet" />
<link href="cloud-static/css/joyride-2.1.css" rel="stylesheet" />
<link href="cloud-static/css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="top-notify" class="alert" ng-controller="Files" ng-show="unverified" style="display:none;">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 <i class="icon-warning-sign"></i>
<b>You Haven't Activated Your Account, Please Activate Using Link sent to your Email</b>
</div>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="index.html">Cloudtub</a>
            <ul class="nav pull-right">
                <li class="hidden-phone">
                    <input class="search" type="text" placeholder="Search" />
                </li>

                <li class="settings hidden-phone">
                    <a href="logout" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="sidebar-nav" ng-controller="Sidebar">
        <ul id="dashboard-menu">
            <li id="upload" class="">
                <a>
                    <i class="icon-cloud-upload"></i>
                    <span>Upload</span>
                </a>
            </li>
            <li id="files" ng-class="navClass('files')">
            <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="#/files">
                    <i class="icon-th-large"></i>
                    <span>Files</span>
                </a>
            </li>
             <li id="trash" ng-class="navClass('trash')">
                <a href="#/trash">
                    <i class="icon-trash"></i>
                    <span>Trash</span>
                </a>
            </li>
            <li id="calendar" ng-class="navClass('calendar')">
                <a href="#/calendar">
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>
            <li id="settings" ng-class="navClass('settings')">
                <a href="#/settings">
                    <i class="icon-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
           </ul>
    </div>
