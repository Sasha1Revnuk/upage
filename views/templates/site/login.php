<?php require_once 'header.php';?>
	<section id="features">

		<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			
   			<h1>Sign In!</h1>

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
				  <?php
				 	if ($email == null && !empty($_POST['submit'])) {
						echo '<p>Email or password is wrong!</p>';
					} 
				  ?>
	      			<form  class="group" action="/login" method="POST">
					  <input type="email" value="" name="email" class="email"  placeholder="type email" required="" value="<?=$email?> "> 
						<input type="password" value="" name="password" class="email"  placeholder="type password" required="" value=" <?=$password?>">
			   			<div class="flex-content">
			   				<input type="submit" name="submit" value="Sign In!">
			   				<span><input type="checkbox" name="remember" class="flex-1"><span style='padding-left:7px;'> </span>Remember me!</span>
							<?php echo '<a href="/recovery">Forgot you password?</a><br />';?>
						   </div>
				</form>

	      		</div>
	      	</div> 

   		</div>   		
   	</div>
 <!-- features-content -->
		
	</section> <!-- /features -->

	<?php require_once 'footer.php';?>