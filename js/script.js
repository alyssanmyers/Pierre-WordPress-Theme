/*
 * Theme Name: Pierre George Portfolio
 * Theme URI: https://pierregeorge.art
 * Version: 1.0
 * Description: A custom theme for the creative portfolio for Pierre George Abdelmalak.
 * Author: Alyssa Myers
 * Author URI: https://amyers.art
*/

var width;
var prev_width;

/*
Load more posts ajax button in WordPress
*/

// ran when the document is loaded.
$(document).ready(function()
{
	"use strict";
	
	// display the menu when the menu icon is clicked
	$( ".burger-menu" ).click(function() 
	{
		displayNav();
	});
	
	$('nav ul.navigation li a').click(function()
	{
		if ( matchMedia('(max-width: 1023px)').matches ) { displayNav(); }
	});
	
	$( ".filter" ).hover(function() 
		{
			$( "#port-cats" ).fadeIn(500).css('display','table');
		},
		function() 
		{
			$( "#port-cats" ).fadeOut(500);
	});
	
	var ppp = 2; // Post per page
	var cat = 8;
	var pageNumber = 2;

	function load_posts(){
		pageNumber++;
		var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
		$.ajax({
			type: "POST",
			dataType: "html",
			url: ajax_posts.ajaxurl,
			data: str,
			success: function(data){
				var $data = $(data);
				if($data.length){
					$("#portfolio").append($data);
					$("#more_posts").attr("disabled",false);
				} else{
					$("#more_posts").attr("disabled",true);
					$("#more_posts").html("There are no more projects to display");
				}
			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}

		});
		return false;
	}

	$("#more_posts").on("click",function(){ // When btn is pressed.
		$("#more_posts").attr("disabled",true); // Disable the button, temp.
		load_posts();
	});
	
});

function displayNav()
{
	if ($( "nav ul.navigation" ).css('display') == 'none')
		{
			$( "nav ul.navigation" ).css('display','flex').fadeIn(500);
		}
		else
		{
			$( "nav ul.navigation" ).css('display','none').fadeOut(500);
		}
		$( ".close-button" ).slideToggle("slow");
		$( ".burger-menu ul" ).slideToggle("slow");
}


// so when the page goes back to normal size
$(window).resize(function()
{
	"use strict";
	
	// since on mobile, resize is called on scroll
	if ( width === $(window).innerWidth() ) 
	{
		return;
	}
	
	prev_width = width;
	width = $(window).innerWidth();
	
	checkPageSize();
});
		
function checkPageSize()
{
	"use strict";
	
	// if full view, show the nav normally, hide the sub-menu until hover,
	// set the toggle-arrows back to default value (collapsed),
	// remove nav-up from the header (just as a default, will fix if necessary on scroll),
	// reset to all default values for scroll actions.
	if ( !matchMedia('(max-width: 1023px)').matches )
	{
		$( "nav ul.navigation" ).css("display", "flex");
		$( ".close-button" ).show();
		$( ".burger-menu ul" ).show();
		
		prev_width = $(window).innerWidth();

	}
	// hide the nav
	else
	{
		$( "nav ul.navigation" ).css("display", "none");
		$( ".close-button" ).hide();
		$( ".burger-menu ul" ).show();
		
		prev_width = $(window).innerWidth();
	}

}