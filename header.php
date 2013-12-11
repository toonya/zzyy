<!DOCTYPE html>
<html>
  <head>
    <title><?php echo bloginfo('blogname'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body>
  	<header>
    	<div class="container">
    		<div class="logo">
    			<a href="<?php bloginfo('url');?>"><img  class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" /></a>
    		</div>
    		<!--
<div class="pull-right nav-wrapper">
    						<?php 
    							//wp_nav_menu(array('menu' => 'zzyy', 'menu_class' => 'nav nav-pills','container'=>'false')) 
    						?>
    		</div>
-->
    	</div>
  	</header>
    <div id="banner">
	    <div id="carousel-example-generic" class="carousel slide container" data-interval="3000" data-ride="carousel">
	      <!-- Indicators -->
<!--
	      <ol class="carousel-indicators">
	        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	      </ol>
-->
	    
	      <!-- Wrapper for slides -->
	      <div class="carousel-inner">
	        <div class="item active">
	          <div style="background:url(<?php echo get_template_directory_uri(); ?>/images/gardening_1.jpg)"></div>
	        </div>
	        <div class="item">
	          <div style="background:url(<?php echo get_template_directory_uri(); ?>/images/gardening_2.jpg)"></div>
	        </div>
	        <div class="item">
	          <div style="background:url(<?php echo get_template_directory_uri(); ?>/images/gardening_3.jpg)"></div>
	        </div>
	      </div>
	    
	      <!-- Controls -->
	      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	      </a>
	      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
	      </a>
	    </div>
    </div>
