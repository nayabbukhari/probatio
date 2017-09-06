<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:16:52 GMT -->
<head>
<meta charset="utf-8">
<title>Endless Admin</title>
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
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li class="active">Client record</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="col-md-12">
     <div class="panel panel-default">
      <form class="no-margin" id="formValidate2" data-validate="parsley" novalidate>
        <div class="panel-heading"> Client record</div>
        <div class="panel-body">
          
          <div class="row">
            
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Client id</label>
                <input type="text" placeholder="Client id" class="form-control input-sm parsley-validated " data-required="true">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-3" id="TextBoxesGroup">
              <div class="form-group">
                <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated" data-required="true">
                  <option>Product1</option>
                  <option>Product2</option>
                  <option>Product3</option>
                  <option>Product4</option>
                  <option>Product5</option>
                </select>
              </div>
              <button class="btn btn-sm btn-info" type="button" id="addButton"><i class="fa fa-plus fa-lg"></i></button> &nbsp;
              <button class="btn btn-sm btn-danger" type="button" id="removeButton"><i class="fa fa-minus fa-lg"></i></button>
              <br /><br />

            </div>


            <!-- /.col -->
            <div class="col-md-6">
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox1">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Qusetion one here ......</textarea>
			</div>
           </div>
           <!-- /.col -->
         </div>
         
         
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">First name</label>
                <input type="text" placeholder="First name" class="form-control input-sm parsley-validated" data-required="true">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Actual premium</label>
                <input type="text" placeholder="Actual premium" class="form-control input-sm parsley-validated " data-required="true">
              </div>
            </div>
            <!-- /.col --> 
          <div class="seperator"></div>
           <div class="col-md-6">
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox1">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Question two here ......</textarea>
			</div>
           </div>
           <!-- /.col -->
          </div>
          
          
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Last name</label>
                <input type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Offered premium</label>
                <input type="text" placeholder="Offered premium" class="form-control input-sm parsley-validated " data-required="true">
              </div>
            </div>
            <!-- /.col --> 
         <div class="seperator"></div>  
         <div class="col-md-6">
            <div class="input-group">
			   <span class="input-group-addon">
			      <label class="label-checkbox no-padding">
			           <input type="checkbox" name="chkbox1">
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	       <textarea class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled> Question three here ....</textarea>
			</div>
           </div>
           <!-- /.col -->
          </div>
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" placeholder="Client Id" class="form-control input-sm parsley-validated " data-required="true">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              <div class="form-group">
              <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>
              </div>
            </div>
            <!-- /.col -->
             <div class="col-md-6"></div>
          </div>
          
          
          <div class="col-md-3"> </div>
          <!-- /.col -->
          
          <div class="col-md-3">
            <div class="form-group">
              <label class="control-label">Status</label>
              <select class="form-control input-sm parsley-validated " data-required="true">
                <option>Status1</option>
                <option>Status2</option>
                <option>Status3</option>
                <option>Status4</option>
                <option>Status5</option>
              </select>
            </div>
          </div>
       <div class="col-md-6"> </div>

          <!-- /.col -->
          <div class="claerfix"></div>
          <div class="col-md-12"> 
    
          <label class="control-label">Comment</label>
      <input type="text" class="tag-demo1" value="foo,bar,baz" id="tags1455191267153" style="display: none;">
  <input id="tags1455191267153_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 68px; height:auto; display: none">
        <div class="tags_clear"></div>
        </div>
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
<div class="custom-popup width-100" id="logoutConfirm">
  <div class="padding-md">
    <h4 class="m-top-none"> Do you want to logout?</h4>
  </div>
  <div class="text-center"> <a class="btn btn-success m-right-sm" href="index.php">Logout</a> <a class="btn btn-danger logoutConfirm_close">Cancel</a> </div>
</div>

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
	      '<select name="textbox' + counter + 
	      '" id="textbox' + counter + '" class="form-control input-sm"><option>product 1</option><option>product 2</option><option>product 3</option><option>product 4</option></select> <br />');
            
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
