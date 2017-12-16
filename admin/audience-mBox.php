<?php

	function add_audience_mbox(){
		add_meta_box(
			'designbyte-audience-cstudy',                      // Unique ID
			'Adjust Content Alignment & Add CTA (button)',     // Title
			'designbyte_audience_markup',	                   // Callback function
			'audience-page',                                   // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                          // location (normal, advanced, side)
			'high',                        		               // priority (high, core, default, low)
			 null								               // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_audience_mbox');


    function designbyte_audience_markup() {
        global $post;
        echo '<input type="hidden" name="audience-mbox-nonce" id="audience-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $audAlign = get_post_meta($post->ID, 'aud-align', true);
        $showAudBtn = get_post_meta($post->ID, 'aud-show', true);
        $audLabel = get_post_meta($post->ID, 'aud-label', true);
        $audURL = get_post_meta($post->ID, 'aud-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
                    <div class="formBox">
						<div class="form-subBox">
							<label for="aud-align">Image Alignment:</label>
							<select name="aud-align">
								<option <?php if($audAlign === 'Left'){ ?>selected<?php } ?> value="Left">Align Image to the Left</option>
								<option <?php if($audAlign === 'Right'){ ?>selected<?php } ?> value="Right">Align Image to the Right</option>
							</select>
						</div>
					</div>
                    
					<div class="formBox form-checkbox form-combo">
						<?php
							if($showAudBtn == ''){
								echo '<input name="aud-show" type="checkbox" value="true">';
							} else if($showAudBtn == 'true'){
								echo '<input name="aud-show" type="checkbox" value="true" checked>';
							}
						?>
						<label for="aud-show"><strong>Show CTA Button</strong></label>
					</div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="aud-label">Provide CTA Button Text:</label>
                        <input name="aud-label" type="text" placeholder="Button Text..." value="<?php echo $audLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="aud-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="aud-url" type="text" placeholder="Button URL..." value="<?php echo $audURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_audience_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['audience-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $audience_custom_post_meta['aud-align'] = $_POST['aud-align'];
        $audience_custom_post_meta['aud-show'] = $_POST['aud-show'];
        $audience_custom_post_meta['aud-label'] = $_POST['aud-label'];
        $audience_custom_post_meta['aud-url'] = $_POST['aud-url'];

        foreach($audience_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_audience_save', 1, 2);

?>
