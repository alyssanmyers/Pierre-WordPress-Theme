<?php

/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

get_header('home');

?>

<main style="width: 100%; padding: 0;">
	
	<?php
		$count = 1;
	
		/* querying posts */
	
		$intro_post = new WP_Query([
			'post_type'  => 'post',
			'title' => 'Intro',
		]);
	
		$quick_bio_post = new WP_Query([
			'post_type'  => 'post',
			'title' => 'Quick Bio',
		]);
	
		$featured_work = new WP_Query( [
			'category_name' => 'Feature',
			'post_type' => 'port_pieces',
			'has_password'   => FALSE
		]);
	
		$portfolio_pieces = new WP_Query([
			'category_name' => '',
			'post_type' => 'port_pieces',
			'posts_per_page' => 4,
			'has_password'   => FALSE,
			'category__not_in' => array(get_cat_ID('Feature'))
		]);
	
		$about_post = new WP_Query([
			'post_type'  => 'post',
			'title' => 'About',
		]);
	?>
	
<!----------------------------------->
<!--		INTRO SECTION		   -->
<!----------------------------------->
	
	<section id="intro" class="clearfix">
		<div class="intro-left">
			<div class="intro-left-copy">
				<?php if ( $intro_post->have_posts() ) : $intro_post->the_post(); 
				
					/* grab the custom post variables */
					$custom = get_post_custom();
				
					// H1 Headline
					if(isset($custom['intro_adjectives'])) { $intro_adjectives = get_post_custom_values($key = 'intro_adjectives')[0]; }
					else { $intro_adjectives = "Designer.<br>Marketer.<br>Innovator."; }	
				
					// CTA
					if(isset($custom['intro_cta'])) { $intro_cta = get_post_custom_values($key = 'intro_cta')[0]; }
					else { $intro_cta = "Get In Touch"; }	
				
					// CTA Link
					if(isset($custom['intro_cta_link'])) { $intro_cta_link = get_post_custom_values($key = 'intro_cta_link')[0]; }
					else { $intro_cta_link = "#contact"; }	
				?>
				
				<h1><?php echo $intro_adjectives; ?></h1>
				<p><?php echo the_content(); ?></p>
				
				<ul class="social">
					<li><a href="//linkedin.com/in/pierre-george-40b189209/" class="social" target="_blank">
						<img class="social-icon first" src="<?php bloginfo('template_url'); ?>/images/linkedin.svg" alt="Linkedin" />
					</a></li>
					<li><a href="//instagram.com/pierre_george2/" class="social" target="_blank">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/instagram.svg" alt="Check Out My Instagram" />
					</a></li>
					<li><a href="mailto:contact@pierregeorge.art" class="social">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/mail.svg" alt="Get in Touch" />
					</a></li>
				</ul>
				
				<a href="<?php echo $intro_cta_link ?>" class="cta-button"><?php echo $intro_cta; ?></a>
				
				<?php else : ?>
				<!-- default info -->
				<h1>Designer.<br>Marketer.<br>Innovator.</h1>
				<p>Hi! My name is Pierre Abdelmalak, a versatile designer and marketer with a passion for bringing creative visions to life.</p>
				
				<ul class="social">
					<li><a href="//linkedin.com/in/pierre-george-40b189209/" class="social" target="_blank">
						<img class="social-icon first" src="<?php bloginfo('template_url'); ?>/images/linkedin.svg" alt="Linkedin" />
					</a></li>
					<li><a href="//instagram.com/pierre_george2/" class="social" target="_blank">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/instagram.svg" alt="Check Out My Instagram" />
					</a></li>
					<li><a href="mailto:contact@pierregeorge.art" class="social">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/mail.svg" alt="Get in Touch" />
					</a></li>
				</ul>
				
				<a href="#about" class="cta-button">More About Me</a>
				<?php endif; ?>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>

