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
$id         =   $_POST['id'] ;
$file_name  =   $_POST['file_name'];
$ex         =   $_POST['ex'];
$file       =   $file_name.'.'.$ex;
$des        =   $_POST['des'];
$tags       =   $_POST['tags'];

executes("update pia_files set file_name='".$file."',tags='".$tags."',description='".$des."',date_time=now() where id='".$id."'");
//var_dump($agents);

//echo "update pia_files set file_name='".$file."',tags='".$tags."',description='".$des."',date_time=now() where id='".$id."'";
header("location:files.php?s=3");
exit();
ob_flush();
?>
