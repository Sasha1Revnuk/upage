<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
    <title>UPage | <?php echo $title?></title>
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
                        <li class="highlight with-sep"><a href="/admin/main" title="">Welcome <?php echo $name?></a></li>
                <?php }    ?>                  
                </ul>
            </nav>

            <a class="menu-toggle" href=""><span>Menu</span></a>
           
       </div>       
       <?php
if (isset($user) == false || $user == 'Guest') {
?>
    <style>
        body{
            background: #14181E;
        }
        .sticky {
            background: #14181E;
        }
        a{
            color:white;
        }
        a:visited{
            color:white;
        }
        a:hover{
            color:red;
        }

        #features {
        background: #090909 url(/Users/backgrounds/bg.jpg) no-repeat center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        color: white;
        }

        #features .section-intro h1 {
        color: white;
        }

        footer {
            color: #465166;
        }

        #features .section-intro h5 {
        color: rgba(255, 255, 255, 0.5);
    }
    #features .section-intro p {
        color: rgba(255, 255, 255, 0.7);
    }
    #go-top a {
        background: #048a7c;
        color: #FFFFFF;
    }

    .main-navigation li.highlight a {
        color: #05bca9;
    }
    .section-intro .with-bottom-line::after {
        background-color: #05bca9;
    }

    footer a, footer a:visited {
        color: #05bca9;
    }
    </style>
<?php 
} else {
    require_once 'styles.php';
}
?>

   </header> <!-- /header -->
