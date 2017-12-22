<?php

	function add_ads_mbox() {
		add_meta_box(
			'sae-ads',                						// Unique ID
			'Add Advertisment Link',              // Title
			'sae_ads_markup',	     								// Callback function
			'ads-page',                          	// (post, page, dashboard, link, attachment, custom_post_type)
			'normal',                             // location (normal, advanced, side)
			'high',                        		    // priority (high, core, default, low)
			 null								     							// callback_args
		);
	}
	add_action('add_meta_boxes', 'add_ads_mbox');

  function sae_ads_markup() {
    global $post;
    echo '<input type="hidden" name="ads-mbox-nonce" id="ads-mbox-nonce" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $showAd = get_post_meta($post->ID, 'ad-show', true);
    $progURL = get_post_meta($post->ID, 'ad-url', true);
	?>
		<div class="meta-wrap">
			<div class="stepBox">
				<div class="formBox form-checkbox form-combo">
					<?php
						if($showAd == ''){
							echo '<input name="ad-show" type="checkbox" value="true">';
						} else if($showAd == 'true'){
							echo '<input name="ad-show" type="checkbox" value="true" checked>';
						}
					?>
					<label for="ad-show"><strong>Show Ad</strong></label>
				</div>
        <div class="formBox form-textbox simple last">
          <label for="ad-url">Provide Ad URL: - (http://myadlink.com)</label>
          <input name="ad-url" type="text" placeholder="Ad URL..." value="<?php echo $progURL ?>">
        </div>
			</div><!-- END Step 01 -->
		</div>
	<?php
  }

  function sae_ads_save($post_id, $post) {
    if(!wp_verify_nonce($_POST['ads-mbox-nonce'], plugin_basename(__FILE__))){
      return $post->ID;
    }
    if(!current_user_can('edit_post', $post->ID))
      return $post->ID;

    $ads_custom_post_meta['ad-show'] = $_POST['ad-show'];
    $ads_custom_post_meta['ad-url'] = $_POST['ad-url'];

    foreach($ads_custom_post_meta as $key => $value) {
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
  add_action('save_post', 'sae_ads_save', 1, 2);

?>
