<?php require_once 'header.php';?>
    <section id="features">

        <div class="row section-intro">
           <div class="col-twelve with-bottom-line">

               
               <h1>Password Recovery</h1>

               <div class=" footer-subscribe">
<style type="text/css">
    .flex-content{
        display: flex;
        flex-direction: row;
        justify-content: space-between;

    }
    .flex-1{
        align-self: center;
    }
</style>
                  <div class="subscribe-form">
                      <form  class="group" action="#" method="POST">
                        <input type="email" value="" name="email" class="email"  placeholder="Enter your email" required="" value="' . $email . '"> 
                           <div class="flex-content">
                               <input type="submit" name="submit" value="Sign In!">
                           </div>
                </form>

                  </div>
              </div> 

           </div>           
       </div>
 <!-- features-content -->
        
    </section> <!-- /features -->

    <?php require_once 'footer.php';?>
