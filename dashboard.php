<?php
ob_start();
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    session_start();   
 }
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $role=$_SESSION['role'];
}else{
    header("location:index.php");
}

include("connection.php");

$users=get_record_sql("select * from pia_login where email='$user'");
//var_dump($user);
$permissions=$users[0]->permissions;
$permission = explode(',',$permissions);
//var_dump($permission);
if(!in_array("Dashboard", $permission)){
    header("location:error404.html");   //echo "Match not found";
}
ob_flush();
echo    '<head><title>Probatio Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Pace -->
        <!-- Color box -->
        <link href="css/colorbox/colorbox.css" rel="stylesheet">
        <link href="css/merge.css" rel="stylesheet">
        </head>

        <body class="overflow-hidden">
        <!-- Overlay Div -->
        <!--___________________________overlay_________________________-->';
        include("overlay.php");
echo   '<!--___________________________.overlay________________________-->
        <!-- /theme-setting -->
        <div id="wrapper" class="preload">
        <!--___________________________topbar_________________________-->';
        include("topbar.php");
echo    '<!--___________________________.topbar________________________-->
        <!-- /top-nav-->
        <!--___________________________left sidebar_________________________-->';
        include("leftsidebar.php");
echo    '<!--___________________________.left sidebar________________________-->
        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <br /><br />
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li class="active">Dashboard</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header -->
    
    <div class="grey-container shortcut-wrapper"> <a href="#" class="shortcut-link"><span class="shortcut-icon"> <i class="fa fa-bar-chart-o"></i> </span> <span class="text">Statistic</span> </a> <a href="#" class="shortcut-link"> <span class="shortcut-icon"> <i class="fa fa-envelope-o"></i> <span class="shortcut-alert"> 5 </span> </span> <span class="text">Messages</span> </a> <a href="add_user.php" class="shortcut-link"> <span class="shortcut-icon"> <i class="fa fa-user"></i> </span> <span class="text">New Users</span></a> <a href="#" class="shortcut-link"> <span class="shortcut-icon"> <i class="fa fa-globe"></i> <span class="shortcut-alert"> 7 </span> </span> <span class="text">Notification</span> </a> <a href="activities.php" class="shortcut-link"> <span class="shortcut-icon"> <i class="fa fa-list"></i> </span> <span class="text">Activity</span> </a> <a href="profile.php" class="shortcut-link"> <span class="shortcut-icon"> <i class="fa fa-cog"></i></span> <span class="text">Setting</span> </a> </div>
    <!-- /grey-container -->
    
    <div class="padding-md">
      <div class="row">';
                //include("connection.php");
                $cnt=get_record_sql("select count(*) AS supervisor from pia_login where role='SUPERVISORS'");
/*
                $_result1=mysqli_query($con,"select count(*) from pia_login where role='SUPERVISORS'");
                while($row=mysqli_fetch_array($_result1))
                {
                $cnt=$row[0];
                }
                */
                //var_dump($cnt);
    
echo        '<div class="col-sm-6 col-md-3">
            <div class="panel-stat3 bg-danger">
            <h2 class="m-top-none" id="">';
echo        $cnt[0]->supervisor;
echo        '</h2>
            <h5>SUPERVISORS</h5>
            <i class="fa fa-arrow-circle-o-up fa-lg"></i><span class="m-left-xs"></span>
            <div class="stat-icon"> <i class="fa fa-user fa-3x"></i> </div>
            <div class="refresh-button"> <i class="fa fa-refresh"></i> </div>
            <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
          </div>
        </div>';
        
        $cnt=get_record_sql("select count(*) AS agent from pia_login where role='AGENTS'");
echo    '<!-- /.col -->
        <div class="col-sm-6 col-md-3">
          <div class="panel-stat3 bg-info">
            <h2 class="m-top-none"><span id="serverloadCount">';
echo        $cnt[0]->agent; 
echo        '</span></h2>
            <h5>AGENTS</h5>
            <i class="fa fa-arrow-circle-o-up fa-lg"></i><span class="m-left-xs"></span>
            <div class="stat-icon"> <i class="fa fa-users fa-3x"></i> </div>
            <div class="refresh-button"> <i class="fa fa-refresh"></i> </div>
            <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
          </div>
        </div>
        <!-- /.col -->';

        $cnt=get_record_sql("select count(*) AS customer from pia_login where role='customer'");
echo    '<div class="col-sm-6 col-md-3">
          <div class="panel-stat3 bg-warning">';
