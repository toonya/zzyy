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
        <?php
            $banner_list = get_option('bannerlist');
            $banner_control = '';
            $nav_animation = true;
			if($banner_list):;
        ?>

	    <div id="carousel-example-generic" class="carousel slide" data-interval="3000" data-ride="carousel">
	      <!-- Wrapper for slides -->

	      <div class="carousel-inner">
	      	<?php
            	foreach($banner_list as $key=>$item) {
                	if($key==0) {
						?>
						<div class="item active">
					      <img src="<?php echo $item['imgurl']?>" />
					    </div>
						<?
                	}
                	else {
						?>
						<div class="item">
					      <img src="<?php echo $item['imgurl']?>" />
					    </div>
						<?
                	}
            	}
        	?>
	      </div>

	      <!-- Controls -->
	      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	      </a>
	      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
	      </a>
	    </div>
	    <?php endif;?>
    </div>
