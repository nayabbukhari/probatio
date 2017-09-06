<?php
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
        <link href="css/probatio.css" rel="stylesheet">

        <script type="text/javascript">';
?>
function checkemail(str){
<!--alert(str);-->
    if(str == ""){
        document.getElementById("show").innerHTML = "";
        return;
        }else{
        if(window.XMLHttpRequest){
            <!--code for IE7+, Firefox, Chrome, Opera, Safari-->
            xmlhttp = new XMLHttpRequest();
        }else{
            <!--code for IE6, IE5-->
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET","checkemail.php?f=1&&q="+str,true);
        xmlhttp.send();
    }
}
	
function myFunction(){
<!--alert("hlo");-->
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if(pass1 != pass2){
        alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "rgb(52, 208, 227)";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }else{
        <!--alert("Passwords Match!!!");-->
    }
    return ok;
}
<?php  
echo    '</script>
        </head>
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
echo    '<aside class="fixed skin-6">
        <div class="sidebar-inner scrollable-sidebar">
        <div class="size-toggle"> <a class="btn btn-sm" id="sizeToggle"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> <i class="fa fa-power-off"></i> </a> </div>
        <div class="main-menu">
        <ul>
        <li><a href="dashboard.php"> <span class="menu-icon"> <i class="fa fa-desktop fa-lg"></i> </span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>
        <li class="active openable open"> <a href="#"> <span class="menu-icon"> <i class="fa fa-group fa-lg"></i> </span> <span class="text">Users Management</span> <span class="menu-hover"></span> </a>
        <ul class="submenu">
        <li class="active"><a href="user_management.php"><span class="submenu-label">Users Management</span></a></li>
        <li><a href="permissions.php"><span class="submenu-label">Permissions & Roles</span></a></li>
        <li><a href="login_history.php"><span class="submenu-label">Login history</span></a></li>
        </ul>
        </li>
        </ul>
        </div>
        <!-- /main-menu --> 
        </div>
        <!-- /sidebar-inner --> 
        </aside>
        <!--___________________________.left sidebar________________________-->
        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <br /><br />
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li><a href="user_management.php">User management</a></li>
        <li class="active">New User</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="">
        <div class="panel panel-default">
        <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" onSubmit="return myFunction()"  action="get_new_user.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700;">User management
        </div>
        
        <div class="col-md-6 col-md-offset-3">';
if(isset($_GET['s'])){
    if($_GET['s'] == '1'){
echo    '<div class="alert alert-success text-center">
        <h4><strong><i class="fa  fa fa-check-square-o"></i>
        successfully create record please add a new.</strong></h4> 
        </div>';
        }elseif($_GET['s'] == '0'){
echo    '<div class="alert alert-success text-center">
         <h4><strong><i class="fa fa-exclamation-circle"></i>
        Unsuccessful please try again.</strong></h4> 
        </div>';
    } 
}

echo    '</div>
        <div class="panel-body">
        <div class="col-md-8">
        <div class="row">
            
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Full Name</label>
        <input type="text" placeholder="Full name" class="form-control input-sm parsley-validated " data-required="true" name="user_name">
        </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-6" id="TextBoxesGroup">
        <div class="form-group">
        <label class="control-label">Role</label>
        
        <select class="form-control input-sm parsley-validated" data-required="true" name="role">
        <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
        <option value="SUPERVISORS">SUPERVISORS</option>
        <option value="AGENTS">AGENTS</option>
        </select>
        
        </div>
        </div>
        <!-- /.col -->
        </div>
         
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Email</label>
        <input type="email" placeholder="Email" onBlur="checkemail(this.value)" class="form-control input-sm parsley-validated " data-required="true" name="email"><span style="color:#FF0000;" id="show"></span>
        </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Password</label>
        <input type="password" placeholder="Password" id="pass1" class="form-control input-sm parsley-validated " data-required="true" name="pass">
        </div>
        </div>
        <!-- /.row -->
        </div>
            
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Confirm password</label>
        <input type="password" placeholder="Confirm password" id="pass2"  class="form-control input-sm parsley-validated" data-required="true" name="c_pass">
        </div>
        </div>
        <!-- /.col -->
        </div>
        </div>
        </div>          
        <div class="row">
        <div class="col-md-6">
        <div class="panel-footer text-right" style="text-align: left;margin-left: 16px;">
        <button class="btn btn-success check" type="submit">ADD</button>
        <button class="btn btn-success" type="reset">Clear</button>
        </div>
        </div>
        </div>
        </form>
        </div>
        <!-- /panel --> 
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!-- Footer ================================================== --> 
        <!--____________________footer___________________________-->';

include("footer.php");
echo    '<!--____________________footer___________________________--> 
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
        <!-- Le javascript================================================== --> 
        <!-- Placed at the end of the document so the pages load faster -->'; 

echo    "<!-- Jquery --> 
        <script src='js/jquery-1.10.2.min.js'></script> 
        <!-- Bootstrap --> 
        <script src='bootstrap/js/bootstrap.min.js'></script> 
        <!-- Parsley --> 
        <script src='js/parsley.min.js'></script> 
        <!-- Slimscroll --> 
        <script src='js/jquery.slimscroll.min.js'></script> 
        <!-- Datepicker --> 
        <script src='js/bootstrap-datepicker.min.js'></script> 
        <!-- Timepicker --> 
        <script src='js/bootstrap-timepicker.min.js'></script> 
        <!-- Tag input --> 
        <script src='js/jquery.tagsinput.min.js'></script> 
        <!-- WYSIHTML5 --> 
        <script src='js/wysihtml5-0.3.0.min.js'></script> 
        <script src='js/uncompressed/bootstrap-wysihtml5.js'></script> 
        <!-- Chosen -->
        <script src='js/chosen.jquery.min.js'></script>	
        <!-- Mask-input -->
        <script src='js/jquery.maskedinput.min.js'></script>	
        <!-- Slider -->
        <script src='js/bootstrap-slider.min.js'></script>	
        <!-- Dropzone -->
        <script src='js/dropzone.min.js'></script>	
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
        <script src='js/endless/endless_form.js'></script>
        <script src='js/endless/endless.js'></script>
        <script type='text/javascript'>";
?>        
$(document).ready(function(){
    var counter = 2;
    $("#addButton").click(function(){
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html(
	      '<select name="product[]" id="product' + counter + '" class="form-control input-sm"><option value="product1">product 1</option><option value="product2">product 2</option><option value="product3">product 3</option><option value="product4">product 4</option></select> <br />');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");
	counter++;
     });

     $("#removeButton").click(function(){
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
     });
  });

<?php
echo    '</script>
        </body>
        </html>';
?>