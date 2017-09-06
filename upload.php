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

//session_start();
//$user=$_SESSION['user'];

if(!empty($_FILES)){
/**	
	//database configuration
	$dbHost = 'smscampaign.db.9671823.hostedresource.com';
	$dbUsername = 'smscampaign';
	$dbPassword = 'Campaign@123';
	$dbName = 'smscampaign';
	//connect with the database
	$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
**/
	
	$targetDir = "uploads/";
	$fileName = $_FILES['file']['name'];
	$temp = explode(".",$_FILES["file"]["name"]);
	$newfilename_file = rand(1,89768) . '.' .end($temp);	
	$targetFile = $targetDir.$newfilename_file;

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		//insert file information into db table

$users=get_record_sql("select * from pia_login where email='$user'");
//var_dump($agents);
    foreach($users AS $usr){
        $date= date('Y-m-d H:i:s');
        executes("INSERT INTO pia_files(file_name, file_path, Modifier, date_time) 
                VALUES
                ('$fileName','$targetFile','$usr->username', 
                '$date')");
    }
//header("location:files.php?s=1");
exit();
ob_flush();
    
/**
$query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
while($row = mysqli_fetch_array($query)){ 
		$conn->query("INSERT INTO pia_files (file_name,file_path,Modifier,date_time) VALUES('".$fileName."','".$targetFile."','".$row['username']."','".date("Y-m-d H:i:s")."')");
    }
**/
    }
	
}
?>