<!----------------------------------->
<!--	FEATURED WORK SECTION	   -->
<!----------------------------------->

		<div class="intro-right clearfix">
			<ul id="port-highlight">
			<?php if ( $featured_work->have_posts() ) : ?>
				<?php while ( $featured_work->have_posts() ) : $featured_work->the_post(); ?>
			
				<?php
				echo '<li>';
					echo '<a href="' . get_the_permalink() . '">';
						echo '<div class="text">';
							echo '<h2 class="animateTop animate__animated animate__fadeInUp" style="color: #ffffff; margin: 0; padding: 0;">';
								echo get_the_title()
									. '<br />';
							echo '</h2>';
						echo '<h3 class="animate__animated animate__fadeInUp" style="animation-delay: 0.25s; margin: 0; font-weight: normal;">';
							$categories = get_the_category();
							$count = 0;
							foreach( $categories as $category) 
							{
								if ($category->name != 'Feature') { echo $category->name; }
								if (++$count >= count($categories) ) { break; }
								if ($category->name != 'Feature') { echo ", "; }
							}
							echo '</h3>';
						echo '</div>';
						echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '" />';
					echo '</a>';
				echo '</li>';
				?>
			<?php endwhile; ?>
			</ul>
			
			<a href="#portfolio" class="cta-button" style="margin: 25px auto; display: flex; justify-content: center; border: 0;">View More Projects ↓</a>
			
			<?php endif; ?>
			<li style="height: 100%; background-image: url('<?php bloginfo('template_url') ?>/images/pierre_ny.jpeg'); background-position: center; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;"><a href="<?php bloginfo('template_url');?>/images/pierre_ny.jpeg" alt="" class="fancybox"></a></li>
			
			<li style="height: 100%; background-image: url('<?php bloginfo('template_url'); ?>/images/pierre_egypt.jpeg'); background-position: center 65%; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;"><a href="<?php bloginfo('template_url');?>/images/pierre_egypt.jpeg" alt="" class="fancybox"></a></li>
			
			<li style="height: 100%; background-image: url('<?php bloginfo('template_url'); ?>/images/pierre_akron.jpeg'); background-position: center; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;"><a href="<?php bloginfo('template_url');?>/images/pierre_akron.jpeg" alt="" class="fancybox"></a></li>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
	
<!----------------------------------->
<!--	  	BIO SECTION			   -->
<!----------------------------------->
	
	<?php if ( $quick_bio_post->have_posts() ) : $quick_bio_post->the_post(); ?>
	<section id="quick-bio">
		<h2 class="highlight animate__animated animate__fadeInUp intro-header">
			<?php echo get_the_content(); ?>
		</h2>
	</section>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	
<!----------------------------------->
<!--	  	FILTER SECTION		   -->
<!----------------------------------->
	
	<?php
		$categories = get_categories([
		  'taxonomy'     => 'category',
		  'type'         => 'post',
		  'child_of'     => 0,
		  'parent'       => '',
		  'orderby'      => 'name',
		  'order'        => 'ASC',
		  'hide_empty'   => 1,
		  'hierarchical' => 1,
		  'exclude'      => '1',
		  'include'      => '',
		  'number'       => 0,
		  'pad_counts'   => false,
		  'exclude' => array(get_cat_ID('Feature'), get_cat_ID('uncategorized'))
		]);
	
		if ( $portfolio_pieces->have_posts() ) : ?>
		<div style="position: relative;">
		<div class="filter">
			<img class="filter-img" src="<?php bloginfo('template_url'); ?>/images/filter.svg"/>	
		<?php	
			
		echo "<ul id='port-cats' class='body-text'>";
			foreach( $categories as $cat ) :
		?>
				  <li class="animate__animated animate__fadeInDown" style="animation-delay:<?php echo $count += 50 ?>ms">
					<a href="<?php echo get_category_link($cat->term_id); ?>"
					 >
					  <?php 
						echo $cat->name;
						?>
					</a>
				  </li>
	  <?php
			endforeach;
		echo "</ul>";
		echo "</div>";
		echo "</div>";
		endif;
	  ?>
		
<!----------------------------------->
<!--	  	WORK SECTION		   -->
<!----------------------------------->
		
		<?php if ( $portfolio_pieces->have_posts() ) : ?>
		<ul id="portfolio" class="anchor">
			
			<?php while ( $portfolio_pieces->have_posts() ) : $portfolio_pieces->the_post(); ?>
			
			<?php
			echo '<li>';
					echo '<a href="' . get_the_permalink() . '">';
						echo '<div class="text">';
							echo '<h2 class="animateTop animate__animated animate__fadeInUp" style="color: #ffffff; margin: 0; padding: 0;">';
								echo get_the_title()
									. '<br />';
							echo '</h2>';
						echo '<h3 class="animate__animated animate__fadeInUp" style="animation-delay: 0.25s; margin: 0; font-weight: normal;">';
							$categories = get_the_category();
							$count = 0;
							foreach( $categories as $category) 
							{
								if ($category->name != 'Feature') { echo $category->name; }
								if (++$count >= count($categories) ) { break; }
								if ($category->name != 'Feature') { echo ", "; }
							}
							echo '</h3>';
						echo '</div>';
						echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '" />';
					echo '</a>';
				echo '</li>';
			?>
			<?php endwhile; ?>
				
			</ul>
		
			<button id="more_posts" class="cta-button" style="margin: 25px auto -75px auto; display: flex; justify-content: center; border: 0;">Load More Projects +</button>
	
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
			
