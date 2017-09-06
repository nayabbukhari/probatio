<?php
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    session_start();   
    include("connection.php");
 }
$user=$_SESSION['user'];
$role=$_SESSION['role'];
$id=$_GET['id'];
if(!isset($user)){
    header("location:index.php");
}

echo    '<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/merge.css" rel="stylesheet">
        <link href="css/probatio.css" rel="stylesheet">
        </head>';
?>
<script>
function myFunction(){
    var inputVal = document.getElementById("client_id");
    var button = document.getElementById("button");
 if (inputVal.value == ""){
        button.style.backgroundColor = "#38a2c9";
        button.style.border = "3px solid #38a2c9"; 
    }
    else{
        button.style.backgroundColor = "#3ec291";
       button.style.border = "3px solid #3ec291"; 
    }

   /* 
   alert("You pressed a key inside the input field");
    var x = document.forms["client_record"]["client_id"].value;
    if (x == null || x == "") {
       // alert("Name must be filled out");
		   document.getElementById("button").style.background = "#38a2c9";
        return false;
    }
   document.getElementById("button").style.background = "#3ec291";
   document.getElementById("button").style.border = "1px solid #3ec291"; 
   */
}
$(document).ready(function(){
var counter = 2;
$("#addButton").click(function () {
if(counter>10){
    alert("Only 10 textboxes allow");
    return false;
	}   
		
var newTextBoxDiv = $(document.createElement('div')) .attr("id", 'TextBoxDiv' + counter);
    newTextBoxDiv.after().html('<div  id="product' + counter + '"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Product</label><select class="form-control input-sm parsley-validated" data-required="true" name="product[]"><option value="product1">Product1</option><option value="product2">Product2</option><option value="product3">Product3</option><option value="product4">Product4</option><option value="product5">Product5</option></select></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Others</label><input type="text" placeholder="Others" class="form-control input-sm parsley-validated " data-required="true" name="Others[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Capitale</label><input type="text" placeholder="Capitale" class="form-control input-sm parsley-validated " data-required="true" name="Capitale[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Effective date</label><div class="input-group"><input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate[]"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Insurer field</label><select class="form-control input-sm parsley-validated" data-required="true" name="insurer[]"><option value="Insurer1">Insurer1</option><option value="Insurer2">Insurer2</option><option value="Insurer3">Insurer3</option><option value="Insurer4">Insurer4</option><option value="Insurer5">Insurer5</option></select></div></div></div><div class="row"><div class="col-md-6" style="border-right: medium none ! important;"  id="TextBoxesGroup"><div class="form-group"></div></div><div class="col-md-6"   id=""> <div class="form-group"><label class="control-label">Status</label><select class="form-control input-sm parsley-validated " data-required="true" name="status[]"><option value="Recall">Recall</option><option value="Premium Gap">Premium Gap</option><option value="Refused">Refused</option><option value="Client">Client</option></select></div></div></div> <br />');
	newTextBoxDiv.appendTo("#TextBoxesGroup");
    counter++;
    });

    $("#removeButton").click(function () {
	if(counter==1){
          alert("No more section to remove");
          return false;
       }   
    counter--;
	
    $("#TextBoxDiv" + counter).remove();
	});	
  });
  
</script>
<?php
echo    '<body class="overflow-hidden">    
        <!--___________________________overlay_________________________-->';
include("overlay.php");
echo    '<div id="wrapper" class="preload">'; 
include("topbar.php");
include("leftsidebar.php");
echo    '<!--___________________________.left sidebar________________________-->
        <br /><br />
        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><img style="width: 20px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; border-radius: 50%;" src="img/Prospects 3.png"/> <a href="leads.php"> Prospects</a></li>
        <li class="active">Edit Prospects</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="">
        <div class="panel panel-default">';

