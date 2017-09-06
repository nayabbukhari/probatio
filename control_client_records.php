<?php
/**
 * @Author: Manoj Thapliyal
 * @Date:   2016-02-12 13:33:55
 * @Last Modified by:   manoj
 * @Last Modified time: 2016-02-12 18:18:40
 */
ob_start();
session_start();
include("connection.php");

if(isset($_GET['k'])){
    if($_GET['k'] == $_SESSION['key']){
    	$action = $_GET['t'];
    	$id = $_GET['i'];

    	if($action == 'd'){
    		  $query = mysqli_query($con,"delete from pia_client where id = '".$id."' ");
    		  if (!$query) {
	         header("Location:user_management.php?s=0");
  
               } else{

	           header("Location:user_management.php?s=1");
            }
    	}
    }
}




// define variables and set to empty values
$clientid = $insurer = $firstname = $actualpremium =$lastname = $offeredpremium =$email = $effectivedate =$status =$comment = $chkbox = $product ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$clientid =  $_POST['clientid'] ;
$insurer = $_POST['insurer'] ;
$firstname =  $_POST['firstname'] ;
$actualpremium = $_POST['actualpremium'] ;
$lastname =  $_POST['lastname'] ;
$offeredpremium = $_POST['offeredpremium'] ;
$email = $_POST['email'] ;

$effectivedate = $_POST['effectivedate'] ;
$effectivedate = str_replace('/', '-', $effectivedate);
$effectivedate = date('Y-m-d', strtotime($effectivedate));

$status = $_POST['status'] ;
$comment = $_POST['comment'] ;
$chkbox = $_POST['chkbox'] ;
$product = $_POST['product'] ;

$query = mysqli_query($con,"insert into pia_client(clientid,firstname,lastname,email,insurer,actualpremium,offeredpremium,effectivedate,status,comment,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$insurer."','".$actualpremium."','".$offeredpremium."','".$effectivedate."','".$status."','".$comment."',NOW())");


if (!$query) {
	header("Location:client_records.php?s=0");
  
  } else{
	
	header("Location:client_records.php?s=1");
}

}

ob_flush();


?>