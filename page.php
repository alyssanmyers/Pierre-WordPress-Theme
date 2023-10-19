<?php 

/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

get_header();

$page_title = $wp_query->post->post_title;

if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<main>
        <?php echo the_content(); ?>
	</main>
		
	</div> <!-- end container -->
</div> <!-- end wrapper -->
			
<?php

get_footer();

endwhile; endif; 
?>