//include("connection.php");
@session_start();
$_SESSION['key'] = md5(mt_rand()); 
$users=get_records_sql("select * from pia_leads where id='$id' order by date_time desc");
foreach($users AS $u){
        //while($row = mysqli_fetch_array($query) ) {
        $phone= $u->phone; 
		$a1=explode(",", $phone);
		$ph=$a1[0];
echo    '<form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="update_prospects.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"><img style="width: 44px; margin-top: -10px; margin-bottom: -10px;"  src="img/Prospects 1.png" /> EDIT PROSPECTS<span>
        <button class="btn btn-success" id="button" type="submit"><i class="fa fa-check fa-lg"></i>SAVE</button>
        <a href="leads.php">Cancel</a></span></div>
        <div class="col-md-6 col-md-offset-3">';
        /* echo date("Y-m-d H:i:s", strtotime("+1 years", strtotime('2013-05-22 10:35:10'))); */  if(isset($_GET['s'])){
if($_GET['s'] == '1'){
echo    '<div class="alert alert-success text-center"><h4><strong><i class="fa  fa fa-check-square-o"></i>
        successfully create record please add a new.</strong></h4> 
        </div>';
}elseif($_GET['s'] == '0'){ 
echo    '<div class="alert alert-success text-center">
        <h4><strong><i class="fa fa-exclamation-circle"></i>
        Unsuccessful please try again.</strong></h4> 
        </div>';
    } 
}

echo    '</div>';
        
echo    '<div class="panel-body">
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">Client ID</label>
        <input type="text" value="'.$u->clientid.'" readonly  id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="clientid">
        <input type="hidden" value="'.$u->id.'" readonly id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="id">
        <input type="hidden" value="'.$_GET['for'].'" readonly id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="page">
        <input value="'.$u->clientid.'" type="hidden" placeholder="Client Email" class="form-control input-sm parsley-validated " data-required="true" name="client_main">
        </div></div>
        <!-- /.col -->
        </div>
        <!-- row-->
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">Referral ID</label>
        <input type="text" value="'.$u->referral_id.'" readonly  placeholder="Referral ID" class="form-control input-sm parsley-validated"  name="referal_id">
        <input type="hidden" value="'.$u->id.'" readonly id="client_id" onKeyPress="myFunction()" placeholder="Referral ID" class="form-control input-sm parsley-validated" data-required="true" name="id">
        </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- row-->
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">First name</label>
        <input type="text" placeholder="First name" value="'.$u->firstname.'" class="form-control input-sm parsley-validated" data-required="true" name="firstname">
        </div>
        </div>
        <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">Last name</label>
        <input value="'.$u->lastname.'" type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true" name="lastname">
        </div>
        </div>
        <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">Email</label>
        <input value="'.$u->email.'" type="email" placeholder="Client Email" class="form-control input-sm parsley-validated " data-required="true" name="email">
        </div>
        </div>
        <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-12" id="right_border">
        <div class="form-group">
        <label class="control-label">Phone</label><br/>
        <div  style="display:inline-flex; width:100%">
        <input value="'.$ph.'" type="text" placeholder="Phone" class="form-control input-sm parsley-validated " data-required="true" name="phone">
        
        <select style="width: 100%;" class="form-control input-sm parsley-validated " data-required="true" name="phone_1">
        <option value="Work">Work</option>
        <option value="Home">Home</option>
        <option value="Cell">Cell</option>
        </select>
        
        <select style="padding: 0px;width: 100%;" class="form-control input-sm parsley-validated "  name="phone_2">
        <option value="">When</option>
        <option value="Morning">Morning</option>
        <option value="Day">Day</option>
        <option value="Evening">Evening</option>
        </select>
        
        </div>
        </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
        </div>';
?>
<script type="text/javascript">  
    //This is done to make the following JavaScript code compatible to XHTML. <![CDATA[ 
	function auto(){ 
	 
	//alert('This is the 2 button.')
	document.getElementById("myText").value = "auto";
	document.getElementById("qustion").value = "auto";
    document.getElementById("btn2").click(); 
    } 
	function auto1() 
    { 
	document.getElementById("myText").value = "auto";
	document.getElementById("qustion").value = "auto";
//	alert('This is the first button.')
    document.getElementById("btn1").click(); 
    } 
	function home() 
    { 
	document.getElementById("myText").value = "home";
	document.getElementById("qustion").value = "home";
	//alert('This is the 2 button.')
    document.getElementById("btn_home1").click(); 
    } 
	function home1() 
    { 
	document.getElementById("myText").value = "home";
	document.getElementById("qustion").value = "home";
//	alert('This is the first button.')
    document.getElementById("btn_home").click(); 
    } 
	
	function note() 
    { 
	document.getElementById("myText").value = "note";
	document.getElementById("qustion").value = "note";
	//alert('This is the 2 button.')
    document.getElementById("btn_note1").click(); 
    } 
	function note1() 
    { 
	document.getElementById("myText").value = "note";
	document.getElementById("qustion").value = "note";
//	alert('This is the first button.')
    document.getElementById("btn_note").click(); 
    } 
//]]>  
    
// <!--------------------------------------------------validation javascript   ------------------------------------------------------>
function calculate(t){
    var rege = /^[0-9]*$/;
	if(rege.test(t.tons.value)){
	}else{
	   alert("Please input only numbers");
	   tons.value='';
    }
    if(rege.test(t.tons1.value)){
    }else{
        alert("Please input only numbers");
        tons1.value='';
		}
    if(rege.test(t.comp.value)){
    }else{
        alert("Please input only numbers");
		comp.value='';
		}
		
    if(rege.test(t.cap.value)){
    }else{
        alert("Please input only numbers");
		cap.value='';
		}
	if(rege.test(t.comp1.value)){
	}else{
		alert("Please input only numbers");
		comp1.value='';
	   }
								
	if(rege.test(t.cap1.value)){
    }else{
		alert("Please input only numbers");
		cap1.value='';
		}
	}
</script>   
<?php         
echo    '<div class="row">
        <input type="hidden" name="main" value="'.$u->section_name.'" id="myText">
        <input type="hidden" name="main1" value="'.$u->section_name.'" id="qustion">
        <div class="col-md-12"> 
        <div class="panel-tab clearfix">
		<ul class="tab-bar">
        <li class="active"><a href="#Auto" onclick="auto()" id="btn1" data-toggle="tab"> <img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Car.png"/> Auto</a></li>
        <li><a href="#Home" data-toggle="tab" onclick="home()" id="btn_home"><i style="font-size: 19px;" class="fa fa-home"></i> Home</a></li>
        <li><a href="#Enterprise" data-toggle="tab" onclick="note()" id="btn_note"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Enterprise.png"/> Enterprise</a></li>
        </ul></div>
        <div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
		<div class="tab-content">
        <div class="tab-pane fade in active" id="Auto">';
$clients=get_record_sql("select * from pia_leads where clientid='$u->clientid' AND section_name='auto' order by date_time desc");
        foreach($clients AS $client){
				//while($row1 = mysqli_fetch_array($query) ) {
				$effectivedate= $client->effectivedate;  
				$effectivedate = str_replace('-', '/', $effectivedate);
				$effectivedate = date('d/m/Y', strtotime($effectivedate)); 
				//echo $effectivedate;
				$Questions= $client->Questions;  
				// echo $Questions;
				$check1 = explode(',',$Questions);
				$products=$client->products; 
				$insurer=$client->insurer ;
				$Others=$client->Others; 
				$Capitale=$client->Capitale; 
				$status=$client->status; 				
				}
							
echo    '<div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Product</label>
        
        <select class="form-control input-sm parsley-validated"  name="product_auto">
        <option value="'.$products.'">'.$products.'</option>
        <option value="VT">VT</option>
        <option value="Moto">Moto</option>
        <option value="VTT">VTT</option>
        <option value="VR">VR</option>
        <option value="Skidoo">Skidoo</option>
        </select>
               
        </div></div>
        <!-- /.col -->
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Comp</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Comp" id="tons" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " value="'.$Others.'"  name="Others_auto">
        </div></div></div>
        <!-- /.col --> 
        </div>
        <!-- row-->
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Effective date</label>
        <div class="input-group">
		<input type="text"class="datepicker form-control input-sm parsley-validated" value="'.$effectivedate.'"  placeholder="DD / MM / YYYY" name="effectivedate_auto">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div></div></div>
        <!-- /.col -->
            
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Capitale</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)" value="'.$Capitale.'" class="form-control input-sm parsley-validated "name="Capitale_auto">
        </div></div></div>
        
        <!-- /.col --> 
        </div>
        
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Status</label>
        <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="'.$status.'"  class="form-control input-sm parsley-validated " name="status_back_auto">

        <select class="form-control input-sm parsley-validated "  name="status_auto">
        <option value="'.$status.'">'.$status.'</option>
        <option value="Recall">Recall</option>
        <option value="Premium Gap">Premium Gap</option>
        <option value="Refused">Refused</option>
        <option value="Client">Client</option>
        </select>
        </div></div>
        <!-- /.col -->
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Insurer field</label>
        
        <select class="form-control input-sm parsley-validated"  name="insurer_auto">
        <option value="'.$insurer.'">'.$insurer.'</option>
        <option value="Groupe_Promutuel">Groupe Promutuel</option>
		<option value="Alpha">Alpha</option>
		<option value="Co-operators">Co-operators</option>
		<option value="Desjardins">Desjardins</option>
		<option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
        <option value="Banque_RBC">Banque RBC</option>
		<option value="Intact">Intact</option>
		<option value="Assurnat-(BNC)">Assurnat (BNC)</option>
		<option value="Belairdirect">Belairdirect</option>
		<option value="Industrielle-Alliance">Industrielle-Alliance</option>
		<option value="La-Capitale">La Capitale</option>
		<option value="La-Personnelle">La Personnelle</option>
		<option value="Pafco">Pafco</option>
		<option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
		<option value="SSQ">SSQ</option>
		<option value="Unique">Unique</option>
		<option value="Wanessa">Wanessa</option>
		</select>
        
        </div></div>
        <!-- /.col --> 
        </div></div>
        
        <div class="tab-pane fade" id="Home">';
 
