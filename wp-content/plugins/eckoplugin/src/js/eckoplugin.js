
jQuery(document).ready(function() {
	"use strict";

	// SHORTCODE TOGGLE
	jQuery('.shorttoggle .toggleheader').on("click", function(){
		jQuery(this).next(".togglecontent").toggle();
	});

	// SHORTCODE TABS
	jQuery('.shorttabsheader').on("click", function(){
		jQuery('.shorttabscontent', jQuery(this).parent()).hide();
		jQuery('.shorttabsheader.active', jQuery(this).parent()).removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.shorttabscontent[data-id=\'' + jQuery(this).attr('data-id') + '\']').show();
	});

	jQuery('.shorttabs').each(function(){
		jQuery('.shorttabscontent', this).hide();
		jQuery('.shorttabscontent', this).first().show();
		jQuery('.shorttabsheader', this).first().addClass('active');
	});


});
