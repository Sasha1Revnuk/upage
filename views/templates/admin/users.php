<?php require_once 'header.php';?>
		
			
			<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-table red"></i><span class="break"></span><strong>Combined All Table</strong></h2>
							<div class="panel-actions">
								<a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
						
                                <div style="display: flex; justify-content: flex-end;">
                                <div class="col-md-1">
                                        <select id="maxRows"  class="form-control" size="1" style="margin-top: 19px">
                                            <option value="5000">All</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                        </select>
                                    </div>
                                 <ul class="pagination" >
                                    
                                  </ul>
                                </div>
                                <script>
                                var table = '#table-1'
                                $('#maxRows').on('change', function(){
                                    $('.pagination').html('')
                                    var trnum = 0
                                    var maxRows = parseInt($(this).val())
                                    var totalRows = $(table+' tbody tr').length
                                    $(table+' tr:gt(0)').each(function(){
                                        trnum++
                                        if(trnum > maxRows){
                                            $(this).hide()
                                        }
                                        if(trnum <= maxRows){
                                            $(this).show()
                                        }
                                    })

                                    if(totalRows > maxRows){
                                        var pagenum = Math.ceil(totalRows/maxRows)
                                        for(var i=1; i<=pagenum;){
                                            $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
                                        }    
                                    }
                                    $('.pagination li:first-child').addClass('active')
                                    $('.pagination li').on('click', function(){
                                        var pageNum = $(this).attr('data-page')
                                        var trIndex = 0
                                        $('.pagination li').removeClass('active')
                                        $(this).addClass('active')
                                        $(table+' tr:gt(0)').each(function(){
                                            trIndex++
                                            if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                                                $(this).hide()
                                            } else {
                                                $(this).show()
                                            }
                                        })
                                    })
                                })
                                </script>
							<table class="table table-bordered table-striped table-condensed table-hover" id="table-1">
								  <thead>
									  <tr>
										 <th>Id</th>
										 <th>Name</th>
										 <th>Mail</th>
										 <th>Status</th>     
										 <th>Actions</th>                                     
									  </tr>
								  </thead>   
								  <tbody>
								  <?php
								 	foreach ($users as $user) {
										 echo '<tr>';
									 
								  ?>

										<td><?=$user['id']?></td>
                                        <td><?=$user['name']?></td>
                                        <td><?=$user['email']?></td>
                                        <td><?=$user['status']?></td>
										<td>
											<span class="label label-success"><a href="/admin/users/edit/<?=$user['id']?>">Edit</a></span>
											<span class="label label-danger"><a href="/admin/users/delete/<?=$user['id']?>">Delete</a></span>
										</td>                             
									<?php
										echo '</tr>';
									} 
									?>							                                   
								  </tbody>
							 </table>
							   
							
						</div>
					</div>
				</div><!--/col-->
			</div>
			<!-- This is place for tasks -->
					
			<?php require_once 'footer.php';?>