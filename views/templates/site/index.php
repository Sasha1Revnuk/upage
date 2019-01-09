<?php require_once 'header.php'?>
    <section id="features">

        <div class="row section-intro">
           <div class="col-twelve with-bottom-line">

               <h5>UPage</h5>
               <h1>Beautiful page for every day</h1>

               <p class="lead">Design, create and enjoy!</p>
    <?php
    if($status == false) {
        echo '<p class="lead">Create your links and make using much easyer!</p>';
    }
    ?>
           </div>           
       </div>

       <div class="row features-content">
           <div class="features-list block-1-4 block-s-1-2 block-tab-full group ">
        <?php
        if($status == true) {
            foreach ($categories as $category){
                ?>
              <div class="bgrid feature">
                <div class="service-content">
            
                     <h3 class="h05" ><?php echo $category['name']?></h3>
                     <ul class="links" id="links">
                <?php
                for($i = 0; $i < count($links); $i++){
                    foreach($links[$i] as $link){
                        if($category['name'] == $link['category_name']) {
                             echo '<li><a href="' . $link['link'] . '">' . $link['name'] . '</a></li>';
                        }
                            
                    }
                }
                ?>
                     </ul>
                   
                        
                </div>                   

               </div> <!-- /bgrid -->
                <?php
            }
        }
        ?>

          </div> <!-- features-list -->
           
       </div> <!-- features-content -->
        
    </section> <!-- /features -->

<?php require_once 'footer.php'?>
