<?php

	function add_contact_mbox(){
		add_meta_box(
			'designbyte-contact-content',     	     // Unique ID
			'Contact Info',  	                     // Title
			'designbyte_contact_content_markup',	 // Callback function
			'contact-page',                          // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_contact_mbox');


    function designbyte_contact_content_markup() {
        global $post;
        echo '<input type="hidden" name="contact-mbox-nonce" id="contact-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $conName = get_post_meta($post->ID, 'con-name', true);
		$conAddress = get_post_meta($post->ID, 'con-address', true);
        $conEmail = get_post_meta($post->ID, 'con-email', true);
        $conPhone = get_post_meta($post->ID, 'con-phone', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
                    <div class="formBox form-textbox simple">
                        <label for="con-name">Full Name:</label>
                        <input name="con-name" type="text" placeholder="First & Last Name..." value="<?php echo $conName ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="con-address">Work Address:</label>
                        <textarea rows="4" name="con-address"><?php echo $conAddress ?></textarea>
                    </div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="con-email">Email Address:</label>
                        <input name="con-email" type="text" placeholder="Email..." value="<?php echo $conEmail ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="con-phone">Phone Number:</label>
                        <input name="con-phone" type="text" placeholder="Phone..." value="<?php echo $conPhone ?>">
                    </div>
				</div>
			</div>
		<?php
    }


    function designbyte_contact_content_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['contact-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $contact_custom_post_meta['con-name'] = $_POST['con-name'];
        $contact_custom_post_meta['con-address'] = $_POST['con-address'];
        $contact_custom_post_meta['con-email'] = $_POST['con-email'];
        $contact_custom_post_meta['con-phone'] = $_POST['con-phone'];

        foreach($contact_custom_post_meta as $key => $value) {
            if( $post->post_type == 'revision' ) return;
                $value = implode(',', (array)$value);
            if(get_post_meta($post->ID, $key, FALSE)) {
                update_post_meta($post->ID, $key, $value);
            } else {
                add_post_meta($post->ID, $key, $value);
            }
            if(!$value) delete_post_meta($post->ID, $key);
        }
    }
    add_action('save_post', 'designbyte_contact_content_save', 1, 2);

?>
