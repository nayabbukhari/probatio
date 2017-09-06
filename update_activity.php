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
    
    $id =  $_POST['id'] ;
    $type =  $_POST['type'];
    $subject = $_POST['subject'];
    $client =  $_POST['client'] ;
    $clientid =  $_POST['clientid'];
    $email = $_POST['email'];
    $agent_name =  $_POST['agent_name'];
    $prospect_owner = $_POST['prospect_owner'];
    $status =  $_POST['status'];
    $chk_email =  $_POST['chk_email'];
    $section_name = $_POST['section_name'];
    $notes = $_POST['notes'];
    $time = $_POST['time'];
    $now=date("Y-m-d H:i:s");
    //echo $now;	
    $related_to = $_POST['related_to'];
    $due_date = $_POST['due_date'];
}else{
    header("location:index.php");
}
if($due_date=='' || $due_date==null){
    $due_date=$now;
	//echo due_date;
	}else{
        $due_date = str_replace('/', '-', $due_date);
		$due_date = date('Y-m-d H:i', strtotime($due_date));
		//echo due_date;
		}
executes("update pia_activities set type='".$type."',Subject='".$subject."',due_date='".$due_date."',date_time=now() where id='".$id."'");
//$sql=mysqli_query($con,"update pia_activities set type='".$type."',Subject='".$subject."',due_date='".$due_date."',date_time=now() where id='".$id."'");
//echo "update pia_activities set type='".$type."',Subject='".$subject."',due_date='".$due_date."',date_time=now() where id='".$id."'";
if($_GET['s']=='2'){
    header("location:view_activities.php?s=3&client=".$client);
 }else{
    header("Location:activities.php?s=3");
}
ob_flush();

?>