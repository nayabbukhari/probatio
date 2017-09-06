<?php
ob_start();
include("connection.php");
$id =  $_POST['id'] ;
$user_name =  $_POST['user_name'] ;
$email = $_POST['email'] ;
$role =  $_POST['role'] ;
$status = $_POST['status'];


$allowedExts = array("gif", "jpeg", "jpg","pjpeg","x-png", "png");
$extension = explode(".", $_FILES["file"]["name"]);

if ($extension!=".gif" || $extension!=".jpeg" || $extension!=".jpg" || $extension!=".pjpeg" || $extension!=".x-png" || $extension!=".png"

    && ($_FILES["file"]["size"] < 90000000)
    && in_array($extension, $allowedExts)) {

if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}else{
    $file=$_FILES["file"]["name"];
    $file=$_FILES["file"]["name"];
    // $file = $temp[0].".".$temp[1];
    $temp[0] = rand(0, 3000); //Set to random number
    $file;

    if(file_exists("upload/" . $_FILES["file"]["name"])){
        echo $_FILES["file"]["name"] . " already exists. ";
        }else{
        $temp = explode(".",$_FILES["file"]["name"]);
        $newfilename_file = rand(1,89768) . '.' .end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$newfilename_file);
        //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        $file_path="upload/".$newfilename_file;
        }
    }
}

if($file_path==''){
    $file_path= $_POST['path1'];
}

executes("update pia_login set username='".$user_name."',email='".$email."',role='".$role."',status='".$status."',user_photo='".$newfilename_file."',path='".$file_path."',date_time=now() where id='".$id."'");

//$sql=mysqli_query($con,"update pia_login set username='".$user_name."',email='".$email."',role='".$role."',status='".$status."',user_photo='".$newfilename_file."',path='".$file_path."',date_time=now() where id='".$id."'");

 //echo "update pia_login set username='".$user_name."',email='".$email."',role='".$role."',status='".$status."',user_photo='".$newfilename_file."',path='".$file_path."',date_time=now() where id='".$id."'";
header("location:user_management.php?s=3");
exit();
ob_flush();
?>
