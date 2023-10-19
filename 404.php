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
?>
	
		
	<div id="error" style="
		
	">
	<main>
		<div id="bg">
			<div id="bg-container">
				<h1 class="header-display">Error 404</h1>
				<hr>
				<h4 class="body-text">Oops, something went wrong.</h4>
			</div>

		</div>
	
	</div>
	</div>

	</main>
<?php get_footer(); ?>
	
	<style>
		
		html
		{
			background-color: #fff;
		}
		
		header
		{
			position: fixed;
		}
		
		hr
		{
			margin: 0.10em 75% 0.5em 0;
			border: none;
			border-top: 1px solid #e7ae4d;
		}
		
		main h1
		{
			color: #4eafaa; 
			font-size: 24px;
			text-transform: lowercase;
		}
		
		h4
		{
			color: #000; 
			font-size: 30px;
		}
		
		#bg
		{
			display: table;
			width: 20%;
			margin: 0 auto;
		}
		
		#bg-container
		{
			display: table-cell;
			position: relative;
			vertical-align: middle;
			width: 25%;
			z-index: 1;
		}
		
		#bg-container::before
		{
			content: "";
			//background: url(<?php bloginfo('template_directory'); ?>/images/AM-Logo.png) center/75% no-repeat;
			opacity: 0.35;
			top: 0; left: 0; bottom: 0; right: 0;
			position: absolute;
			z-index: -1;
		}
	</style>

