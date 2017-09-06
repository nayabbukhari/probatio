<?php
ob_start();
session_start();
$user=$_SESSION['user'];

include("connection.php");

		 $query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
				while($row = mysqli_fetch_array($query) ) 
				
				{
		$clientid =  $_POST['clientid'] ;
		
		$firstname =  $_POST['firstname'] ;
		
		
		$lastname =  $_POST['lastname'] ;
		
		
		$email = $_POST['email'] ;
		$phone = $_POST['phone'] ;
		$phone_1 = $_POST['phone_1'] ;
		$phone_2 = $_POST['phone_2'] ;
		
		$ph=$phone.','.$phone_1.','.$phone_2;
		
		
					$note = $_POST['notes'] ;
		$comment = $_POST['comment'] ;
		$main = $_POST['main'] ;
		$main1 = $_POST['main1'] ;




			
				
$allowedExts = array("xlsx", "xls", "csv","txt");
$extension = explode(".", $_FILES["file"]["name"]);

if ($extension!=".xlsx" || $extension!=".xls" || $extension!=".csv" || $extension!=".txt"

&& ($_FILES["file"]["size"] < 90000000)
&& in_array($extension, $allowedExts)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{

$file=$_FILES["file"]["name"];
$file=$_FILES["file"]["name"];
// $file = $temp[0].".".$temp[1];
$temp[0] = rand(0, 3000); //Set to random number
$file;

if (file_exists("upload_prospects/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{

$temp = explode(".",$_FILES["file"]["name"]);
$newfilename_file = rand(1,89768) . '.' .end($temp);

move_uploaded_file($_FILES["file"]["tmp_name"],"upload_prospects/".$newfilename_file);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path="upload_prospects/".$newfilename_file;
}
}
}




			
				
$allowedExts = array("xlsx", "xls", "csv","txt");
$extension = explode(".", $_FILES["file1"]["name"]);

if ($extension!=".xlsx" || $extension!=".xls" || $extension!=".csv" || $extension!=".txt"
&& ($_FILES["file1"]["size"] < 90000000)
&& in_array($extension, $allowedExts)) {
if ($_FILES["file1"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file1"]["error"] . "<br />";
}
else
{

$file=$_FILES["file1"]["name"];
$file=$_FILES["file1"]["name"];
// $file = $temp[0].".".$temp[1];
$temp[0] = rand(0, 3000); //Set to random number
$file;

if (file_exists("upload_prospects/" . $_FILES["file1"]["name"]))
{
echo $_FILES["file1"]["name"] . " already exists. ";
}
else
{

$temp = explode(".",$_FILES["file1"]["name"]);
$newfilename_file1 = rand(1,89768) . '.' .end($temp);

move_uploaded_file($_FILES["file1"]["tmp_name"],"upload_prospects/".$newfilename_file1);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path1="upload_prospects/".$newfilename_file1;
}
}
}




			
				
$allowedExts = array("xlsx", "xls", "csv","txt");
$extension = explode(".", $_FILES["file2"]["name"]);

if ($extension!=".xlsx" || $extension!=".xls" || $extension!=".csv" || $extension!=".txt"
&& ($_FILES["file2"]["size"] < 90000000)
&& in_array($extension, $allowedExts)) {
if ($_FILES["file2"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file2"]["error"] . "<br />";
}
else
{

$file=$_FILES["file2"]["name"];
$file=$_FILES["file2"]["name"];
// $file = $temp[0].".".$temp[1];
$temp[0] = rand(0, 3000); //Set to random number
$file;

if (file_exists("upload_prospects/" . $_FILES["file2"]["name"]))
{
echo $_FILES["file2"]["name"] . " already exists. ";
}
else
{

$temp = explode(".",$_FILES["file2"]["name"]);
$newfilename_file2 = rand(1,89768) . '.' .end($temp);

move_uploaded_file($_FILES["file2"]["tmp_name"],"upload_prospects/".$newfilename_file2);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path2="upload_prospects/".$newfilename_file2;
}
}
}

				
				$now=date("Y-m-d H:i:s");
				echo $now;	
							


			$product_auto = $_POST['product_auto'] ;
			
			$insurer_auto = $_POST['insurer_auto'] ;
			$status_auto = $_POST['status_auto'] ;
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
							//echo date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now)));
									
									if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									
										if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									
										if($effectivedate_auto >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_auto)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									
							
									
							}
							echo $effectivedate_auto;
							
			$chkbox_auto = $_POST['chkbox_auto'] ;


 if($product_auto!='' || $insurer_auto!='' || $status_auto!='' || $effectivedate_auto!='' || $Capitale_auto!='')
 {
			
$query = mysqli_query($con,"insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,activity1,activity2,activity3,renewal_date,status,agent_name,notes,section_name,Questions,auto_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_auto."','".$insurer_auto."','".$Others_auto."','".$Capitale_auto."','".$effectivedate_auto."','".$activity_date1."','".$activity_date2."','".$activity_date3."','".$renewal_date_auto."','".$status_auto."','".$row['username']."','".$note."','auto','".implode(",",$chkbox_auto)."','".$file_path."','".$user."','1',NOW())");

echo "insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,activity1,activity2,activity3,renewal_date,status,agent_name,notes,section_name,Questions,auto_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_auto."','".$insurer_auto."','".$Others_auto."','".$Capitale_auto."','".$effectivedate_auto."','".$activity_date1."','".$activity_date2."','".$activity_date3."','".$renewal_date_auto."','".$status_auto."','".$row['username']."','".$note."','auto','".implode(",",$chkbox_auto)."','".$file_path."','".$user."','1',NOW())";



//$query11 = mysqli_query($con,"insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_auto."','auto','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())");

echo "insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_auto."','auto','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())";

}


			$product_home = $_POST['product_home'] ;
			
			$insurer_home = $_POST['insurer_home'] ;
			$status_home = $_POST['status_home'] ;
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
							
								    if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									
										if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									
										if($effectivedate_home >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_home)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									
							
							
							echo $renewal_date_home;
							}
							echo $effectivedate_home;
			$chkbox_home = $_POST['chkbox_home'] ;


 if($product_home!='' || $insurer_home!='' || $status_home!='' || $effectivedate_home!='' || $Capitale_home!='')

 {
			
$query = mysqli_query($con,"insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,activity1,activity2,activity3,renewal_date,status,agent_name,notes,section_name,Questions,enter_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_home."','".$insurer_home."','".$Others_home."','".$Capitale_home."','".$effectivedate_home."','".$activity_date1."','".$activity_date2."','".$activity_date3."','".$renewal_date_home."','".$status_home."','".$row['username']."','".$note."','home','".implode(",",$chkbox_home)."','".$file_path1."','".$user."','1',NOW())");

//echo "insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,renewal_date,status,agent_name,notes,section_name,Questions,enter_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_home."','".$insurer_home."','".$Others_home."','".$Capitale_home."','".$effectivedate_home."','".$renewal_date_home."','".$status_home."','".$row['username']."','".$note."','home','".implode(",",$chkbox_home)."','".$file_path1."','".$user."','1',NOW())";


//$query111 = mysqli_query($con,"insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_home."','home','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())");

 echo "insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_home."','home',NOW(),NOW(),NOW(),NOW())";

}
	$product_enter = $_POST['product_enter'] ;
			
			$insurer_enter = $_POST['insurer_enter'] ;
			$status_enter = $_POST['status_enter'] ;
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
							
							
								    if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+2 days", strtotime($now))))
									{
									$activity_date1= date("Y-m-d", strtotime("+2 days", strtotime($now)));
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									else
									{
									$activity_date1=$now;
									echo "<br/>activity1 is=".$activity_date1."<br/>";
									}
									
										if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+7 days", strtotime($now))))
									{
									$activity_date2= date("Y-m-d", strtotime("+7 days", strtotime($now)));
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									else
									{
									$activity_date2='none';
									echo "<br/>activity2 is=".$activity_date2."<br/>";
									}
									
										if($effectivedate_enter >  date("Y-m-d H:i:s", strtotime("+21 days", strtotime($now))))
									{
									$activity_date3= date("Y-m-d", strtotime("-7 days", strtotime($effectivedate_enter)));
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									else
									{
									$activity_date3='none';
									echo "<br/>activity3 is=".$activity_date3."<br/>";
									}
									
							
							
							echo $renewal_date_enter;
							}
							echo $effectivedate_enter;
			                $chkbox_enter = $_POST['chkbox_enter'] ;

 if($product_enter!='' || $insurer_enter!='' || $status_enter!='' || $effectivedate_enter!='' || $Capitale_enter!='')
{		
$query = mysqli_query($con,"insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,activity1,activity2,activity3,renewal_date,status,agent_name,notes,section_name,Questions,enter_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_enter."','".$insurer_enter."','".$Others_enter."','".$Capitale_enter."','".$effectivedate_enter."','".$activity_date1."','".$activity_date2."','".$activity_date3."','".$renewal_date_enter."','".$status_enter."','".$row['username']."','".$note."','enter','".implode(",",$chkbox_enter)."','".$file_path2."','".$user."','1',NOW())");

//echo "insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,renewal_date,status,agent_name,notes,section_name,Questions,enter_doc,prospect_owner,update_status,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$product_enter."','".$insurer_enter."','".$Others_enter."','".$Capitale_enter."','".$effectivedate_enter."','".$renewal_date_enter."','".$status_enter."','".$row['username']."','".$note."','enter','".implode(",",$chkbox_enter)."','".$file_path2."','".$user."','1',NOW())";



$query1111 = mysqli_query($con,"insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_enter."','enter','".$activity_date1."','".$activity_date2."','".$activity_date3."',NOW())");

echo "insert into pia_activities(clientid,client_email,agent_name,prospect_owner,status,section_name,activity_1,activity_2,activity_3,date_time) values('".$clientid."','".$email."','".$row['username']."','".$user."','".$status_enter."','enter',NOW(),NOW(),NOW(),NOW())";

}

else
{
echo "error";

}
   // $value = $value * 2;



header("Location:leads.php?s=1");
				}

ob_flush();

?>