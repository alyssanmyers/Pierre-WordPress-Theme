<?php

/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

?>
<!DOCTYPE HTML>
<html>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="author" content="Alyssa Myers">
<meta name="description" content="<?php bloginfo( 'description' );?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
	<?php bloginfo( 'name' );
        if ( !is_front_page() && is_category() ) :
            echo '&mdash;' . ucfirst(get_queried_object()->slug);
		elseif ( !is_front_page() ) : 
			echo '&mdash;' . get_the_title();
		elseif ( is_404() ) :
			echo '&mdash;' . 'Page Not Found!';
		endif; 
	?>
</title>

<?php
	wp_head();
	
	$portfolio_pieces = new WP_Query([
			'category_name' => '',
			'post_type' => 'port_pieces',
			'has_password'   => FALSE,
		]);
?>

</head>

<body>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	
	?>
	<?php endwhile; endif; ?>
		
		<div class="burger-menu"><ul><li></li><li></li><li></li></ul>
			<img class="close-button" src="<?php bloginfo('template_url'); ?>/images/close.svg"/>
		</div>	
	
		<nav class="header-display">
			
			<ul style="float: left;" class="header-name">
				<li>
					<a href="<?php echo get_site_url(); ?>"><h2 class="header-name">Pierre George <span style="color: var(--accent-color);">Abdelmalak</span></h2></a>
				</li>
			</ul>
			
			<ul class="navigation">
				<?php 					 
						$args = array(
									'theme_location'  => 'nav-menu',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap' 	  => '%3$s',
									'depth'           => 0,
									'walker'          => '',
									'add_li_class'  => 'animate__animated animate__fadeInDown'
								);
						//wp_nav_menu( $args );
		
					?>
				<?php if ($portfolio_pieces->have_posts() ) : ?><li><a href="<?php echo get_site_url(); ?>/#portfolio">Work</a></li><?php endif; ?>
				
				<li><a href="<?php echo get_site_url(); ?>/#about">About</a></li>
				
				<li><a href="<?php echo get_site_url(); ?>/#">Résumé</a></li>
				
				<li><a href="#contact">Contact</a></li>
				
				
				<li class="social">
					<a href="//linkedin.com/in/pierre-george-40b189209/" class="social" target="_blank">
						<img class="social-icon first" src="<?php bloginfo('template_url'); ?>/images/linkedin.svg" alt="Linkedin" />
					</a>
					<a href="//instagram.com/pierre_george2/" class="social" target="_blank">
						<img class="social-icon" style="margin-bottom: -1px;" src="<?php bloginfo('template_url'); ?>/images/instagram.svg" alt="Check Out My Instagram" />
					</a>
					<a href="mailto:contact@pierregeorge.art" class="social">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/mail.svg" alt="Get in Touch" />
					</a>
				</li>
			</ul>
		
		</nav>
	
		<div id="wrapper">
		<div id="container" class="clearfix">