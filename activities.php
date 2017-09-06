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
$users=get_records_sql("select * from pia_login where email='$user'");
    foreach ($users as $usr){
				$role=$usr->role;
				//echo $role;
echo    '<head>
        <meta charset="utf-8">
        <title>Probatio Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Font Awesome-->
        <link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/merge.css" rel="stylesheet">
        <link href="css/probatio.css" rel="stylesheet">
        </head>
        <link rel="stylesheet" type="text/css" href="build/jquery.datetimepicker.css"/>
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
        <ul class="breadcrumb"><br />
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Activities</li>
        <li class="active">';
        $page=basename($_SERVER['PHP_SELF']); 
        $pa=explode(".", $page);		//echo $pa[0]; 
echo    '</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="panel panel-default table-responsive">
		<div class="panel-heading">
        <strong>Activities</strong>
        </div>
        
        <div class="padding-md">
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
		<table class="table table-striped" id="dataTable_Recall">
		<thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Date Created</th>
		<th>Effective date</th>
		<th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>';
if($role=='AGENTS'){
    }else{
echo    '<th>Agent</th>';
    }
echo    '<th>Activity</th>
		</tr>
		</thead>
		<tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 
if($role=='AGENTS'){
        $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) order by date_time desc");
            }
foreach($leads AS $lead){
        $phone= $lead->phone;
		$a1=explode(",", $phone);
		$ph=$a1[0];
		$products=$lead->products;
		$product=explode(",", $products);			
		$insurer=$lead->insurer;
		$in=explode(",", $insurer);			
		$Others=$lead->Others;
		$Oth=explode(",", $Others);			
		$Capitale=$lead->Capitale;	
		$Cap=explode(",", $Capitale);			
		$status=$lead->status;
		$st=explode(",", $status);
		$b2=sizeof($st);
		//echo $b2;
		$date=$lead->date_time; 
		$create=explode(" ", $date);

echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$create[0].'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>';
if($role=='AGENTS'){
    }else{
echo    '<td>'.$lead->agent_name.'</td>';
}
echo    '<td>';
$maxid = get_record_sql("SELECT MAX(id) as maxid FROM pia_activities where clientid=$lead->clientid and  type !='notes' order by date_time desc");
//var_dump($maxid);
if(empty($maxid[0]->maxid)){
echo    '<div class="input-group-btn">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Never Spoke <span class="caret"></span></button>
         <ul class="dropdown-menu">
         <li>Never spoke </li>
         <li class="divider"></li>
         <li><a href="#formModal'.$lead->id.'" role="button" data-toggle="modal" >Add Activity</a></li>
         <li><a href="#newFolder'.$lead->id.'" role="button" data-toggle="modal" >Add Note</a></li>
         <li class="divider"></li>
         <li><a href="view_activities.php?client='.$lead->clientid.'"  role="button">View all activities</a></li>	
         </ul>
         </div><!-- /btn-group -->';
    }else{
        //  echo "not null";
        $maxid1=$maxid[0]->maxid;
        $clientid=$lead->clientid;
		$clnts = get_record_sql("SELECT * FROM pia_activities WHERE clientid=$clientid and id=$maxid1 and  type !='notes'  order by date_time desc");
                $due=$clnts[0]->due_date;
				$due_date=explode(" ",$due);

echo    '<div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">'.$clnts[0]->due_date.'<span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a style="border: medium none;" href="#edit'.$clnts[0]->id.'" role="button" data-toggle="modal" >'.$clnts[0]->due_date.'</a></li>
        <li class="divider"></li>
        <li style="text-align: left;">'.$clnts[0]->type.'</li>
        <li><a href="#formModal'.$lead->id.'" role="button" data-toggle="modal" >Add Activity</a></li>
        <li><a href="#newFolder'.$lead->id.'" role="button" data-toggle="modal" >Add Note</a></li>
        <li class="divider"></li>
        <li><a href="view_activities.php?client='.$lead->clientid.'" role="button">View all activities</a></li>	
        </ul>
        </div><!-- /btn-group -->

        <!--Modal-->
        <div class="modal fade" id="edit'.$clnts[0]->id.'">
        <div class="modal-dialog">
        <form method="post" action="update_activity.php">
        <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 style="text-align: center; font-weight: 700;">New Activity</h4>
      	</div>

        <div class="modal-body">
		<div class="row">
        <div class="col-md-3" style="padding-right: 0px;">
		<div class="form-group">
		<label>&nbsp;</label>
        <select class="form-control" name="type">
        <option value="call"><i class="fa  fa-mobile-phone"></i> CALL</option>
        <option value="other"><i class="fa fa-flag"></i> OTHER</option>
        </select>	
		</div>
		</div><!-- /.col -->
		<div class="col-md-9">
		<div class="form-group">
		<label>Subject</label>
        <input type="text" class="form-control input-sm" name="subject" value="'.$clnts[0]->Subject.'" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$clnts[0]->id.'" name="id" placeholder="Subject">
        </div><!-- /form-group -->
        </div>
		</div><!-- /.col -->
		
        <div class="row">
		<div class="col-md-12">
		<div class="form-group">
		<label>Due date</label>
        <div class="input-group">
		<input type="text"  name="due_date" id="date'.$lead->id.'" value="'.$due.'" readonly class="datepicker form-control">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div></div>
		</div>';
        
        /**
        <!-- /.col 
		<div class="col-md-6">
		<div class="form-group">
		<label>Time</label>
        <div class="input-group bootstrap-timepicker">
		<input class="timepicker form-control" name="time" type="text"/>
		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
		</div>									</div>
		</div><!-- /.col -->
		**/

echo    '</div><!-- /.row -->
        <div class="form-group">
		<label>Related To</label>
		<input type="text" class="form-control input-sm" value="'.$lead->firstname.'" name="related_to" readonly placeholder="test@example.com">
		</div><!-- /form-group -->
		<div class="form-group">
		<label>Owner</label>
		<input type="text" class="form-control input-sm" value="'.$lead->agent_name.'" name="owner" readonly placeholder="test@example.com">
		</div><!-- /form-group -->
        </div>
		
        <div class="modal-footer">
		<button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
		<button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
		</div><!-- /.modal-content -->
        </form>

        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal -->';    
                                        
        } 
/* if($role=='AGENTS' || $role=='SUPERVISORS'){?> <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a><?php } else { ?>  &nbsp;&nbsp;    <a href="#call<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>     <?php } */           

echo    '</td></tr>

        <!--Modal-->
        <div class="modal fade" id="call'.$lead->id.'">
        <div class="modal-dialog">
        <form action="delete_prospect.php?id='.$lead->id.'&s=2" method="post">
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

        <div class="modal fade" id="formModal'.$lead->id.'">
  		<div class="modal-dialog">
        <form method="post" action="get_activity.php">
        <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 style="text-align: center; font-weight: 700;">New Activity</h4>
      	</div>

		<div class="modal-body">
		<div class="row">
        <div class="col-md-3" style="padding-right: 0px;">
		<div class="form-group">
		<label>&nbsp;</label>
        <select class="form-control" name="type">
		<option value="call"><i class="fa  fa-mobile-phone"></i> CALL</option>
		<option value="other"><i class="fa fa-flag"></i> OTHER</option>
		</select>	
		</div>
		</div><!-- /.col -->
		<div class="col-md-9">
		<div class="form-group">
		<label>Subject</label>
        <input type="text" class="form-control input-sm" name="subject" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->clientid.'" name="clientid" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->email.'" name="email" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->agent_name.'" name="agent_name" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->prospect_owner.'" name="prospect_owner" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->status.'" name="status" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->section_name.'" name="section_name" placeholder="Subject">
		</div><!-- /form-group -->
        </div>
		</div><!-- /.col -->
		
        <div class="row">
		<div class="col-md-12">
		<div class="form-group">
		<label>Due date</label>
        <div class="input-group"> 
        <input type="text" value="" name="due_date" readonly id="datetimepicker'.$lead->id.'" class="form-control"/>
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div></div>
        </div>';
        
        /**
        <!-- /.col 
		<div class="col-md-6">
		<div class="form-group">
		<label>Time</label>
        <div class="input-group bootstrap-timepicker">
		<input class="timepicker form-control" name="time" type="text"/>
		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
		</div></div>
        </div><!-- /.col -->
		**/
echo    '</div><!-- /.row -->
		<div class="form-group">
		<label>Related To</label>
		<input type="text" class="form-control input-sm" value="'.$lead->firstname.'" name="related_to" readonly placeholder="test@example.com">
		</div><!-- /form-group -->
		<div class="form-group">
		<label>Owner</label>
		<input type="text" class="form-control input-sm" value="'.$lead->agent_name.'" name="owner" readonly placeholder="test@example.com">
		</div><!-- /form-group -->
        </div>
		
        <div class="modal-footer">
		<button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
		<button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
		</div><!-- /.modal-content -->
        </form>

		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        <!--Modal-->

        <div class="modal fade" id="newFolder'.$lead->id.'">
        <div class="modal-dialog">
        <form method="post" action="get_notes.php">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align: center; font-weight: 700;">New Note</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
        <label for="folderName">Add a note</label>
        <textarea class="form-control" name="notes" rows="3">Add a note about this prospect.</textarea>
        <input type="hidden" class="form-control input-sm" value="'.$lead->clientid.'" name="clientid" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->email.'" name="email" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->agent_name.'" name="agent_name" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->prospect_owner.'" name="prospect_owner" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->status.'" name="status" placeholder="Subject">
        <input type="hidden" class="form-control input-sm" value="'.$lead->section_name.'" name="section_name" placeholder="Subject">            </div>
        
        <div class="form-group">
		<label class="label-checkbox">
		<input type="checkbox" class="regular-checkbox" name="chk_email" />
		<span class="custom-checkbox"></span>
		Send e-mail to owner about this note.
		</label>
		</div><!-- /form-group -->
        </div>
        
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
		<button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
        <!-- /.modal-content --> 
        </form>
        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal -->'; 
    }
  }
