<?php

/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

global $post, $same_cat, $gallery;
$gallery = array();
$post_type = get_post_type( $post );

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
	/* grab the custom post variables */
	$custom = get_post_custom();

	// Client
	if(isset($custom['single_client'])) { $single_client = get_post_custom_values($key = 'single_client')[0]; }

	// Year
	if(isset($custom['single_year'])) { $single_year = get_post_custom_values($key = 'single_year')[0]; }

	// Role
	if(isset($custom['single_role'])) { $single_role = get_post_custom_values($key = 'single_role')[0]; }	
?>

<main id="single">
	<div id="body">
		
	<?php if ( get_post_meta( get_the_ID(), 'gallery_data', true ) ) : 
		$gallery = get_post_meta( get_the_ID(), 'gallery_data', true );
	?>
	<div class="owl-carousel slideshow">

	<?php foreach($gallery as $key => $value) : 
		foreach ($value as $i) :
	?>
	<div class="item"><div align="center">	
	<a href="<?php echo $i; ?>"><img src="<?php echo $i; ?>" class="fancybox" alt="" style="width: 100%;" /></a>
	</div></div>
		
	<?php endforeach; endforeach; ?>

	</div>
	<?php endif; ?>
		
	<div style="height: 50px;"></div>
	
	<h2 style="color: var(--accent-color);"><?php echo get_the_title(); ?></h2>
		
	<div class="port-single-left">
		<h4 style="margin: 0;">Description</h4>
		<?php echo the_content(); ?>
	</div>

	<div class="port-single-right">
		<?php if ( $single_client ) : ?>
			<h4 style="margin: 0;">Client</h4>
			<p><?php echo $single_client; ?></p>
		<?php endif; ?>
		
		<?php if ( $single_year ) : ?>
			<h4 style="margin: 0;">Year</h4>
			<p><?php echo $single_year; ?></p>
		<?php endif; ?>
		
		<?php if ( $single_role ) : ?>
			<h4 style="margin: 0;">Role</h4>
			<p><?php echo $single_role; ?></p>
		<?php endif; ?>
	</div>

	<div style="clear: both;"></div>
	
	</div>
		
</main>
</div>
</div>

<?php

/************************************/
/* arrows to previous and next post */
/************************************/

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) :
	echo "<div class='bottom-arrows'>";
	if( $prev_post ) 
	{
		$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
		echo '<h5><a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="arrow prev" style="color: #8E8E8E;">&#10094;&nbsp;' . $prev_title . 	'</a></h5>';
	}

	if( $next_post ) 
	{
		$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
		echo '<h5><a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="arrow next" style="color: #8E8E8E;">' . $next_title . '&nbsp;&#10095;</a></h5>';
	}
	echo "</div>";
endif;

endwhile; endif;

get_footer();

?>

