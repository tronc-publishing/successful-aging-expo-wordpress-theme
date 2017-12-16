jQuery(document).ready(function() {

	jQuery('input.timepicker').timepicker({
		timeFormat: 'H:mm p',
		dropdown: false,
		interval: 30 // 15 minutes
	});

	//--- Check values onload of page ---//
	if(jQuery('.qOne .cmn-toggle').val() === 'yes'){
		jQuery('.qOne .cmn-toggle').attr('checked', 'checked');
		jQuery('.resOne').slideDown(450);
	}
	if(jQuery('.qTwo .cmn-toggle').val() === 'yes'){
		jQuery('.qTwo .cmn-toggle').attr('checked', 'checked');
		jQuery('.resTwo').slideDown(450);
	}
	if(jQuery('.qThree .cmn-toggle').val() === 'yes'){
		jQuery('.qThree .cmn-toggle').attr('checked', 'checked');
		jQuery('.resThree').slideDown(450);
	}


    jQuery('.cmn-toggle').click(function() {
		if(jQuery(this).val() === '' || jQuery(this).val() === 'no'){
        	jQuery(this).val('yes');
		} else {
			jQuery(this).val('no');
		}
    });

	jQuery('.cmn-toggle').change(function() {
		//Toggle value changes after this function ends

		if(jQuery(this).val() === '' || jQuery(this).val() === 'no'){
            jQuery(this).parent().parent().next('.qBlock.response').slideUp(450);
		} else {
			jQuery(this).parent().parent().next('.qBlock.response').slideDown(450);
		}
    });

});
