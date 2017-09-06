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
    $type =  $_POST['type'];
    $subject = $_POST['subject'];
    $clientid =  $_POST['clientid'];
    $email = $_POST['email'];
    $agent_name =  $_POST['agent_name'];
    $prospect_owner = $_POST['prospect_owner'];
    $status =  $_POST['status'];
    $section_name = $_POST['section_name'];
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

executes("insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,Subject,due_date,time,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$subject."','".$due_date."','".$time."','".$section_name."','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())");
//$query1111 = mysqli_query($con,"insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,Subject,due_date,time,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$subject."','".$due_date."','".$time."','".$section_name."','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())");
//echo "insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,Subject,due_date,time,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$subject."','".$due_date."','".$time."','".$section_name."','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())";

if($_GET['s']=='2'){
 header("location:view_activities.php?s=1&client=".$clientid);
 }else{
    header("Location:activities.php?s=1");
}
    ob_flush();
?>