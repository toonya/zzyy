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
  <body class="404">
  	<div>
	  	<span class="glyphicon glyphicon-leaf">抱歉，没有发现您要找的东西。</span>
	  	<a href="<?php bloginfo('url');?>">返回中正园艺首页</a>
  	</div>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>