echo    '</tbody>
		</table>	
		</div><!-- /panel -->
		</div><!-- /.col -->
        </div>
        </div>
        <div class="padding-md clearfix">
		</div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div>
        
        <!--Modal-->
        <div class="modal fade" id="no">
        <div class="modal-dialog">
        <form action="delete_prospect.php?id='.$lead->id.'&s=2" method="post">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">No activity set for this prospect now</h4>
        </div>

        <div class="modal-body">
        <div class="form-group" style="text-align: center;">
        <label for="folderName">Please add first! Thank you</label>
        </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
        </div>
        <!-- /.modal-content --> 
        </form>

        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal --> 
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!-- Footer ================================================== -->
        <!--____________________footer___________________________-->';

include("footer.php");
echo    '<!--____________________footer___________________________--> 
        </div>
        <!-- /wrapper --> 
        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        
        <script src="build/jquery.js"></script>
        <script src="build/jquery.datetimepicker.full.js"></script>';

$status = get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) order by date_time desc");
    foreach($status as $sts){
echo    '<script>';
/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}
*/
?>
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker<?php echo $sts->id; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
});
$('#datetimepicker<?php echo $sts->id; ?>').datetimepicker({value:'<?php echo date("Y-m-d H:i:s"); ?>',step:10});


$('#date<?php echo $sts->id; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
});


$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	defaultDate:'+03.01.1970', 
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02',
	maxDate:'+1970/01/02' 
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})

<?php
echo    '</script>';
  }
echo    '<!-- Logout confirmation -->
        <!-- Le javascript================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <!-- Jquery -->';
              
echo    '<!-- Datepicker -->
        <script src="js/bootstrap-datepicker.min.js"></script>	
        <!-- Timepicker -->
        <script src="js/bootstrap-timepicker.min.js"></script>
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
	   $('#dataTable1').dataTable( {
	   "bJQueryUI": true,
	   "sPaginationType": "full_numbers"
    });
			
        $('#dataTable2').dataTable( {
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
    });
						
				$('#dataTable3').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
				$('#dataTable_Recall').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_gap').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_ref').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_client').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
				$('#dataTable4').dataTable( {
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
?>