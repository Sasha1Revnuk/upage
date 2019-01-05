<?php require_once 'header.php';?>
            <div class="row">    
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Category: <?php echo $categoryName?></strong></h2>
                            <div class="panel-actions">
                                <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>    
                            </div>
                        </div>
                        <div class="panel-body">
        <?php
                                    Admin::progress($this->errors, $this->status, $this->message);
        ?>
                            <form action="" method="post">
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
                                             <th>Link</th>
                                             <th>Actions</th>                                          
                                          </tr>
                                      </thead>   
                                      <tbody>
            <?php
            for ($i = 0; $i < count($links); $i++) {
                echo '<tr>';
                echo '<td><input type="hidden" name="id' . $i . '" class="form-control" value="' . $links[$i]['id'] . '"><div class="col-lg-4 col-md-4"> <input type="text" name="name' . $i . '" class="form-control" value="' . $links[$i]['name'] . '"> </div></td>';
                echo '<td><div class="col-lg-4 col-md-4"> <input type="text" name="link' . $i . '" class="form-control" value="' . $links[$i]['link'] . '"> <input type="hidden" name="categoryName' . $i . '" class="form-control" value="' . $links[$i]['category_name'] . '"><input type="hidden" name="userId' . $i . '" class="form-control" value="' . $links[$i]['user_id'] . '"></div></td>';
                echo '<td><a class="btn btn-danger" href="/admin/category/edit/' . $id .'/delete/' . $links[$i]['id'] . '"><i class="fa fa-trash-o "></i></a></td>'; 
                                                    
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
