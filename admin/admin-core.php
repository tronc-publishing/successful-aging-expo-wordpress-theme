<?php
	if(is_admin()) {
 		function sae_admin_styles() {
 			wp_enqueue_style('thickbox');
			wp_enqueue_style('jquery-timepicker-css', get_template_directory_uri() . '/admin/css/jquery.timepicker.min.css');
			wp_enqueue_style('admin-custom', get_template_directory_uri() . '/admin/css/admin-custom.css');
 		}

   	function sae_admin_scripts(){
			wp_enqueue_script('jquery');
			wp_enqueue_script('media-upload');
   		wp_enqueue_script('thickbox');
   		wp_enqueue_script('image-upload', get_template_directory_uri() . '/admin/js/image-upload.js', array('jquery'), '1.0', true);
			wp_enqueue_script('jquery-timepicker', get_template_directory_uri() . '/admin/js/jquery.timepicker.min.js', array('jquery'), '1.0', true);
			wp_enqueue_script('script', get_template_directory_uri() . '/admin/js/script.js', array('jquery', 'jquery-timepicker'), '1.0', true);
   	}
		add_action('admin_print_scripts', 'sae_admin_scripts');
		add_action('admin_print_styles', 'sae_admin_styles');
	}


	//*--- START ADIMN. PAGE(S) ---*//
	function sae_admin_menus() {
		add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'sae-theme-options', 'sae_theme_page', 'dashicons-admin-generic', 99);
		add_submenu_page('sae-theme-options', 'Footer Options', 'Footer', 'manage_options', 'sae-footer-options', 'sae_theme_footer_page');
	}
	add_action('admin_menu', 'sae_admin_menus');


	//--- General Options Theme Page ---//
	function sae_theme_page() {
		?>
    <div class="theme-wrap">
        <h2><span class="dashicons dashicons-admin-generic"></span><?php _e('General Options', 'sae'); ?></h2>
        <form method="post" action="options.php">

					<?php wp_nonce_field('update-options') ?>

						<div class="qContent">
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Date:</div>
									<input type="text" name="expo-date" placeholder="<?php _e('Example: Sunday, February 18, 2018', 'sae'); ?>" value="<?php echo get_option('expo-date'); ?>" />
								</div>
							</div>
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Time:</div>
									<input type="text" name="expo-time" placeholder="<?php _e('Example: 9AM - 4PM', 'sae'); ?>" value="<?php echo get_option('expo-time'); ?>" />
								</div>
							</div>
						</div><!--- END Date and Time --->

						<div class="qContent">
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Venue:</div>
	                <textarea name="expo-venue"><?php echo get_option('expo-venue'); ?></textarea>
								</div>
							</div>
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Address:</div>
	                <textarea name="expo-address"><?php echo get_option('expo-address'); ?></textarea>
								</div>
							</div>
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Email Address:</div>
									<input type="text" name="expo-email" placeholder="<?php _e('Example: me@mine.com', 'sae'); ?>" value="<?php echo get_option('expo-email'); ?>" />
								</div>
							</div>
							<div class="qBlock clearfix">
								<div class="qElem">
									<div class="question">Expo Phone Number:</div>
									<input type="text" name="expo-phone" placeholder="<?php _e('Example: 555.555.5555', 'sae'); ?>" value="<?php echo get_option('expo-phone'); ?>" />
								</div>
							</div>
							<div class="qBlock clearfix">
								<div class="qElem last">
									<div class="question">Expo Google Map Link:</div>
									<input type="text" name="expo-map" placeholder="<?php _e('Example: https://goo.gl/maps/TTyCHhb8JEx', 'sae'); ?>" value="<?php echo get_option('expo-map'); ?>" />
								</div>
							</div>
						</div><!--- END Venue, Address, and Map --->

	        	<div class="qContent">
	            <div class="qBlock qOne clearfix">
	              <div class="question fl">Upload image for the Logo?</div>
	              <div class="switch fr">
	                <input id="toggle-logo" name="toggle-logo" class="cmn-toggle cmn-toggle-round" type="checkbox" value="<?php echo get_option('toggle-logo'); ?>">
	                <label for="toggle-logo"></label>
	              </div>
	            </div>
	            <div class="qBlock response resOne clearfix">
	              <input class="uploadIMG" type="text" name="logo-image" value="<?php echo get_option('logo-image'); ?>" />
	              <input type="button" class="imgUploadBtn" value="Upload/Select Image" />
	              <img class="previewIMG" src="<?php echo get_option('logo-image'); ?>" />
	            </div>
	          </div><!--- END Logo --->

          	<div class="qContent">
              <div class="qBlock qTwo clearfix">
                <div class="question fl">Upload image for the favicon?</div>
                <div class="switch fr">
                  <input id="toggle-favicon" name="toggle-favicon" class="cmn-toggle cmn-toggle-round" type="checkbox" value="<?php echo get_option('toggle-favicon'); ?>">
                  <label for="toggle-favicon"></label>
                </div>
              </div>
              <div class="qBlock response resTwo clearfix">
                <input class="uploadIMG" type="text" name="favicon-image" value="<?php echo get_option('favicon-image'); ?>" />
                <input type="button" class="imgUploadBtn" value="Upload/Select Image" />
              	<img class="previewIMG" src="<?php echo get_option('favicon-image'); ?>" />
              </div>
           	</div><!--- END Favicon --->

            <input type="submit" name="Submit" value="Save Options" />
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="expo-date, expo-time, expo-venue, expo-address, expo-email, expo-phone, expo-map, toggle-logo, logo-image, toggle-favicon, favicon-image" />
        	</form>
        </div>
      <?php
	}

	//--- Theme SubPage - Footer Options ---//
	function sae_theme_footer_page() {
		?>
  <div class="theme-wrap">
      <h2><span class="dashicons dashicons-feedback"></span><?php _e('Footer Options', 'sae'); ?></h2>
      <form method="post" action="options.php">
        <?php wp_nonce_field('update-options') ?>

      	<div class="qContent">
					<div class="qBlock clearfix">
						<div class="qElem last">
							<div class="question">B2B Page Callout:</div>
							<textarea name="b2b-callout"><?php echo get_option('b2b-callout'); ?></textarea>
						</div>
					</div>

          <div class="qBlock clearfix">
            <div class="qElem">
              <div class="question">Twitter URL:</div>
              <input type="text" name="social-twitter" value="<?php echo get_option('social-twitter'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">LinkedIn URL:</div>
              <input type="text" name="social-linkedin" value="<?php echo get_option('social-linkedin'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">Facebook URL:</div>
              <input type="text" name="social-facebook" value="<?php echo get_option('social-facebook'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">Instagram URL:</div>
              <input type="text" name="social-instagram" value="<?php echo get_option('social-instagram'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">Google+ URL:</div>
              <input type="text" name="social-google" value="<?php echo get_option('social-google'); ?>" />
            </div>
            <div class="qElem last">
              <div class="question">Vimeo URL:</div>
              <input type="text" name="social-vimeo" value="<?php echo get_option('social-vimeo'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">Pinterest URL:</div>
              <input type="text" name="social-pinterest" value="<?php echo get_option('social-pinterest'); ?>" />
            </div>
            <div class="qElem">
              <div class="question">Email URL:</div>
              <input type="text" name="social-email" value="<?php echo get_option('social-email'); ?>" />
            </div>
          </div>
          </div><!--- END Callout --->

					<div class="qContent">
						<div class="qBlock clearfix">
							<div class="qElem last">
								<div class="question">Copyright:</div>
								<input type="text" name="copyright-txt" value="<?php echo get_option('copyright-txt'); ?>" />
							</div>
						</div>
					</div>

					<div class="qContent">
						<div class="qBlock clearfix">
							<div class="qElem last">
								<div class="question">Google Analytics: (Include entire script, opening and closing script tag also.)</div>
                  <textarea name="google-analytics"><?php echo get_option('google-analytics'); ?></textarea>
							</div>
						</div>
					</div>

          <input type="submit" name="Submit" value="Save Options" />
          <input type="hidden" name="action" value="update" />
          <input type="hidden" name="page_options" value="b2b-callout, social-email, social-facebook, social-twitter, social-google, social-pinterest, social-instagram, social-linkedin, social-vimeo, copyright-txt, google-analytics" />
        </form>
      </div>
    	<?php
	}

?>
