<!DOCTYPE html>
<html>
  <head>
    <title><?php echo bloginfo('blogname'); ?></title>
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
  <body class="home">
  	<header>
	  	<ul id="bonsai-tab" class="nav nav-tabs">
		  <li class="active"><a href="#bonsai" data-toggle="tab">盆景</a></li>
		  <li><a href="#greentree" data-toggle="tab">景观树</a></li>
		</ul>
	  	<h1>中正园艺</h1>
	  	<span class="glyphicon glyphicon-leaf leaf"></span>
  	</header>
