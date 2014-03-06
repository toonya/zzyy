<div class="primary">
<!-- 	<section class="bonsai col-lg-9 col-md-9 col-sm-12 col-xs-12"> -->
	<div class="tab-content">
		<section id="bonsai" class="bonsai active tab-pane">
		<div class="row item-wrapper">
			<?php
	  			  $args = array(
	  			          'posts_per_page'  => 50,
	  			          'numberposts'     => 50,
	  			          'offset'          => 0,
	  			          'category'        => '',
	  			          'orderby'         => 'post_date',
	  			          'order'           => 'DESC',
	  			          'include'         => '',
	  			          'exclude'         => '',
	  			          'meta_key'        => '',
	  			          'meta_value'      => '',
	  			          'post_type'       => 'bonsai',
	  			          'post_mime_type'  => '',
	  			          'post_parent'     => '',
	  			          'post_status'     => 'publish',
	  			          'suppress_filters' => true );

	  			  // The Query
	  			  $bonsai = new WP_Query( $args );

	  			  // The Loop
	  			  while ( $bonsai->have_posts() ) :
	  			  	$bonsai->the_post();
	  			  	$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	  			  	$coverpage = $full_image_url[0];
	  			  	?>
	  			  	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 item">

	  				    <div class="thumbnail">
	  				      <a href="<?php the_permalink()?>" class=""><img class="img-responsive" src="<?php echo esc_attr($coverpage); ?>?imageView2/0/w/600/q/20" title="点击查看大图"></a>
	  				      <div class="caption">
	  				        <h4 class=""><?php the_title()?></h4>
	  				        <div class="desc text-muted"><?php /* echo get_post_meta(get_the_ID(), 'excerpt', true ) */ //the_content(); ?></div>
	  	<!-- 			        <p><a href="#" class="btn btn-primary">Button</a> <a href="#" class="btn btn-default">Button</a></p> -->
	  				      </div>
	  				    </div>

	  			  	</div>
	  					<?php
	  			  endwhile;

	  			  /* Restore original Post Data
	  			   * NB: Because we are using new WP_Query we aren't stomping on the
	  			   * original $wp_query and it does not need to be reset.
	  			  */
	  			  wp_reset_postdata();


	  	?>
	  </div>
	</section>
		<section id="greentree" class="bonsai greentree tab-pane">
		<div class="row item-wrapper">
			<?php
	  			  $args = array(
	  			          'posts_per_page'  => 50,
	  			          'numberposts'     => 50,
	  			          'offset'          => 0,
	  			          'category'        => '',
	  			          'orderby'         => 'post_date',
	  			          'order'           => 'DESC',
	  			          'include'         => '',
	  			          'exclude'         => '',
	  			          'meta_key'        => '',
	  			          'meta_value'      => '',
	  			          'post_type'       => 'greentree',
	  			          'post_mime_type'  => '',
	  			          'post_parent'     => '',
	  			          'post_status'     => 'publish',
	  			          'suppress_filters' => true );

	  			  // The Query
	  			  $greentree = new WP_Query( $args );

	  			  // The Loop
	  			  while ( $greentree->have_posts() ) :
	  			  	$greentree->the_post();
	  			  	$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	  			  	$coverpage = $full_image_url[0];
		$meta_showcase = get_post_meta( $post->ID, 'showcase', true );
	  			  	?>
	  			  	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 item">

	  				    <div class="thumbnail">
	  				      <a href="<?php the_permalink()?>" class=""><img class="img-responsive" src="<?php echo esc_attr($coverpage); ?>?imageView/1/w/300/q/85" title="点击查看大图"></a>
	  				      <div class="caption">
	  				        <h4 class=""><?php the_title()?></h4>
	  				        <div class="desc text-muted"></div>
	  				      </div>
	  				    </div>

	  			  	</div>
	  					<?php
	  			  endwhile;

	  			  /* Restore original Post Data
	  			   * NB: Because we are using new WP_Query we aren't stomping on the
	  			   * original $wp_query and it does not need to be reset.
	  			  */
	  			  wp_reset_postdata();


	  	?>
	  </div>
	</section>
	</div>
	<div class="clearfix"></div>
</div>
