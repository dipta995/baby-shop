 <?php include 'inc/header.php'; ?>
 <div class="container-fluid">
        <h1 class="mt-4"> View all <a href="customer.php">Customr</a></h1>

 
 

 
            <div class="row">
            	<div class="col-md-8">
            		
          
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Address</th>
           
						</tr>
					</thead>

	 

					<tbody>
	 
						
                         
                  
                      <?php
               
                $getApd = $cu->getallcustomer();
                if ($getApd) {
                	$a = 0;
                  while ($result = $getApd->fetch_assoc()) {
                  	$a++;

                ?>
                            <tr>
                            	<td><?php  echo $a; ?></td>
							<td><?php echo $result['firstName'].$result['lastName']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['phone'] ?></td>
					 
							<td><?php echo $fm->textShorten($result['address'],50) ?></td>
			 
					 
				 
						 
                       
<!--     <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></a></p></td> -->
						</tr>
					<?php }} ?>
 
						</tr>  
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