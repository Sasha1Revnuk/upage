

<?php require_once 'header.php';?>
				<div class="row">

					<div class="col-sm-12">
					<?php
						Admin::progress($this->errors, $this->status, $this->message);
						?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><i class="fa fa-random red"></i><span class="break"></span><strong>Example</strong></h2>
								<div class="panel-actions">
									<a href="charts-flot.html#" class="btn-close"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="panel-body">
							<div id="sincos"  class="center" style="height: 500px" >
							<p>Select new color:</p>
								<iframe src="/#main-text" width="100%" height="450px"></iframe>
								<form action='' method="POST">
									<input type="color" name="color" value="<?=$styles[0]['main_text_col']?>">
									<input type="submit" name="set" value="Set new color">
								</form>
							</div>
							
						</div>
					</div><!--/col-->

				</div>
				
<?php require_once 'footer.php';?>