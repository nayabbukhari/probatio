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
echo    '<title>Probatio Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    	<!-- Font Awesome-->
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
echo    '<!--___________________________.left sidebar________________________-->';

echo    '<div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><img style="width: 20px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; border-radius: 50%;" src="img/Prospects 3.png"  /> <a href="leads.php"> Prospects</a></li>
        <li class="active">IMPORT Prospects</li>
        </ul>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
        <div class="">
        <div class="panel panel-default">
        <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="get_import_prospect.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700; margin-left: 15px;">Import Prospects</div>
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
        <div class="col-md-6">
        <div class="row">
        <label class="control-label col-lg-3">Choose File:</label>
        <div class="col-lg-6">
        <div class="upload-file">
        <input type="file" id="upload-demo" name="file" class="upload-demo">
        <label data-title="Select file" for="upload-demo">
        <span data-title="No file selected..."></span>
        </label>
        </div>
        </div><!-- /.col6 -->
        </div>

        <div class="row" style="margin-top: 30px;">
        <div class="col-md-9">
        <div class="panel-footer text-right">
        <button class="btn btn-success" type="submit">Save</button>
        <button class="btn btn-success" type="reset">Clear</button>
        </div>
        </div>
        </div>                    
        </div>
                            
        <div class="col-md-6">
        <div class="row">
        <label class="control-label">Download Sample File Format: </label>
        &nbsp;&nbsp;&nbsp;<a href="Sample data format.xlsx"><img src="templates-for-excel-pro-icon.png" width="30px" height="30px"></a>
        <br/> <br/>
        <label class="control-label"><em>Only Use This Format </em>: csv, xlsx</label>
        </div>
        </div>
        </div>
        </form>
        </div>
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!-- Footer ================================================== --> 
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

        <!-- Logout confirmation -->';
        
echo    "<!-- Le javascript================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 

        <!-- Jquery --> 
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