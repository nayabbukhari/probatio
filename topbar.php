<?php
ob_start();
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    //session_start();   
    //include("connection.php");
 }
ob_flush();
//include("connection.php");
$user=$_SESSION['user'];
$users=get_record_sql("select * from pia_login where email='$user'");

echo    '<!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="css/merge.css" rel="stylesheet">
    
    <div id="top-nav" class="fixed skin-6"> <a href="#" style="width:194px;" class="brand"><span class="text-toggle"><img style="padding: 10px;" src="img/Probatio-Large.png" width="60%" height="Auto"></span></a><!-- /brand -->
    <button type="button" class="navbar-toggle pull-left" id="sidebarToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a href="dashboard.php" class="brand"> <span>Probatio Insurance Application</span> </a><!-- /brand -->
    
    <ul class="nav-notification clearfix">
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-lg"></i> <span class="notification-label bounceIn animation-delay4">7</span> </a>
        <ul class="dropdown-menu message dropdown-1">
          <li><a>You have 4 new unread messages</a></li>
          <li> <a class="clearfix" href="#"> <img src="img/user.jpg" alt="User Avatar">
            <div class="detail"> <strong>John Doe</strong>
              <p class="no-margin"> Lorem ipsum dolor sit amet... </p>
              <small class="text-muted"><i class="fa fa-check text-success"></i> 27m ago</small> </div>
            </a> </li>
          <li> <a class="clearfix" href="#"> <img src="img/user2.jpg" alt="User Avatar">
            <div class="detail"> <strong>Jane Doe</strong>
              <p class="no-margin"> Lorem ipsum dolor sit amet... </p>
              <small class="text-muted"><i class="fa fa-check text-success"></i> 5hr ago</small> </div>
            </a> </li>
          <li> <a class="clearfix" href="#"> <img src="img/user.jpg" alt="User Avatar">
            <div class="detail"> <strong>Bill Doe</strong>
              <p class="no-margin"> Lorem ipsum dolor sit amet... </p>
              <small class="text-muted"><i class="fa fa-reply"></i> Yesterday</small> </div>
            </a> </li>
          <li> <a class="clearfix" href="#"> <img src="img/user2.jpg" alt="User Avatar">
            <div class="detail"> <strong>Baby Doe</strong>
              <p class="no-margin"> Lorem ipsum dolor sit amet... </p>
              <small class="text-muted"><i class="fa fa-reply"></i> 9 Feb 2013</small> </div>
            </a> </li>
          <li><a href="#">View all messages</a></li>
        </ul>
      </li>
      <li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-tasks fa-lg"></i> <span class="notification-label bounceIn animation-delay5">4</span> </a>
        <ul class="dropdown-menu task dropdown-2">
          <li><a href="#">You have 4 tasks to complete</a></li>
          <li> <a href="#">
            <div class="clearfix"> <span class="pull-left">Bug Fixes</span> <small class="pull-right text-muted">78%</small> </div>
            <div class="progress">
              <div class="progress-bar" style="width:78%"></div>
            </div>
            </a> </li>
          <li> <a href="#">
            <div class="clearfix"> <span class="pull-left">Software Updating</span> <small class="pull-right text-muted">54%</small> </div>
            <div class="progress progress-striped">
              <div class="progress-bar progress-bar-success" style="width:54%"></div>
            </div>
            </a> </li>
          <li> <a href="#">
            <div class="clearfix"> <span class="pull-left">Database Migration</span> <small class="pull-right text-muted">23%</small> </div>
            <div class="progress">
              <div class="progress-bar progress-bar-warning" style="width:23%"></div>
            </div>
            </a> </li>
          <li> <a href="#">
            <div class="clearfix"> <span class="pull-left">Unit Testing</span> <small class="pull-right text-muted">92%</small> </div>
            <div class="progress progress-striped active">
              <div class="progress-bar progress-bar-danger " style="width:92%"></div>
            </div>
            </a> </li>
          <li><a href="#">View all tasks</a></li>
        </ul>
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bell fa-lg"></i> <span class="notification-label bounceIn animation-delay6">5</span> </a>
        <ul class="dropdown-menu notification dropdown-3">
          <li><a href="#">You have 5 new notifications</a></li>
          <li> <a href="#"> <span class="notification-icon bg-warning"> <i class="fa fa-warning"></i> </span> <span class="m-left-xs">Server #2 not responding.</span> <span class="time text-muted">Just now</span> </a> </li>
          <li> <a href="#"> <span class="notification-icon bg-success"> <i class="fa fa-plus"></i> </span> <span class="m-left-xs">New user registration.</span> <span class="time text-muted">2m ago</span> </a> </li>
          <li> <a href="#"> <span class="notification-icon bg-danger"> <i class="fa fa-bolt"></i> </span> <span class="m-left-xs">Application error.</span> <span class="time text-muted">5m ago</span> </a> </li>
          <li> <a href="#"> <span class="notification-icon bg-success"> <i class="fa fa-usd"></i> </span> <span class="m-left-xs">2 items sold.</span> <span class="time text-muted">1hr ago</span> </a> </li>
          <li> <a href="#"> <span class="notification-icon bg-success"> <i class="fa fa-plus"></i> </span> <span class="m-left-xs">New user registration.</span> <span class="time text-muted">1hr ago</span> </a> </li>
          <li><a href="#">View all notifications</a></li>
        </ul>
      </li>
        <li class="profile dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <strong>';
echo    $users[0]->username;
echo    '</strong> <span><i class="fa fa-chevron-down"></i></span> </a>
        <ul class="dropdown-menu">
        <li> <a class="clearfix" href="#"> <img src="';
echo    $users[0]->path; 
echo    '"alt="User Avatar">
        <div class="detail"> <strong>';
echo    $users[0]->username;
echo    '</strong><span style="color: rgb(21, 126, 183);">&nbsp;&nbsp;(';
echo    $users[0]->role; 
echo    ')</span><p class="grey">';
echo    $users[0]->email;
echo    '</p></div></a></li>
        <li><a tabindex="-1" href="profile.php" class="main-link"><i class="fa fa-edit fa-lg"></i> My profile</a></li>
        <li><a tabindex="-1" href="user_list.php" class="theme-setting"><i class="fa fa-cog fa-lg"></i> Setting</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" class="main-link logoutConfirm_open" href="#logoutConfirm"><i class="fa fa-lock fa-lg"></i>Log out</a></li>
        </ul>
      </li>
    </ul>
  </div>';
 ?>
