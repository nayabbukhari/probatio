<?php
if(isset($_REQUEST[session_name()])){
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
		<link href="css/merge.css" rel="stylesheet">
        
        
        </head>
        <body class="overflow-hidden">
        <!-- Overlay Div -->
        <!--___________________________overlay_________________________-->';
include("overlay.php");
echo    '<!-- /theme-setting -->
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
        <li class="active">User management</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        
        <div class="clearfix"></div>
        <div class="padding-md clearfix"> <a class="btn btn-success" style="" href="add_user.php"><i class="fa fa-plus fa-lg"></i>&nbsp;Add user</a></div>
        <div class="clearfix"></div>
        <div class="panel panel-default table-responsive">
		<div class="panel-heading">User management</div><br />
		<div class="padding-md clearfix">
		<table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Full name</th>
		<th>Phone number</th>
		<th>Emergency contect</th>
		<th>Emergency contect phone number</th>
		<th></th>
		</tr>
		</thead>
        <tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 
//$clients=get_records_sql("select * from pia_client");
$users=get_records_sql("select * from pia_login");
    $i = 1;
    foreach($users AS $usr){ 		
        //var_dump($usr);
        echo   '<tr>
                <td>'.$i.'</td>
			    <td>'.$usr->email.'</td>
                <td>'.$usr->username.'</td>
				<td>'.$usr->phone.'</td>
				<td>'.$usr->phone.'</td>
				<td>'.$usr->phone.'</td>
				<td>
				<a href="edit_user.php?t=e&i='.$usr->id.'&k='.$_SESSION['key'].'" class="btn btn-xs btn-info" >Edit</a>
				<a href="delete_user.php?t=d&i='.$usr->id.'&k='.$_SESSION['key'].'" class="btn btn-xs btn-danger">Delete</a>
                </td>
                </tr>';
                $i++;
            }
echo    '</tbody></table>
        </div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div><!-- /.padding-md --> 
        </div><!-- /main-container -->
         
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
        </div></form></div>
        
        <div class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        <a href="#" class="btn btn-danger btn-sm">Save changes</a> </div>
        </div><!-- /.modal-content --> 
        </div><!-- /.modal-dialog --> 
        </div><!-- /.modal --> 
        </div><!-- /wrapper --> 

        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        <!-- Logout confirmation -->
        <!-- Le javascript ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <!-- Jquery -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Datatable -->
	    <script src="js/jquery.dataTables.min.js"></script>	
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
        <script src="js/endless/endless.js"></script>
        <script>';
?>
$(function(){
    $('#dataTable').dataTable( {
	   "bJQueryUI": true,
	   "sPaginationType": "full_numbers"
	   });
			
   $('#chk-all').click(function(){
        if($(this).is(':checked')){
                $('#responsiveTable').find('.chk-row').each(function(){
                $(this).prop('checked', true);
				$(this).parent().parent().parent().addClass('selected');
				});
			}else{
				$('#responsiveTable').find('.chk-row').each(function()	{
				$(this).prop('checked' , false);
				$(this).parent().parent().parent().removeClass('selected');
				});
			}
    });
});
<?php
echo    '</script>
        </body>';
?>