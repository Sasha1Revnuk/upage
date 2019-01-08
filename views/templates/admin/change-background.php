


<?php require_once 'header.php';?>
			<div class="row">
			<?php
        Admin::progress($this->errors, $this->status, $this->message);
        ?>
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-picture-o red"></i><strong>Standart</strong></h2>
							<div class="panel-actions">
								<a href="gallery.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="gallery.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
						<style>
						.flexb{
							display:flex;
							flex-wrap:wrap;
							align-items:center;

						}
						.flex-item{
							flex-basis: 300px;
						}
						</style>
							<div class="row flexb">
							<?php Style::showStandartPictures();?>

							</div>
						</div>	
					</div><!--/col-->
				</div><!--/col-->
			
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-picture-o red"></i><strong>User images</strong></h2>
							<div class="panel-actions">
								<a href="gallery.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="gallery.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						
						<div class="panel-body " >
							<div class="row flexb">
								
							<?php Style::showPersonalPictures($_COOKIE['Email']); ?>

									
							</div>
						</div>	
					</div><!--/col-->
				</div><!--/col-->
			
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-plus-square-o red"></i><strong>File Upload</strong></h2>
							<div class="panel-actions">
								<a href="form-dropzone.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="form-dropzone.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">File Upload</label>
								<div class="controls">
								  	<div id="dropzone">
										<form action="" method="POST" class="dropzone" enctype="multipart/form-data">
											<div class="fallback">
												<input name="file" type="file"/><br />
												<input type="submit" class="btn btn-sm btn-success" name="upload" value="Upload">
											</div>
										</form>
									</div>
								</div>
							</div>				

						</div>
					</div>
				</div><!--/col-->

			</div>
			<?php require_once 'footer.php';?>