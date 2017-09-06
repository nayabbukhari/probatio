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
    $client=$_GET['client'];
}else{
    header("location:index.php");
}
/////????????????***************************** Get user role  *******************????????????????????///////////////////////////
//$query = mysqli_query($con,"select * from pia_login where email='".$user."'");
//while($rows = mysqli_fetch_array($query) ){
/**
$users=get_records_sql("select * from pia_login where email='$user'");
foreach ($users as $usr){
        $role=$usr->role;
		//echo $role;
		}
**/
/////????????????***************************** Get user role  *******************????????????????????///////////////////////////
$leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and clientid='".$client."' order by date_time desc");
//$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and clientid='".$client."' order by date_time desc") ;
//while($roww = mysqli_fetch_array($query)){
foreach($leads AS $lead){    
        $name=$lead->firstname;
		//echo $name;
		$agent=$lead->agent_name;
        $clientid=$lead->clientid;
        $email=$lead->email;
        $prospect_owner=$lead->prospect_owner;
        $status=$lead->status;
        $section_name=$lead->section_name;
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
        <!-- Pace -->
        <link href="css/pace.css" rel="stylesheet">
        <!-- Datatable -->
        <link href="css/jquery.dataTables_themeroller.css" rel="stylesheet">
        <!-- Endless -->
        <link href="css/endless.min.css" rel="stylesheet">
        <link href="css/endless-skin.css" rel="stylesheet">
        <style>
  .btn.btn-default.dropdown-toggle {
    border-radius: 25px;
	
}
.btn.btn-default.dropdown-toggle:hover {
    border-radius: 25px;
	background:#1a3347;
	color:#fff;
}
.dropdown-menu {
    top: -5px;
    left: -14px;
    border-radius: 23px;
    background: #1a3347;
    color: #fff;
    padding: 15px 8px 15px 8px;
}
.dropdown-menu li {
color:#fff;
text-align:center;

}
.dropdown-menu li a {
color:#fff;
text-align:center;
border-radius: 17px;
border: #fff solid 1px;
margin-top: 5px;
}
  .tab-bar li a {
    font-size: 14px !important;
    color: #2F80CF !important;
}

  .tab-bar .active  a {
    font-size: 14px !important;
    color: #333 !important;
}
  thead {
    background: #3aa2c9 !important;
    color: #fff !important;
}

.dropdown-menu.new {
    display: block;
    position: initial;
    background: none;
    border: none;
    box-shadow: none;
}
.dropdown-menu.new li a {
    background: #1a3347;
}
.dropdown-menu.new li a:hover {
    background: #3aa2c9;
}

</style>
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
        <ul class="breadcrumb">
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
        <div class="panel-heading" style="text-align: center; font-size: 24px;"><strong>		Activities     </strong>	</div>
        <div class="padding-md">
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
        <br/>
        <div class="input-group-btn">
        <ul class="dropdown-menu new" style="display: block;">
        <li><a href="#add_activity" role="button" data-toggle="modal" >Add Activity</a></li>
        </ul>
        </div><!-- /btn-group -->';
//echo "SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and clientid='".$client."' order by date_time desc";
echo    '<table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th width="58">Client Id</th>
		<th width="91">Date Created</th>
		<th width="61">Due date</th>
		<th width="49">Subject</th>
		<th width="66">Type</th>
		<th width="114" >&nbsp;</th>
		</tr>
		</thead>
		<tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 

$query = mysqli_query($con,"select * from pia_activities where clientid='".$client."' and not type='notes' order by date_time desc") ;
    while($row = mysqli_fetch_array($query) ) {
echo    '<tr>
         <td><a href="#" title="Edit"><?php echo $row['clientid']; ?></a></td>
         <td><a href="#" title="Edit"><?php echo $row['date_time']; ?></a></td>
         <td><a href="#" title="Edit"><?php echo $row['due_date']; ?></a></td>
         <td><a href="#" title="Edit"><?php echo $row['Subject']; ?></a></td>
         <td><a href="#" title="Edit"><?php echo $row['type']; ?></a></td>
         <td style="text-align: right;">';

/*if($role=='AGENTS' || $role=='SUPERVISORS'){*/
echo    '<a href="#edit<?php echo $row['id']; ?>" role="button" data-toggle="modal" class="btn btn-sm btn-success check"><i class="fa fa-edit"></i> Edit</a><?php //} else { ?>&nbsp;&nbsp; <a  href="#delete<?php echo $row['id']; ?>" style="padding-top: 5px; padding-bottom: 5px;" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Clear</a> <?php //} ?>               </td>
                </tr>
                
                
                <div class="modal fade" id="edit<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                     	<form method="post" action="update_activity.php?s=2">

    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 style="text-align: center; font-weight: 700;">Edit Activity</h4>
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
                    <input type="text" class="form-control input-sm" name="subject" value="<?php echo $row['Subject'];?>" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['id']; ?>" name="id" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['clientid']; ?>" name="client" placeholder="Subject">
                
							</div><!-- /form-group -->
                            
                            	</div>
								</div><!-- /.col -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Due date</label>
<div class="input-group">
										<input type="text"  name="due_date" id="date<?php echo $row['id']; ?>" value="<?php echo $row['due_date']; ?>" readonly class="datepicker form-control">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>									</div>
								</div><!-- /.col 
								<div class="col-md-6">
									<div class="form-group">
										<label>Time</label>
<div class="input-group bootstrap-timepicker">
										<input class="timepicker form-control" name="time" type="text"/>
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
									</div>									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
							
							  <div class="form-group">
								<label>Related To</label>
								<input type="text" class="form-control input-sm" value="<?php echo $name; ?>" name="related_to" readonly placeholder="test@example.com">
							</div><!-- /form-group -->
							<div class="form-group">
								<label>Owner</label>
								<input type="text" class="form-control input-sm" value="<?php echo $agent; ?>" name="owner" readonly placeholder="test@example.com">
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
  <!-- /.modal -->    
                
                               <!--Modal-->
  <div class="modal fade" id="delete<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                      <form action="delete_activity.php?id=<?php echo $row['id']; ?>&s=2" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;"><input  type="hidden" name="client_id" value="<?php echo $row['clientid']; ?>">Remove this record?</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Are you sure you want to remove? This action can't be undone.</label>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
                  <button type="submit" class="btn btn-danger btn-sm">Confirm</button>

          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
      </div>
      <!-- /.modal-content --> 
                        </form>
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
			
                    	
                        <?php
						 }
						 ?>                       
                           		
                                
                                <div class="modal fade" id="add_activity">
                                <div class="modal-dialog">
                                <form method="post" action="get_activity.php?s=2">
                                
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
                                <input type="hidden" class="form-control input-sm" value="<?php echo $clientid; ?>" name="clientid" placeholder="Subject">
                                <input type="hidden" class="form-control input-sm" value="<?php echo $email; ?>" name="email" placeholder="Subject">
                                <input type="hidden" class="form-control input-sm" value="<?php echo $agent; ?>" name="agent_name" placeholder="Subject">
                                <input type="hidden" class="form-control input-sm" value="<?php echo $prospect_owner; ?>" name="prospect_owner" placeholder="Subject">
                                <input type="hidden" class="form-control input-sm" value="<?php echo $status; ?>" name="status" placeholder="Subject">
                                <input type="hidden" class="form-control input-sm" value="<?php echo $section_name; ?>" name="section_name" placeholder="Subject">
                                </div><!-- /form-group -->
                                
                                </div>
                                </div><!-- /.col -->
                                <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                <label>Due date</label>
                                <div class="input-group">             
                                <input type="text" value="" name="due_date"  readonly id="datetimepicker" class="form-control"/>
                                
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>									</div>
                                </div><!-- /.col 
                                <div class="col-md-6">
                                <div class="form-group">
                                <label>Time</label>
                                <div class="input-group bootstrap-timepicker">
                                <input class="timepicker form-control" name="time" type="text"/>
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>									</div>
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                                
                                <div class="form-group">
                                <label>Related To</label>
                                <input type="text" class="form-control input-sm" value="<?php echo $name; ?>" name="related_to" readonly placeholder="test@example.com">
                                </div><!-- /form-group -->
                                <div class="form-group">
                                <label>Owner</label>
                                <input type="text" class="form-control input-sm" value="<?php echo $agent; ?>" name="owner" readonly placeholder="test@example.com">
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

                        		
							</tbody>
						</table>
</div>
</div>

</div>
</div>

 <div class="panel-heading" style="text-align: center; font-size: 24px;"><strong>		Notes     </strong>	</div>
                                
                              <div class="padding-md">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">

<br/>
                        <div class="input-group-btn">
                        <ul class="dropdown-menu new" style="display: block;">
                        <li><a href="#newFolder" role="button" data-toggle="modal" >Add Note</a></li>
                        </ul>
                        </div><!-- /btn-group -->
                        
<?php //echo "select * from pia_activities where clientid='".$client."' and  not  type='notes' order by date_time desc";?>
	<table class="table table-striped" id="dataTable1">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Date Created</th>
									<th>Notes</th>
									<th >&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							include("connection.php");
                            @session_start();
                            $_SESSION['key'] = md5(mt_rand()); 
                            $query = mysqli_query($con,"select * from pia_activities where clientid='".$client."' and  type='notes' order by date_time desc") ;
                            while($row11 = mysqli_fetch_array($query) ) {
                            
								$agent=$row11['agent_name'];
								$clientid=$row11['clientid'];
								$email=$row11['client_email'];
								$prospect_owner=$row11['prospect_owner'];
								$status=$row11['status'];
								$section_name=$row11['section_name'];
						?>

                <tr>
                <td><a href="#" title="Edit"><?php echo $row11['clientid']; ?></a></td>
                <td><a href="#" title="Edit"><?php echo $row11['date_time']; ?></a></td>
                <td><a href="#" title="Edit"><?php echo $row11['note']; ?></a></td>
           
                <td style="text-align:right;">
                               <?php //if($role=='AGENTS' || $role=='SUPERVISORS'){?><!-- <a href="#edit_note<?php echo $row['id']; ?>" role="button" data-toggle="modal" class="btn btn-sm btn-success check"><i class="fa fa-edit"></i> Edit</a>--><?php //} else { ?>&nbsp;&nbsp; <a  href="#delete_note<?php echo $row11['id']; ?>" style="padding-top: 5px; padding-bottom: 5px;" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Clear</a><?php //} ?>               </td>
                </tr>
                             <!--Modal

                <div class="modal fade" id="edit_note<?php echo $row11['id']; ?>">
                  <div class="modal-dialog">
                        <form method="post" action="update_notes.php">

      <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align: center; font-weight: 700;">Edit Note</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="folderName">Add a note</label>
                                    <textarea class="form-control" name="notes" rows="3"><?php echo $row11['note']; ?></textarea>
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row11['clientid']; ?>" name="clientid" placeholder="Subject">
                                               </div>
        <div class="form-group">
								 <label class="label-checkbox">
								 <input type="checkbox" class="regular-checkbox" name="chk_email" />
								 <span class="custom-checkbox"></span>
									Send e-mail to owner about this note.
								</label>
							</div><!-- /form-group
                                    </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
				        <button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
      <!-- /.modal-content 
</form>

    </div>
    <!-- /.modal-dialog 
  </div>
  <!-- /.modal -->    
                
                               <!--Modal-->
  <div class="modal fade" id="delete_note<?php echo $row11['id']; ?>">
    <div class="modal-dialog">
                      <form action="delete_activity.php?id=<?php echo $row11['id']; ?>&s=2" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;"><input  type="hidden" name="client_id" value="<?php echo $row11['clientid']; ?>">Remove this note?</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Are you sure you want to remove? This action can't be undone.</label>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
                  <button type="submit" class="btn btn-danger btn-sm">Confirm</button>

          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
      </div>
      <!-- /.modal-content --> 
                        </form>
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
  
                      
            
            <?php
            }
            ?>                       
                            
  
  <div class="modal fade" id="newFolder">
    <div class="modal-dialog">
    <form method="post" action="get_notes.php?s=2">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align: center; font-weight: 700;">New Note</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="folderName">Add a note</label>
                                    <textarea class="form-control" name="notes" rows="3">Add a note about this prospect.</textarea>
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $clientid; ?>" name="clientid" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $email; ?>" name="email" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $agent; ?>" name="agent_name" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $prospect_owner; ?>" name="prospect_owner" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $status; ?>" name="status" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $section_name; ?>" name="section_name" placeholder="Subject">            </div>
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
  <!-- /.modal --> 
								
							</tbody>
						</table>
</div>
</div>

</div>
</div>

</div>
  </div>
  <!-- /main-container --> 
  
  
  
  <!-- Footer
        ================================================== -->
  <!--____________________footer___________________________-->
  <?php include("footer.php"); ?>
  <!--____________________footer___________________________--> 
  </div>
<!-- /wrapper --> 

<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 
<script src="build/jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>

							<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
//startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'<?php echo date("Y-m-d H:i:s"); ?>',step:10});
<?php
$query = mysqli_query($con,"select * from pia_activities where clientid='".$client."' and not type='notes' order by date_time desc") ;
                            while($row11 = mysqli_fetch_array($query) ) {
							?>

$('#date<?php echo $row11['id']; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
//startDate:	'1986/01/05'
});
//$('#date<?php echo $row['id']; ?>').datetimepicker({value:'<?php echo date("Y-m-d H:i:s"); ?>',step:10});

<?php
}
?>

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
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
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
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


</script>

<!-- Logout confirmation -->

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
	<!-- Datepicker -->
	<script src='js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='js/bootstrap-timepicker.min.js'></script>
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
	</script>
</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>










<?php
if(isset($_GET['s']))
{
if($_GET['s']==1)
{
?>
<script>
alert("Sucessfully Added");
</script>
<?php
}
else if($_GET['s']==2)
{
?>
<script>
alert("Sucessfully Deleted");
</script>
<?php
}
else
{
?>
<script>
alert("Sucessfully Updated");
</script>
<?php
}
}
?>

















