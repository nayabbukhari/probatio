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

<!-- MY css -->
<link href="css/child.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Pace -->
<link href="css/pace.css" rel="stylesheet">

<!-- Datepicker -->
<link href="css/datepicker.css" rel="stylesheet"/>

<!-- Timepicker -->
<link href="css/bootstrap-timepicker.css" rel="stylesheet"/>

<!-- Slider -->
<link href="css/slider.css" rel="stylesheet"/>

<!-- Tag input -->
<link href="css/jquery.tagsinput.css" rel="stylesheet"/>

<!-- WYSIHTML5 -->
<link href="css/bootstrap-wysihtml5.css" rel="stylesheet"/>

<!-- Dropzone -->
<link href='css/dropzone/dropzone.css' rel="stylesheet"/>
	
<!-- Chosen -->
<link href="css/chosen/chosen.min.css" rel="stylesheet"/>

<!-- Slider -->
<link href="css/slider.css" rel="stylesheet"/>

<!-- Endless -->
<link href="css/endless.min.css" rel="stylesheet">
<link href="css/endless-skin.css" rel="stylesheet">
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
    </style>
</head>
<script>
function myFunction() {

    var inputVal = document.getElementById("client_id");
    var button = document.getElementById("button");
		if (inputVal.value == "") {
		button.style.backgroundColor = "#38a2c9";
		button.style.border = "solid #38a2c9"; 
		}
		else{
		button.style.backgroundColor = "#3ec291";
		button.style.border = "solid #3ec291"; 
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

<body class="overflow-hidden">
<!-- Overlay Div --> 
<!--___________________________overlay_________________________-->
<?php include("overlay.php"); ?>
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
  
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><i class="fa fa-briefcase"></i> <a href="deals.php"> Deals</a></li>
        <li class="active">Create New Deal</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="">
     <div class="panel panel-default">
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="control_client_records.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"><img style="width: 47px; margin-top: -13px; margin-bottom: -13px;" src="img/Deals.png"  />  CREATE NEW DEAL<span><a href="deals.php">Cancel</a></span></div>
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
          <div class="col-md-2">

</div>
          <div class="col-md-8">
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group one">
                <label class="control-label">Prospect ID</label>
                 <div class="col-md-11" id="right_border" style="padding: 0px ! important;">
        <select onChange="myFunction()" style="width: 90% ! important;" class="form-control chzn-select" data-required="true">
                <option value="">Companies</option>
										<option value="Company 1">Company 1</option>
										<option value="Company 2">Company 2</option>
										<option value="Company 3">Company 3</option>
										<option value="Company 4">Company 4</option>
										
									</select>	</div>
                                                <div class="col-md-1" id="right_border" style="padding: 0px ! important;">
					<a  title="Create new company" class="btn btn-sm pull-right" href="#formModal" data-toggle="modal"  data-placement="top"><i class="fa fa-plus"></i></a>
</div>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6" style="border-right: medium none ! important;">
              <div class="form-group">
								<label class="control-label">Price</label>
									<select class="form-control chzn-select">
										<option>EUR</option>
										<option>USD</option>
										<option>AMG</option>
										<option>INR</option>
										
									</select>
								<!-- /.col -->
							</div><!-- /form-group -->
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
   
  
            <div class="row">
            <div class="col-md-6" id="right_border">
            <div class="form-group">
             <label class="control-label">Effective Date</label>
 <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_auto">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
              </div>           
                
            </div>
            
             </div>
            <!-- /.col -->
            <div class="col-md-6" style="border-right: medium none ! important;">
              <div class="form-group">
                <label class="control-label">Activities Dates</label>
                  <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_auto">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
              </div>
            </div>
<!-- /.row -->
      </div>
            
         
         
         
          <div class="row">
             
            <div class="col-md-6"  >
              <div class="form-group">
       
                   <label class="control-label">Deal Stage</label><br/>
                 <select style="" class="form-control input-sm parsley-validated " data-required="true" name="status">
                <option value="Incoming (5%)">Incoming (5%)</option>
                <option value="Contacted (25%)">Contacted (25%)</option>
                <option value="Quote (50%)">Quote (50%)</option>
                <option value="Evaluating (75%)">Evaluating (75%)</option>
                <option value="Closure (90%)">Closure (90%)</option>
              </select>
              </div>
            </div>
           
            <!-- /.col -->
                      <div class="col-md-6"  id="" style="border-right: medium none ! important;">
                                    <div class="form-group">

                       <label class="control-label">Status</label>
              <select class="form-control input-sm parsley-validated " data-required="true" name="status">
                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
            </div>          
</div>
            <!-- /.col -->
          </div>
          
 <div id="TextBoxesGroup"></div>
          
          <!-- /.col -->
          <div class="claerfix"></div>
                    <div class="row">

          <div class="col-md-12"> 
    
          <label class="control-label">Tag</label>
      <input type="text" class="tag-demo1" value="" id="tags1455191267153" style="display: none;" name="comment">
  <input id="tags1455191267153_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 68px; height:auto; display: none">
        <div class="tags_clear"></div>
        </div>
        </div>
        </div><!--clo md-8-->
        
        
        
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
<!--Modal-->
<div class="modal fade" id="formModal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header" style="text-align: center; color: rgb(51, 51, 51);">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 style="font-weight: 700;">Quick Add a Company</h4>
      				</div>
				    <div class="modal-body">
						<form>
							<div class="form-group">
								<label>Company Name</label>
								<input type="text" class="form-control input-sm" placeholder="Company Name">
							</div><!-- /form-group -->
                            <div class="form-group">
								<label>Phone</label>
                                <div class="input-group">
								<input type="text" class="form-control input-sm" placeholder="Phone">
										<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
									</div>
							</div><!-- /form-group -->
                            <div class="form-group">
								<label>Email</label>
                                  <div class="input-group">
															<input type="text" class="form-control input-sm" placeholder="test@example.com">

										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									</div>
							</div><!-- /form-group -->
                            <div class="form-group">
								<label>Country</label>
							<select class="form-control chzn-select">
										<option>Alabama</option>
										<option>Alaska</option>
										<option>Arizona</option>
										<option>Arkansas</option>
										<option>California</option>
										<option>Colorado</option>
										<option>Connecticut</option>
										<option>Delaware</option>
										<option>District Of Columbia</option>
										<option>Florida</option>
										<option>Georgia</option>
										<option>Hawaii</option>
										<option>Idaho</option>
										<option>Illinois</option>
										<option>Indiana</option>
										<option>Iowa</option>
										<option>Kansas</option>
										<option>Kentucky</option>
										<option>Louisiana</option>
										<option>Maine</option>
										<option>Maryland</option>
										<option>Massachusetts</option>
										<option>Michigan</option>
										<option>Minnesota</option>
										<option>Mississippi</option>
										<option>Missouri</option>
										<option>Montana</option>
										<option>Nebraska</option>
										<option>Nevada</option>
										<option>New Hampshire</option>
										<option>New Jersey</option>
										<option>New Mexico</option>
										<option>New York</option>
										<option>North Carolina</option>
										<option>North Dakota</option>
										<option>Ohio</option>
										<option>Oklahoma</option>
										<option>Oregon</option>
										<option>Pennsylvania</option>
										<option>Rhode Island</option>
										<option>South Carolina</option>
										<option>South Dakota</option>
										<option>Tennessee</option>
										<option>Texas</option>
										<option>Utah</option>
										<option>Vermont</option>
										<option>Virginia</option>
										<option>Washington</option>
										<option>West Virginia</option>
										<option>Wisconsin</option>
										<option>Wyoming</option>
									</select>
								
							</div>
                            
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control input-sm" placeholder="Address">
									</div>
								</div><!-- /.col -->
								<div class="col-md-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" class="form-control input-sm" placeholder="City">
									</div>
								</div><!-- /.col -->
							</div><!-- /.row 
							
							<div class="form-group">
								 <label class="label-checkbox">
								 <input type="checkbox" class="regular-checkbox" />
								 <span class="custom-checkbox"></span>
									 I accept the user agreement.
								</label>
							</div><!-- /form-group -->
						</form>
				    </div>
				    <div class="modal-footer" style="text-align: center;">
				        <button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">CLOSE</button>
						<a href="#" class="btn btn-danger btn-sm">SAVE</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
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
		
    $("#addButton").click(function (){
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html(
	      '<div class="row" id="product' + counter + '"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Product</label><select class="form-control input-sm parsley-validated" data-required="true" name="product[]"><option value="product1">Product1</option><option value="product2">Product2</option><option value="product3">Product3</option><option value="product4">Product4</option><option value="product5">Product5</option></select></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Others</label><input type="text" placeholder="Others" class="form-control input-sm parsley-validated " data-required="true" name="actualpremium"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Capitale</label><input type="text" placeholder="Capitale" class="form-control input-sm parsley-validated " data-required="true" name="offeredpremium"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Effective date</label><div class="input-group"><input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Insurer field</label><select class="form-control input-sm parsley-validated" data-required="true" name="insurer"><option value="Insurer1">Insurer1</option><option value="Insurer2">Insurer2</option><option value="Insurer3">Insurer3</option><option value="Insurer4">Insurer4</option><option value="Insurer5">Insurer5</option></select></div></div></div><div class="row"><div class="col-md-6" style="border-right: medium none ! important;"  id="TextBoxesGroup"><div class="form-group"></div></div><div class="col-md-6"   id=""> <div class="form-group"><label class="control-label">Status</label><select class="form-control input-sm parsley-validated " data-required="true" name="status"><option value="Recall">Recall</option><option value="Premium Gap">Premium Gap</option><option value="Refused">Refused</option><option value="Client">Client</option></select></div></div></div> <br />');
            
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
