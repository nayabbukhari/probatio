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
    $id=$_GET['id'];
}else{
    header("location:index.php");
}

executes("delete from pia_leads where id='$id'");

//echo "delete from pia_leads where id='".$_GET['id']."'";
if($_GET['s']=='2'){
 header("location:history.php?s=2");
 }else{
    header("location:leads.php?s=2");
}
exit();
ob_flush();
?>