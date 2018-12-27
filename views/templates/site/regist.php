<?php require_once 'header.php'?>

	<section id="features">

		<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			
   			<h1>Sign Up!</h1>

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
				 	if ($registration == false || is_array($registration)) { 
				  ?>
				<?php
					if ($registration == false && !empty($_POST['submit'])) {
						echo 'This email is used! Try another email!';
					}
					if (is_array($registration)) {
						foreach ($registration as $error) {
							echo '<p>' . $error . '</p>';
						}
					}
				?>
	      			<form  class="group" action="#" method="POST">
					  	<input type="email" value="" name="email" class="email"  placeholder="type email" required="" value="<?=$email?> "> 
						<input type="password" value="" name="password" class="email"  placeholder="type password" required="" value=" <?=$password?>">
			   			<input type="password" value="" name="cpassword" class="email"  placeholder="type confirmation password" required="" value="<?=$confirmPassword?> ">  
						<input type="text" value="" name="name" class="email"  placeholder="type name" required="" value="<?=$name?>">
			   			<div class="flex-content">
			   				<input type="submit" name="submit" value="Sign Up!">
			   				
			   			</div>
				</form>
				<?php
					} else if ($registration == true) {
						echo '<p>Registration successfull! Go to <a href="/login">Login page</a> to sign in!</p>';
					}
				?>

	      		</div>
	      	</div> 

   		</div>   		
   	</div>
 <!-- features-content -->
		
	</section> <!-- /features -->
<?php require_once 'footer.php'?>