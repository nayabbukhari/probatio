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
	
	<!-- Chosen -->
	<link href="css/chosen/chosen.min.css" rel="stylesheet"/>

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
        <li class="active">Quotations</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
    <a class="btn btn-success" style="float:right" href="quotations.php"><i class="fa fa-plus fa-lg"></i>&nbsp;Quotation</a>
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						Data Table
						<span class="label label-info pull-right">790 Items</span>
					</div>
					<div class="padding-md clearfix">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Sales</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>#1001</td>
									<td>Leather Bag</td>
									<td>$89</td>
									<td>30</td>
									<td>187</td>
									<td>Oct 08,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1002</td>
									<td>Brown Sunglasses <span class="label label-success m-left-xs">Best Seller</span> </td>
									<td>$120</td>
									<td>0</td>
									<td>861</td>
									<td>Oct 07,2013</td>
									<td><span class="label label-danger">Sold Out</span></td>
								</tr>
								<tr>
									<td>#1003</td>
									<td>Casual Boots</td>
									<td>$99</td>
									<td>100</td>
									<td>12</td>
									<td>Oct 06,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1004</td>
									<td>Lambskin Sport Coat</td>
									<td>$4000</td>
									<td>7</td>
									<td>41</td>
									<td>Oct 06,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1005</td>
									<td>Summer Dress</td>
									<td>$310</td>
									<td>25</td>
									<td>39</td>
									<td>Oct 05,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1006</td>
									<td>Duffle Coat</td>
									<td>$80</td>
									<td>0</td>
									<td>20</td>
									<td>Sep 30,2013</td>
									<td><span class="label label-danger">Sold out</span></td>
								</tr>
								<tr>
									<td>#1007</td>
									<td>Universal Camera Case</td>
									<td>$35</td>
									<td>30</td>
									<td>3</td>
									<td>Sep 29,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1008</td>
									<td>Leopard Rose Dress</td>
									<td>$1500</td>
									<td>10</td>
									<td>1</td>
									<td>Sep 27,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
								<tr>
									<td>#1009</td>
									<td>Casual stripe</td>
									<td>$50</td>
									<td>30</td>
									<td>25</td>
									<td>Sep 27,2013</td>
									<td><span class="label label-success">Sold out</span></td>
								</tr>
								<tr>
									<td>#1010</td>
									<td>Italian shirt</td>
									<td>$70</td>
									<td>40</td>
									<td>4</td>
									<td>Sep 27,2013</td>
									<td><span class="label label-info">Promotion</span></td>
								</tr>
								<tr>
									<td>#1011</td>
									<td>Iphone 5</td>
									<td>$400</td>
									<td>300</td>
									<td>152</td>
									<td>Sep 27,2013</td>
									<td><span class="label label-danger">In stock</span></td>
								</tr>
								<tr>
									<td>#1012</td>
									<td>Ipad</td>
									<td>$350</td>
									<td>46</td>
									<td>103</td>
									<td>Sep 25,2013</td>
									<td><span class="label label-success">In Stock</span></td>
								</tr>
							</tbody>
						</table>
					</div><!-- /.padding-md -->
				</div><!-- /panel -->



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
  <script src="js/endless/endless_wizard.js"></script>
  <script src="js/endless/endless.js"></script>

    
	<!-- Chosen -->
	<script src='js/chosen.jquery.min.js'></script>	

	<!-- Mask-input -->
	<script src='js/jquery.maskedinput.min.js'></script>	

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
	
	
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
	



  
  
  
  

</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>


























