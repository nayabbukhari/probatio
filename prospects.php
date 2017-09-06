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
echo    '<title>Probatio Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
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
echo    '<!--___________________________.left sidebar________________________-->';


$users=get_records_sql("select * from pia_login where email='$user'");
foreach ($users as $usr){
//while($row1 = mysqli_fetch_array($query) ) { 
echo    '<div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <br /><br />
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Prospects</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        
        <div class="clearfix"></div>
        <div class="padding-md clearfix">';
/**
$owner=get_records_sql("select count(*) from pia_leads where prospect_owner='$user'  and update_status='0'");
foreach ($owner as $ownr){
    var_dump($ownr);
    $cnt=$ownr->[0];
    }
    if($cnt<1){
**/        
if($usr->role=='AGENTS'){
echo    '<a class="btn btn-success" style="" href="create_prospect.php">
        <img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="img/Prospects 1.png"  />Create new prospect</a> 
        <a class="btn btn-success" style="" href="#check" data-toggle="modal"><i class="fa  fa-upload fa-lg"></i>Import prospects</a>';
    } 
if($usr->role=='SUPERVISORS'){
    echo    '<a class="btn btn-success" style="" href="import_leads.php"><i class="fa  fa-upload fa-lg"></i>Import prospects</a>';
}

echo    '</div>
        <div class="clearfix"></div>
        
        <!--Modal-->
        <div class="modal fade" id="check">
        <div class="modal-dialog">
        <form action="update_import.php" method="post">
        <input type="hidden" name="agent" value="<?php echo $user; ?>" >
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">Import Prospects?</h4>
        </div>

        <div class="modal-body">
        <div class="form-group" style="text-align: center;">
        <label for="folderName">Are you sure you want to Import Prospects? This action can not be undone.</label>
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
        <!-- /.modal --> 

        <div class="panel panel-default table-responsive">
		<div class="panel-heading">
        <strong>Prospects</strong></div>
        <br />
		<div class="padding-md clearfix">
		<table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th>Client Id</th>
		<th>Full name</th>
		<th>Phone number</th>
        <th>Email</th>
		<th>Products</th>
		<th>Effective Date</th>
		<th><div align="center">Assign Agent</div></th>
		<th>Updated</th>';

if($usr->role=='SUPERVISORS' || $usr->role=='SUPER ADMINISTRATORS'){
echo    '<th>Referral ID</th>';
    }else{
echo    '<th>&nbsp;</th>';
}
echo    '</tr></thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 
if($role=='AGENTS'){
    $lead=get_records_sql("select * from pia_leads where prospect_owner='$user' AND update_status='0' order by date_time desc");
    //echo "select * from pia_leads where prospect_owner='".$user."' order by date_time desc";
    }else{
        $lead=get_records_sql("select * from pia_leads where update_status in (2) order by date_time desc");
    }
    
    foreach($lead as $leads){
        //var_dump($leads);
    //if(!empty($leads)){               
        $phone= $leads->phone;
        $phone=explode(",", $phone);
		$phone=$phone[0];
        //echo $phone;
		$products= $leads->products;
echo    '<tr>
         <td><a style="font-size: 14px;" href="edit_prospect.php?t=e&id='.$leads->id.'&k='.$_SESSION['key'].'" title="Edit"><strong>'.$leads->clientid.'</strong></a></td>
         <td>'.$leads->firstname.' '.$leads->lastname.'</td>
         <td>'.$phone.'</td>
         <td>'.$leads->email.'</td>
         <td>'.$products.'</td>
         <td>'.$leads->effectivedate.'</td>';
if($usr->role=='AGENTS'){
echo    '<td>'.$leads->agent_name.'</td>'; 
        }else{
echo    '<td><div align="center">';
if($leads->agent_name=='' || $leads->agent_name==null){
echo    '<a href="#Assign'.$leads->id.'" style="padding: 5px 21px;" data-toggle="modal" class="btn btn-xs btn-danger">Assign</a>';
        }else{
echo    '<a href="#Assign'.$leads->id.'" style="padding: 5px 15px;background: rgb(62, 194, 145);border: 1px solid rgb(62, 194, 145);" data-toggle="modal" class="btn btn-xs btn-danger"> Assigned </a>';
        } 
echo    '</a></div></td>';
    }
echo    '<td>'.$leads->date_time.'</td>';

if($usr->role=='SUPERVISORS' || $usr->role=='SUPER ADMINISTRATORS'){
echo    '<td>'.$leads->referral_id.'</td>';
    }else{
        if($row['type']=='done'){
echo    '<td>
        <a class="btn btn-success" style="" href="edit_prospect.php?t=e&id='.$leads->id.'&k='.$_SESSION['key'].'" title="Edit">
        <img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="img/Prospects 1.png"  />Create</a>
        <!--  <a href="#aaaa '.$leads->id.'" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>-->
        </td>';
    }else{
echo    '<td>
        <a class="btn btn-success" style="padding-right: 29px;" href="edit_prospect.php?t=e&id='.$leads->id.'&k='.$_SESSION['key'].'" title="Edit">
        <img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="img/Prospects 1.png"  />Edit</a>
        <!--<a href="#aaaa<?php'.$leads->id.'" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>-->
        </td>';
    }
}
echo    '</tr>
        <!--Modal-->
        <div class="modal fade" id="aaaa '.$leads->id.'">
        <div class="modal-dialog">
        <form action="delete_prospect.php?id='.$leads->id.'" method="post">

        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">Remove this Prospect?</h4>
        </div>

        <div class="modal-body">
        <div class="form-group" style="text-align: center;">
        <label for="folderName">Are you sure you want to remove this Prospect? This action can not be undone.</label>
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
        <!-- /.modal --> 
                                
        <!--Modal Assign-->
        <div class="modal fade" id="Assign'.$leads->id.'">
        <div class="modal-dialog">
        <form action="assign_agent.php?id='.$leads->id.'" method="post">
        <input type="hidden" value="'.$leads->id.'" placeholder="Phone" class="form-control input-sm parsley-validated " data-required="true" name="id">

        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">Assign a Agent?</h4>
        </div>';

if($leads->agent_name=='' || $leads->agent_name==null){
    }else{ 
echo    '<div align="center" style="color: rgb(206, 88, 63); font-weight: 700;">Assigned Agent : '.$leads->agent_name.'</div>';
        }
echo    '<div class="modal-body">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="form-group" style="text-align: center;">
        <label for="folderName">Choose a agent for  this client.</label>
        <select class="form-control input-sm parsley-validated" data-required="true" required name="agent">
        <option value="">Select</option>';

$agents=get_records_sql("select * from pia_login where role='AGENTS'");
//var_dump($agents);
//var_dump($agents->email);
foreach($agents as $agent){
    echo    '<option value='.$agent->email.'>'.$agent->username.'</option>';
        }      
echo    '</select>
        </div>
        </div>
        <div class="col-md-3"></div>
        </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
        </div>
        </div>
        <!-- /.modal-assign --> 
        </form>
        </div>
        </div>';        
    }
								
echo    '</tbody>
		</table>
        </div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container -->'; 
}
echo    '<!-- Footer================================================== -->
        <!--____________________footer___________________________-->';
include("footer.php");
echo    '<!--____________________footer___________________________--> 
        </div>
        <!--/wrapper --> 
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
 $(function	(){
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
if(isset($_GET['f'])){
    if($_GET['f']==2){
echo    '<script>
        alert("Sucessfully Imported Prospects");
        </script>';
    }else if($_GET['f']==3){
echo    '<script>
        alert("Right now no prospects is here !!!");
        </script>';
}else{
echo    '<script>
        alert("Sucessfully Updated");
        </script>';
    }
}
?>