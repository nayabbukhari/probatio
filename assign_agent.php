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
$id =  $_POST['id'] ;
$agent =  $_POST['agent'] ;
//var_dump($agent);


$agents=get_record_sql("select * from pia_login where email='$agent'");
//echo '<br />';
//var_dump($agents);
foreach($agents AS $agnt){

executes("update pia_leads set agent_name='$agnt->username', prospect_owner='$agent', update_status='1' where id='$id' ");

//$sql=mysqli_query($con,"update pia_leads set agent_name='".$row['username']."',prospect_owner='".$agent."',update_status='1' where id='".$id."'");
 //4echo "update pia_leads set agent_name='".$row['username']."',prospect_owner='".$agent."' where id='".$id."'";
}

header("location:prospects.php?s=3");
exit();
ob_flush();
?>
