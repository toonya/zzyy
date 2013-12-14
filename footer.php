
		<footer>
			<div class="container">
				<?php echo esc_attr(get_option('footer_contact'));?>
			</div>
		</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/fn.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>