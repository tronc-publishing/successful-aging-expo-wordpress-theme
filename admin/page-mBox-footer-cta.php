<?php

	function add_page_footer_mbox(){
		add_meta_box(
			'designbyte-page-footer-cta',     	     // Unique ID
			'Footer - Add CTA (button) Content',     // Title
			'designbyte_page_footer_markup',	     // Callback function
			'page',                                  // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_page_footer_mbox');


    function designbyte_page_footer_markup() {
        global $post;
        echo '<input type="hidden" name="page-footer-mbox-nonce" id="page-footer-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $showFooter = get_post_meta($post->ID, 'footer-show', true);
		$ctaLabel = get_post_meta($post->ID, 'cta-label', true);
        $ctaURL = get_post_meta($post->ID, 'cta-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
					<div class="formBox form-checkbox form-combo">
						<?php
							if($showFooter == ''){
								echo '<input name="footer-show" type="checkbox" value="true">';
							} else if($showFooter == 'true'){
								echo '<input name="footer-show" type="checkbox" value="true" checked>';
							}
						?>
						<label for="footer-show"><strong>Show Footer CTA</strong></label>
					</div>
                    
                    <div class="formBox form-textbox simple">
                        <label for="cta-label">Provide CTA Button Text:</label>
                        <input name="cta-label" type="text" placeholder="Button Text..." value="<?php echo $ctaLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="cta-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="cta-url" type="text" placeholder="Button URL..." value="<?php echo $ctaURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_page_footer_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['page-footer-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $page_footer_custom_post_meta['footer-show'] = $_POST['footer-show'];
        $page_footer_custom_post_meta['cta-label'] = $_POST['cta-label'];
        $page_footer_custom_post_meta['cta-url'] = $_POST['cta-url'];

        foreach($page_footer_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_page_footer_save', 1, 2);

?>
