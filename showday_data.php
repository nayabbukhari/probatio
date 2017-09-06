<table class="table table-striped" id="dataTable1">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									<th>Date Created</th>
									<th>Effective date</th>
									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
									<th>Agent</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) order by date_time desc") ;
				while($row = mysqli_fetch_array($query) ) {
				$phone= $row['phone'];
				 $a1=explode(",", $phone);
				$ph=$a1[0];
			$products=$row['products'];
							$product=explode(",", $products);			
							
							$insurer=$row['insurer'];
							$in=explode(",", $insurer);			
							
							$Others=$row['Others'];
							$Oth=explode(",", $Others);			

                            $Capitale=$row['Capitale'];	
							$Cap=explode(",", $Capitale);			
                            $status=$row['status'];
                            $st=explode(",", $status);
                            $b2=sizeof($st);
                            //echo $b2;
                            $date=$row['date_time']; 
								$create=explode(" ", $date);
                           
							if($st[0]!='')
							{
                            ?>

                <tr>
                <td><a href="#" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $product[0]; ?></td> 
                <td><?php echo $st[0];?></td>
                <td><?php echo $create[0]; ?></td>
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $Oth[0]; if($Oth[0]!=''){?>$<?php }?></td>
                <td><?php echo $Cap[0]; if($Cap[0]!=''){?>$<?php }?></td>
                <td><?php echo $in[0]; ?></td>
                <td><?php echo $row['agent_name']; ?></td>
                                <td> <a href="#Re<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>                </td>

                </tr>
                         <?php
						 }
						 if($st[1]!='')
							{
                            ?>

                <tr>
                <td><a href="#" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $product[1]; ?></td> 
                <td><?php echo $st[1];?></td>
                <td><?php echo $create[0]; ?></td>
                <td><?php echo $row['effectivedate1']; ?></td>
                <td><?php echo $Oth[1]; if($Oth[1]!=''){?>$<?php }?></td>
                <td><?php echo $Cap[1]; if($Cap[1]!=''){?>$<?php } ?></td>
                <td><?php echo $in[1]; ?></td>
                <td><?php echo $row['agent_name']; ?></td>
                                <td> <a href="#Re<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>                </td>

                </tr>
                         <?php
						 }
						 if($st[2]!='')
							{
                            ?>

                <tr>
                <td><a href="#" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $product[2]; ?></td> 
                <td><?php echo $st[2];?></td>
                <td><?php echo $create[0]; ?></td>
                <td><?php echo $row['effectivedate2']; ?></td>
                <td><?php echo $Oth[2]; if($Oth[2]!=''){?>$<?php }?></td>
                <td><?php echo $Cap[2]; if($Cap[2]!=''){?>$<?php } ?></td>
                <td><?php echo $in[2]; ?></td>
                <td><?php echo $row['agent_name']; ?></td>
                <td> <a href="#Re<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>                </td>
                </tr>
                          <?php
						  }
						  ?>                      
                                 <!--Modal-->
  <div class="modal fade" id="Re<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                      <form action="delete_prospect.php?id=<?php echo $row['id']; ?>&s=2" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;">Remove this Prospect?</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Are you sure you want to remove this Prospect? This action can't be undone.</label>
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
                            
                
								<?php
								 }?>
								
							</tbody>
						</table>	
                        <script>
		$(function	()	{
			
			$('#dataTable1').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			</script>			