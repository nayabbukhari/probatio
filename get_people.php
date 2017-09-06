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

$people_id  =   $_POST['people_id'] ;
$firstname  =   $_POST['firstname'] ;
$lastname   =   $_POST['lastname'] ;
$email      =   $_POST['email'] ;
$phone      =   $_POST['phone'] ;
$phone_1    =   $_POST['phone1'] ;
$phone_2    =   $_POST['phone2'] ;

$ph=$phone.','.$phone_1.','.$phone_2;
$Address    =   $_POST['Address'] ;
$City       =   $_POST['City'] ;
$zip        =   $_POST['zip'] ;
$c_status   =   $_POST['c_status'] ;
$Prospect_Status = $_POST['Prospect_Status'] ;
$tags       =    $_POST['tags'] ;


$users=executes("INSERT into pia_people(people_id,firstname,lastname,email,phone,address,city,zip,Prospect_Status,Customer_Status,tags,date_time) values('".$people_id."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$Address."','".$City."','".$zip."','".$Prospect_Status."','".$c_status."','".$tags."',NOW())");

//echo "insert into pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,status,comment,Questions,date_time) values('".$clientid."', '".$firstname."','".$lastname."','".$email."','".$ph."','".$Address."','".$insurer[$i]."','".$City."','".$Capitale[$i]."','".$zip."','".$status[$i]."','".$comment."','".$notes."','".implode(",",$chkbox)."',NOW())";


header("Location:people.php?s=1");
ob_flush();

?>