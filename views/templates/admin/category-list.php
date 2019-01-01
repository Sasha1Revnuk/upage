<?php require_once 'header.php';?>
			<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-table red"></i><span class="break"></span><strong>Categories</strong></h2>
							<div class="panel-actions">
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<form action="" method="POST">
								<div style="display: flex; justify-content: flex-end;">
								 <ul class="pagination" >
									<li><a href="table.html#">Prev</a></li>
									<li class="active">
									  <a href="table.html#">1</a>
									</li>
									<li><a href="table.html#">2</a></li>
									<li><a href="table.html#">3</a></li>
									<li><a href="table.html#">4</a></li>
									<li><a href="table.html#">5</a></li>
									<li><a href="table.html#">Next</a></li>
								  </ul>
								</div>
								<script type="text/javascript">
									$(document).ready(function() {
										// Initialise the table
										$("#table-1").tableDnD();
									});
								</script>
								<table class="table table-bordered table-striped table-condensed table-hover" id="table-1">
									  <thead>
										  <tr>
											<th>Name</th>
											<th>Actions</th>                                          
										  </tr>
									  </thead>   
									  <tbody>
									  <?php
										 	for ($i = 0; $i < count($categories); $i++) {
												 echo '<tr>';
													echo '<td><input type="hidden" name="id' . $i . '" class="form-control" value="' . $categories[$i]['id'] . '"><div class="col-lg-4 col-md-4"> <input type="text" name="name' . $i . '" class="form-control" value="' . $categories[$i]['name'] . '"></div></td>';
													echo '<td><a class="btn btn-info" href="/admin/category-edit/' . $categories[$i]['id'] . '"><i class="fa fa-edit "></i></a>  <a class="btn btn-danger" href="table.html#"><i class="fa fa-trash-o "></i></a></td>'; 
													 
												echo '</tr>';
											 }
										  ?>								                                   
									  </tbody>
								 </table> 

								
								  <input type="submit" class="btn btn-sm btn-success" name="Save" value="Save">
							</form>
						</div>
					</div>
				</div><!--/col-->
			</div>
					
<?php require_once 'footer.php';?>