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

//echo  '<link href="css/styles.css" rel="stylesheet">';
echo    '<link href="css/probatio.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">';        
//include("overlay.php");
echo    '<!-- /theme-setting -->
        <div id="wrapper" class="preload">';
include("topbar.php");          //logout and css
include("leftsidebar.php");     // remove extra pending

$page=basename($_SERVER['PHP_SELF']); $pa=explode(".", $page);		// echo $pa[0];

echo   '<br /><br /><div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">History</li>
        <li class="active"></li>
        </ul>
        </div>';
        
echo    '<!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="panel panel-default table-responsive">
        <div class="panel-heading">
        <strong>History</strong>
        </div>
        <div class="padding-md">
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">			
        <div class="panel-tab clearfix">
		<ul class="tab-bar">
		<li><a href="#home1" data-toggle="tab"><i class="fa fa-home"></i> All</a></li>
		<li  class="active"><a href="#Recall" data-toggle="tab"><i class="fa fa-bell"></i> Recall</a></li>
		<li><a href="#Client" data-toggle="tab"><i class="fa fa-user"></i> Client</a></li>
		<li><a href="#Premium-Gap" data-toggle="tab"><i class="fa fa-dashboard"></i> Premium Gap</a></li>
		<!--<li><a href="#Refused" data-toggle="tab"><i class="fa fa-retweet"></i> Refused</a></li> -->
		</ul>
		</div>
		<div class="panel-body">
		<div class="tab-content">
        <!--------------------------------------------------------Tab home --------------------------------------->
        <div class="tab-pane fade" id="home1">
        <div class="panel-tab clearfix">
		<ul class="tab-bar right">
		<li style="border-right:#B7B7B7 solid 1px;" ><a href="#year" data-toggle="tab"> Quarter</a></li>
		<li ><a href="#month" data-toggle="tab"> Month</a></li>
		<li><a href="#week" data-toggle="tab"> Week</a></li>
		<li><a href="#today" data-toggle="tab"> Today</a></li>
		<li class="active"><a href="#All" data-toggle="tab"> All</a></li>
		</ul>
		</div>
		<div class="panel-body">
		<div class="tab-content">';

        //All tab        
echo    '<div class="tab-pane fade in active" id="All">
		<table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
		<th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>
		<th>Renewal Date</th>
		<th>Others</th>
		<th>Capitale</th>
		<th>Insurer</th>';

if($role!='AGENTS'){
echo    '<th>Agent</th>';
        }
echo    '<th>Action</th></tr></thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 
                        
if($role=='AGENTS'){
        $leads=get_records_sql("select * from pia_leads where prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("select * from pia_leads order by date_time desc");
            }
            //var_dump($leads);
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

echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>';
echo    '<td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
        }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a></td></tr>';
        }
echo    '</tbody></table></div>';

        //Today tab
echo    '<div class="tab-pane fade" id="today">
        <table class="table table-striped" id="dataTable1">
        <thead><tr><th>Client Id</th>
        <th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
        <th>Activity 2</th>
        <th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
        <th>Capitale</th>
		<th>Insurer</th>';

if($role!='AGENTS'){
echo    '<th>Agent</th>';
        }
echo    '<th>Action</th>
        </tr></thead>
        <tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 

if($role=='AGENTS'){
        $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) order by date_time desc");
            }
        foreach($leads AS $lead){
            //var_dump($lead->date_time);
        //while($row = mysqli_fetch_array($query) ) {
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
echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role !='AGENTS'){
    echo '<td>'.$lead->agent_name.'</td>';
    }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'"data-toggle="modal" class="btn btn-sm btn-success check">Edit</a></td></tr>';
}
echo    '</tbody></table></div>';


        //week tab
echo    '<div class="tab-pane fade" id="week">
        <table class="table table-striped" id="dataTable2">
        <thead>
        <tr>
        <th>Client Id</th>
        <th>Product</th>
        <th>Status</th>
        <th>Effective date</th>
        <th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
        <th>Capitale</th>
        <th>Insurer</th>';

