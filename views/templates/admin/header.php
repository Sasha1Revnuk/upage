<?php
if (isset($_COOKIE['Email']) == false || $_COOKIE['Email'] == 'Guest' || empty($_COOKIE['Email'])) {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="T-Great - Admin Template">
		<meta name="author" content="Creative Template">
		<meta name="keyword" content="T-Great, Admin, Admin Template, Dashboard, Bootstrap, Twitter Boostrap, Template, Theme, Responsive, Jquery, Administration, Administration Template, Administration Theme, Fluid, Retina">
	    <title>UPage | Admin : <?=$title?></title>		
		
		<!-- Import google fonts - Heading first/ text second -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
        <!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="ico/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="ico/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="ico/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="ico/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="ico/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="ico/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="ico/apple-touch-icon-152x152.png" />    

	    <!-- Css files -->
	    <link href="/views/templates/admin/css/bootstrap.min.css" rel="stylesheet">		
		<link href="/views/templates/admin/css/jquery.mmenu.css" rel="stylesheet">		
		<link href="/views/templates/admin/css/font-awesome.min.css" rel="stylesheet">
		<link href="/views/templates/admin/css/climacons-font.css" rel="stylesheet">
		<link href="/views/templates/admin/css/xcharts.min.css" rel=" stylesheet">		
		<link href="/views/templates/admin/css/fullcalendar.css" rel="stylesheet">
		<link href="/views/templates/admin/css/morris.css" rel="stylesheet">
		<link href="/views/templates/admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
		<link href="/views/templates/admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">	    
	    <link href="/views/templates/admin/css/style.min.css" rel="stylesheet">
		<link href="/views/templates/admin/css/add-ons.min.css" rel="stylesheet">		

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

				
	<!-- start: JavaScript-->
	<!--[if !IE]>-->

	<script src="/views/templates/admin/js/jquery-2.1.1.min.js"></script>

<!--<![endif]-->

<!--[if IE]>

	<script src="js/jquery-1.11.1.min.js"></script>

<![endif]-->

<!--[if !IE]>-->

	<script type="text/javascript">
		window.jQuery || document.write("<script src='/views/templates/admin/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
	</script>

<!--<![endif]-->

<!--[if IE]>

	<script type="text/javascript">
	 window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>"+"<"+"/script>");
	</script>
	
<![endif]-->
<script src="/views/templates/admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/views/templates/admin/js/bootstrap.min.js"></script>	


<!-- page scripts -->
<script src="/views/templates/admin/js/jquery-ui-1.10.4.min.js"></script>
<script src="/views/templates/admin/js/query.ui.touch-punch.min.js"></script>
<script src="/views/templates/admin/js/moment.min.js"></script>
<script src="/views/templates/admin/js/fullcalendar.min.js"></script>
<!--[if lte IE 8]>
	<script language="javascript" type="text/javascript" src="plugins/excanvas/excanvas.min.js"></script>
<![endif]-->
<script src="/views/templates/admin/js/jquery.flot.min.js"></script>
<script src="/views/templates/admin/js/jquery.flot.pie.min.js"></script>
<script src="/views/templates/admin/js/jquery.flot.stack.min.js"></script>
<script src="/views/templates/admin/js/jquery.flot.resize.min.js"></script>
<script src="/views/templates/admin/js/jquery.flot.time.min.js"></script>
<script src="/views/templates/admin/js/jquery.flot.spline.min.js"></script>
<script src="/views/templates/admin/js/xcharts.min.js"></script>
<script src="/views/templates/admin/js/jquery.autosize.min.js"></script>
<script src="/views/templates/admin/js/jquery.placeholder.min.js"></script>
<script src="/views/templates/admin/js/jquery.dataTables.min.js"></script>
<script src="/views/templates/admin/js/dataTables.bootstrap.min.js"></script>
<script src="/views/templates/admin/js/raphael.min.js"></script>
<script src="/views/templates/admin/js/morris.min.js"></script>
<script src="/views/templates/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/views/templates/admin/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="/views/templates/admin/js/gdp-data.js"></script>	
<script src="/views/templates/admin/js/gauge.min.js"></script>


<!-- theme scripts -->
<script src="/views/templates/admin/js/SmoothScroll.js"></script>
<script src="/views/templates/admin/js/jquery.mmenu.min.js"></script>
<script src="/views/templates/admin/js/core.min.js"></script>
<script src="/views/templates/admin/js/d3.min.js"></script>	

<!-- inline scripts related to this page -->
<script src="/views/templates/admin/js/index.js"></script>	

<!-- end: JavaScript-->
	</head>
</head>

<body>
	<!-- start: Header -->
	<div class="navbar" role="navigation">
	
		<div class="container-fluid">		
			
			<ul class="nav navbar-nav navbar-actions navbar-left">
				<li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
				<li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>			
			</ul>

	        <ul class="nav navbar-nav navbar-right">
				<li class="dropdown visible-md visible-lg">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_COOKIE['Email']?></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Status: <?php echo Header::getStatus($_COOKIE['Email']);?></strong>
						</li>						
	        		</ul>
	      		</li>
				<li><a href="/logout"><i class="fa fa-power-off"></i></a></li>
			</ul>
		</div>
	</div>
	<!-- end: Header -->
	<div class="container-fluid content">
	
		<div class="row">
				
			<?php require_once 'menu.php';?>
		
		<!-- start: Content -->
		<div class="main">
			<?php
				// var_dump($breadCrumb);
			?>
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> <?=$title?></h3>
					<?php require_once 'breadcrumb.php';?>
				</div>
			</div>
	