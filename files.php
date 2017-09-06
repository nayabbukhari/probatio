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
        <link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/merge.css" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>';
?>
$(document).ready(function(){
    setInterval(function(){
        $("#screen").load('banners.php')}, 9000);
        });
<?php
echo    '</script>
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
        <!--_________________________left sidebar_____________________-->';
include("leftsidebar.php");
echo    '<!--___________________________.left sidebar________________________-->
        <div id="main-container">
        <div id="breadcrumb">
        <ul class="breadcrumb"><br /><br />
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Files</li>
        </div>
        <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
        <div class="clearfix"></div>
        <div class="padding-md clearfix"><a class="btn btn-success" style="" href="#formModal" data-toggle="modal"><i class="fa fa-paperclip fa-lg"></i>&nbsp;Add New File</a></div>
        <div class="clearfix"></div>
        <div class="panel panel-default table-responsive">
		<div class="panel-heading">
        <strong>Files</strong>
        </div>
        <br />
		<div class="padding-md clearfix">
        <table class="table table-striped" id="dataTable">
		<thead>
		<tr>
		<th>Id</th>
		<th>Title</th>									
        <th>Modifier</th>
		<th>Updated</th>
		<th>Action</th>
		</tr>
		</thead>
		<tbody id="screen">';

@session_start();
$_SESSION['key'] = md5(mt_rand());

$files=get_records_sql("select * from pia_files order by date_time desc"); 
$i=0;
foreach($files AS $fl){
        $i++;
        $file=$fl->file_name;
		$temp = explode(".",$file);
        //echo $temp[0];
		
echo    '<tr>
        <td>'.$i.'</td>
        <td><a href="#view'.$fl->id.'" data-toggle="modal"><img src="img/Add doc Icon.jpg">'.$temp[0].'.'.$temp[1].'</a></td>
        <td>'.$fl->Modifier.'</td>
        <td>'.$fl->date_time.'</td>
        <td><a href="#delete'.$fl->id.'" data-toggle="modal" class="btn btn-xs btn-danger">Delete</a></td>
        </tr>
                                
        <div class="modal fade" id="view'.$fl->id.'">
        <div class="modal-dialog">
        <form action="update_files.php" method="post">
        <input style="border: 1px solid rgba(51, 51, 51, 0.49); padding: 3px;" type="hidden" value="'.$temp[1].'" name="ex">
        <input style="border: 1px solid rgba(51, 51, 51, 0.49); padding: 3px;" type="hidden" value="'.$fl->id.'" name="id">

        <div class="modal-content">
      	<div class="modal-header" style="text-align: center; color: rgb(51, 51, 51);">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 style="font-weight: 700;">File info</h4>
      	</div>
		<div class="modal-body">
        <div class="row">
        <div class="col-md-8">
        <div class="form-group">
        <label id="new'.$fl->id.'" style="color: rgb(81, 138, 20);">'.$temp[0].'</label><br/>
        <label  style="color: rgb(81, 138, 20); display:none;" id="ind'.$fl->id.'"><input style="border: 1px solid rgba(51, 51, 51, 0.49); padding: 3px;" type="text" value="'.$temp[0].'" name="file_name"></label>
        <label>'.$fl->date_time.'</label> , <label>'.$fl->Modifier.'</label>
        <br/>
        <label>'.$temp[1].'</label>
        </div>
        </div>
        <!-- /form-group -->
        
        <div class="col-md-4">
        <div class="form-group">
        <a href="'.$fl->file_path.'"><i style="cursor:pointer;font-size: 16px;" class="fa fa-download"></i>Download</a><br />';
echo    '<a href="#delete'.$fl->id.'" data-toggle="modal"><i style="cursor:pointer;font-size: 16px;" class="fa fa-trash-o"></i>Delete</a><br /> 
        <a onClick="showhide'.$fl->id.'()" id="edit'.$fl->id.'"><i style="cursor:pointer;font-size: 16px;" class="fa fa-pencil"></i>Edit Name</a>
        </div>
        <!-- /form-group -->
        </div>
        </div>
        
        <div class="form-group">
		<label><i onClick="showhide()" style="cursor:pointer;font-size: 16px;margin-top: 10px;" class="fa fa-plus"></i>METADATA</label>
		</div><!-- /form-group -->
        <div  id="newpost" style="display:none;">
        <div class="form-group">
		<label class="control-label">Tags</label>
    	<input type="text" class="tag-demo1" value="" name="tags">

        <div class="tags_clear"></div>
		</div>
        <!-- /form-group -->
        
        <div class="form-group">
		<label class="control-label">Description</label>
     	<textarea class="form-control" rows="3" name="des"></textarea>
        </div>
        <!-- /form-group -->
        </div>
        </div>
		<div class="modal-footer" style="text-align: center;">
		<button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">CLOSE</button>
		<button type="submit"  class="btn btn-danger btn-sm">SAVE</button>
		</div>
		</div><!-- /.modal-content -->
        </form>
        </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

        <!--Modal-->
        <div class="modal fade" id="delete'.$fl->id.'">
        <div class="modal-dialog">
        <form action="delete_files.php?id='.$fl->id.'" method="post">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="text-align:center;">Remove this file?</h4>
        </div>

        <div class="modal-body">
        <div class="form-group" style="text-align: center;">
        <label style="color: rgb(45, 122, 164);" for="folderName">Are you sure you want to remove this file? This action can not be undone.</label>
        </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
        </div>
        </div>
        <!-- /.modal-content --> 
        </form>
        </div>
        <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal --> 
        <script type="text/javascript">';
?>
function showhide<?php $fl->id?>(){
<!--alert("jii");-->

           var div = document.getElementById("new<?php echo $fl->id ?>");
           var edit = document.getElementById("edit<?php echo $fl->id ?>");
           var ind = document.getElementById("ind<?php echo $fl->id ?>");
<!--alert (ind);-->
    if (div.style.display !== "none") {
        div.style.display = "none";
        edit.style.display = "none";
        ind.style.display = "block";
    }else{
        div.style.display = "block";
    }
}

<?php

echo    '</script>'; 
}
        //$i++;
