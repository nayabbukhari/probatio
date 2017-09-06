<?php
include_once ('connection.php');
// Set Turn off all error reporting in live server. 
//error_reporting(0);
//if(isset($_COOKIE["role"])){
    // There is a session already available
//    redirect("dashboard.php");
//}
if((!empty($_POST['username']))&& (!empty($_POST['password']))){
ob_start();
//session_start();
//include_once ('topbar.php');
$user_name=$_POST['username'];
$password = (md5($_POST["password"]));  
$user=get_record_sql("SELECT * FROM pia_login where email='$user_name' AND password='$password'");    
    
if(!$user){
    //var_dump ($user);
    redirect("index.php", 'Invalid User Name or Password, Please contact WebMaster nayab@myprobatio.com');
    echo    '<div class="alert text-center">
        <i class="fa fa-warning"></i><span class="m-left-xs has-error">Invalid Username Or  Password</span>
        </div>';
       
    }else{
    ob_start();
    session_start();
    // Turn off all error reporting
    error_reporting(0);
    $ip=$_SERVER['REMOTE_ADDR'];
    $user_agent= $_SERVER['HTTP_USER_AGENT'];

    executes("insert into pia_login_history(username,email,role,ip_address,user_agent,date_time) values('".$user[0]->username."', '".$user[0]->email."','".$user[0]->role."','".$ip."','".$user_agent."',NOW())");
    
    $_SESSION['user']=$user_name;
    $_SESSION['role']=$user[0]->role;
    $session_end= time() + 1800;         // 30 miniuts 60*30
    setcookie("expire", $session_end);
    $session_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];            
    setcookie("user", $user_name);
    executes("DELETE FROM pia_login_history 
                WHERE date_time  <= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    
    header("Location: dashboard.php");
    }
}

echo    '<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Endless -->
        <link href="css/merge.css" rel="stylesheet">
        <body style="background:rgb(54, 54, 54) none repeat scroll 0% 0%;">
        <div class="login-wrapper" style="top:83px;">
        <div class="text-center">
        <img src="img/Probatio-large.png">
	    <h3 class="fadeInUp animation-delay8" style="font-weight:bold">
	    <span class="text-success">Probatio Insurance </span> <span style="color:#ccc; text-shadow:0 1px #fff"> Application</span>
        </h3>
        </div>
        <div class="login-widget animation-delay1">	
        <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <div class="text-center" style="color: #65cea7;">
		<h3><i class="fa fa-lock fa-lg"></i>Login</h3>
        </div>
        <span class="pull-left"></span>
        </div>';

echo    '<div class="panel-body">
		<form class="form-login" method="post" action="index.php" enctype="multipart/form-data">
		<div class="form-group">
		<label>Email</label>
		<input type="text" placeholder="Email" class="form-control input-sm bounceIn animation-delay2" name="username" required>';

echo    '<div class="form-group">
		<label>Password</label>
		<input type="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4" name="password" required>';

echo    '</div>
		
		<hr/>
		<button class="btn btn-success btn-sm bounceIn animation-delay5  pull-right" type="submit" ><i class="fa fa-sign-in"></i> Sign in</button>
		</form>
		</div>
		</div><!-- /panel -->
		</div><!-- /login-widget -->
        </div><!-- /login-wrapper -->';

//    <!-- Le javascript    ================================================== -->
//    <!-- Placed at the end of the document so the pages load faster -->
//    <!-- Jquery -->
?>
	<script src="js/jquery-1.10.2.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
   
    <!-- Pace -->
	<script src='js/pace.min.js'></script>
   
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
   
    <!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
   
	<!-- Cookie -->
	<script src='js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="js/endless/endless.js"></script>

<?php
ob_flush();
?>