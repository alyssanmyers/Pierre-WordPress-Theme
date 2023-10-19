<?php 
// Custom WordPress Dashboard Footer, and Support Widget
// ---------------------------------------------------------------------------------

	// Remove Useless Dashboard Items
	  function remove_dashboard_widgets(){
	    global $wp_meta_boxes;
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	  }
	  add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

  // Custom WordPress Footer
	  function remove_footer_admin () {
	    echo '♥ Theme by <a href="//amyers.art" target="blank">Alyssa Myers</a>.';
	  }
	  add_filter('admin_footer_text', 'remove_footer_admin');

  // Custom Dashboard Widget
		function myers_add_dashboard_widgets() {

			wp_add_dashboard_widget(
	     'myers_dashboard_widget',         // Widget slug.
	     'Myers Creative Development',         // Title.
	     'myers_dashboard_widget_function' // Display function.
	    );	
		}

		add_action( 'wp_dashboard_setup', 'myers_add_dashboard_widgets' );

		function myers_dashboard_widget_function() {

			echo "<strong>Support Information:</strong>";
			echo "<ul><li>&nbsp;&bull;&nbsp;<strong>Name:</strong> Alyssa Myers</li>
		        <li>&nbsp;&bull;&nbsp;<strong>Email:</strong> <a href=\"mailto:contact@amyers.art\">contact@amyers.art</a></li>
		        <li>&nbsp;&bull;&nbsp;<strong>Website:</strong> <a href=\"//amyers.art\" target=\"blank\">amyers.art</a></li>
		    </ul>";

		}

?>