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


$files=get_records_sql("select * from pia_files order by date_time desc"); 
$i=0;
foreach($files AS $fl){
        $i++;      
//while($row = mysqli_fetch_array($query)){
        $file=$fl->file_name;
		$temp = explode(".",$file);
        //echo $temp[0];

echo    '<tr>
        <td>'.$i.'</td>
        <td><a href="#view'.$fl->id.'" data-toggle="modal" ><span style="font-size: 16px ! important; font-weight: 700;">
            <img src="img/Add doc Icon.jpg" >'.$temp[0].'</span></a><br/>'.$temp[1].'</td>
        <td>'.$fl->Modifier.'</td>
        <td>'.$fl->date_time.'</td>
        <td><a href="#delete'.$fl->id.'" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a></td>
        </tr>';       
}
?>
								
						