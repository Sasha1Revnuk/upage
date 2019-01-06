<?php require_once 'header.php';?>
			<div class="row">
			    <div class="col-md-9">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-indent red"></i><strong>Change user name</strong></h2>
			            </div>
						<div class="panel-body">
						<?php
						Admin::progress($errors, $status, $message);
						?>
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
				                <div class="form-group">
				                    <label class="col-md-3 control-label" for="text-input">New name</label>
				                    <div class="col-md-9">
				                        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text">
				                    </div>
				                </div>
								<br>
								<span style="display: flex; justify-content: flex-end; margin-top: -30px">
		                    		<input type="submit" class="btn btn-sm btn-success" name="save" value="Save">
		                    	</span>
				            </form>
						</div>
						
			        </div>	
			    </div>
				
			   <!--/.col-->
			</div>
<?php require_once 'footer.php';?>