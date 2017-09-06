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

    if (file_exists("upload_prospects/" . $_FILES["file"]["name"])){
        echo $_FILES["file"]["name"] . " already exists. ";
        }else{

        $temp = explode(".",$_FILES["file"]["name"]);
        $newfilename = rand(1,89768) . '.' .end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload_prospects/".$newfilename);

        //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        "upload_prospects/".$newfilename;
        echo "upload_prospects/".$newfilename;
        }
    }
}else{
    echo "Invalid file";
}

$inputFileName ="upload_prospects/".$newfilename;
$extension1 = explode(".", $inputFileName);

if ($extension1==".xlsx" || $extension!=".csv" || $extension1==".txt"){
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
    $client_id = trim($allDataInSheet[$i]["A"]);
    $first_name = trim($allDataInSheet[$i]["B"]);
    $last_name = trim($allDataInSheet[$i]["C"]);
    $email = trim($allDataInSheet[$i]["D"]);
    $phone = trim($allDataInSheet[$i]["E"]);
    $products = trim($allDataInSheet[$i]["F"]);
    $insurer = trim($allDataInSheet[$i]["G"]);
    //echo $insurer ;
    $Others = trim($allDataInSheet[$i]["H"]);
    //echo $Others ;

    $Capitale = trim($allDataInSheet[$i]["I"]);
    $effectivedate = trim($allDataInSheet[$i]["J"]);
    $effectivedate = str_replace('/', '-', $effectivedate);
    $effectivedate = date('Y-m-d', strtotime($effectivedate));
							
    $status = trim($allDataInSheet[$i]["K"]);
    $referral_id = trim($allDataInSheet[$i]["L"]);
    $notes = trim($allDataInSheet[$i]["M"]);
    $section = trim($allDataInSheet[$i]["N"]);

    //echo "Message has been sent";

    //$sql1 = mysqli_query($con,"INSERT INTO pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,status,referral_id,notes,section_name,update_status,type,date_time) VALUES ('".$client_id."','".$first_name."','".$last_name."','".$email."','".$phone."','".$products."','".$insurer."','".$Others."','".$Capitale."','".$effectivedate."','".$status."','".$referral_id."','".$notes."','".$section."','2','import',now())");
    executes("INSERT INTO pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,status,referral_id,notes,section_name,update_status,type,date_time) 
            VALUES 
            ('$client_id','$first_name','$last_name','$email','$phone','$products','$insurer','$Others','$Capitale','$effectivedate','$status','$referral_id','$notes','$section','2','import',now())");

    //echo "INSERT INTO pia_leads(clientid,firstname,lastname,email,phone,products,insurer,Others,Capitale,effectivedate,status,referral_id,notes,update_status) VALUES ('".$client_id."','".$first_name."','".$last_name."','".$email."','".$phone."','".$products."','".$insurer."','".$Others."','".$Capitale."','".$effectivedate."','".$status."','".$referral_id."','".$notes."','2')";
    }
}
header('Location:prospects.php?f=2');
exit();
ob_flush(); 

?>


