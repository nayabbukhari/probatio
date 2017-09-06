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
    $id=$_GET['id'];
}else{
    header("location:index.php");
}
ob_start();

executes("delete from pia_files where id='$id'");
//echo "delete from pia_leads where id='".$_GET['id']."'";

header("location:files.php?s=2");
exit();
ob_flush();
?>