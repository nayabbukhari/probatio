<?php
ob_start();
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    session_start();   
    include("connection.php");
 }
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $role=$_SESSION['role'];
}else{
    header("location:index.php");
}
echo    '<head>
        <meta charset="utf-8">
        <title>Probatio Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/merge.css" rel="stylesheet">
        </head>
        <script type="text/javascript">';
?>
function checkpass(str){
<!-- alert(str); -->
    if(str == ""){
        document.getElementById("show").innerHTML = "";
        return;
    }else{
        if(window.XMLHttpRequest){
            <!-- code for IE7+, Firefox, Chrome, Opera, Safari -->
            xmlhttp = new XMLHttpRequest();
        }else{
            <!-- code for IE6, IE5 -->
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","checkpassword.php?f=1&&q="+str,true);
        xmlhttp.send();
        }
	}

function validation(){  
    var phone = document.getElementById("phone");
    var numbers = /^[0-9]+$/;  
    if(phone.value.match(numbers)){  
         <!-- alert('Your Registration number has accepted....'); -->  
          document.form1.phone.focus();  
          return true;  
    }else{  
        alert('Please input numeric values only in phone number');  
        document.form1.phone.focus();  
        return false;  
    }  
}   
<?php
echo    '</script>
        <script type="text/javascript">';
?>
function myFunction(){
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2){
        alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "rgb(52, 208, 227)";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }else{
      <!-- alert("Passwords Match!!!"); -->
    }
    return ok;
}
<?php
echo    '</script>
        <body class="overflow-hidden">
        <!-- Overlay Div -->
        <!--___________________________overlay_________________________-->';
include("overlay.php");
echo    '<!--___________________________.overlay________________________-->
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
		<ul class="breadcrumb"><br /><br />
		<li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
		<li>Setting</li>	 
		<li class="active">Profile</li>	 
		</ul>
		</div><!--breadcrumb-->
		<ul class="tab-bar grey-tab">
		<li class="active">
		<a href="#edit" data-toggle="tab">
		<span class="block text-center">
		<i class="fa fa-edit fa-2x"></i> 
		</span>
		Edit Profile
		</a>
		</li>
		<li>
		<a href="#message" data-toggle="tab">
		<span class="block text-center">
		<i class="fa fa-exchange fa-2x"></i> 
		</span>	
		Change Password
		</a>
		</li>
		</ul>';


