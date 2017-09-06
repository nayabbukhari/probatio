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
    $id =  $_GET['id'] ;
    $user_name =  $_GET['user_name'] ;
    $email = $_GET['email'] ;
    $role =  $_GET['role'] ;
    $phone = $_GET['phone'];
    $dob=$_GET['dob'];
				$a=explode("/", $dob);
				$day=$a[0];
				$month=$a[1];
				$year=$a[2];
				$d_o_b=$year."-".$month."-".$day;
}else{
    header("location:index.php");
}



executes("update pia_login set username='".$user_name."',email='".$email."',role='".$role."',phone='".$phone."',d_o_b='".$d_o_b."',date_time=now() where id='".$id."'");
// echo "update pia_login set username='".$user_name."',email='".$email."',role='".$role."',phone='".$phone."',d_o_b='".$d_o_b."',date_time=now() where id='".$id."'";
header("location:profile.php?s=3");
exit();
ob_flush();
?>
