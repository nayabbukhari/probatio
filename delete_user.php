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
    $id=$_GET['i'];
}else{
    header("location:index.php");
}
executes("delete from pia_login where id=$id");
header("location:user_management.php?s=2");
exit();
ob_flush();
?>