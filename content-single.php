<?php
	$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	$coverpage = $full_image_url[0];
	$img_counter = 1;
	$meta_showcase = get_post_meta( $post->ID, 'showcase', true );
	if($meta_showcase){
		$img_counter += sizeof($img_counter);
		foreach($meta_showcase as $index => $imgSrc) {
			$meta_showcase[$index] = preg_replace('/-150x150/', '', $imgSrc);
		}
	}
?>

<div class="primary single">
	<div class="img-showcase">
		<div id="carousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel" data-slide-to="0" class="active"></li>
		    <?php
				for($i=1;$i<$img_counter;$i++)
		    		echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
		    ?>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="<?php echo $coverpage;?>" alt="cover page">
		    </div>
		    <?php
			    for($i=1;$i<$img_counter;$i++){
			    	$index = $i-1;
				    echo '<div class="item"><img src="'.$meta_showcase[$index].'" alt="o"></div>';
			    }
		    ?>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div>
	</div>
	<div class="advice text-primary text-center visible-xs" >如果您正在使用移动设备，请旋转移动设备至横屏状态。<br />以便获得更好的视觉体验。</div>
</div>