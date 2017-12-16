<?php

	function add_portfolio_cstudy_mbox(){
		add_meta_box(
			'designbyte-portfolio-cstudy',                               // Unique ID
			'Adjust Content Alignment & Add Portfolio CTA (button)',     // Title
			'designbyte_portfolio_cstudy_markup',	                     // Callback function
			'portfolio-page',                                            // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                                    // location (normal, advanced, side)
			'high',                        		                         // priority (high, core, default, low)
			 null								                         // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_portfolio_cstudy_mbox');


    function designbyte_portfolio_cstudy_markup() {
        global $post;
        echo '<input type="hidden" name="portfolio-cstudy-mbox-nonce" id="portfolio-cstudy-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $cStudyAlign = get_post_meta($post->ID, 'cstudy-align', true);
        $showCStudyBtn = get_post_meta($post->ID, 'cstudy-show', true);
        $cStudyLabel = get_post_meta($post->ID, 'cstudy-label', true);
        $cStudyURL = get_post_meta($post->ID, 'cstudy-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
                    <div class="formBox">
						<div class="form-subBox">
							<label for="cstudy-align">Image Alignment:</label>
							<select name="cstudy-align">
								<option <?php if($cStudyAlign === 'Left'){ ?>selected<?php } ?> value="Left">Align Image to the Left</option>
								<option <?php if($cStudyAlign === 'Right'){ ?>selected<?php } ?> value="Right">Align Image to the Right</option>
							</select>
						</div>
					</div>
                    
					<div class="formBox form-checkbox form-combo">
						<?php
							if($showCStudyBtn == ''){
								echo '<input name="cstudy-show" type="checkbox" value="true">';
							} else if($showCStudyBtn == 'true'){
								echo '<input name="cstudy-show" type="checkbox" value="true" checked>';
							}
						?>
						<label for="cstudy-show"><strong>Show CTA Button</strong></label>
					</div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="cstudy-label">Provide CTA Button Text:</label>
                        <input name="cstudy-label" type="text" placeholder="Button Text..." value="<?php echo $cStudyLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="cstudy-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="cstudy-url" type="text" placeholder="Button URL..." value="<?php echo $cStudyURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_portfolio_cstudy_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['portfolio-cstudy-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $portfolio_cstudy_custom_post_meta['cstudy-align'] = $_POST['cstudy-align'];
        $portfolio_cstudy_custom_post_meta['cstudy-show'] = $_POST['cstudy-show'];
        $portfolio_cstudy_custom_post_meta['cstudy-label'] = $_POST['cstudy-label'];
        $portfolio_cstudy_custom_post_meta['cstudy-url'] = $_POST['cstudy-url'];

        foreach($portfolio_cstudy_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_portfolio_cstudy_save', 1, 2);

?>