<style>
	.bottom-arrows
	{
		margin: 0 5% 25px 5%;
	}
	.arrow.prev
	{
		float: left;
	}
	.arrow.next
	{
		float: right;
	}
	
	/* clearfix */
	 .owl-carousel .owl-wrapper:after 
	{
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0;
	 }
	/* display none until init */
	.owl-carousel 
	{
		display: none;
		position: relative;
		width: 100%;
		-ms-touch-action: pan-y;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	.owl-carousel .owl-wrapper 
	{
		display: none;
		position: relative;
		-webkit-transform: translate3d(0px, 0px, 0px);
	}
	.owl-carousel .owl-wrapper-outer 
	{
		overflow: hidden;
		position: relative;
	}
	.owl-carousel .owl-stage-outer
	{
		width: calc(100% - 75px);
		margin: 0 auto;
	}
	.owl-carousel .owl-wrapper-outer.autoHeight 
	{
		-webkit-transition: height 500ms ease-in-out;
		-moz-transition: height 500ms ease-in-out;
		-ms-transition: height 500ms ease-in-out;
		-o-transition: height 500ms ease-in-out;
		transition: height 500ms ease-in-out;
	}
	.slideshow
	{
		padding: 0 !important;
	}
	.slideshow img
	{
		display: block;
		width: 100%;
		height: auto;	
	}
	.owl-carousel .nav-btn 
	{
	   height: 23px;
	   width: 23px;
	   cursor: pointer;
	   z-index: 10;
	}
	.owl-nav
	{
		width: 100%;
		overflow: hidden;
		position: absolute;
	}
	.owl-carousel .owl-prev.disabled, .owl-carousel .owl-next.disabled
	{
		pointer-events: none;
		opacity: 0.2;
	}
	.owl-carousel .owl-nav button.owl-prev
	{
		float: left;
	}
	.owl-carousel .owl-nav button.owl-next
	{
		float: right;
	}
	.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev
	{
		width: auto;
		margin: 0;
		min-width: unset;
	}
	.owl-carousel .prev-slide 
	{
		background: url("<?php bloginfo('template_url'); ?>/images/slider_gray_left.png") center / contain no-repeat scroll;
		z-index: 2;
		opacity: 0.5;
	}
	.owl-carousel .next-slide 
	{
		background: url("<?php bloginfo('template_url'); ?>/images/slider_gray_right.png") center / contain no-repeat scroll;
		z-index: 2;
		opacity: 0.5;
	}
	.owl-dots 
	{
		margin: 15px auto 0px auto;
		text-align: center;
	}
	.owl-dot 
	{
		width: 12px;
		height: 12px;
		border-radius: 100%;
		padding:0px;
		border: 1px solid #515666;
		background: #ffffff;
		margin-right: 5px;
		display: inline-block;
		min-width: unset !important;
		}
	.owl-dot.active 
	{
		 background: #515666;
	}
	</style>

	<style type="text/css">/**
	   * Owl Carousel v2.3.4
	   * Copyright 2013-2018 David Deutsch
	   * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
	   */
	   .owl-carousel,.owl-carousel .owl-item{-webkit-tap-highlight-color:transparent;position:relative}.owl-carousel{display:none;width:100%;z-index:1}.owl-carousel .owl-stage{position:relative;-ms-touch-action:pan-Y;touch-action:manipulation;-moz-backface-visibility:hidden}.owl-carousel .owl-stage:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}.owl-carousel .owl-stage-outer{position:relative;overflow:hidden;-webkit-transform:translate3d(0,0,0)}.owl-carousel .owl-item,.owl-carousel .owl-wrapper{-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0)}.owl-carousel .owl-item{min-height:1px;float:left;-webkit-backface-visibility:hidden;-webkit-touch-callout:none}.owl-carousel .owl-item img{display:block;width:100%}.owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled{display:none}.no-js .owl-carousel,.owl-carousel.owl-loaded{display:flex}.owl-carousel .owl-dot,.owl-carousel .owl-nav .owl-next,.owl-carousel .owl-nav .owl-prev{cursor:pointer;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel .owl-nav button.owl-next,.owl-carousel .owl-nav button.owl-prev{background:0 0;color:inherit;border:none;padding:0!important;font:inherit}.owl-carousel.owl-loading{opacity:0;display:block}.owl-carousel.owl-hidden{opacity:0}.owl-carousel.owl-refresh .owl-item{visibility:hidden}.owl-carousel.owl-drag .owl-item{-ms-touch-action:pan-y;touch-action:pan-y;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel.owl-grab{cursor:move;cursor:grab}.owl-carousel.owl-rtl{direction:rtl}.owl-carousel.owl-rtl .owl-item{float:right}.owl-carousel .animated{animation-duration:1s;animation-fill-mode:both}.owl-carousel .owl-animated-in{z-index:0}.owl-carousel .owl-animated-out{z-index:1}.owl-carousel .fadeOut{animation-name:fadeOut}@keyframes fadeOut{0%{opacity:1}100%{opacity:0}}.owl-height{transition:height .5s ease-in-out}.owl-carousel .owl-item .owl-lazy{opacity:0;transition:opacity .4s ease}.owl-carousel .owl-item .owl-lazy:not([src]),.owl-carousel .owl-item .owl-lazy[src^=""]{max-height:0}.owl-carousel .owl-item img.owl-lazy{transform-style:preserve-3d}.owl-carousel .owl-video-wrapper{position:relative;height:100%;background:#000}.owl-carousel .owl-video-play-icon{position:absolute;height:80px;width:80px;left:50%;top:50%;margin-left:-40px;margin-top:-40px;background:url(owl.video.play.png) no-repeat;cursor:pointer;z-index:1;-webkit-backface-visibility:hidden;transition:transform .1s ease}.owl-carousel .owl-video-play-icon:hover{-ms-transform:scale(1.3,1.3);transform:scale(1.3,1.3)}.owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn{display:none}.owl-carousel .owl-video-tn{opacity:0;height:100%;background-position:center center;background-repeat:no-repeat;background-size:contain;transition:opacity .4s ease}.owl-carousel .owl-video-frame{position:relative;z-index:1;height:100%;width:100%}
	</style>

	<script type="text/javascript">
	$(document).ready(function() 
	{
	   var Owl = {
	   init: function() {
	   Owl.carousel();
	   },
	   carousel: function() {
		   var owl;
		   owl = $('.slideshow').owlCarousel({
			   autoHeight: true,
			   smartSpeed: 0,
			   center: false, 
			   nav: true,
			   dots: true,
			   loop: true,
			   lazyLoad: true,
			   margin: 0,
			   navText: ["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
			   dotsEach: false,
			   responsive: {
				   0: {
					   nav: false,
					   items: 1,
				   },
				   768: {
					   nav: false,
					   items: 1,
				   },
				   1280: {
					   nav: true,
					   items: 1,
				   }
			   }
		   }); 
	   }
	   };
		Owl.init();
	});
	</script>