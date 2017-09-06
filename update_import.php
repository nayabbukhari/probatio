<?php
ob_start();
include("connection.php");
$agent =  $_POST['agent'] ;
$_result1=mysqli_query($con,"select count(*) from pia_leads where prospect_owner='".$agent."'  and type='import'");
while($row=mysqli_fetch_array($_result1))
{
$cnt=$row[0];
echo $cnt;
}
if($cnt>=1)
{
echo "yes";

$sql=mysqli_query($con,"update pia_leads set update_status='0',type='done' where prospect_owner='".$agent."'  and type='import'");
echo "update pia_leads set update_status='0',type='done' where prospect_owner='".$agent."'  and type='import'";

header("location:leads.php?f=1");
}
else
{
echo "no";
header("location:leads.php?f=3");


}

exit();
ob_flush();
?>
