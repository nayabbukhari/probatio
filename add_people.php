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
echo    '<head>
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
        <link href="css/probatio.css" rel="stylesheet">
        </head>

        <body class="overflow-hidden">
        <!-- Overlay Div --> 
        <!--___________________________overlay_________________________-->';
include("overlay.php");
echo    '<!--___________________________.overlay________________________--> 
        <!-- /theme-setting -->

        <div id="wrapper" class="preload"> 
        <!--___________________________topbar_________________________-->';
include("topbar.php");
echo    '<!--___________________________.topbar________________________--> 
        <!-- /top-nav--> 
        <!--___________________________left sidebar_________________________-->';
include("leftsidebar.php");
echo    '<!--___________________________.left sidebar________________________-->
        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><i class="fa fa-user"></i> <a href="people.php"> People</a></li>
        <li class="active">Create New People</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
        <div class="">
        <div class="panel panel-default">
        <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="get_people.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"><i class="fa fa-user fa-lg"></i>Create New People</div>
        <div class="col-md-6 col-md-offset-3">';
if(isset($_GET['s'])){
    if($_GET['s'] == '1'){
echo    '<div class="alert alert-success text-center">
        <h4><strong><i class="fa  fa fa-check-square-o"></i>
        successfully create record please add a new.</strong></h4> 
        </div>';
        }elseif($_GET['s'] == '0'){
echo    '<div class="alert alert-success text-center">
         <h4><strong><i class="fa fa-exclamation-circle"></i>
        Unsuccessful please try again.</strong></h4> 
        </div>';
        }
}

echo    '</div>
        <div class="panel-body">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Person ID</label>
        <input type="text" placeholder="Person ID" class="form-control input-sm parsley-validated" data-required="true" name="people_id">
        </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Phone</label><br/>
        <div  style="display:inline-flex;">
        <input type="text" placeholder="Phone" class="form-control input-sm parsley-validated " data-required="true" name="phone">
        <select style="width: 85%;" class="form-control input-sm parsley-validated " data-required="true" name="phone1">
        <option value="Work">Work</option>
        <option value="Home">Home</option>
        <option value="Cell">Cell</option>
        </select>
        
        <select style="padding: 0px;width: 300px;" class="form-control input-sm parsley-validated " data-required="true" name="phone2">
        <option value="">When</option>
        <option value="Morning">Morning</option>
        <option value="Day">Day</option>
        <option value="Evening">Evening</option>
        </select>
        </div>
        </div>
        </div>
        <!-- /.col --> 
        </div>
        <!-- row-->
          
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">First name</label>
        <input type="text" placeholder="First name" class="form-control input-sm parsley-validated" data-required="true" name="firstname">
        </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Address</label>
        <input type="text" placeholder="Address" class="form-control input-sm parsley-validated " data-required="true" name="Address">
        </div>
        </div>
        <!-- /.col --> 
        </div>
          
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Last name</label>
        <input type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true" name="lastname">
        </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">City</label>
        <input type="text" placeholder="City" class="form-control input-sm parsley-validated " data-required="true" name="City">
        </div>
        </div>
        <!-- /.col --> 
        </div>
          
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Email</label>
        <div class="input-group">
        <input type="email" placeholder="Email" class="form-control input-sm parsley-validated " data-required="true" name="email">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        </div></div>
        </div>
        <!-- /.col -->
            
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Zip/postal</label>
        <div class="input-group">
        <input type="text" placeholder="Zip/postal" class="form-control input-sm parsley-validated " data-required="true" name="zip">
		<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
		</div></div></div>
        <!-- /.col -->
        </div>
         
        <div class="row">
        <div class="col-md-6" id="right_border">
        <div class="form-group">
        <label class="control-label">Customer Status</label>
        <select class="form-control input-sm parsley-validated " data-required="true" name="c_status">
        <option value="Non Customer">Non Customer</option>
        <option value="Past Customer">Past Customer</option>
        <option value="Customer">Customer</option>
        </select>
        </div>    
        </div>
        <!-- /.col -->
        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Prospect Status</label>
        <select class="form-control input-sm parsley-validated" data-required="true" name="Prospect_Status">
		<option value="Non Prospect">Non Prospect</option>
		<option value="Lost Prospect">Lost Prospect</option>
		</select>
        </div>
        </div>
        <!-- /.row -->
        </div>
        
        <!-- /.col -->
        <div class="claerfix"></div>
        <div class="row">
        <div class="col-md-12"> 
        <label class="control-label">Tags</label>
        <input type="text" class="tag-demo1" value="" id="tags1455191267153" style="display: none;" name="tags">
        <input id="tags1455191267153_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 68px; height:auto; display: none">
        <div class="tags_clear"></div>
        </div></div>
        </div><!--clo md-8-->
        </div>

        <div class="row">
        <div class="panel-footer text-center">
        <button class="btn btn-success" id="button" type="submit"><i class="fa fa-check fa-lg"></i>   SAVE</button>
        <button class="btn btn-success" type="reset">Clear</button>
        </div>
        </div>
        </form>
        </div>
        <!-- /panel --> 
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        
        <!-- Footer ================================================== -->'; 
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
        <!-- Le javascript  ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster -->'; 

echo    "<!-- Jquery --> 
        <script src='js/jquery-1.10.2.min.js'></script> 
        <!-- Bootstrap --> 
        <script src='bootstrap/js/bootstrap.min.js'></script> 
        <!-- Parsley --> 
        <script src='js/parsley.min.js'></script> 
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
        <script src='js/endless/endless_form.js'></script>
        <script src='js/endless/endless.js'></script>
        <script type='text/javascript'>";
?>
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
<?php
echo    '</script>
        </body>
        </html>';
?>