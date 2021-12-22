 <?php include 'inc/header.php'; ?>
 <div class="container-fluid">
        <h1 class="mt-4">Sold Product <a href="sold.php">View</a></h1>

 
 

 
            <div class="row">
            	<div class="col-md-10">
            		
          
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Quantity</th>
              <th>price</th>
              <th>Product Code</th>
              <th>Availability</th>
							<th>Image</th>
							<th>Address</th>
              <th>Name</th>
              <th>Contact</th>
 
						</tr>
					</thead>
					<tbody>
                      <?php
            
                $getApd = $pd->getAllSoldProductadmin();
                if ($getApd) {
                	$a = 0;
                  while ($result = $getApd->fetch_assoc()) {
                  	$a++;

                ?>
                            <tr>
                            	<td><?php  echo $a; ?></td>
							<td><?php echo $result['productName']; ?></td>
 
							<td><?php echo $result['quantity']; ?></td>
							 <td><?php echo $result['price']+(($result['price']*$result['quantity'])*0.10); ?>Taka</td>
							<td><?php if ($result['type']==0) {
								echo "Available";
							}else{echo "Sold";}  ?></td>
							<td><?php echo $result['productCode']; ?></td>
 
							<td><img style="height: 50px; width: 50px; border-radius: 25%;" src="../<?php echo $result['image']; ?>"></td>
					 
							<td><?php echo $result['address']; ?></td>
              <td><?php echo $result['firstName'].$result['lastName']; ?></td>
              <td><?php echo $result['phone']; ?></td>
 
						</tr>
					<?php }} ?>
             
					</tbody>
				</table>

	
 
      	</div>
            </div>
 
       
    <script type="text/javascript">
    	$(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

    </script>
      </div>
 
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    </body>