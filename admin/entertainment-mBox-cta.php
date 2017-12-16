<?php

	function add_entertainment_time_mbox(){
		add_meta_box(
			'sae-entertainment-time',                 	 // Unique ID
			'Add Event Start and End Time',             // Title
			'sae_entertainment_time_markup',	         	 // Callback function
			'entertainment-page',                       // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                              // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     							 // callback_args
		);
	}
	add_action('add_meta_boxes', 'add_entertainment_time_mbox');

    function sae_entertainment_time_markup() {
        global $post;
        echo '<input type="hidden" name="entertainment-time-mbox-nonce" id="entertainment-time-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

				$entertainmentTimeStart = get_post_meta($post->ID, 'entertainment-time-start', true);
				$entertainmentTimeEnd = get_post_meta($post->ID, 'entertainment-time-end', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">

					<div class="formBox form-textbox simple">
              <label for="entertainment-time-start">Provide Event Start Time: - Examples(5PM, 8:30 am)</label>
              <input class="timepicker" required name="entertainment-time-start" type="text" value="<?php echo $entertainmentTimeStart; ?>">
          </div>

					<div class="formBox form-textbox simple last">
              <label for="entertainment-time-end">Provide Event End Time: - Examples(5PM, 8:30 am) - Optional</label>
              <input class="timepicker" name="entertainment-time-end" type="text" value="<?php echo $entertainmentTimeEnd; ?>">
          </div>

				</div><!-- END Step 01 -->
			</div>
		<?php
    }

    function sae_entertainment_time_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['entertainment-time-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

				$entertainment_time_custom_post_meta['entertainment-time-start'] = $_POST['entertainment-time-start'];
				$entertainment_time_custom_post_meta['entertainment-time-end'] = $_POST['entertainment-time-end'];

        foreach($entertainment_time_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'sae_entertainment_time_save', 1, 2);

?>
