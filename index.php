<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('home'); ?>



	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'home' ); ?>
	<?php endwhile; // end of the loop. ?>




<?php get_footer('home'); ?>