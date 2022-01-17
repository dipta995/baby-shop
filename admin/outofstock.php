<?php include 'inc/header.php'; ?>
 <div class="container-fluid">
        <h1 class="mt-4"> All  Products <a href="product.php">Upload New Product</a></h1>

 
 

 
            <div class="row">
            	<div class="col-md-10">
            		
          
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Catagory</th>
							<th>Brand</th>
							<th>Quantity</th>
                            
							<th>Image</th>
							<th>Offer</th>
							<th>Price</th>
                            <th>Sold</th>
                            <th>Product Code</th>
                           
                            <th>Edit</th>
                            <th>Delete</th>
						</tr>
					</thead>

	 

					<tbody>
	 
						
                         
                  
                      <?php
                      if (isset($_GET['delpr'])) {
                      	$delpro = ($_GET['delpr']);
                echo $pd->delProById($delpro);
                      }else{

                      }
                $getApd = $pd->getAllProductadminByOutofStock();
                if ($getApd) {
                	$a = 0;
                  while ($result = $getApd->fetch_assoc()) {
                  	$a++;

                ?>
                            <tr>
                            	<td><?php  echo $a; ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><?php echo $result['brandName'] ?></td>
							<td><?php echo $result['total_quantity'].'/'.$result['quantity_name']; ?></td>
							 
							<td><img style="height: 50px; width: 50px; border-radius: 25%;" src="../<?php echo $result['image']; ?>"></td>
							<td><?php if ($result['offer']==0) {
								echo "No";
							}else{echo "Yes";}  ?></td>
							<td><?php echo $result['price']; ?>Taka</td>
							<td><?php if ($result['type']==0) {
								echo "Available";
							}else{echo "Sold";}  ?></td>
							<td><?php echo $result['productCode']; ?></td>
							 
						 
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="editproduct.php?proid=<?php echo $result['productId'] ?>" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="?delpr=<?php echo $result['productId']; ?>" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
						</tr>
					<?php }} ?>
                 <!--            <tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr> -->
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