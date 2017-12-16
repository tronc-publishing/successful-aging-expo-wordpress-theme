jQuery(document).ready(function(){
	jQuery(function() {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#scrollup').fadeIn('slow');
				jQuery("#scrollup").show();
			} else {
				jQuery('#scrollup').fadeOut('slow');
				jQuery("#scrollup").hide();
			}
		});
		jQuery('#scrollup').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
		jQuery('.room a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
	});
});
