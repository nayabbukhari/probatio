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
    $password = (md5($_GET["pass"]));
}else{
    header("location:index.php");
}

executes("update pia_login set password='".$password."' where id='".$id."'");

// echo "update pia_login set password='".$password."' where id='".$id."'";
header("location:profile.php?s=4");
exit();
ob_flush();
?>
