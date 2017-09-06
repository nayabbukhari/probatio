<?php
include("connection.php");
@session_start();
$_SESSION['key'] = md5(mt_rand()); 
if($_GET['q']=='all')
{
$query = mysqli_query($con,"select * from pia_login_history") ;
}
else
{
$query = mysqli_query($con,"select * from pia_login_history where email='".$_GET['q']."'") ;
}
$i = 1;
while($row = mysqli_fetch_array($query) ) {?> 		
<tr>
<td><?php echo $i ;?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['date_time']; ?></td>
<td><?php echo $row['ip_address']; ?></td>
<td><?php echo $row['user_agent']; ?></td>									
</tr>
<?php 
$i++; 
}?>