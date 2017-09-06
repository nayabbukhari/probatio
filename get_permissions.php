<?php
ob_start();
include("connection.php");

$permission = $_POST['permission'];
echo $permission;

if($_GET['user']=='SUPERVISORS'){

$sql=mysqli_query($con,"update pia_login set permissions='".implode(",",$permission)."' where role='SUPERVISORS'");


header("location:edit_permissions.php?role=SUPERVISORS");

}
else if($_GET['user']=='AGENTS'){
$sql=mysqli_query($con,"update pia_login set permissions='".implode(",",$permission)."' where role='AGENTS'");

header("location:edit_permissions.php?role=AGENTS");
}
else {
$sql=mysqli_query($con,"update pia_login set permissions='Dashboard,Prospects,Work Plan,History,Commissions,Email Notifications,People,Users Management,Scholaris,Document Management,Deals' where role='SUPER ADMINISTRATORS'");
echo "update pia_login set permissions='".implode(",",$permission)."' where role='SUPER ADMINISTRATORS'";
header("location:edit_permissions.php?role=super_admin");
}
exit();
ob_flush();
?>
