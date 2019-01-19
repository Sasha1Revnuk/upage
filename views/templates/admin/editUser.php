<?php require_once 'header.php';?>
			<div class="row">
			    <div class="col-md-9">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-indent red"></i><strong>Change user</strong></h2>
			            </div>
						<div class="panel-body">
						<?php
                                    Admin::progress($errors, $status, $message);
        ?>						
							<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal ">
				                <div class="form-group">
				                    <label class="col-md-3 control-label" for="text-input">Name</label>
				                    <div class="col-md-9">
				                        <input type="text" name="name" class="form-control" placeholder="Text" value="<?=$user['name']?>">
				                    </div>
				                </div>
				                 <div class="form-group">
				                    <label class="col-md-3 control-label" for="text-input">Email</label>
				                    <div class="col-md-9">
				                        <input type="email" name="email" class="form-control" placeholder="Text" value="<?=$user['email']?>">
				                    </div>
				                </div>
				               <div class="form-group">
				                    <label class="col-md-3 control-label" for="select">Select status</label>
				                    <div class="col-md-9">
				                        <select id="select" name="select" class="form-control" size="1">
				                            <option value="<?=$user['status']?>"><?=$user['status']?></option>
											<?php if ($user['status'] != 'root') {
												echo '<option value="root">root</option>'	;
											}?>
				                            <?php if ($user['status'] != 'pro') {
												echo '<option value="pro">pro</option>'	;
											}?>
											<?php if ($user['status'] != 'user') {
												echo '<option value="user">user</option>'	;
											}?>
				                        </select>
				                    </div>
				                </div>
								<br>
								<?php
									if (empty($errors)) {
									
								?>
								<span style="display: flex; justify-content: flex-end; margin-top: -30px">
		                    		<input type="submit" class="btn btn-sm btn-success" name='save' value="Save">
		                    	</span>
								<?php 	
									}?>
				            </form>
						</div>
						
			        </div>	
			    </div>
				
			   <!--/.col-->
			</div>
			<!-- This is place for tasks -->
					
			<?php require_once 'footer.php';?>