$clients_home=get_records_sql("select * from pia_leads where clientid='.$u->clientid.' and section_name='home' order by date_time desc");
if(!empty($clients_home)){
    foreach($clients_home AS $ct){
        var_dump($ct);
        //while($row2 = mysqli_fetch_array($query)){
		$effectivedate_home= $ct->effectivedate;  
        $effectivedate_home = str_replace('-', '/', $effectivedate_home);
		$effectivedate_home = date('d/m/Y', strtotime($effectivedate_home)); 
		//echo $effectivedate;
		$Questions_home= $ct->Questions;  
		// echo $Questions;
		$check1_home = explode(',',$Questions_home);
        $products_home=$ct->products; 
		//echo $products_home;
        $insurer_home=$ct->insurer; 
        $Others_home=$ct->Others; 
        $Capitale_home=$ct->Capitale; 
        $status_home=$ct->status; 				
        }
  }else{
      
    $products_home=Null;
    $insurer_home = Null;
    $Others_home= Null;
    $effectivedate_home = Null;
    $Capitale_home = Null;
    $status_home =Null;
    //$check1_home = Null;  
  }

echo    '<div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Product</label>
        
        <select class="form-control input-sm parsley-validated"  name="product_home">
        <option value="'.$products_home.'">'.$products_home.'</option>
        <option value="PO">PO</option>
        <option value="CO">CO</option>
        <option value="LO">LO</option>
        <option value="PNO">PNO</option>
        <option value="RS">RS</option>
        </select>
               
        </div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Comp</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Comp" id="comp" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " value="'.$Others_home.'"  name="Others_home">
        </div></div></div>
        <!-- /.col --> 
        </div>
        <!-- row-->
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Effective date</label>
        <div class="input-group">
		<input type="text" value="'.$effectivedate_home.'" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_home">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div></div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Capitale</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Capitale"  id="cap" onKeyUp="calculate(this.form)"  value="'.$Capitale_home.'" class="form-control input-sm parsley-validated "  name="Capitale_home">
        </div></div></div>
        <!-- /.col --> 
        </div>
        
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Status</label>
        <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="'.$status_home.'"  class="form-control input-sm parsley-validated " name="status_back_home">
        
        <select class="form-control input-sm parsley-validated " name="status_home">
        <option value="'.$status_home.'">'.$status_home.'</option>
        <option value="Recall">Recall</option>
        <option value="Premium Gap">Premium Gap</option>
        <option value="Refused">Refused</option>
        <option value="Client">Client</option>
        </select>
        </div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Insurer field</label>
        <select class="form-control input-sm parsley-validated" name="insurer_home">
        <option value="'.$insurer_home.'">'.$insurer_home.'</option>
        <option value="Groupe_Promutuel">Groupe Promutuel</option>
		<option value="Alpha">Alpha</option>
		<option value="Co-operators">Co-operators</option>
		<option value="Desjardins">Desjardins</option>
		<option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
        <option value="Banque_RBC">Banque RBC</option>
		<option value="Intact">Intact</option>
		<option value="Assurnat-(BNC)">Assurnat (BNC)</option>
		<option value="Belairdirect">Belairdirect</option>
		<option value="Industrielle-Alliance">Industrielle-Alliance</option>
		<option value="La-Capitale">La Capitale</option>
		<option value="La-Personnelle">La Personnelle</option>
		<option value="Pafco">Pafco</option>
		<option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
		<option value="SSQ">SSQ</option>
		<option value="Unique">Unique</option>
		<option value="Wanessa">Wanessa</option>
        </select>
        </div></div>
        <!-- /.col --> 
        </div></div>
                                  
        <div class="tab-pane fade" id="Enterprise">';
        $clients=get_record_sql("select * from pia_leads where clientid='$u->clientid' and section_name='enter' order by date_time desc");
          foreach($clients AS $client){
				//while($row3 = mysqli_fetch_array($query) ) {
				
				$effectivedate_enter= $client->effectivedate;  
				$effectivedate_enter = str_replace('-', '/', $effectivedate_enter);
				$effectivedate_enter = date('d/m/Y', strtotime($effectivedate_enter)); 
				//echo $effectivedate;
				$Questions_enter= $client->Questions; 
				// echo $Questions;
				$check1_enter = explode(',',$Questions_enter);
				$products_enter=$client->products; 
			    //echo $products_home;
				$insurer_enter=$client->insurer; 
				$Others_enter=$client->Others;
				$Capitale_enter=$client->Capitale; 
				$status_enter=$client->status; 				
          }