if($role !='AGENTS'){
echo    '<th>Agent</th>';
        }
echo    '<th>Action</th></tr></thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand());
if($role=='AGENTS'){
        $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by date_time desc");
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
		
echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td><strong>'.$status.'</td></strong>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
        }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'"data-toggle="modal" class="btn btn-sm btn-success check">Edit</a></td></tr>';
    }
echo    '</tbody></table></div>';

        //month tab         
echo    '<div class="tab-pane fade" id="month">
        <table class="table table-striped" id="dataTable3">
        <thead>
        <tr>
        <th>Client Id</th>
        <th>Product</th>
        <th>Status</th>
        <th>Effective date</th>
        <th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
        <th>Capitale</th>
        <th>Insurer</th>';

if($role !='AGENTS'){
echo    '<th>Agent</th>';
        }
echo    '<th>Action</th></tr></thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand());
if($role=='AGENTS'){
        $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("select * from pia_leads where  'date_time' >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) order by date_time desc");
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
		
echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
        }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'"data-toggle="modal" class="btn btn-sm btn-success check">Edit</a></td></tr>';
}
echo    '</tbody></table></div>';

        //Year Tab
echo    '<div class="tab-pane fade" id="year">
        <table class="table table-striped" id="dataTable4">
        <thead><tr><th>Client Id</th>
        <th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
        <th>Activity 2</th>
        <th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
        <th>Capitale</th>
		<th>Insurer</th>';

if($role!='AGENTS'){
echo    '<th>Agent</th>';
        }
echo    '<th>Action</th>
        </tr></thead>
        <tbody>';

//include("connection.php");
@session_start();
$_SESSION['key'] = md5(mt_rand()); 

if($role=='AGENTS'){
        $leads=get_records_sql("select * from  pia_leads where date(renewal_date) >= date(adddate(now(),30 )) and date(renewal_date) <= date(adddate(now(),60 )) and status in ('Premium Gap','Client') and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("select * from  pia_leads where date(renewal_date) >= date(adddate(now(),30 )) and date(renewal_date) <= date(adddate(now(),60 )) and status in ('Premium Gap','Client') order by date_time desc");
            }
	foreach($leads AS $lead){
        //while($row = mysqli_fetch_array($query) ) {
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
echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role !='AGENTS'){
    echo '<td>'.$lead->agent_name.'</td>';
    }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a></td></tr>';
}
echo    '</tbody></table></div>

        </div></div></div>
        
        <!--------------------------------------------------------Tab home --------------------------------------->
        
        <!--------------------------------------------------------Tab Recall --------------------------------------->
        <div class="tab-pane fade  in active" id="Recall">
        <table class="table table-striped" id="dataTable_Recall">
		<thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
		<th>Capitale</th>
		<th>Insurer</th>';
if($role!='AGENTS'){
echo    '<th>Agent</th>';
}
echo    '<th>Action</th></tr>
        </thead>
		<tbody>';

//include("connection.php");
@session_start();
$_SESSION['key'] = md5(mt_rand()); 

if($role=='AGENTS'){
        $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) order by date_time desc");
            }
    foreach($leads AS $lead){
        //while($row = mysqli_fetch_array($query) ) {
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
echo    '<tr><td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
}
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
        </tr>';
}
echo    '</tbody>
        </table>	
        </div>
        <!--------------------------------------------------------Tab Recall --------------------------------------->
        <!--------------------------------------------------------Tab Client --------------------------------------->
        <div class="tab-pane fade" id="Client">
        <table class="table table-striped" id="dataTable_client">
        <thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
        <th>Activity 2</th>
		<th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
		<th>Capitale</th>
		<th>Insurer</th>';
if($role!='AGENTS'){
echo    '<th>Agent</th>';
}
echo    '<th>Action</th></tr>
        </thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 

