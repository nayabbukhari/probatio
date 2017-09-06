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
    $user_name =  $_POST['user_name'] ;
    $email = $_POST['email'] ;
    $role =  $_POST['role'];
    $pass = md5($_POST['pass']) ;
    $c_pass =  $_POST['c_pass'] ;
        
}else{
    header("location:index.php");
}
/**
$clients=get_records_sql("SELECT max(clientid) as max_id FROM  pia_client_id ");
        //echo "SELECT max(clientid) as max_id FROM  pia_client_id ";
foreach($clients as $clnt)
		$maxid = $row["max_id"]+1;
		$agent_id="agent000".$maxid;
        //   echo $maxid;
        // echo "hi";
**/
$agent = executes("insert into pia_client_id (email, date_time) values('$email', NOW())");
$agent_id = get_record_sql("SELECT max(id) as id FROM  pia_client_id");
$agent_id=$agent_id[0]->id;
$query = executes("insert into pia_login(username, password, email, agent_id, role, status,date_time) 
          values('$user_name', 
                '$pass',
                '$email',
                '$agent_id',
                '$role',
                'active',
                NOW())"
                );
if (!$query) {
	header("Location:user_management.php?s=0");
  }else{
	header("Location:user_management.php?s=1");
}

ob_flush();
?>