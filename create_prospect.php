<?php
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:16:52 GMT -->
<head>
<meta charset="utf-8">
<title>Probatio Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/merge.css" rel="stylesheet">
<style>
.col-md-6 {
    border-right: #D4D4D4 solid 1px
	}
	.panel-heading
	{
	color: rgb(255, 255, 255) !important;
font-size: 18px;
font-weight: 700;
text-align: center;
background: rgb(26, 51, 71) none repeat scroll 0% 0% !important;
margin-left: -1px;
margin-right: -1px;
height: 47px;
border-radius: 0px;
	}
	.panel-heading a {
    float: right;
    color: rgb(255, 255, 255) !important;
    font-size: 15px;
}
.panel-heading a:hover {
    float: right;
    color: rgb(74, 160, 207) !important;
    font-size: 15px;
}
#button {
    padding-right: 35px;
    border-radius: 0px;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 35px;
    background: #38a2c9;
    border: #38a2c9 solid;
	font-weight: 700;
}
#upload-demo1 {
    background: #38a2c9;
    float: right;
    width: 100%;
    color: #fff !important;
    border-radius: 4px;
    cursor: pointer;
}
#upload-demo2 {
    background: #38a2c9;
    float: right;
    width: 100%;
    color: #fff !important;
    border-radius: 4px;
    cursor: pointer;
}
    </style>
</head>
<script>
function myFunction() {

    var inputVal = document.getElementById("name");
    var button = document.getElementById("button");
 if (inputVal.value == "") {
        button.style.backgroundColor = "#38a2c9";
        button.style.border = "1px solid #38a2c9"; 

    }
    else{
        button.style.backgroundColor = "#3ec291";
       button.style.border = "1px solid #3ec291"; 

    }

   /* alert("You pressed a key inside the input field");
    var x = document.forms["client_record"]["client_id"].value;
    if (x == null || x == "") {
       // alert("Name must be filled out");
		   document.getElementById("button").style.background = "#38a2c9";

        return false;
    }
   document.getElementById("button").style.background = "#3ec291";
   document.getElementById("button").style.border = "1px solid #3ec291"; */
}
</script>
<style>
.tab-bar > li {
    display: inline-block;
    float: left;
    margin-bottom: -1px;
    border: 1px solid rgb(191, 191, 191);
    margin-right: 8px;
    border-bottom: none;
	border-radius: 2px;

}
.tab-bar > li a {
color: #EDEDED !important;
font-size: 15px;
font-weight: 700;
padding-left: 13px;
padding-right: 13px;
background: #274359;
}

.tab-bar > li.active a {
    background: #fff;
    color: #777 !important;
}
.tab-bar > li.active a {
    background: #38a2c9 !important;
    color: #FFF !important;
}
.upload-file label
{
background: #38a2c9;
    cursor: pointer !important;
}
.upload-file label span {
color: #fff !important;
}
@media only screen and (min-width: 1100px) {
#newpost {
    display: block;
    padding-left: 0px;
    margin-left: -91px;
    width: 49%;
}
}
</style>

<body class="overflow-hidden">
<!-- Overlay Div --> 
<!--___________________________overlay_________________________-->
<?php //include("overlay.php"); ?>
<!--___________________________.overlay________________________--> 

<!-- /theme-setting -->

