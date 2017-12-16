<?php

	function add_page_hero_mbox(){
		add_meta_box(
			'sae-page-hero-content',     	 						// Unique ID
			'Subheader - Title & Subtitle',  	     		// Title
			'sae_page_hero_content_markup',	 					// Callback function
			'page',                                  	// (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                	// location (normal, advanced, side)
			'high',                        		     		// priority (high, core, default, low)
			 null								     									// callback_args
		);
	}
	add_action('add_meta_boxes', 'add_page_hero_mbox');


    function sae_page_hero_content_markup() {
        global $post;
        echo '<input type="hidden" name="page-hero-mbox-nonce" id="page-hero-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $heroTitle = get_post_meta($post->ID, 'hero-title', true);
		$heroSubtitle = get_post_meta($post->ID, 'hero-subtitle', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
          <div class="formBox form-textbox simple">
            <label for="hero-title">Provide Title Text:</label>
            <input name="hero-title" type="text" placeholder="Title..." value="<?php echo $heroTitle ?>">
          </div>

          <div class="formBox form-textbox simple last">
            <label for="hero-subtitle">Provide Subtitle Text:</label>
            <textarea rows="4" name="hero-subtitle"><?php echo $heroSubtitle ?></textarea>
            <!-- <input name="hero-subtitle" type="text" placeholder="Webm URL..." value="<?php echo $heroSubtitle ?>"> -->
          </div>
				</div>
			</div>
		<?php
    }


    function sae_page_hero_content_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['page-hero-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $hero_custom_post_meta['hero-title'] = $_POST['hero-title'];
        $hero_custom_post_meta['hero-subtitle'] = $_POST['hero-subtitle'];

        foreach($hero_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'sae_page_hero_content_save', 1, 2);

?>
