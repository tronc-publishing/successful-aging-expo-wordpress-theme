<?php

	function add_brands_cta_mbox(){
		add_meta_box(
			'designbyte-brands-cta',                 // Unique ID
			'Add Market CTA (button)',               // Title
			'designbyte_brands_cta_markup',	         // Callback function
			'brands-page',                           // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_brands_cta_mbox');


    function designbyte_brands_cta_markup() {
        global $post;
        echo '<input type="hidden" name="brands-cta-mbox-nonce" id="brands-cta-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $showAccBtn = get_post_meta($post->ID, 'acc-show', true);
        $accLabel = get_post_meta($post->ID, 'acc-label', true);
        $accURL = get_post_meta($post->ID, 'acc-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
					<div class="formBox form-checkbox form-combo">
						<?php
							if($showAccBtn == ''){
								echo '<input name="acc-show" type="checkbox" value="true">';
							} else if($showAccBtn == 'true'){
								echo '<input name="acc-show" type="checkbox" value="true" checked>';
							}
						?>
						<label for="acc-show"><strong>Show Market CTA</strong></label>
					</div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="acc-label">Provide CTA Button Text:</label>
                        <input name="acc-label" type="text" placeholder="Button Text..." value="<?php echo $accLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="acc-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="acc-url" type="text" placeholder="Button URL..." value="<?php echo $accURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_brands_cta_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['brands-cta-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $brands_cta_custom_post_meta['acc-show'] = $_POST['acc-show'];
        $brands_cta_custom_post_meta['acc-label'] = $_POST['acc-label'];
        $brands_cta_custom_post_meta['acc-url'] = $_POST['acc-url'];

        foreach($brands_cta_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_brands_cta_save', 1, 2);

?>
