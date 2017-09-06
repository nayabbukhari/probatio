<?php
ob_start();
include("connection.php");
$id =  $_POST['id'] ;

$clientid =  $_POST['clientid'] ;
$page =  $_POST['page'] ;
echo $page;
$firstname =  $_POST['firstname'] ;
$lastname =  $_POST['lastname'] ;
$email = $_POST['email'] ;
$phone = $_POST['phone'] ;
$phone_1 = $_POST['phone_1'] ;
$phone_2 = $_POST['phone_2'] ;
$client_main = $_POST['client_main'] ;


$ph=$phone.','.$phone_1.','.$phone_2;



$comment = $_POST['comment'] ;
$main = $_POST['main'] ;
		$main1 = $_POST['main1'] ;

		
		
			$notes = $_POST['notes'] ;


	
				$now=date("Y-m-d H:i:s");
				echo $now;	
					
			$product_auto = $_POST['product_auto'] ;
			
			$insurer_auto = $_POST['insurer_auto'] ;
			$status_auto = $_POST['status_auto'] ;
			$status_back_auto = $_POST['status_back_auto'] ;
			$Capitale_auto = $_POST['Capitale_auto'] ;
			$Others_auto = $_POST['Others_auto'] ;
			
			
							$effectivedate_auto = $_POST['effectivedate_auto'] ;
							if($effectivedate_auto=='' || $effectivedate_auto==null)
							{
							$effectivedate_auto='';
							}
							else
							{
							$effectivedate_auto = str_replace('/', '-', $effectivedate_auto);
							$effectivedate_auto = date('Y-m-d', strtotime($effectivedate_auto));
							$renewal_date_auto=date("Y-m-d H:i:s", strtotime("+1 years", strtotime($effectivedate_auto)));  
							echo $effectivedate_auto;
							
							  if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>...now";
									}
									
										if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>...now";
									}
									
										if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_auto)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>...now";
									}
									
							
							}
							//echo $effectivedate_auto;
							
			$chkbox_auto = $_POST['chkbox_auto'] ;


 if($product_auto!='' || $insurer_auto!='' || $status_auto!='' || $effectivedate_auto!='' || $Capitale_auto!='')
 {
			
echo "Auto";
	$sql=mysqli_query($con,"update pia_leads set products='".$product_auto."',insurer='".$insurer_auto."',Others='".$Others_auto."',Capitale='".$Capitale_auto."',effectivedate='".$effectivedate_auto."',activity1='".$activity_date1."',activity2='".$activity_date2."',activity3='".$activity_date3."',renewal_date='".$renewal_date_auto."',status='".$status_auto."',status='".$status_auto."',notes='".$notes."',Questions='".implode(",",$chkbox_auto)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='auto'");
	
	echo "update pia_leads set products='".$product_auto."',insurer='".$insurer_auto."',Others='".$Others_auto."',Capitale='".$Capitale_auto."',effectivedate='".$effectivedate_auto."',status='".$status_auto."',notes='".$notes."',Questions='".implode(",",$chkbox_auto)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='auto'";
	

	
	//$sql=mysqli_query($con,"update pia_activities set client_email='".$email."',status='".$status_auto."' ,activity_1='".$activity_date1."',activity_2='".$activity_date2."',activity_3='".$activity_date3."' where clientid='".$client_main."' and status='".$status_back_auto."' and section_name='auto'");
	echo "update pia_activities set client_email='".$email."',status='".$status_auto."' where clientid='".$client_main."' and status='".$status_back_auto."' and section_name='auto'";
}


			$product_home = $_POST['product_home'] ;
			
			$insurer_home = $_POST['insurer_home'] ;
			$status_home = $_POST['status_home'] ;
						$status_back_home = $_POST['status_back_home'] ;

			$Capitale_home = $_POST['Capitale_home'] ;
			$Others_home = $_POST['Others_home'] ;
			
			$effectivedate_home = $_POST['effectivedate_home'] ;
							if($effectivedate_home=='' || $effectivedate_home==null)
							{
							$effectivedate_home='';
							}
							else
							{
							$effectivedate_home = str_replace('/', '-', $effectivedate_home);
							$effectivedate_home = date('Y-m-d', strtotime($effectivedate_home));
							$renewal_date_home=date("Y-m-d H:i:s", strtotime("+1 years", strtotime($effectivedate_home)));  
							echo $effectivedate_home;
							
								    if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>...now";
									}
									
										if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>...now";
									}
									
										if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_home)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>...now";
									}
									
							
														}
						//	echo $effectivedate_home;
			$chkbox_home = $_POST['chkbox_home'] ;


 if($product_home!='' || $insurer_home!='' || $status_home!='' || $effectivedate_home!='' || $Capitale_home!='')

 {
		echo "home";
	
$sql=mysqli_query($con,"update pia_leads set products='".$product_home."',insurer='".$insurer_home."',Others='".$Others_home."',Capitale='".$Capitale_home."',effectivedate='".$effectivedate_home."',activity1='".$activity_date1."',activity2='".$activity_date2."',activity3='".$activity_date3."',renewal_date='".$renewal_date_auto."',status='".$status_home."',notes='".$notes."',Questions='".implode(",",$chkbox_home)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='home'");
	
	echo "update pia_leads set products='".$product_home."',insurer='".$insurer_home."',Others='".$Others_home."',Capitale='".$Capitale_home."',effectivedate='".$effectivedate_home."',status='".$status_home."',notes='".$notes."',Questions='".implode(",",$chkbox_home)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='home'";

	
	//$sql=mysqli_query($con,"update pia_activities set client_email='".$email."',status='".$status_home."',activity_1='".$activity_date1."',activity_2='".$activity_date2."',activity_3='".$activity_date3."' where clientid='".$client_main."' and status='".$status_back_home."' and section_name='home'");
	echo "update pia_activities set client_email='".$email."',status='".$status_home."' where clientid='".$client_main."' and status='".$status_back_home."' and section_name='home'";
}
	$product_enter = $_POST['product_enter'] ;
			
			$insurer_enter = $_POST['insurer_enter'] ;
			$status_enter = $_POST['status_enter'] ;
									$status_back_enter = $_POST['status_back_enter'] ;

			$Capitale_enter = $_POST['Capitale_enter'] ;
			$Others_enter = $_POST['Others_enter'] ;
			
			$effectivedate_enter = $_POST['effectivedate_enter'] ;
							if($effectivedate_enter=='' || $effectivedate_enter==null)
							{
							$effectivedate_enter='';
							}
							else
							{
							$effectivedate_enter = str_replace('/', '-', $effectivedate_enter);
							$effectivedate_enter = date('Y-m-d', strtotime($effectivedate_enter));
							$renewal_date_enter=date("Y-m-d H:i:s", strtotime("+1 years", strtotime($effectivedate_enter)));  
							echo $effectivedate_enter;
							
								    if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>...now";
									}
									
										if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>...now";
									}
									
										if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_enter)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>...now";
									}
									
							
							}
							//echo $effectivedate_enter;
			                $chkbox_enter = $_POST['chkbox_enter'] ;

 if($product_enter!='' || $insurer_enter!='' || $status_enter!='' || $effectivedate_enter!='' || $Capitale_enter!='')
{		

echo "Enter";
$sql=mysqli_query($con,"update pia_leads set products='".$product_enter."',insurer='".$insurer_enter."',Others='".$Others_enter."',Capitale='".$Capitale_enter."',effectivedate='".$effectivedate_enter."',activity1='".$activity_date1."',activity2='".$activity_date2."',activity3='".$activity_date3."',renewal_date='".$renewal_date_enter."',status='".$status_enter."',notes='".$notes."',Questions='".implode(",",$chkbox_enter)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='enter'");
	
	echo "update pia_leads set products='".$product_enter."',insurer='".$insurer_enter."',Others='".$Others_enter."',Capitale='".$Capitale_enter."',effectivedate='".$effectivedate_enter."',status='".$status_enter."',notes='".$notes."',Questions='".implode(",",$chkbox_enter)."',update_status='1',date_time=now() where clientid='".$client_main."' and section_name='enter'";
	//$sql=mysqli_query($con,"update pia_activities set client_email='".$email."',status='".$status_enter."',activity_1='".$activity_date1."',activity_2='".$activity_date2."',activity_3='".$activity_date3."' where clientid='".$client_main."' and status='".$status_back_enter."' and section_name='enter' ");
	echo "update pia_activities set client_email='".$email."',status='".$status_enter."' where clientid='".$client_main."' and status='".$status_back_enter."' and section_name='enter'";
}


		$sq11l=mysqli_query($con,"update pia_leads set clientid='".$clientid."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."',phone='".$ph."' where  clientid='".$client_main."'");
		echo "update pia_leads set clientid='".$clientid."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."',phone='".$ph."' where  clientid='".$client_main."'";
																
																if($page=='workplan')
																{
																echo "workplan";
																
																header("location:workplan.php?s=3");
																
																}
																else if($page=='history')
																{
																echo "history";
																
																header("location:history.php?s=3");
																
																}
																else
																{
																echo "Nopes";
																
																
																header("location:leads.php?s=3");
																
																}				

exit();
ob_flush();
?>
