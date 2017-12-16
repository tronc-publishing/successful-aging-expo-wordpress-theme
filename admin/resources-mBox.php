<?php

	function add_resources_mbox(){
		add_meta_box(
			'designbyte-resources-content',                    // Unique ID
			'Resources Content',                               // Title
			'designbyte_resources_content_markup',	           // Callback function
			'resources-page',                                  // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                          // location (normal, advanced, side)
			'high',                        		               // priority (high, core, default, low)
			 null								               // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_resources_mbox');


    function designbyte_resources_content_markup() {
        global $post;
        echo '<input type="hidden" name="resources-mbox-nonce" id="resources-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $resLabel = get_post_meta($post->ID, 'res-label', true);
        $resURL = get_post_meta($post->ID, 'res-url', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
                    <div class="formBox form-textbox simple">
                        <label for="res-label">Provide CTA Button Text:</label>
                        <input name="res-label" type="text" placeholder="Button Text..." value="<?php echo $resLabel ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="res-url">Provide CTA Button URL: - (http://tronc.com)</label>
                        <input name="res-url" type="text" placeholder="Button URL..." value="<?php echo $resURL ?>">
                    </div>
				</div><!-- END Step 01 -->
			</div>
		<?php
    }


    function designbyte_resources_content_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['resources-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $resources_custom_post_meta['res-label'] = $_POST['res-label'];
        $resources_custom_post_meta['res-url'] = $_POST['res-url'];

        foreach($resources_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_resources_content_save', 1, 2);

?>
