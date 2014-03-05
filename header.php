<!DOCTYPE html>
<html>
  <head>
    <title><?php echo bloginfo('blogname'); ?> | <?php echo get_the_title()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" media="screen">
	<script src="<?php echo get_template_directory_uri(); ?>/js/prefixfree.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body style="overflow:scroll">
  	<header class="single">
    	<div class="nav">
    		<a href="<?php bloginfo('url');?>">首页</a>
    		<a class="current-page" href="<?php echo get_permalink()?>"><?php echo get_the_title()?></a>
    	</div>
  	</header>