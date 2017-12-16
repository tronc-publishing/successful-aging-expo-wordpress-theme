<?php

	function add_page_meta_box(){
		add_meta_box(
			'designbyte-page-meta-box',     	     // Unique ID
			'Video Background - Asset Files',  	     // Title
			'designbyte_page_meta_box_markup',	     // Callback function
			'page',                                  // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                                // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     // callback_args
		);
	} 
	add_action('add_meta_boxes', 'add_page_meta_box');


    function designbyte_page_meta_box_markup() {
        global $post;
        echo '<input type="hidden" name="page-meta-box-nonce" id="page-meta-box-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        $vidMP4 = get_post_meta($post->ID, 'video-mpFour', true);
		$vidWEBM = get_post_meta($post->ID, 'video-webm', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">
                    <div class="formBox form-textbox simple">
                        <label for="video-mpFour">Provide MP4 Video URL:</label>
                        <input name="video-mpFour" type="text" placeholder="MP4 URL..." value="<?php echo $vidMP4 ?>">
                    </div>
                    
                    <div class="formBox form-textbox simple last">
                        <label for="video-webm">Provide WebM Video URL:</label>
                        <input name="video-webm" type="text" placeholder="Webm URL..." value="<?php echo $vidWEBM ?>">
                    </div>
				</div>
			</div>
		<?php
    }


    function designbyte_page_meta_box_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['page-meta-box-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

        $page_custom_post_meta['video-mpFour'] = $_POST['video-mpFour'];
        $page_custom_post_meta['video-webm'] = $_POST['video-webm'];

        foreach($page_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'designbyte_page_meta_box_save', 1, 2);

?>
