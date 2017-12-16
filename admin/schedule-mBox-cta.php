<?php

	function add_schedule_time_mbox(){
		add_meta_box(
			'sae-schedule-time',                 	 // Unique ID
			'Add Event Start and End Time',             // Title
			'sae_schedule_time_markup',	         	 // Callback function
			'schedule-page',                       // (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                              // location (normal, advanced, side)
			'high',                        		     // priority (high, core, default, low)
			 null								     							 // callback_args
		);
	}
	add_action('add_meta_boxes', 'add_schedule_time_mbox');

    function sae_schedule_time_markup() {
        global $post;
        echo '<input type="hidden" name="schedule-time-mbox-nonce" id="schedule-time-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

				$scheduleTimeStart = get_post_meta($post->ID, 'schedule-time-start', true);
				$scheduleTimeEnd = get_post_meta($post->ID, 'schedule-time-end', true);

		?>
			<div class="meta-wrap">
				<div class="stepBox">

					<div class="formBox form-textbox simple">
              <label for="schedule-time-start">Provide Event Start Time: - Examples(5PM, 8:30 am)</label>
              <input class="timepicker" required name="schedule-time-start" type="text" value="<?php echo $scheduleTimeStart; ?>">
          </div>

					<div class="formBox form-textbox simple last">
              <label for="schedule-time-end">Provide Event End Time: - Examples(5PM, 8:30 am) - Optional</label>
              <input class="timepicker" name="schedule-time-end" type="text" value="<?php echo $scheduleTimeEnd; ?>">
          </div>

				</div><!-- END Step 01 -->
			</div>
		<?php
    }

    function sae_schedule_time_save($post_id, $post) {
        if(!wp_verify_nonce($_POST['schedule-time-mbox-nonce'], plugin_basename(__FILE__))){
            return $post->ID;
        }
        if(!current_user_can('edit_post', $post->ID))
            return $post->ID;

				$schedule_time_custom_post_meta['schedule-time-start'] = $_POST['schedule-time-start'];
				$schedule_time_custom_post_meta['schedule-time-end'] = $_POST['schedule-time-end'];

        foreach($schedule_time_custom_post_meta as $key => $value) {
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
    add_action('save_post', 'sae_schedule_time_save', 1, 2);

?>
