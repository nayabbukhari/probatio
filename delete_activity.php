<?php
ob_start();
include("connection.php");
$client=$_POST['client_id'];
echo $client;
$sql=mysqli_query($con,"delete from pia_activities where id='".$_GET['id']."'");

echo "delete from pia_leads where id='".$_GET['id']."'";
/* if($_GET['s']=='2')
 {
 header("location:history.php?s=2");
 }
 else
 {*/
header("location:view_activities.php?s=2&client=".$client);
//}
exit();
ob_flush();
?>