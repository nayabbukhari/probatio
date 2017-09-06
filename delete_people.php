<?php
if(isset($_REQUEST[session_name()])){
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
ob_start();


executes("DELETE FROM pia_people where id='".$_GET['id']."'");

header("location:people.php?s=2");
exit();
ob_flush();
?>