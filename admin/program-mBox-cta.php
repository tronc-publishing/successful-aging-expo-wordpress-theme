<?php

	function add_program_cta_mbox(){
		add_meta_box(
			'designbyte-program-cta',                // Unique ID
			'Add Market CTA (button)',               // Title
			'designbyte_program_cta_markup',	     // Callback function
			'program-page',                          // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_program_cta_mbox');


    function designbyte_program_cta_markup() {
        global $post;
        echo '<input type="hidden" name="program-cta-mbox-nonce" id="program-cta-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $showProgBtn = get_post_meta($post->ID, 'prog-show', true);
        $progLabel = get_post_meta($post->ID, 'prog-label', true);
        $progURL = get_post_meta($post->ID, 'prog-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
					<div class="formBox form-checkbox form-combo">
						<?php
							if($showProgBtn == ''){
								echo '<input name="prog-show" type="checkbox" value="true">';
							} else if($showProgBtn == 'true'){
								echo '<input name="prog-show" type="checkbox" value="true" checked>';
							}
						?>
						<label for="prog-show"><strong>Show Market CTA</strong></label>
					</div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="prog-label">Provide CTA Button Text:</label>
                        <input name="prog-label" type="text" placeholder="Button Text..." value="<?php echo $progLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="prog-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="prog-url" type="text" placeholder="Button URL..." value="<?php echo $progURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_program_cta_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['program-cta-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $program_cta_custom_post_meta['prog-show'] = $_POST['prog-show'];
        $program_cta_custom_post_meta['prog-label'] = $_POST['prog-label'];
        $program_cta_custom_post_meta['prog-url'] = $_POST['prog-url'];

        foreach($program_cta_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_program_cta_save', 1, 2);

?>
