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
$id=$_POST['id'];
$people_id =  $_POST['people_id'];
$phone =  $_POST['phone'].','.$_POST['phone1'].','.$_POST['phone2'];
$firstname = $_POST['firstname'];
$Address =  $_POST['Address'];
$lastname =  $_POST['lastname'];
$City =  $_POST['City'];
$email = $_POST['email'];
$zip = $_POST['zip'];
$c_status = $_POST['c_status'];
$Prospect_Status = $_POST['Prospect_Status'];
$tags = $_POST['tags'];

/**
executes("UPDATE pia_people SET (firstname, lastname, email, phone, address, city, zip, Prospect_Status, Customer_Status, tags) 
        VALUES
        ('$firstname','$lastname','$email','$phone','$Address','$City','$zip','$Prospect_Status','$c_status','$tags')
        WHERE people_id = '$people_id'");
        
**/
$result=executes("UPDATE pia_people 
        SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', address='$Address', city='$City', zip='$zip', Prospect_Status='$Prospect_Status', Customer_Status='$c_status', tags='$tags' 
        WHERE id = '$id'");
echo $result;

if($result){
 header("location:edit_people.php?s=3&id=$id");
 }else{
    header("Location:people.php");
    }

ob_flush();
?>