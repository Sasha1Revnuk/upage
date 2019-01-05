


<?php require_once 'header.php';?>
			<div class="row">
			    <div class="col-md-9">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-indent red"></i><strong>Link Add</strong></h2>
			            </div>
						<div class="panel-body">
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
								<div class="form-group">
				                    <label class="col-md-3 control-label" for="select">Select category</label>
				                    <div class="col-md-9">
									<?php
									Admin::progress($this->errors, $this->status, $this->message);
									?>
				                        <select id="select" name="categories" class="form-control" size="1">
				                            <option value="select">Please select</option>
											<?php
											
											foreach($categories as $category) {
												echo '<option value="' . $category['name'] . '">' . $category['name'] . '</option>';
											}
											?>
				                            
				                        </select>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label class="col-md-3 control-label" for="text-input">Name</label>
				                    <div class="col-md-9">
				                        <input type="text"  name="name" class="form-control" placeholder="Name">
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label class="col-md-3 control-label" for="text-input">Link</label>
				                    <div class="col-md-9">
				                        <input type="text"  name="link" class="form-control" placeholder="Link">
				                    </div>
				                </div>
								<br>
								<span style="display: flex; justify-content: flex-end; margin-top: -30px">
		                    		<input type="submit" class="btn btn-sm btn-success" name="Add" value="Add">
		                    	</span>
				            </form>
						</div>
						
			        </div>	
			    </div>
				
			   <!--/.col-->
			</div>
					
<?php require_once 'footer.php';?>