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
	<!-------------------------------->
	<!--      Footer Section        -->
	<!-------------------------------->

	<footer class="body-text">
		
	<?php echo wp_footer(); ?>
		
	<div id="contact" class="anchor">
	<div id="contact-container">
	<h2>Tell Me About Your Next Project</h2>
	<p>Please don't hesitate to get in touch&mdash;I'd love to explore the creative possibilities we can achieve together!</p>
	<?php echo do_shortcode('[contact-form-7 id="fba7af5" title="Contact Form"]'); ?>
	</div></div>
		
		<div id="footer-info">
			<h5>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'title'); ?>. All Rights Reserved.
			<br>
				<a href="//amyers.art" style="color: #ffffff;" target="_blank">Made with ♥ in Ohio.</a>
			</h5>
		</div>
		
		<ul class="social">
            <li><a href="//linkedin.com/in/pierre-george-40b189209/" class="social" target="_blank">
                <img class="social-icon first" src="<?php bloginfo('template_url'); ?>/images/linkedin_white.svg" alt="Linkedin" />
            </a></li>
            <li><a href="//instagram.com/pierre_george2/" class="social" target="_blank">
                <img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/instagram_white.svg" alt="Check Out My Instagram" />
            </a></li>
            <li><a href="mailto:contact@pierregeorge.art" class="social">
                <img class="social-icon" src="<?php bloginfo('template_url'); ?>/images/mail_white.svg" alt="Get in Touch" />
            </a></li>
        </ul>
		
	</footer>

</body>
</html>