echo    '</tbody>
		</table>
		</div><!-- /.padding-md -->
		</div><!-- /panel -->
        </div>
        <!-- /.padding-md --> 
        </div>
        <!-- /main-container --> 
        <!--____________________footer___________________________-->';

include("footer.php");
echo    '<!--____________________footer___________________________--> 
        <!--Modal-->
        <script>';
?>
function showhide(){
<!-- alert("jii"); -->
    var div = document.getElementById("newpost");
    if(div.style.display !== "none"){
        div.style.display = "none";
    }else{
        div.style.display = "block";
    }
}
<?php	 
echo    '</script>
        <div class="modal fade" id="formModal">
  		<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header" style="text-align: center; color: rgb(51, 51, 51);">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">hello</button>
		<h4 style="font-weight: 700;">Add files</h4>
      	</div>
		<div class="modal-body">
		<div class="form-group">
		<label>Choose files</label>
        <div class="image_upload_div">
        <form action="upload.php" class="dropzone">
        </form>
        </div></div><!-- /form-group -->
        <div class="form-group">
		<label><i onClick="showhide()" style="cursor:pointer;font-size: 16px;margin-top: 10px;" class="fa fa-plus"></i>METADATA</label>
		</div><!-- /form-group -->
                            
        <div id="newpost" style="display:none;">
        <div class="form-group">
		<label class="control-label">Tags</label>
    	<input type="text" class="tag-demo1" value="">

        <div class="tags_clear"></div>
		</div><!-- /form-group -->
        
        <div class="form-group">
		<label class="control-label">Description</label>
     	<textarea class="form-control" rows="3">"<br />"</textarea>
        </div><!-- /form-group -->
        </div>
        
        <div class="form-group">
		<label class="control-label"><em>Maximum single file size: 30 MB</em></label>
        </div><!-- /form-group -->
        </div>
		
        <div class="modal-footer" style="text-align: center;">
		<button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">CLOSE</button>
		<a href="?s=1" class="btn btn-danger btn-sm">SAVE</a>
		</div>
		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        </div>
        <!-- /wrapper --> 

        <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 
        <!-- Logout confirmation -->
        <!-- Le javascript  ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster -->'; 
        
echo    "<!-- Jquery -->
        <script src='js/jquery-1.10.2.min.js'></script>
        <!-- Tag input -->
        <script src='js/chosen.jquery.min.js'></script>	
        <script src='js/jquery.tagsinput.min.js'></script>	
        <!-- Bootstrap -->
        <script src='bootstrap/js/bootstrap.min.js'></script>
        <!-- Datatable -->
        <script src='js/jquery.dataTables.min.js'></script>	
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
        <script src='js/endless/endless.js'></script>
        <script>";
?>
$(function(){
        $('#dataTable').dataTable( {
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
			});
			
        $('#chk-all').click(function()	{
				if($(this).is(':checked'))	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked', true);
						$(this).parent().parent().parent().addClass('selected');
					});
				}else{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked' , false);
						$(this).parent().parent().parent().removeClass('selected');
					});
				}
			});
		});
<?php
echo    "</script>
        </body></html>
        <script src='js/chosen.jquery.min.js'></script>	
        <!-- Mask-input -->
        <!-- Datepicker -->
        <script src='js/bootstrap-datepicker.min.js'></script>	
        <!-- Timepicker -->
        <script src='js/bootstrap-timepicker.min.js'></script>	
        <!-- Slider -->
        <script src='js/bootstrap-slider.min.js'></script>	
        <!-- Tag input -->
        <script src='js/jquery.tagsinput.min.js'></script>	
        <!-- WYSIHTML5 -->
        <script src='js/wysihtml5-0.3.0.min.js'></script>	
        <script src='js/uncompressed/bootstrap-wysihtml5.js'></script>	
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
        <script src='js/endless/endless.js'></script>";

if(isset($_GET['s'])){
    if($_GET['s']==1){
echo   '<script>
        alert("Sucessfully Added");
        </script>';
}else if($_GET['s']==2){
echo    '<script>
        alert("Sucessfully Deleted");
        </script>';
}else{
echo    '<script>
        alert("Sucessfully Updated");
        </script>';
    }
}
?>