$user=$_SESSION['user'];
$users=get_records_sql("select * from pia_login where email='$user'");
foreach ($users as $usr){
    $effectivedate= $usr->d_o_b; 
	$effectivedate = str_replace('-', '/', $effectivedate);
	$effectivedate = date('d/m/Y', strtotime($effectivedate));
	//echo $effectivedate; 
echo    '<div class="padding-md">
		<div class="row">
		<div class="col-md-3 col-sm-3">
		<div class="row">
		<div class="col-xs-6 col-sm-12 col-md-6 text-center" >
		<a href="#" class="image-wrapper gallery-zoom cboxElement">
		<img src="'.$usr->path.'" alt="User Avatar" style="height: 125px;" class="img-thumbnail">
		</a>
        <div class="seperator"></div>
		<div class="seperator"></div>
		</div><!-- /.col -->
		<div class="col-xs-6 col-sm-12 col-md-6" style="padding: 0px ! important;">
		<strong class="font-14">'.$usr->username.'</strong>
		<small class="block text-muted">
        '.$usr->email.'
		</small> 
		<div class="seperator"></div>
		<a class="btn btn-success btn-xs m-bottom-sm">Follow</a>
		<div class="seperator"></div>
		<a href="#" class="social-connect tooltip-test facebook-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
		<a href="#" class="social-connect tooltip-test twitter-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
		<a href="#" class="social-connect tooltip-test google-plus-hover pull-left" data-toggle="tooltip" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a>
		<div class="seperator"></div>
		<div class="seperator"></div>
		</div><!-- /.col -->
		</div><!-- /.row -->
		<!-- /panel -->
		</div><!-- /.col -->
		<div class="col-md-9 col-sm-9">
		<div class="tab-content">
		<div class="tab-pane fade in active" id="edit">
		<div class="panel panel-default">
		<form name="form1" class="form-horizontal form-border" action="update_profile.php" onSubmit="return validation()">
		<div class="panel-heading">
		Basic Information
		</div>
		<div class="panel-body">
		<div class="form-group">
		<label class="control-label col-md-2">Username</label>												
		<div class="col-md-10">
        <input type="hidden" placeholder="Full name" value="'.$usr->id.'" class="form-control input-sm parsley-validated " data-required="true" name="id">
		<input type="text" class="form-control input-sm" placeholder="Username" name="user_name" value="'.$usr->username.'">
		</div><!-- /.col -->
		</div><!-- /form-group -->
		<!--	<div class="form-group">
		<label class="control-label col-md-2">Password</label>
		<div class="col-md-10">
		<input type="password" class="form-control input-sm" value="Password">
		</div><!-- /.col 
		</div><!-- /form-group -->
		<div class="form-group">
		<label class="control-label col-md-2">Email</label>
		<div class="col-md-10">
		<input type="email" name="email" readonly class="form-control input-sm" value="'.$usr->email.'">
		</div><!-- /.col -->
		</div><!-- /form-group -->
        <div class="form-group">
		<label class="control-label col-md-2">Role</label>
		<div class="col-md-10">
		<input type="text" name="role" readonly class="form-control input-sm" value="'.$usr->role.'">
		</div><!-- /.col -->
		</div><!-- /form-group -->
		<div class="form-group">
		<label class="control-label col-md-2">Phone</label>
		<div class="col-md-10">
		<input type="text" name="phone" id="phone" class="form-control input-sm" value="'.$usr->phone.'">
		</div><!-- /.col -->
		</div><!-- /form-group -->
        <div class="form-group">
		<label class="control-label col-md-2">Birth date </label>
        <div class="col-md-10">
        <div class="input-group">
		<input type="text" required  name="dob"  class="datepicker form-control" value="'.$effectivedate.'">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div><!-- /.col -->
        </div>
        </div><!-- /form-group -->
        </div>
		<div class="panel-footer">
		<div class="text-right">
		<button class="btn btn-sm btn-success">Update</button>
		<button class="btn btn-sm btn-success" type="reset">Reset</button>
		</div>
		</div>
		</form>
		</div><!-- /panel -->
		</div><!-- /tab2 -->
		
        <div class="tab-pane fade" id="message">
		<div class="panel panel-default">
		<form class="form-horizontal form-border" action="change_password.php"  onSubmit="return myFunction()">
		<div class="panel-heading">
        Create password
		</div>
		<div class="panel-body">
		<div class="form-group">
		<label class="control-label col-md-3">Old password</label>												
		<div class="col-md-9">
        <input type="hidden" placeholder="Full name" value="'.$usr->id.'" class="form-control input-sm parsley-validated " data-required="true" name="id">
		<input type="password" required onBlur="checkpass(this.value)" required class="form-control input-sm" placeholder="Old password" value=""><span style="color:#FF0000;" id="show"></span>
		</div><!-- /.col -->
		</div><!-- /form-group -->
		<div class="form-group">
		<label class="control-label col-md-3">New password</label>
		<div class="col-md-9">
		<input type="password" name="pass" id="pass1" required class="form-control input-sm" placeholder="New password">
		</div><!-- /.col -->
		</div><!-- /form-group -->
		<div class="form-group">
		<label class="control-label col-md-3">Confirm password</label>
		<div class="col-md-9">
		<input type="password" name="c_pass" id="pass2" required class="form-control input-sm" placeholder="Confirm password">
		</div><!-- /.col -->
		</div><!-- /form-group -->
        </div>

        <div class="panel-footer">
		<div class="text-right">
		<button id="check" class="btn btn-sm btn-success check">Update</button>
		<button class="btn btn-sm btn-success" type="reset">Reset</button>
		</div>
		</div>
		</form>
		</div><!-- /panel -->
		</div><!-- /tab3 -->
		</div><!-- /tab-content -->
		</div><!-- /.col -->
		</div><!-- /.row -->			
		</div><!-- /.padding-md -->';
    }
echo    '</div><!-- /main-container -->
        </div><!-- /wrapper -->
        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        <!--____________________footer___________________________-->';
include("footer.php");
echo    '<!--____________________footer___________________________--> 
        <!-- Le javascript================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Chosen -->
        <script src="js/chosen.jquery.min.js"></script>	
        <!-- Mask-input -->
        <script src="js/jquery.maskedinput.min.js"></script>	
        <!-- Datepicker -->
        <script src="js/bootstrap-datepicker.min.js"></script>	
        <!-- Timepicker -->
        <script src="js/bootstrap-timepicker.min.js"></script>	
        <!-- Slider -->
        <script src="js/bootstrap-slider.min.js"></script>	
        <!-- Tag input -->
        <script src="js/jquery.tagsinput.min.js"></script>	
        <!-- WYSIHTML5 -->
        <script src="js/wysihtml5-0.3.0.min.js"></script>	
        <script src="js/uncompressed/bootstrap-wysihtml5.js"></script>	
        <!-- Dropzone -->
        <script src="js/dropzone.min.js"></script>	
        <!-- Modernizr -->
        <script src="js/modernizr.min.js"></script>
        <!-- Pace -->
        <script src="js/pace.min.js"></script>
        <!-- Popup Overlay -->
        <script src="js/jquery.popupoverlay.min.js"></script>
        <!-- Slimscroll -->
        <script src="js/jquery.slimscroll.min.js"></script>
        <!-- Cookie -->
        <script src="js/jquery.cookie.min.js"></script>
        <!-- Endless -->
        <script src="js/endless/endless_form.js"></script>
        <script src="js/endless/endless.js"></script>
		<!-- Datatable -->
        <script src="js/jquery.dataTables.min.js"></script>	
        </body>
        </html>';

if(isset($_GET['s'])){
    if($_GET['s']=='3'){ 
echo    '<script>
        alert("Profile Successfully Updated");
        </script>';
}else{
echo    '<script>
        alert("Password Successfully Changed");
        </script>';
    }
}
?>