echo    '<div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Product</label>
        
        <select class="form-control input-sm parsley-validated"  name="product_enter">
        <option value="'.$products_enter.'">'.$products_enter.'</option>
        <option value="CC">CC</option>
        <option value="MB">MB</option>
        <option value="MC">MC</option>
        <option value="MCO">MCO</option>
        <option value="MD">MD</option>
        <option value="MCM">MCM</option>
        <option value="MGA">MGA</option>
        <option value="MG">MG</option>
        <option value="MPF">MPF</option>
        <option value="FPQ4">FPQ4</option>
        <option value="RCOM">RCOM</option>
        <option value="VCOM">VCOM</option>
        </select>
        
        </div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Comp</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Comp"  id="comp1" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " value="'.$Others_enter.'"  name="Others_enter">
        </div></div></div>
        <!-- /.col --> 
        </div>
        <!-- row-->
        
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Effective date</label>
        <div class="input-group">
		<input type="text"  value="'.$effectivedate_enter.'" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_enter">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div></div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Capitale</label>
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" placeholder="Capitale"  id="cap1" onKeyUp="calculate(this.form)"  value="'.$Capitale_enter.'" class="form-control input-sm parsley-validated "  name="Capitale_enter">
        </div></div></div>
        <!-- /.col --> 
        </div>
          
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Status</label>
        <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="'.$status_enter.'"  class="form-control input-sm parsley-validated " name="status_back_enter">
        
        <select class="form-control input-sm parsley-validated "  name="status_enter">
        <option value="'.$status_enter.'">'.$status_enter.'</option>
        <option value="Recall">Recall</option>
        <option value="Premium Gap">Premium Gap</option>
        <option value="Refused">Refused</option>
        <option value="Client">Client</option>
        </select>
        
        </div></div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Insurer field</label>
        <select class="form-control input-sm parsley-validated" name="insurer_enter">
        <option value="'.$insurer_enter.'">'.$insurer_enter.'</option>
        <option value="Groupe_Promutuel">Groupe Promutuel</option>
		<option value="Alpha">Alpha</option>
		<option value="Co-operators">Co-operators</option>
		<option value="Desjardins">Desjardins</option>
		<option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
        <option value="Banque_RBC">Banque RBC</option>
		<option value="Intact">Intact</option>
		<option value="Assurnat-(BNC)">Assurnat (BNC)</option>
		<option value="Belairdirect">Belairdirect</option>
		<option value="Industrielle-Alliance">Industrielle-Alliance</option>
		<option value="La-Capitale">La Capitale</option>
		<option value="La-Personnelle">La Personnelle</option>
		<option value="Pafco">Pafco</option>
		<option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
		<option value="SSQ">SSQ</option>
		<option value="Unique">Unique</option>
		<option value="Wanessa">Wanessa</option>
		</select>
        </div></div>
        <!-- /.col --> 
        </div></div></div></div></div></div>
        <!-- /.col -->
        <!-- /.col -->
        
        <div class="claerfix"></div>
        </div><!--clo md-7-->
        <div class="col-md-6">
        <div class="panel-tab clearfix">
		<ul class="tab-bar">
		<li  class="active"><a href="#profile1" id="btn2" onclick="auto1()" data-toggle="tab"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Car.png"  /> AUTO</a></li>
        <li><a href="#message1" data-toggle="tab" onclick="home1()" id="btn_home1"><i style="font-size: 19px;" class="fa fa-home"></i> HOME</a></li>
        <li ><a  href="#enter"  data-toggle="tab"  onclick="note1()" id="btn_note1"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Enterprise.png"  /> Enterprise</a></li>
        <li ><a  href="#home1"  data-toggle="tab"  ><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Notes.png"  /> NOTES</a></li>
        </ul></div>
        
        <div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
		<div class="tab-content">
        <div class="tab-pane fade" id="home1">
        <textarea name="notes" class="form-control" rows="10">'.$u->notes.'</textarea>
        </div>

        <div class="tab-pane fade in active" id="profile1">
        <div class="input-group" style="margin-top: 11px;">
		<span class="input-group-addon" style="background:rgb(25, 123, 159);">
		<label class="label-checkbox no-padding">';
        
        if (in_array("chkbox1_auto", $check1)){
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox1_auto" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox1_auto">';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width:100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Revoked :</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 36 months, have you had your driver’s license suspended or revoked or are you currently waiting for a judgment following an offence under the hinghway code? is any one of the drivers under the contract in situation? </textarea>
		</div>
        <!-- /.col -->
           
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
        
        if (in_array("chkbox2_auto", $check1)){
echo    '<input type="checkbox" name="chkbox_auto[]" value="chkbox2_auto" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox2_auto" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width:100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record :</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living at your address or driving this (these) vehicule(s), had a criminal record within the past 10 years?</textarea>
		</div>
        <!-- /.col -->
           
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';

        if (in_array("chkbox3_auto", $check1)){
echo    '<input type="checkbox" name="chkbox_auto[]" value="chkbox3_auto" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox3_auto" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="
            background: 
                rgb(25, 123, 159) none repeat 
                scroll 0% 0%;
                width: 100% !important;
                margin-bottom: 0px;
                margin-top: 1px;
                color: rgb(255, 255, 255);
                font-size: 14px;
                
                ">  
                <strong>Declined, cancelled or non-renewed  by a previous carrier(auto) :         
        </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you or any other person driving the vehicle(s),received notice of non-renewal, or had your insurance contract cancelled revoked or declined by another insurer over the past 36 months? </textarea>
		</div>
        
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
 
 if (in_array("chkbox4_auto", $check1)){
echo    '<input type="checkbox" name="chkbox_auto[]" value="chkbox4_auto" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox4_auto" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person driving this vehicles had conditions imposed by another over the past 36 months?       </textarea>
		</div>
            
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
if(in_array("chkbox5_auto", $check1)){
echo    '<input type="checkbox" name="chkbox_auto[]" value="chkbox5_auto" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_auto[]" value="chkbox5_auto" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Auto claims  : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="4" data-required="true" disabled>Over the past 5 years, have you or one of the aforementions drivers been involved in an accident, regardless of who was liable or have any of you had to file claims following theft, vandalism, broken windshields?</textarea>
		</div>
        <!-- /.col -->
		</div>
        
        <div class="tab-pane fade" id="message1">
        <div class="input-group" style="margin-top: 11px;">
		<span class="input-group-addon" style="background:rgb(25, 123, 159);">
		<label class="label-checkbox no-padding">';
if(!empty($check1_home)){
     if (in_array("chkbox1_home", $check1_home)){
 echo   '<input type="checkbox" name="chkbox_home[]" value="chkbox1_home" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_home[]" value="chkbox1_home" >';
        }
}
echo    '<span class="custom-checkbox"></span>
		</label>
		</span>
        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record  :</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
		</div>
        <!-- /.col -->
        
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
if(!empty($check1_home)){
    if (in_array("chkbox2_home", $check1_home)){
echo    '<input type="checkbox" name="chkbox_home[]" value="chkbox2_home" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_home[]" value="chkbox2_home">';
        }
}
echo    '<span class="custom-checkbox"></span>
		</label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop):</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
		</div>
        <!-- /.col -->
           
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
                    
if(!empty($check1_home)){
    if (in_array("chkbox3_home", $check1_home)){
echo    '<input type="checkbox" name="chkbox_home[]" value="chkbox3_home" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_home[]" value="chkbox3_home" >';
        }
}
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions :         
        </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months? </textarea>
		</div>
            
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
if(!empty($check1_home)){
    if (in_array("chkbox4_home", $check1_home)){
echo    '<input type="checkbox" name="chkbox_home[]" value="chkbox4_home" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_home[]" value="chkbox4_home" >';
        }
}
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims  : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims?   </textarea>
		</div>
            
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
                    
if(!empty($check1_home)){
    if (in_array("chkbox5_home", $check1_home)){
echo    '<input type="checkbox" name="chkbox_home[]" value="chkbox5_home" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_home[]" value="chkbox5_home" >';
        }
}
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered. </textarea>
		</div>
        <!-- /.col -->
        </div>
                                    
        <div class="tab-pane fade" id="enter">
        <div class="input-group" style="margin-top: 11px;">
		<span class="input-group-addon" style="background:rgb(25, 123, 159);">
		<label class="label-checkbox no-padding">';
if (in_array("chkbox1_enter", $check1_enter)){
echo    '<input type="checkbox" name="chkbox_enter[]" value="chkbox1_enter" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_enter[]" value="chkbox1_enter" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record  :</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
		</div>
        <!-- /.col -->
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
if (in_array("chkbox2_enter", $check1_enter)){
echo    '<input type="checkbox" name="chkbox_enter[]" value="chkbox2_enter" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_enter[]" value="chkbox2_enter" >';
        }
echo    '<span class="custom-checkbox"></span>
		</label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop):</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
		</div>
        <!-- /.col -->
           
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';

if (in_array("chkbox3_enter", $check1_enter)){
echo    '<input type="checkbox" name="chkbox_enter[]" value="chkbox3_enter" checked>';
    }else{
echo    '<input  type="checkbox" name="chkbox_enter[]" value="chkbox3_enter" >';
    }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;"><strong>Conditions :</strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months? </textarea>
		</div>
            
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
if (in_array("chkbox4_enter", $check1_enter)){
echo    '<input type="checkbox" name="chkbox_enter[]" value="chkbox4_enter" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_enter[]" value="chkbox4_enter" >';
        }
echo    '<span class="custom-checkbox"></span>
        </label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims  : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims?   </textarea>
		</div>
        
        <div class="input-group">
		<span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
		<label class="label-checkbox no-padding">';
                    
if (in_array("chkbox5_enter", $check1_enter)){
echo    '<input type="checkbox" name="chkbox_enter[]" value="chkbox5_enter" checked>';
        }else{
echo    '<input  type="checkbox" name="chkbox_enter[]" value="chkbox5_enter" >';
        }
echo    '<span class="custom-checkbox"></span>
		</label>
		</span>
	    <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage : </strong></p>
        <textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered. </textarea>
		</div>
        <!-- /.col -->
        </div></div></div></div>
        <!-- /panel -->
        </div><!--clo md-5-->
        </div>
        
        <div class="row">
        <div class="panel-footer text-center">
        <!--<button class="btn btn-success" type="reset">Clear</button> -->
        </div>
        </div>
        </form>';
}
echo    '</div>
        <!-- /panel --> 
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!-- Footer================================================== --> 
        <!--____________________footer___________________________-->';

include("footer.php");
echo    '<!--____________________footer___________________________--> 
        <!--Modal-->
        <div class="modal fade" id="newFolder">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Create new folder</h4>
        </div>
        
        <div class="modal-body">
        <form>
        
        <div class="form-group">
        <label for="folderName">Folder Name</label>
        <input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
        </div>
        </form>
        </div>
        
        <div class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        <a href="#" class="btn btn-danger btn-sm">Save changes</a> </div>
        </div>
        <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal -->
        </div>
        <!-- /wrapper --> 
        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 
        
        <!-- Logout confirmation -->
        <!-- Le javascript ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <!-- Jquery --> 
        <script src="js/jquery-1.10.2.min.js"></script> 
        <!-- Bootstrap --> 
        <script src="bootstrap/js/bootstrap.min.js"></script> 

        <!-- Parsley --> 
        <script src="js/parsley.min.js"></script> 

        <!-- Slimscroll --> 
        <script src="js/jquery.slimscroll.min.js"></script> 
        <!-- Datepicker --> 
        <script src="js/bootstrap-datepicker.min.js"></script> 
        
        <!-- Timepicker --> 
        <script src="js/bootstrap-timepicker.min.js"></script> 

        <!-- Tag input --> 
        <script src="js/jquery.tagsinput.min.js"></script> 

        <!-- WYSIHTML5 --> 
        <script src="js/wysihtml5-0.3.0.min.js"></script> 
        <script src="js/uncompressed/bootstrap-wysihtml5.js"></script> 

        <!-- Chosen -->
        <script src="js/chosen.jquery.min.js"></script>	

        <!-- Mask-input -->
        <script src="js/jquery.maskedinput.min.js"></script>	

        <!-- Slider -->
        <script src="js/bootstrap-slider.min.js"></script>	

        <!-- Dropzone -->
        <script src="js/dropzone.min.js"></script>	

        <!-- Modernizr -->
        <script src="js/modernizr.min.js"></script>

        <!-- Pace -->
        <script src="js/pace.min.js"></script>

        <!-- Popup Overlay -->
        <script src="js/jquery.popupoverlay.min.js"></script>

        <!-- Slimscroll -->
        <script src="js/jquery.slimscroll.min.js"></script>

        <!-- Cookie -->
        <script src="js/jquery.cookie.min.js"></script>

        <!-- Endless -->
        <script src="js/endless/endless_form.js"></script>
        <script src="js/endless/endless.js"></script>
        <script type="text/javascript">';
?>

<?php
echo    '</script>
        </body>
        </html>';
?>