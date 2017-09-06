<?php

// Create connection  pia
$con = new mysqli("localhost", "root", "", "pia");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if($con->connect_errno){
		echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}


//functions for project.
function executes($sql){
    //connection to the database
    $con = new mysqli("localhost", "root", "", "pia");
    $result = mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));;
    return $result;
}

function get_record_sql($sql){
    $con = new mysqli("localhost", "root", "", "pia");
    $result = mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $results =(object)$row;
        $data[]=$results;
        return $data;
    }
}

function get_records_sql($sql){
    if(!empty($sql)){
        $con = new mysqli("localhost", "root", "", "pia");
        $result = mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $results =(object)$row;
            $data[]=$results; 
            }
   }
    return $data;
}

function redirect($url,$permanent = false){
    if($permanent){
        header('HTTP/1.1 301 Moved Permanently');
    }else{
        header('Location: '.$url);
        exit();
        }
}
mysqli_close($con);
?> 