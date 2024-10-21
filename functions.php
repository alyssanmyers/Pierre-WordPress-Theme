<?php

/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

	require_once('functions/dashboard-widgets.php');  // Dashboard Widgets

	add_theme_support( 'post-thumbnails' );

	/***************/
	/* CUSTOM MENU */
	/***************/	

	/* registers that there is a customer navigation menu in the customization */
	function register_my_menus() 
	{
	  register_nav_menus(
		array(
		  'nav-menu' => __( 'Navigation Menu' )
		)
	  );
	}
	/* adds the class 'plain' to each link in this nav */
	function add_menuclass($ulclass) 
	{
		return preg_replace('/<a /', '<a class="plain"', $ulclass);
	}
	/* adds the toggle-arrow div before the sub-menu */
	function add_menuclass2($ulclass) 
	{
		return preg_replace('/<ul /', '<div class="toggle-arrow arrow-collapsed"></div><ul ', $ulclass);
	}
	add_action( 'init', 'register_my_menus' );

	/**************/
	/* SAVING CSS */
	/**************/

	function wnt_customizer_css() 
	{
		?>
		<style type="text/css">
		</style>
		
		<script>
			$( document ).ready(function() 
			{
				
			});
		</script>
		<?php
	}
	add_action( 'wp_head', 'wnt_customizer_css' );

	/**************/
	/* CONNECT JS */
	/**************/

	function scripts_main() 
	{ 
		/* register all css */
		wp_register_style( 'style',  get_template_directory_uri() .'/style.css', array(), null, 'all' );
		wp_register_style( 'animate.min',  get_template_directory_uri() .'/animate.min.css', array(), null, 'all' );
		
		/* register all js */
		wp_register_script('jquery.min', get_stylesheet_directory_uri().'/js/jquery.min.js');
		wp_register_script('script', get_stylesheet_directory_uri().'/js/script.js');
		wp_register_script('carousel', get_stylesheet_directory_uri().'/js/owl.carousel.min.js');
		
		/* call all stylesheets and scripts */
		wp_enqueue_style( 'style' );
		wp_enqueue_script( 'jquery.min' );
		wp_enqueue_style( 'animate.min' );
		wp_enqueue_script( 'script' );
		wp_enqueue_script( 'carousel' );
		
		wp_localize_script( 'script', 'ajax_posts', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		/*'noposts' => __('No older posts found', 'pierregeorge'),*/
	));
	}

	/* web fonts */
	function google_fonts() 
	{
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400;1,9..40,500;1,9..40,700&family=Young+Serif&display=swap', false );
	}

	function disable_fancybox()
	{
		?>
		<script type="text/javascript">
			var pixelRatio = window.devicePixelRatio || 1;
			if(window.innerWidth < 641 ) 
			{
			  easy_fancybox_handler = null;
			};
			</script>
		<?php
	}

	function more_post_ajax()
	{
		$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 2;
		$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

		header("Content-Type: text/html");

		$args = array(
			'suppress_filters' => true,
			'category_name' => '',
			'post_type' => 'port_pieces',
			'posts_per_page' => $ppp,
			/*'cat' => 8,*/
			/*'category__not_in' => array(get_cat_ID('Feature')),*/
			'paged'    => $page,
		);

		$loop = new WP_Query($args);

		$out = '';

		if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
			$out .= '
			<li class="animateBottom animate__animated animate__fadeInDown">
				<a href="' . get_the_permalink() . '">
					<div class="text">
						<h2 class="animateTop animate__animated animate__fadeInUp" style="color: #ffffff; margin: 0; padding: 0;">'
							. get_the_title() .
							'<br />
							</h2>
						<h3 class="animate__animated animate__fadeInUp" style="animation-delay: 0.25s; margin: 0; font-weight: normal;">';
		
							$categories = get_the_category();
							$count = 0;
							foreach( $categories as $category) 
							{
								$out .= $category->name;
								if (++$count >= count($categories) ) { break; }
								$out .= ', ';
							} 
		
			$out .= '</h3>' .
					'</div>' .
					'<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '" />' .
				'</a>
			</li>
			';

		endwhile;
		endif;
		wp_reset_postdata();
		die($out);
	}

	add_action('wp_enqueue_scripts', 'scripts_main');
	add_action('wp_enqueue_scripts', 'google_fonts');
	//add_action('wp_footer', 'disable_fancybox');

	add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
	add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


?>