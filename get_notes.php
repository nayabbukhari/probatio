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
    $type =  "notes";
    $subject = $_POST['subject'];
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
if($chk_email==''){
    //echo "null";
	}else{
        //echo "not null";
		require("class.phpmailer.php");
//$email1 ='chef@ boomerangbistro.com.my';
//$email3 = "Vikram.Kukreja@boomerangbistro.com.my";
$email4 ='sanjaybhatt300@gmail.com';
//$email2 ='manager@boomerangbistro.com.my';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->Host = 'smtpout.secureserver.net';
$mail->Port = 80;
$mail->Username = 'info@virtuemantra.com';
$mail->Password = 'vm@123';
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->From = "info@virtuemantra.com";
$mail->FromName = "Probatio";

$mail->AddAddress($email);
$mail->AddReplyTo($email,'Information');
$mail->IsHTML(true);
$mail->Subject = "Activity Notes";
//$mail->AltBody = "Thank you for registration in Hulchal successfully \n Please login here: http://winkbuddy.in/hulchal/index.php";
$mail->Body = "<strong>Note</strong>:".$notes;

if(!$mail->Send()){
    $mail->ErrorInfo;
    header("Location:index.php");
//echo "Your email is already exits!";
}else{
    }		
}
executes("insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,section_name,note,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$section_name."','".$notes."',NOW())");
//$query1111 = mysqli_query($con,"insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,section_name,note,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$section_name."','".$notes."',NOW())");
//echo "insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,type,section_name,note,date_time) values('".$clientid."','".$email."','".$agent_name."','".$prospect_owner."','".$status."','".$type."','".$section_name."','".$notes."',NOW())";
if($_GET['s']=='2'){
    header("location:view_activities.php?s=1&client=".$clientid);
 }else{
    header("Location:activities.php?s=1");
}
ob_flush();
?>