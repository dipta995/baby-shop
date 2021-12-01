 <?php include 'inc/header.php'; ?>
 <div class="container-fluid">
       

 
 

 
            <div class="row">
            	<div class="col-md-8">
            		
          
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Message</th>
           
						</tr>
					</thead>

	 

					<tbody>
	 
						
                         
                  
                      <?php
                      if (isset($_GET['deletemsg'])) {
                         $cont->delmsg($_GET['deletemsg']);
                      }
               
                $getApd = $cont->getAllQuantity();
                if ($getApd) {
                	$a = 0;
                  while ($result = $getApd->fetch_assoc()) {
                  	$a++;

                ?>
                            <tr>
                            	<td><?php  echo $a; ?></td>
							<td><?php echo $result['firstname'].$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['subject'] ?></td>
              <td><?php echo $result['message']; ?></td>
					 
							<td><a href="?deletemsg=<?php echo $result['con_id']; ?>">Delete</a></td>
			 
					 
				 
						 
                       
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