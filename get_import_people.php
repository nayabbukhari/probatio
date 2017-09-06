<?php
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
}else{
    header("location:index.php");
}
 

$allowedExts = array("xlsx","txt","csv");
$extension = explode(".", $_FILES["file"]["name"]);

if ($extension!=".xlsx" || $extension!=".txt" && ($_FILES["file"]["size"] < 90000000) && in_array($extension, $allowedExts)) {
if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }else{
        $file=$_FILES["file"]["name"];

        // $file = $temp[0].".".$temp[1];
        $temp[0] = rand(0, 3000); //Set to random number
        $file;

    if (file_exists("upload_people/" . $_FILES["file"]["name"])){
        echo $_FILES["file"]["name"] . " already exists. ";
        }else{

        $temp = explode(".",$_FILES["file"]["name"]);
        $newfilename = rand(1,89768) . '.' .end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload_people/".$newfilename);

        //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        "upload_people/".$newfilename;
        echo "upload_people/".$newfilename;
        }
    }
    }else{
    echo "Invalid file";
}

$inputFileName ="upload_people/".$newfilename;
$extension1 = explode(".", $inputFileName);

if($extension1==".xlsx" || $extension!=".csv" || $extension1==".txt"){
    set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

include 'PHPExcel/IOFactory.php';

    // This is the file path to be uploaded.

try {
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    }catch(Exception $e){
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

for($i=1;$i<=$arrayCount;$i++){
    //$id=$_POST['id'];
    $people_id =  trim($allDataInSheet[$i]["A"]);
    $phone =  trim($allDataInSheet[$i]["B"]);
    $firstname = trim($allDataInSheet[$i]["C"]);
    $Address =  trim($allDataInSheet[$i]["D"]);
    $lastname =  trim($allDataInSheet[$i]["E"]);
    $City =  trim($allDataInSheet[$i]["F"]);
    $email = trim($allDataInSheet[$i]["G"]);
    $zip = trim($allDataInSheet[$i]["H"]);
    $Prospect_Status = trim($allDataInSheet[$i]["J"]);
    $customer_status = trim($allDataInSheet[$i]["I"]);
    $tags = trim($allDataInSheet[$i]["K"]);

    //echo "Message has been sent";
    executes("INSERT INTO pia_people(people_id, phone, firstname, Address, lastname, City, email, zip, customer_status, Prospect_Status, tags, date_time) 
            VALUES 
            ('$people_id','$phone','$firstname','$Address','$lastname','$City', '$email','$zip','$customer_status','$Prospect_Status','$tags',now())");

    //echo "INSERT INTO pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,status,referral_id,notes,update_status) VALUES ('".$client_id."','".$first_name."','".$last_name."','".$email."','".$phone."','".$products."','".$insurer."','".$Others."','".$Capitale."','".$effectivedate."','".$status."','".$referral_id."','".$notes."','2')";
        }
    }
header('Location:people.php?f=2');
exit();
ob_flush(); 

?>