<!----------------------------------->
<!--	  	ABOUT SECTION		   -->
<!----------------------------------->
			
	<?php if ( $about_post->have_posts() ) : $about_post->the_post(); 
				
		/* grab the custom post variables */
		$custom = get_post_custom();

		// H2 Headline
		if(isset($custom['about_header'])) { $about_header = get_post_custom_values($key = 'about_header')[0]; }
		else { $about_header = "Pierre George"; }
			
		// H3 Byline
		if(isset($custom['about_specializations'])) { $about_specializations = get_post_custom_values($key = 'about_specializations')[0]; }
		else { $about_specializations = "Graphic Design, Marketing, Branding"; }
			
		// Skillset
		if(isset($custom['about_skillset'])) { $about_skillset = get_post_custom_values($key = 'about_skillset')[0]; }
		else { $about_skillset = ""; }
			
		// First Skill
		if(isset($custom['about_visual_design'])) { $about_visual_design = get_post_custom_values($key = 'about_visual_design')[0]; }
		else { $about_visual_design = ""; }
			
		// Second Skill
		if(isset($custom['about_ui_ux_design'])) { $about_ui_ux_design = get_post_custom_values($key = 'about_ui_ux_design')[0]; }
		else { $about_ui_ux_design = ""; }
			
		// Third Skill
		if(isset($custom['about_printmaking'])) { $about_printmaking = get_post_custom_values($key = 'about_printmaking')[0]; }
		else { $about_printmaking = ""; }
			
		// Fourth Skill
		if(isset($custom['about_illustration'])) { $about_illustration = get_post_custom_values($key = 'about_illustration')[0]; }
		else { $about_illustration = ""; }
			
	?>
	
	<div id="about" class="anchor clearfix">
		<div id="about-left" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-position: center; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;">
		</div>
		
		<div class="about-right">
			<div class="about-right-copy">
				<h2 class="highlight"><?php echo $about_header; ?></h2>
				<h3><?php echo $about_specializations; ?></h3>
				<?php echo the_content(); ?>
				
				<ul class="social">
					<li><a href="//linkedin.com/in/pierre-george-40b189209/" class="social" target="_blank">
						<img class="social-icon first" src="<?php bloginfo('template_url'); ?>/images/linkedin.svg" alt="Linkedin" />
					</a></li>
					<li><a href="//instagram.com/pierre_george2/" class="social" target="_blank">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/instagram.svg" alt="Check Out My Instagram" />
					</a></li>
					<li><a href="mailto:contact@pierregeorge.art" class="social">
						<img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/mail.svg" alt="Get in Touch" />
					</a></li>
				</ul>
				
				<a href="#" class="cta-button" style="margin-bottom: 25px;">View Résumé</a>
				<a href="#contact" class="cta-button" style="margin-right: 0;">Get in Touch</a>
			</div>
		</div>
	</div>
	
	<div id="skills" class="clearfix">
		<div id="skills-left">
			<h2 class="highlight">Skillset</h2>
			<p><?php echo $about_skillset; ?></p>
		</div>
		<div id="skills-right">
			<ul id="skill-list">
				<li>
					<img class="skills-icon" src="<?php bloginfo('template_url'); ?>/images/design_icon.svg" alt="Visual Design" />
					<h2>Visual Design</h2>
					<p><?php echo $about_visual_design; ?></p>
				</li>
				<li>
					<img class="skills-icon" src="<?php bloginfo('template_url'); ?>/images/uiux_icon.svg" alt="UI / UX Design" />
					<h2>UI / UX Design</h2>
					<p><?php echo $about_ui_ux_design; ?></p>
				</li>
				<li>
					<img class="skills-icon" src="<?php bloginfo('template_url'); ?>/images/printmaking_icon.svg" alt="Printmaking" />
					<h2>Printmaking</h2>
					<p><?php echo $about_printmaking; ?></p>
				</li>
				<li>
					<img class="skills-icon" src="<?php bloginfo('template_url'); ?>/images/illustration_icon.svg" alt="Illustration" />
					<h2>Illustration</h2>
					<p><?php echo $about_illustration; ?></p>
				</li>
			</ul>
		</div>
	</div>
	<?php endif; ?>
	
</main>

</div> <!-- end container -->
</div> <!-- end wrapper -->

<?php

get_footer();

?>