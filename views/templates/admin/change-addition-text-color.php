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
							<div id="sincos"  class="center" style="height: 570px" >
								<iframe src="/#main-text" width="100%" height="450px"></iframe>
								<form action='' method= 'POST'>
								
									<p><input type="color" name="color" value="<?=$color?>"></p>
									<p><input type="range" min="0" max="1"  name="range" step="0.01" value="<?=$range?>" style="width:30%" oninput="fun1()" id="r1" name="alf"> <span id="valRng"></span></p>

									<p><input type="submit" name="set" value="Set new color"></p>
								</form>
								<script type="text/javascript">
									function fun1(){
										var rng=document.getElementById('r1');
										var span=document.getElementById('valRng');
										span.innerHTML='Opacity color:' + rng.value;
									}
								</script>
							</div>
							
						</div>
					</div><!--/col-->

				</div>
				
<?php require_once 'footer.php';?>