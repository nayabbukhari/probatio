<?php
ob_start();
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    session_start();   
    include("connection.php");
 }
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $role=$_SESSION['role'];
    $password = (md5($_GET["q"]));
}else{
    header("location:index.php");
}



$num_rows=get_record_sql("select * from pia_login where email='".$user."' AND password ='".$password."' ");
//$query = mysqli_query($con,"select * from pia_login where email='".$user."' AND password ='".$password."' ");
//echo "select * from pia_login where email='".$user."' AND password ='".$password."' ";
//$num_rows = mysqli_num_rows($query);
if($num_rows){
//echo "yes";
echo    '<style>
        .btn.check {
            opacity: 1; 
            cursor: pointer;
            display: inline;
        }

        </style>';
}else{
echo    'Password not matched
        <style>
        .btn.check {
            opacity: 0.65; 
            cursor: not-allowed;
            display:none;
        }
        </style>';
}
ob_flush();
?>