echo        $cnt[0]->customer;             
echo        '<h2 class="m-top-none" id="orderCount">12</h2>
            <h5>Customers</h5>
            <i class="fa fa-arrow-circle-o-up fa-lg"></i><span class="m-left-xs"></span>
            <div class="stat-icon"> <i class="fa fa-shopping-cart fa-3x"></i> </div>
            <div class="refresh-button"> <i class="fa fa-refresh"></i> </div>
            <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 col-md-3">
          <div class="panel-stat3 bg-success">
            <h2 class="m-top-none" id="visitorCount">7214</h2>
            <h5>Lead / Client</h5>
            <i class="fa fa-arrow-circle-o-up fa-lg"></i><span class="m-left-xs"></span>
            <div class="stat-icon"> <i class="fa fa-bar-chart-o fa-3x"></i> </div>
            <div class="refresh-button"> <i class="fa fa-refresh"></i> </div>
            <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
          </div>
        </div>
        <!-- /.col --> 
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix"> <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i> Website Traffic</span>
              <ul class="tool-bar">
                <li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
              </ul>
            </div>
            <div class="panel-body" id="trafficWidget">
              <div id="placeholder" class="graph" style="height:250px"></div>
            </div>
            <div class="panel-footer">
              <div class="row row-merge">
                <div class="col-xs-3 text-center border-right">
                  <h4 class="no-margin">1232</h4>
                  <small class="text-muted">Visitors</small> </div>
                <div class="col-xs-3 text-center border-right">
                  <h4 class="no-margin">5421</h4>
                  <small class="text-muted">Orders</small> </div>
                <div class="col-xs-3 text-center border-right">
                  <h4 class="no-margin">3021</h4>
                  <small class="text-muted">Tickets</small> </div>
                <div class="col-xs-3 text-center">
                  <h4 class="no-margin">7098</h4>
                  <small class="text-muted">Customers</small> </div>
              </div>
              <!-- ./row --> 
            </div>
            <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
          </div>
          <!-- /panel -->
          <div class="row" id="last">
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading clearfix"> <span class="pull-left"> To Do List <span class="text-success m-left-xs"><i class="fa fa-check"></i></span> </span>
                  <ul class="tool-bar">
                    <li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
                    <li><a href="#toDoListWidget" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
                  </ul>
                </div>
                <div class="panel-body no-padding collapse in" id="toDoListWidget">
                  <ul class="list-group task-list no-margin collapse in">
                    <li class="list-group-item selected">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish" checked>
                        <span class="custom-checkbox"></span> </label>
                      SEO Optimisation <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Unit Testing <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Mobile Development <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> <span class="badge badge-success m-right-xs">3</span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Database Migration <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      New Frontend Layout <span class="label label-warning m-left-xs">PENDING</span> <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Bug Fixes <span class="label label-danger m-left-xs">IMPORTANT</span> <span class="pull-right"> <a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a> </span> </li>
                  </ul>
                  <!-- /list-group --> 
                </div>
                <div class="loading-overlay"> <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i> </div>
              </div>
              <!-- /panel --> 
            </div>
           <!-- /.col -->
           <div class="col-lg-4">
          <div class="panel bg-info fadeInDown animation-delay4">
            <div class="panel-body">
              <div id="lineChart" style="height: 150px;"></div>
              <div class="pull-right text-right"> <strong class="font-14">Balance $3210</strong><br/>
                <span><i class="fa fa-shopping-cart"></i> Total Sales 867</span>
                <div class="seperator"></div>
              </div>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-4"> Sales in June <strong class="block">$664</strong> </div>
                <!-- /.col -->
                <div class="col-xs-4"> Sales in July <strong class="block">$731</strong> </div>
                <!-- /.col -->
                <div class="col-xs-4"> Sales in August <strong class="block">$912</strong> </div>
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
            </div>
          </div>
          <!-- /panel -->
          
          <div class="panel panel-default" style="display:none">
            <div class="panel-body">
              <div id="donutChart" style="height: 250px;"></div>
              <!-- panel-group --> 
            </div>
          </div>
          <!-- /panel --> 
        </div>
           <!-- /.col --> 
           
    <div class="col-lg-4">
     <div class="panel bg-success fadeInDown animation-delay5">
            <div class="panel-body">
              <div id="barChart" style="height: 210px;"></div>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-6">
                  <h4 class="no-margin">Total Earnings</h4>
                </div>
                <!-- /.col -->
                <div class="col-xs-6 text-right">
                  <h4 class="no-margin">$17,531</h4>
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
            </div>
          </div>
          </div>
          <!-- /panel -->
            
            
            <!-- /.col -->
            <div class="col-lg-6">
              <!-- /panel --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- ./row --> 
        </div>
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.padding-md --> 
  </div>
  <!-- /main-container --> 
  <!-- Footer================================================== -->
  <!--____________________footer___________________________-->';
  include("footer.php");
echo  '<!--____________________footer___________________________--> 
  <!--Modal-->
  <div class="modal fade" id="newFolder">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Create new folder</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="folderName">Folder Name</label>
              <input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          <a href="#" class="btn btn-danger btn-sm">Save changes</a> </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
</div>
<!-- /wrapper --> 
<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
<!-- Logout confirmation -->
<!-- Le javascript ================================================== --> 
<!--  ================================================== --> 
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery --> 
<script src="js/jquery-1.10.2.min.js"></script> 
<!-- Bootstrap --> 
<script src="bootstrap/js/bootstrap.js"></script> 
<!-- Flot --> 
<script src="js/jquery.flot.min.js"></script>

<!-- Datatable -->     
<script src="js/jquery.dataTables.min.js"></script>	
<!-- Modernizr -->
<script src="js/modernizr.min.js"></script>
<!-- Pace -->
<script src="js/pace.min.js"></script>
<!-- Endless -->
<script src="js/endless/endless.js"></script>
<!-- Morris --> 
<script src="js/rapheal.min.js"></script> 
<script src="js/morris.min.js"></script> 
<!-- Colorbox --> 
<script src="js/jquery.colorbox.min.js"></script> 
<!-- Sparkline --> 
<script src="js/jquery.sparkline.min.js"></script> 
<!-- Pace --> 
<script src="js/uncompressed/pace.js"></script> 
<!-- Popup Overlay --> 
<script src="js/jquery.popupoverlay.min.js"></script> 
<!-- Slimscroll --> 
<script src="js/jquery.slimscroll.min.js"></script> 
<!-- Modernizr --> 
<script src="js/modernizr.min.js"></script> 
<!-- Cookie --> 
<script src="js/jquery.cookie.min.js"></script> 
<!-- Endless --> 
<script src="js/endless/endless_dashboard.js"></script> 
<script src="js/endless/endless.js"></script>
';
?>