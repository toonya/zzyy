<!-- Modal -->
<div class="modal fade" id="fullImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-primary">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <!--
<div class="modal-footer text-muted">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="primary">
<!-- 	<section class="bonsai col-lg-9 col-md-9 col-sm-12 col-xs-12"> -->
	<ul id="bonsai-tab" class="nav nav-tabs nav-justified">
	  <li class="active"><a href="#bonsai" data-toggle="tab">盆景</a></li>
	  <li><a href="#greentree" data-toggle="tab">景观树</a></li>
	</ul>
	<div class="tab-content">
		<section id="bonsai" class="bonsai active tab-pane">
		<div class="container">
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
						$meta_showcase = get_post_meta( $post->ID, 'showcase', true );
		  			  	?>
		  			  	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 item">

		  				    <div class="thumbnail">
		  				      <a data-toggle="modal" href="#fullImage" class=""><img class="img-responsive" src="<?php echo esc_attr($coverpage); ?>?imageView/1/w/300/q/85" data-full-src="<?php echo esc_attr($coverpage) ?>" data-showcase="<?php if($meta_showcase) echo join(' ',$meta_showcase); ?>" title="点击查看大图"></a>
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
	  </div>
	</section>
		<section id="greentree" class="bonsai greentree tab-pane">
		<div class="container">
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
		  				      <a data-toggle="modal" href="#fullImage" class=""><img class="img-responsive" src="<?php echo esc_attr($coverpage); ?>?imageView/1/w/300/q/85" data-full-src="<?php echo esc_attr($coverpage) ?>" data-showcase="<?php if($meta_showcase) echo join(' ',$meta_showcase); ?>" title="点击查看大图"></a>
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
	  </div>
	</section>
	</div>
	<div class="clearfix"></div>
</div>
