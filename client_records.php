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


</head>

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
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Client record</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="">
     <div class="panel panel-default">
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="control_client_records.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"> Client record</div>
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
          <div class="col-md-8">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Client id</label>
                <input type="text" placeholder="Client id" class="form-control input-sm parsley-validated " data-required="true" name="clientid">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-4" id="TextBoxesGroup">
              <div class="form-group">
                <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated" data-required="true" name="product[]">
                  <option value="product1">Product1</option>
                  <option value="product2">Product2</option>
                  <option value="product3">Product3</option>
                  <option value="product4">Product4</option>
                  <option value="product5">Product5</option>
                </select>
              </div>
            </div>
            <div class="col-md-2" style="margin-top: 20px; padding-left:25px;">
           <button class="btn btn-sm btn-info" type="button" id="addButton"><i class="fa fa-plus fa-lg"></i></button>&nbsp;&nbsp;&nbsp;
              <button class="btn btn-sm btn-danger" type="button" id="removeButton"><i class="fa fa-minus fa-lg"></i></button>
           </div><!--col md-2--> 
            
            <!-- /.col -->
         </div>
         
            <div class="row">
            <div class="col-md-6"> </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated" data-required="true" name="insurer">
				   <option value="Insurer1">Insurer1</option>
				   <option value="Insurer2">Insurer2</option>
				   <option value="Insurer3">Insurer3</option>
				   <option value="Insurer4">Insurer4</option>
				   <option value="Insurer5">Insurer5</option>
				</select>
              </div>
            </div>
<!-- /.row -->
      </div>
            
         
         
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">First name</label>
                <input type="text" placeholder="First name" class="form-control input-sm parsley-validated" data-required="true" name="firstname">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Actual premium</label>
                <input type="text" placeholder="Actual premium" class="form-control input-sm parsley-validated " data-required="true" name="actualpremium">
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Last name</label>
                <input type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true" name="lastname">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Offered premium</label>
                <input type="text" placeholder="Offered premium" class="form-control input-sm parsley-validated " data-required="true" name="offeredpremium">
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" placeholder="Client Id" class="form-control input-sm parsley-validated " data-required="true" name="email">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          
          
           <div class="row">
          <div class="col-md-6"> </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Status</label>
              <select class="form-control input-sm parsley-validated " data-required="true" name="status">
                <option value="status1">Status1</option>
                <option value="status2">Status2</option>
                <option value="status3">Status3</option>
                <option value="status4">Status4</option>
                <option value="status5">Status5</option>
              </select>
            </div>
          </div>
         </div>

          <!-- /.col -->
          <div class="claerfix"></div>
          <div class="col-md-12"> 
    
          <label class="control-label">Comment</label>
      <input type="text" class="tag-demo1" value="" id="tags1455191267153" style="display: none;" name="comment">
  <input id="tags1455191267153_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 68px; height:auto; display: none">
        <div class="tags_clear"></div>
        </div>
        </div><!--clo md-8-->
        <div class="col-md-4">
       
       <div class="seperator"></div>
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox[]" value="chkbox1">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Question one here ......</textarea>
			</div>
           <!-- /.col -->
           
             <div class="seperator"></div>
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox[]" value="chkbox2">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Question two here ......</textarea>
			</div>
           <!-- /.col -->
           
             <div class="seperator"></div>
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox[]" value="chkbox3">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Question three here ......</textarea>
			</div>
           <!-- /.col -->
        
        </div><!--clo md-4-->
        
        
        </div>
        <div class="panel-footer text-right">
          <button class="btn btn-success" type="submit">Send</button>
          <button class="btn btn-success" type="reset">Clear</button>
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
	      '<select name="product[]" id="product' + counter + '" class="form-control input-sm"><option value="product1">product 1</option><option value="product2">product 2</option><option value="product3">product 3</option><option value="product4">product 4</option></select> <br />');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
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
