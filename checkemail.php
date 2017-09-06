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
    $email = $_GET["q"];
}else{
    header("location:index.php");
}

$emails=get_records_sql("select * from pia_login where email='$email'");
    $i = 1;
foreach($emails AS $emls){
        //echo "select * from pia_login where email='".$user."' AND password ='".$password."' ";
    if($emails[1]->email){
        //echo "yes";
        echo    '<scrip> alter E-mail already exists!</script>';
    }else{
        //echo $num_rows;
        echo    '<style>
                .btn.check{
                    opacity: 1; 
                    cursor: pointer;
                    display: inline;
                }
                </style>';
    }
}
ob_flush();
?>