<?php
    require_once 'header.php';
?>
    
    <div class="row">
			    <div class="col-md-6">	
                <?php
						Admin::progress($this->errors, $this->status, $this->message);
						?>		        
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-indent red"></i><strong>Reset visual settings?</strong></h2>
			            </div>
			            <div class="panel-body">
							<form action="" method="POST">
				                <div class="form-group">
				                    <label for="nf-email">It will clear all your styles!</label>
                                </div>
                                <input type="submit"  class="btn btn-sm btn-success" name="reset" value="Yes, i know it">
                                <input type="submit"  class="btn btn-sm btn-danger" name="not" value="Cancel">
				            </form>
						</div>
			        </div>

				</div><!--/.col-->
			</div>
                    

<?php 
require_once 'footer.php';
?>