<div id="wrapper" class="preload"> 
  <!--___________________________topbar_________________________-->
  <?php include("topbar.php"); ?>
  <!--___________________________.topbar________________________--> 
  
  <!-- /top-nav--> 
  
  <!--___________________________left sidebar_________________________-->
  <?php include("leftsidebar.php"); ?>
  <!--___________________________.left sidebar________________________-->
  <script>
     function showhide()
     {
	//alert("jii");
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
	 
	
  </script>
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><img style="width: 20px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; border-radius: 50%;" src="img/Prospects 3.png"  /> <a href="leads.php"> Prospects</a></li>
        <li class="active">Create New Prospects</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="">
     <div class="panel panel-default">
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="get_prospects.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"><img style="width: 44px; margin-top: -10px; margin-bottom: -10px;" src="img/Prospects 1.png"  /> CREATE NEW PROSPECTS<span><a href="leads.php">Cancel</a></span></div>
        <div class="col-md-6 col-md-offset-3">
        <?php if(isset($_GET['s'])){

        if($_GET['s'] == '1'){ ?>
          <div class="alert alert-success text-center">
          <h4><strong><i class="fa  fa fa-check-square-o"></i>
successfully create record please add a new.</strong></h4> 
          </div>
       <?php } elseif ($_GET['s'] == '0') { ?>
        <div class="alert alert-success text-center">
          <h4><strong><i class="fa fa-exclamation-circle"></i>
Unsuccessful please try again.</strong></h4> 
 </div>
      <?php } }  ?>


</div>
        <div class="panel-body">
          <div class="col-md-6">
          
           <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                 <?php 
				 include("connection.php");
				$query = mysqli_query($con,"SELECT max(clientid) as max_id FROM  pia_client_id ") ;
               //echo "SELECT max(clientid) as max_id FROM  pia_client_id ";

				$row = mysqli_fetch_array($query);
				//echo $row["max_id"];
				$maxid = $row["max_id"]+1;
             //   echo $maxid;
               // echo "hi";
				?>
                <label class="control-label">Client ID</label>
<input type="text" id="client_id"  placeholder="Client ID"  value="<?php echo(rand(10,999999));?>" class="form-control input-sm parsley-validated" data-required="true" name="clientid">


              </div>
            </div>
            <!-- /.col 
                        <div class="col-md-3" id="right_border">

            <div class="form-group">
								
                <label class="control-label">Referral ID</label><br/>
               
										<input type="checkbox" onClick="showhide()" name="referral" id="referral">
                                       
										<span class="custom-checkbox"></span>
								
							</div><!-- /form-group
                            
                            
                            </div>-->
                            
                            <div class="col-md-4" id="newpost" style="display:none;">
                            
                            <div class="form-group">
                            
                            <label class="control-label">&nbsp;</label><br/>
 <select style="" class="form-control input-sm parsley-validated "  name="referral_id">
                   <option value="">Agent ID</option>

               <?php
				$query = mysqli_query($con,"select * from pia_login where role='AGENTS'") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 	
                  <option value="<?php echo $row['agent_id']; ?>"><?php echo $row['agent_id']; ?></option>
               <?php
										 }
										?>
              </select>                            <span class="custom-checkbox"></span>
                            
                            </div><!-- /form-group -->
                            
                            
                            </div>
                            
                            
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">First name</label>
                <input type="text" onKeyPress="myFunction()" id="name" placeholder="First name" class="form-control input-sm parsley-validated" data-required="true" name="firstname">
              </div>
            </div>
            <!-- /.col -->
           
          </div>
          
          
          
          <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">Last name</label>
                <input type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true" name="lastname">
              </div>
            </div>
            <!-- /.col -->
            
         
          </div>
          
          <div class="row">
            
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                  <label class="control-label">Email</label>
                <input type="email" placeholder="Client Email" class="form-control input-sm parsley-validated " data-required="true" name="email">
              </div>
            </div>
            <!-- /.col -->
            
           
         </div>
         
            <div class="row">
            <div class="col-md-12" id="right_border">
            <div class="form-group">
                    <label class="control-label">Phone</label><br/>
                <div  style="display:inline-flex;width: 100% ! important;">
                <input type="text" placeholder="Phone"  class="form-control input-sm parsley-validated " data-required="true" name="phone">
                 <select style="width: 35%;" class="form-control input-sm parsley-validated " data-required="true" name="phone_1">
                <option value="Work">Work</option>
                <option value="Home">Home</option>
                <option value="Cell">Cell</option>
              </select>
               <select style="padding: 0px;width: 35%;" class="form-control input-sm parsley-validated "  name="phone_2">
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
      </div>
            
         <script type="text/javascript">  
    //This is done to make the following JavaScript code compatible to XHTML. <![CDATA[ 
  
	function auto() 
    { 
	
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
	
	
	
	
	    </script>    
        
        <!--------------------------------------------------validation javascript   ------------------------------------------------------>
       <script type="text/javascript">
function calculate(t){
								
								var rege = /^[0-9]*$/;
								if ( rege.test(t.tons.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								tons.value='';
								}
								
								if ( rege.test(t.tons1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								tons1.value='';
								}
								
								
								if ( rege.test(t.comp.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								comp.value='';
								}
								
								if ( rege.test(t.cap.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								cap.value='';
								}
								if ( rege.test(t.comp1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								comp1.value='';
								}
								
								if ( rege.test(t.cap1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								cap1.value='';
								}
								
            }
			</script>   
         
<div class="row">
<input type="hidden" name="main" value="auto" id="myText">
<input type="hidden" name="main1" value="auto" id="qustion">
          <div class="col-md-12"> 
          <div class="panel-tab clearfix">
								<ul class="tab-bar">
									<li class="active"><a href="#Auto" onclick='auto()' id="btn1" data-toggle="tab"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Car.png"  />  Auto</a></li>
									<li><a href="#Home" data-toggle="tab" onclick='home()' id="btn_home"><i style="font-size: 19px;" class="fa fa-home"></i>  Home</a></li>
									<li><a href="#Enterprise" data-toggle="tab" onclick='note()' id="btn_note"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Enterprise.png"  />  Enterprise</a></li>
								</ul>
							</div>
							<div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="Auto">
										
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated" data-required="true"  name="product_auto">
                  <option value="">Select</option>
                  <option value="VT">VT</option>
                  <option value="Moto">Moto</option>
                  <option value="VTT">VTT</option>
                  <option value="VR">VR</option>
                  <option value="Skidoo">Skidoo</option>
                </select>
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                        <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                        <input type="text" placeholder="Comp" id="tons" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated "  name="Others_auto">
                        </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="" data-required="true" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_auto">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " name="Capitale_auto">
              </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
              <select data-required="true" class="form-control input-sm parsley-validated "  name="status_auto">
                                <option value="">Select</option>
                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated"  name="insurer_auto">
                                    <option value="">Select</option>

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
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
         
                     
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
    <label class="control-label">Add Doc</label><br/>
									<div class="upload-file">
										<input type="file" id="upload-demo" name="file" class="upload-demo">
										<label data-title="Select file" for="upload-demo">
											<span data-title="No file selected..."></span>
										</label>
									</div>              </div>
            </div>
            <!-- /.col --> 
          </div>
                           
									</div>
									<div class="tab-pane fade" id="Home">
									
                                    
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated"  name="product_home">
                                  <option value="">Select</option>
                  <option value="PO">PO</option>
                  <option value="CO">CO</option>
                  <option value="LO">LO</option>
                  <option value="PNO">PNO</option>
                  <option value="RS">RS</option>
                </select>
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Comp" id="comp" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " name="Others_home">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_home">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale" id="cap" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated "  name="Capitale_home">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
              <select class="form-control input-sm parsley-validated " name="status_home">
                                <option value="">Select</option>

                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated" name="insurer_home">
                                    <option value="">Select</option>

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
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
                                    
                                           
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
    <label class="control-label">Add Doc</label><br/>
									<div class="upload-file1">
										<input type="file" id="upload-demo1" name="file1"  class="upload-demo1">
										<label data-title="Select file" for="upload-demo">
											<span data-title="No file selected..."></span>
										</label>
									</div>              </div>
            </div>
            <!-- /.col --> 
          </div>
                        
									</div>
									<div class="tab-pane fade" id="Enterprise">
										
                                        
                                        
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated"  name="product_enter">
                                  <option value="">Select</option>

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
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input onKeyPress="" type="text" placeholder="Comp" id="comp1" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated "  name="Others_enter">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_enter">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale" id="cap1" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated "  name="Capitale_enter">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
              <select class="form-control input-sm parsley-validated "  name="status_enter">
                                <option value="">Select</option>

                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated" name="insurer_enter">
                                    <option value="">Select</option>

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
              </div>
            </div>
            <!-- /.col --> 
          </div>
                        
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
    <label class="control-label">Add Doc</label><br/>
									<div class="upload-file2">
										<input type="file" id="upload-demo2" name="file2"  class="upload-demo2">
										<label data-title="Select file" for="upload-demo">
											<span data-title="No file selected..."></span>
										</label>
									</div>              </div>
            </div>
            <!-- /.col --> 
          </div>
                 
                                        
									</div>
								</div>
							</div>
          </div>
          </div>
          <!-- /.col -->
          <div class="claerfix"></div>
                    
        </div><!--clo md-8-->
        <div class="col-md-6">
       
       <div class="panel-tab clearfix">
								<ul class="tab-bar">
									<li class="active"><a href="#profile1" id="btn2" onclick='auto1()' data-toggle="tab"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Car.png"  /> AUTO</a></li>
									<li><a href="#message1" data-toggle="tab" onclick='home1()' id="btn_home1"><i style="font-size: 19px;" class="fa fa-home"></i> HOME</a></li>
                                    <li ><a  href="#enter"  data-toggle="tab"  onclick='note1()' id="btn_note1"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Enterprise.png"  /> Enterprise</a></li>
									<li ><a  href="#home1"  data-toggle="tab" ><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="img/New Icons/Notes.png"  /> NOTES</a></li>

								</ul>
							</div>
							<div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
								<div class="tab-content">
									<div class="tab-pane fade in" id="home1">
									<textarea name="notes" class="form-control" rows="10">Write a Note.....</textarea>
									</div>
									<div class="tab-pane fade in active" id="profile1">
										 <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox1_auto">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Revoked :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 36 months, have you had your driver’s license suspended or revoked or are you currently waiting for a judgment following an offence under the hinghway code? is any one of the drivers under the contract in situation? </textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox2_auto" >
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living at your address or driving this (these) vehicule(s), had a criminal record within the past 10 years?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox3_auto"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed  by a previous carrier(auto) :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you or any other person driving the vehicle(s),received notice of non-renewal, or had your insurance contract cancelled revoked or declined by another insurer over the past 36 months? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox4_auto"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person driving this vehicles had conditions imposed by another over the past 36 months?       </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox5_auto"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Auto claims : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="4" data-required="true" disabled>Over the past 5 years, have you or one of the aforementions drivers been involved in an accident, regardless of who was liable or have any of you had to file claims following theft, vandalism, broken windshields?
</textarea>
			</div>
            
            
            
            
           <!-- /.col -->
									</div>
									<div class="tab-pane fade" id="message1">
										 <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_home[]" value="chkbox1_home">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled> Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_home[]" value="chkbox2_home" value="Question two here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop) :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_home[]" value="chkbox3_home"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions   :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months?</textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_home[]" value="chkbox4_home"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_home[]" value="chkbox5_home">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage  : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered.
</textarea>
			</div>
            
            
            
            
           <!-- /.col -->
            
            
            
									</div>
                                    
                                    	<div class="tab-pane fade" id="enter">
										 <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox1_enter">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled> Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox2_enter" value="Question two here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop) :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox3_enter"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions   :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months?</textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox4_enter"  value="Question three here ......">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox5_enter">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage  : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered.
</textarea>
			</div>
            
            
            
									</div>
                                    
								</div>
							</div>
						</div><!-- /panel -->
        
        </div><!--clo md-5-->
        
        
        </div>
          <div class="row">
        <div class="panel-footer text-center">
          <button class="btn btn-success" id="button" type="submit"><i class="fa fa-check fa-lg"></i>   SAVE</button>
<!--          <button class="btn btn-success" type="reset">Clear</button> -->
        </div>
        </div>
      </form>
    </div>
    <!-- /panel --> 
  </div>
  <!-- /.padding-md --> 
</div>
<!-- /main-container --> 
<!-- Footer
        ================================================== --> 
<!--____________________footer___________________________-->
<?php include("footer.php"); ?>
<!--____________________footer___________________________--> 

</div>
<!-- /wrapper --> 

<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 

<!-- Logout confirmation -->


<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- Jquery --> 
<script src="js/jquery-1.10.2.min.js"></script> 

<!-- Bootstrap --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 

<!-- Parsley --> 
<script src="js/parsley.min.js"></script> 

<!-- Slimscroll --> 
<script src='js/jquery.slimscroll.min.js'></script> 


<!-- Datepicker --> 
<script src='js/bootstrap-datepicker.min.js'></script> 

<!-- Timepicker --> 
<script src='js/bootstrap-timepicker.min.js'></script> 

<!-- Tag input --> 
<script src='js/jquery.tagsinput.min.js'></script> 

<!-- WYSIHTML5 --> 
<script src='js/wysihtml5-0.3.0.min.js'></script> 
<script src='js/uncompressed/bootstrap-wysihtml5.js'></script> 

    
<!-- Chosen -->
<script src='js/chosen.jquery.min.js'></script>	

<!-- Mask-input -->
<script src='js/jquery.maskedinput.min.js'></script>	

<!-- Slider -->
<script src='js/bootstrap-slider.min.js'></script>	


<!-- Dropzone -->
<script src='js/dropzone.min.js'></script>	

<!-- Modernizr -->
<script src='js/modernizr.min.js'></script>

<!-- Pace -->
<script src='js/pace.min.js'></script>

<!-- Popup Overlay -->
<script src='js/jquery.popupoverlay.min.js'></script>

<!-- Slimscroll -->
<script src='js/jquery.slimscroll.min.js'></script>

<!-- Cookie -->
<script src='js/jquery.cookie.min.js'></script>

<!-- Endless -->
<script src="js/endless/endless_form.js"></script>
<script src="js/endless/endless.js"></script>


<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html(
	      '<div class="row" id="product' + counter + '"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Product</label><select class="form-control input-sm parsley-validated" data-required="true" name="product[]"><option value="product1">Product1</option><option value="product2">Product2</option><option value="product3">Product3</option><option value="product4">Product4</option><option value="product5">Product5</option></select></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Others</label><input type="text" placeholder="Others" class="form-control input-sm parsley-validated " data-required="true" name="Others[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Capitale</label><input type="text" placeholder="Capitale" class="form-control input-sm parsley-validated " data-required="true" name="Capitale[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Effective date</label><div class="input-group"><input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate[]"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Insurer field</label><select class="form-control input-sm parsley-validated" data-required="true" name="insurer[]"><option value="Insurer1">Insurer1</option><option value="Insurer2">Insurer2</option><option value="Insurer3">Insurer3</option><option value="Insurer4">Insurer4</option><option value="Insurer5">Insurer5</option></select></div></div></div><div class="row"><div class="col-md-6" style="border-right: medium none ! important;"  id="TextBoxesGroup"><div class="form-group"></div></div><div class="col-md-6"   id=""> <div class="form-group"><label class="control-label">Status</label><select class="form-control input-sm parsley-validated " data-required="true" name="status[]"><option value="Recall">Recall</option><option value="Premium Gap">Premium Gap</option><option value="Refused">Refused</option><option value="Client">Client</option></select></div></div></div> <br />');
            
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


</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>
