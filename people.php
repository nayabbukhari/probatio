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
        <!-- Font Awesome-->
        <link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/merge.css" rel="stylesheet">
		
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
echo    '<!--___________________________.left sidebar________________________-->

        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <br /><br />
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">People</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="clearfix"></div>
        <div class="padding-md clearfix"> <a class="btn btn-success" style="" href="add_people.php"><i class="fa  fa-user fa-lg"></i>&nbsp;Create new People</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-success" style="" href="import_people.php"><i class="fa  fa-upload fa-lg"></i>Import People</a></div>
        <div class="clearfix"></div>
        <div class="panel panel-default table-responsive">
		<div class="panel-heading">
        <strong>People</strong>
		</div>
        <br />
		<div class="padding-md clearfix">
		<table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Full name</th>
		<th>Phone number</th>
		<th>Address</th>
		<th>Customer Status</th>
        <th>Prospect Status</th>
        <th>Action</th>
        </tr>
        </thead>
		<tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 
$people=get_records_sql("select * from pia_people"); 
$i=1;
foreach($people AS $ppl){
    $phone= $ppl->phone;
	$a1=explode(",", $phone);
	$ph=$a1[0]; 		
	
echo    '<tr>
        <td>'.$i.'</td>
        <td>'.$ppl->email.'</td>
		<td>'.$ppl->firstname.' '.$ppl->lastname.'</td>
        <td>'.$ph.'</td>
        <td>'.$ppl->address.'</td>
		<td>'.$ppl->Customer_Status.'</td>
		<td>'.$ppl->Prospect_Status.'</td>
		<td><a href="edit_people.php?t=e&id='.$ppl->id.'&k='.$_SESSION['key'].'" class="btn btn-xs btn-info" >Edit</a>
		<a href="#delete'.$ppl->id.'" data-toggle="modal" class="btn btn-xs btn-danger">Delete</a>
		</td>
		</tr>
        
        <!--Modal-->
        <div class="modal fade" id="delete'.$ppl->id.'">
        <div class="modal-dialog">
        <form action="delete_people.php?id='.$ppl->id.'" method="post">

        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">Remove this People?</h4>
        </div>

        <div class="modal-body">
        <div class="form-group" style="text-align: center;">
        <label for="folderName">Are you sure you want to remove this People? This action can not be undone.</label>
        </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
        </div>
        </div>
        <!-- /.modal-content --> 
        </form>
        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal -->'; 
                                
        $i++;
}
echo    '</tbody>
		</table>
		</div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!-- Footer ================================================== -->';

include("footer.php");
echo    '<!--____________________footer___________________________--> 
        </div>
        <!-- /wrapper --> 
        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 
        <!-- Logout confirmation -->
        <!-- Le javascript ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster -->'; 
        
echo    "<!-- Jquery -->
        <script src='js/jquery-1.10.2.min.js'></script>
	
        <!-- Bootstrap -->
        <script src='bootstrap/js/bootstrap.min.js''></script>
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
        <script src='js/endless/endless.js'></script>
        <script>";
?>
$(function(){
    $('#dataTable').dataTable({
        "bJQueryUI": true,
		"sPaginationType": "full_numbers"
    });
			
	$('#chk-all').click(function(){
	   if($(this).is(':checked')){
            $('#responsiveTable').find('.chk-row').each(function()	{
			$(this).prop('checked', true);
			$(this).parent().parent().parent().addClass('selected');
	});
    }else{
        $('#responsiveTable').find('.chk-row').each(function(){
            $(this).prop('checked', false);
            $(this).parent().parent().parent().removeClass('selected');
	   });
    }
    });
});

<?php

echo    '</script>
        </body>
        </html>';
if(isset($_GET['s'])){
    if($_GET['s']==1){
echo    '<script>
        alert("Sucessfully Added");
        </script>';
}else if($_GET['s']==2){
echo    '<script>
        alert("Sucessfully Deleted");
        </script>';
}else{
echo    '<script>
        alert("Sucessfully Updated");
        </script>';
    }
}

?>