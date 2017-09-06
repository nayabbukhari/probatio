<?php
ob_start();
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
include("connection.php");
$query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
				while($row = mysqli_fetch_array($query) ) 
				
				{
				$permissions=$row['permissions'];
               $permission = explode(',',$permissions);

if (in_array("Users Management", $permission))
{
//echo "Match found";
}
else
{
header("location:error404.html");
//echo "Match not found";

}
}
ob_flush();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:16:52 GMT -->
<head>
<meta charset="utf-8">
<title>Probatio Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome-->
	<link href="css/font-awesome.min.css" rel="stylesheet">

		<link href="css/merge.css" rel="stylesheet">

 <script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete this user?");
      if (x)
          return true;
      else
        return false;
    }
	 function role(str)
    {
	//alert(str);
		location.href = "user_list.php?role="+str;

	}
	 function status(str)
    {
		 //	alert(str);

	location.href = "user_list.php?status="+str;
	}
	
	</script>
</head>

<body class="overflow-hidden">
<!-- Overlay Div -->
  <!--___________________________overlay_________________________-->
  <?php include("overlay.php"); ?>
  <!--___________________________.overlay________________________-->


<!-- /theme-setting -->

<div id="wrapper" class="preload">
  <!--___________________________topbar_________________________-->
  <?php include("topbar.php"); ?>
  <!--___________________________.topbar________________________-->
  
  <!-- /top-nav-->
  
  <!--___________________________left sidebar_________________________-->
  <?php //include("setting_leftsidebar.php"); ?>
  
  <aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
      <div class="size-toggle"> <a class="btn btn-sm" id="sizeToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> <i class="fa fa-power-off"></i> </a> </div>
      
      <div class="main-menu">
        <ul>
          <li > <a href="dashboard.php"> <span class="menu-icon"> <img style="margin-left: -10px; margin-right: -10px; width: 36px;" src="img/Dashboard.png"  /> </span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>
           <?php
if (in_array("Users Management", $permission))
{
?>
          <li  class="active openable open"> <a href="#"> <span class="menu-icon"> <i class="fa fa-group fa-lg"></i> </span> <span class="text">Users Management</span> <span class="menu-hover"></span> </a>
            <ul class="submenu">
                         <li class="active"><a href="user_list.php"><span class="submenu-label">Users Management</span></a></li>
                         <li><a href="permissions.php"><span class="submenu-label">Permissions & Roles</span></a></li>
             <li><a href="login_history.php"><span class="submenu-label">Login history</span></a></li>
            </ul>
          </li>
          <?php
		  }
		  else
		  {
		  }
		  ?>
          
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
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li class="active">User management</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
   
     
   <div class="padding-md clearfix"> <a class="btn btn-success" style="" href="add_user.php"><i class="fa fa-plus fa-lg"></i>&nbsp;New user</a></div>
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					        <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700;">User management
                                       <div style="float:right;">
                                       <?php
									include("connection.php");
									$_result1=mysqli_query($con,"select count(*) from pia_login where status='active'");
									while($row=mysqli_fetch_array($_result1))
									{
									$cnt=$row[0];
									}
									   ?>
<strong style="margin-right:30px;">Total active users: <?php echo $cnt; ?></strong>
</div>
					</div>
					<div class="padding-md clearfix">
                    <div style="float:left;">
                      <label class="control-label"><strong>Status</strong></label>
                    <select onChange="status(this.value)" style="padding: 5px 8px; border-radius: 3px; border: 1px solid rgb(177, 177, 177);" name="status">
                    <?php 	if($_GET['status']=='not')
					{?>              
                        <option value="not">NOT ACTIVE</option>
                     <option value="active">ACTIVE</option>
                  <?php
				  }
				  else
				  {?>
                                       <option value="active">ACTIVE</option>

                  <option value="not">NOT ACTIVE</option>
                  <?php
				  }
				  ?>
                                      </select>
                                      </div>
                                       <div style="float:right;">
                      <label class="control-label"><strong>Role</strong></label>
                    <select onChange="role(this.value)" style="width: 200px;margin-right: 5px;padding: 5px 8px; border-radius: 3px; border: 1px solid rgb(177, 177, 177);" name="status">
                    <?php
				  if($_GET['role']=='AGENTS'){?>
                   <option value="AGENTS">AGENTS</option>
                  <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="SUPERVISORS">SUPERVISORS</option>
                  <?php
				  }
				 else if($_GET['role']=='SUPERVISORS'){
                  ?>
                <option value="SUPERVISORS">SUPERVISORS</option>
                    <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="AGENTS">AGENTS</option>
                  <?php
				  }
				  else
				  {
				  ?>  
                                  <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="SUPERVISORS">SUPERVISORS</option>

                    <option value="AGENTS">AGENTS</option>
                  <?php
				  }
				  ?>
                                      </select>
                                      </div>
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>Id</th>
                                    <th>Full name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Date time</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>

				<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
                if(isset($_GET['role']))
				{
				$query = mysqli_query($con,"select * from pia_login where role='".$_GET['role']."'") ;
				}
				else if(isset($_GET['status']))
				{
				$query = mysqli_query($con,"select * from pia_login where status='".$_GET['status']."'") ;
				}
                 else
 				{
				$query = mysqli_query($con,"select * from pia_login where status='active'") ;
				}
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 		
								<tr>
                                    <td><?php echo $i ;?></td>
                                    <td><strong><a href="edit_user.php?id=<?php echo $row['id']; ?>"><?php if ($row['path']==""){?><img style="border-radius: 50%; height: 40px; width: 40px;" src="no_avatar.jpg"><?php } else {?><img style="border-radius: 50%; height: 40px; width: 40px;" src="<?php echo $row['path']; ?>"><?php } ?> &nbsp;<?php echo $row['username'];?></a></strong></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['role']; ?></td>
									<td><?php echo $row['date_time']; ?></td>
									<td>
									<a href="delete_user.php?t=d&i=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" onClick="return ConfirmDelete()" class="btn btn-xs btn-danger">Clear</a>
									</td>
								</tr>
								<?php $i++; }?>
								
							</tbody>
						</table>
					</div><!-- /.padding-md -->
				</div><!-- /panel -->



	</div>i
    <!-- /.padding-md --> 
  </div>
  <!-- /main-container --> 
  <!-- Footer
        ================================================== -->
  <!--____________________footer___________________________-->
  <?php include("footer.php"); ?>
  <!--____________________footer___________________________--> 
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


<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
 
	<!-- Datatable -->
	<script src='js/jquery.dataTables.min.js'></script>	
	
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
	
	<script>
		$(function	()	{
			$('#dataTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#chk-all').click(function()	{
				if($(this).is(':checked'))	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked', true);
						$(this).parent().parent().parent().addClass('selected');
					});
				}
				else	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked' , false);
						$(this).parent().parent().parent().removeClass('selected');
					});
				}
			});
		});
	</script>
</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>
