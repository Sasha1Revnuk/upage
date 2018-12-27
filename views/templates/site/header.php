<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>UPage | <?=$title?></title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="/views/templates/site/css/base.css">  
   <link rel="stylesheet" href="/views/templates/site/css/main.css">
   <link rel="stylesheet" href="/views/templates/site/css/vendor.css">     

   <!-- script
   ================================================== -->
	<script src="/views/templates/site/js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="/views/templates/site/favicon.png">

</head>
<style type="text/css">
	li {
		list-style: none;
		color:#05bca9;
	}
	li span {
		color: white;
	}
</style>

<body id="top">

	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
                <?php 
                if (isset($user) == false || $user == 'Guest') { ?>
					<li class="highlight with-sep"><a href="/login" title="">Sign In</a></li>					
					<li class="highlight with-sep"><a href="/registration" title="">Sign Up</a></li>
                <?php } else {
                    $name = User::getName($user);
                    ?>
                        <li class="highlight with-sep"><a href="/admin/main" title="">Welcome <?=$name?></a></li>
                <?php }	?>  				
				</ul>
			</nav>

			<a class="menu-toggle" href=""><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header -->