if($role=='AGENTS'){
        $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Client', status) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Client', status) order by date_time desc");
            }
    foreach($leads AS $lead){
		//while($row = mysqli_fetch_array($query) ) {
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
echo    '<tr><td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';
if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
}
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
        </tr>';
}
echo    '</tbody></table></div>
        <!--------------------------------------------------------Tab Client --------------------------------------->
        <!--------------------------------------------------------Tab Premium-Gap --------------------------------------->
        <div class="tab-pane fade" id="Premium-Gap">
        <table class="table table-striped" id="dataTable_gap">
        <thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
        <th>Activity 2</th>
        <th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
        <th>Capitale</th>
        <th>Insurer</th>';
if($role!='AGENTS'){
echo    '<th>Agent</th>';
}
echo    '<th>Action</th>
        </tr>
		</thead><tbody>';


@session_start();
$_SESSION['key'] = md5(mt_rand()); 

if($role=='AGENTS'){
        $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Premium Gap', status) and prospect_owner='$user' order by date_time desc");
        }else{
            $leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Premium Gap', status) order by date_time desc");
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
echo    '<tr>
        <td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
}
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
        </tr>';
}
echo    '</tbody></table></div>
         <!--------------------------------------------------------Tab Premium-Gap --------------------------------------->';
/**
         <!--------------------------------------------------------Tab Refused --------------------------------------->
        <div class="tab-pane fade" id="Refused">
        <table class="table table-striped" id="dataTable_ref">
		<thead>
		<tr>
		<th>Client Id</th>
		<th>Product</th>
		<th>Status</th>
		<th>Effective date</th>
        <th>Activity 1</th>
		<th>Activity 2</th>
		<th>Activity 3</th>
        <th>Renewal Date</th>
        <th>Others</th>
		<th>Capitale</th>
		<th>Insurer</th>';
if($role!='AGENTS'){
echo    '<th>Agent</th>';
}
echo    '<th>Action</th></tr>
        </thead><tbody>';

@session_start();
$_SESSION['key'] = md5(mt_rand()); 

$leads=get_records_sql("SELECT * FROM pia_leads WHERE FIND_IN_SET('Refused', status) order by date_time desc");
    foreach($leads AS $lead){            
        //while($row = mysqli_fetch_array($query) ) {
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

echo    '<tr><td>'.$lead->clientid.'</td>
        <td>'.$products.'</td> 
        <td>'.$status.'</td>
        <td>'.$lead->effectivedate.'</td>
        <td>'.$lead->activity1.'</td>
        <td>'.$lead->activity2.'</td>
        <td>'.$lead->activity3.'</td>
        <td>'.$lead->renewal_date.'</td>
        <td>$ '.$Others.'</td>
        <td>$ '.$Capitale.'</td>
        <td>'.$insurer.'</td>';

if($role!='AGENTS'){
echo    '<td>'.$lead->agent_name.'</td>';
        }
echo    '<td><a href="edit_prospect.php?t=e&id='.$lead->id.'&k='.$_SESSION['key'].'&for='.$pa[0].'" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
        </tr>';
}
echo    '</tbody></table></div>
        <!--------------------------------------------------------Tab Refused --------------------------------------->
**/
echo    '</div></div>
        </div><!-- /panel -->
		</div><!-- /.col -->
        </div>
        </div>


        <div class="padding-md clearfix">
		</div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div><!-- /.padding-md --> 
        </div><!-- /main-container -->';
 
echo    '<!-- Footer================================================== -->
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
        <!-- Le javascript  ================================================== --> 
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
        <script src="js/jquery.slimscroll.min.js""></script>
        <!-- Cookie -->
        <script src="js/jquery.cookie.min.js"></script>
        <!-- Endless -->
        <script src="js/endless/endless.js"></script>
	   <!-----------------------------------------------------------datepicker--------------------------------------------------------->
	   <script>';
?>
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

<?php
echo    '<!-----------------------------------------------------------datepicker--------------------------------------------------------->

        </script></body></html>';

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