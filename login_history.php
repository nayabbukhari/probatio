<?php
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
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
 
 <!------------------------------------function delete data---------------------------->
 
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete this user?");
      if (x)
          return true;
      else
        return false;
    }
	
 <!------------------------------------function delete data---------------------------->
 
 <!------------------------------------function search data---------------------------->

	
	 function user(str)
    {
	
//alert(str);

    if (str == "") {

        document.getElementById("txtHint1").innerHTML = "";

        return;

    } else {

        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;

            }

        }

        xmlhttp.open("GET","history_search.php?f=1&&q="+str,true);

        xmlhttp.send();

    }

	}
	 <!------------------------------------function search data---------------------------->

	 function status(str)
    {
		 //	alert(str);

	location.href = "user_list.php?status="+str;
	}
	
	</script>
    <style>
	.fg-toolbar.ui-toolbar.ui-widget-header.ui-corner-tl.ui-corner-tr.ui-helper-clearfix {
    display: none !important;
}
.fg-toolbar.ui-toolbar.ui-widget-header.ui-corner-bl.ui-corner-br.ui-helper-clearfix {
   /* display: none !important;*/
}
.day
{
cursor:pointer;
}
</style>
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
  <?php //include("leftsidebar.php"); ?>
  
    <aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
      <div class="size-toggle"> <a class="btn btn-sm" id="sizeToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> <i class="fa fa-power-off"></i> </a> </div>
      
      <div class="main-menu">
        <ul>
          <li > <a href="dashboard.php"> <span class="menu-icon">  <img style="margin-left: -10px; margin-right: -10px; width: 36px;" src="img/Dashboard.png"  /> </span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>
           
          <li  class="active openable open"> <a href="#"> <span class="menu-icon"> <i class="fa fa-group fa-lg"></i> </span> <span class="text">Users Management</span> <span class="menu-hover"></span> </a>
            <ul class="submenu">
                         <li ><a href="user_list.php"><span class="submenu-label">Users Management</span></a></li>
                         <li ><a href="permissions.php"><span class="submenu-label">Permissions & Roles</span></a></li>
             <li class="active"><a href="login_history.php"><span class="submenu-label">Login history</span></a></li>
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
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li class="active">Login history</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
   
     
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					        <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700;">Login history
  
					</div>
					<div class="padding-md clearfix">
                              <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
                 <label style="color: rgb(51, 51, 51); font-size: 14px;" class="control-label"><strong>Users:</strong></label><br/>
                 
                    <select class="form-control" onChange="user(this.value)" style="padding: 5px 8px; border-radius: 3px; border: 1px solid rgb(177, 177, 177);" name="status">
                    <option value="all">All</option>
                  <?php
									include("connection.php");
									$_result1=mysqli_query($con,"select email from pia_login");
									while($row=mysqli_fetch_array($_result1))
									{
									$email=$row['email'];
									   ?>            
                        <option value="<?php echo $email; ?>"><?php echo $email; ?></option>
                 <?php
				 }
				 ?>
                                      </select>
              </div>
            </div>
            <!-- /.col -->
            <form action="login_history.php" method="post">
            <div class="col-md-3" id="TextBoxesGroup">
              <div class="form-group">
                <label style="color: rgb(51, 51, 51); font-size: 14px;" class="control-label"><strong>From date: </strong></label><br/>
									<div class="input-group">
										<input type="text" required name="from" value="" class="datepicker form-control">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div><!-- /.col -->
              </div>
            </div>
          
             <div class="col-md-3" id="TextBoxesGroup">
              <div class="form-group">
                <label style="color: rgb(51, 51, 51); font-size: 14px;" class="control-label"><strong>Till date:  </strong></label><br/>
									<div class="input-group">
										<input type="text" required name="to" value="" class="datepicker form-control">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div><!-- /.col -->
              </div>
            </div>
              <div class="col-md-2" id="TextBoxesGroup">
              <div class="form-group">
                              <label style="color: rgb(51, 51, 51); font-size: 14px;" class="control-label"><strong> </strong></label><br/>

              			<input style="margin-top: 6px;" type="submit" value="Filter"	 class="btn btn-primary">

              </div>
            </div>
            </form>
            <!-- /.col -->
         </div>
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>Id</th>
                                    <th>User name</th>
									<th>Timestamp</th>
									<th>IP address</th>
									<th>User agent</th>
								</tr>
							</thead>
							<tbody id="txtHint1">

				<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
               if ($_SERVER["REQUEST_METHOD"] == "POST") 
			   {
			   $from=$_POST['from'];
				$a=explode("/", $from);
				$day=$a[0];
				$month=$a[1];
				$year=$a[2];
				$from_date=$year."-".$month."-".$day;

			//  echo $from_date;
			     $to=$_POST['to'];
				 $a1=explode("/", $to);
				$day1=$a1[0];
				$month1=$a1[1];
				$year1=$a1[2];
				$to_date=$year1."-".$month1."-".$day1;
				 			 //  echo $to;

				$query = mysqli_query($con,"select * from pia_login_history where date(date_time) between '".$from_date."' and '".$to_date."'");
				//echo "select * from pia_login_history where date(date_time) between '".$from_date."' and '".$to_date."'";
				}
                 else
 				{
				$query = mysqli_query($con,"select * from pia_login_history order by  date_time desc") ;
				}
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 		
								<tr>
                                    <td><?php echo $i ;?></td>
                                    <td><?php echo $row['email']; ?></td>
									<td><?php echo $row['date_time']; ?></td>
									<td><?php echo $row['ip_address']; ?></td>
									<td><?php echo $row['user_agent']; ?></td>									
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


<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
		<!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
	<!-- Chosen -->
	<script src='js/chosen.jquery.min.js'></script>	

	<!-- Mask-input -->
	<script src='js/jquery.maskedinput.min.js'></script>	

	<!-- Datepicker -->
	<script src='js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='js/bootstrap-timepicker.min.js'></script>	
	
	<!-- Slider -->
	<script src='js/bootstrap-slider.min.js'></script>	
	
	<!-- Tag input -->
	<script src='js/jquery.tagsinput.min.js'></script>	

	<!-- WYSIHTML5 -->
	<script src='js/wysihtml5-0.3.0.min.js'></script>	
	<script src='js/uncompressed/bootstrap-wysihtml5.js'></script>	

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
	<script src="js/endless/endless_form.js"></script>
	<script src="js/endless/endless.js"></script>
		<!-- Datatable -->
	<script src='js/jquery.dataTables.min.js'></script>	
	
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
