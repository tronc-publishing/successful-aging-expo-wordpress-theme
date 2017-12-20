<?php


  if(is_admin()) {
    require get_template_directory() . '/admin/admin-core.php';
    require get_template_directory() . '/admin/schedule-mBox-cta.php';
    require get_template_directory() . '/admin/entertainment-mBox-cta.php';

    // require get_template_directory() . '/admin/page-mBox-video-bkgrd.php';
    require get_template_directory() . '/admin/page-mBox-hero-content.php';
    // require get_template_directory() . '/admin/page-mBox-footer-cta.php';
    // require get_template_directory() . '/admin/brands-mBox-cta.php';
    // require get_template_directory() . '/admin/events-mBox-cta.php';
    // require get_template_directory() . '/admin/portfolio-mBox-cstudy.php';
    // require get_template_directory() . '/admin/audience-mBox.php';
    // require get_template_directory() . '/admin/contact-mBox.php';
    // require get_template_directory() . '/admin/resources-mBox.php';
    // require get_template_directory() . '/admin/program-mBox-cta.php';
    require get_template_directory() . '/admin/ads-mBox.php';
  }
  // require get_template_directory() . '/admin/login-core.php';
  require get_template_directory() . '/theme/custom-post-type/homepg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/schedulepg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/entertainmentpg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/exhibitorspg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/locationpg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/contactuspg-custom-type_custTAX.php';
  require get_template_directory() . '/theme/custom-post-type/adspg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/eventspg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/portfoliopg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/audiencepg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/contactpg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/resourcespg-custom-type_custTAX.php';
  // require get_template_directory() . '/theme/custom-post-type/progampg-custom-type_custTAX.php';

  function sae_load_scripts() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/theme/css/normalize.css');
    wp_enqueue_style('font-awesome.min', get_template_directory_uri() . '/theme/css/font-awesome.min.css');
    wp_enqueue_style('desResponsive-grid', get_template_directory_uri() . '/theme/css/desResponsive-grid.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/theme/css/slick/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/theme/css/slick/slick-theme.css');
    wp_enqueue_style('form', get_template_directory_uri() . '/theme/css/form.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/theme/css/main.css');

    wp_enqueue_script('conditionizr', get_template_directory_uri() . '/theme/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/theme/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.nav', get_template_directory_uri() . '/theme/js/jquery.nav.js', array('jquery'), '3.0', true);
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/theme/js/smooth-scroll.js', array('jquery'), '1.4.10', true);
    wp_enqueue_script('page-scroll', get_template_directory_uri() . '/theme/js/page-scroll.js', array('jquery'), '1.2.1', true);
    wp_enqueue_script('scrollup', get_template_directory_uri() . '/theme/js/scrollup.js', array('jquery'), '1.0', true);
    wp_enqueue_script('slick.min', get_template_directory_uri() . '/theme/js/slick.min.js', array('jquery'), '1.5.9', true);
    wp_enqueue_script('form-mask', get_template_directory_uri() . '/theme/js/form-mask.js', array('jquery'), '1.3.1', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/theme/js/script.js', array('jquery', 'jquery-ui-datepicker'), '1.0', true);
  }

  add_action('wp_enqueue_scripts', 'sae_load_scripts');


  /*--- Theme Support / Basics ---*/
	function sae_setup() {
		// global $content_width;
		// if(!isset($content_width)) $content_width=1200;

		load_theme_textdomain('sae', get_template_directory() . '/theme/languages');

		// add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		// add_image_size('large', 700, '', true);
		// add_image_size('medium', 250, '', true);
		// add_image_size('small', 120, '', true);
		// add_image_size('custom-size', 700, 200, true);

		add_theme_support('menus');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
		add_theme_support('post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat'));

		register_nav_menus(array(
      'main-menu-b2c' => __('Main Menu - B2C', 'sae'),
      'main-menu-b2b' => __('Main Menu - B2B', 'sae'),
      // 'footer-menu-min' => __('Footer Navigation - Home Minimal', 'sae')
		));


		register_sidebar(array(
			'name' => __('Sponsors Slider', 'sae'),
      'description' => __('Sponsor Images and URLs', 'sae'),
			'id' => 'sponsors-slider',
			'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<span style="display: none;">',
      'after_title' => '</span>'
		));

    // register_sidebar(array(
		// 	'name' => __('Ads', 'sae'),
		// 	'description' => __('Ads', 'sae'),
		// 	'id' => 'ads',
    //   'before_widget' => '<h3 id="%1$s" class="%2$s lgTxt colorWHT txtCaps mb25"><strong class="mdBold">',
		// 	'after_widget' => '</strong></h3>',
    //   'before_title' => '<span style="display: none;">',
    //   'after_title' => '</span>'
		// ));

    register_sidebar(array(
			'name' => __('Footer Column One', 'sae'),
			'description' => __('Footer - Column One', 'sae'),
			'id' => 'footer-col-1',
			'before_widget' => '<div id="%1$s" class="%2$s txtCaps footLGNav">',
      'after_widget' => '</div>',
			'before_title' => '<h6 class="colorORG mb5">',
			'after_title' => '</h6><div class="titleDivLine footDivLine"></div>'
		));
		register_sidebar(array(
			'name' => __('Footer Column Two', 'sae'),
			'description' => __('Footer - Column Two', 'sae'),
			'id' => 'footer-col-2',
			'before_widget' => '<div id="%1$s" class="%2$s txtCaps">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="colorORG mb5">',
			'after_title' => '</h6><div class="titleDivLine footDivLine"></div>'
		));
    // register_sidebar(array(
		// 	'name' => __('Footer Newsletter', 'sae'),
		// 	'description' => __('Footer - Newsletter', 'sae'),
		// 	'id' => 'footer-newsletter',
		// 	'before_widget' => '<div id="%1$s" class="%2$s footNav footNavFull">',
		// 	'after_widget' => '</div>',
		// 	'before_title' => '<h5 class="cOrange mb8">',
		// 	'after_title' => '</h5><div class="titleDivLine footDivLine"></div>'
		// ));
	}
  add_action('after_setup_theme', 'sae_setup');






  /*--- Theme Functions ---*/

	//--- Remove invalid rel attribute values from categorylist
	function remove_category_rel_from_category_list($thelist){
		return str_replace('rel="category tag"', 'rel="tag"', $thelist);
	}
	add_filter('the_category', 'remove_category_rel_from_category_list');

	//--- Add page slug to body class
	function add_slug_to_body_class($classes){
		global $post;

		if (is_home()) {
			$key = array_search('blog', $classes);
			if ($key > -1) {
				unset($classes[$key]);
			}
		} elseif (is_page()) {
			$classes[] = sanitize_html_class($post->post_name);
		} elseif (is_singular()) {
			$classes[] = sanitize_html_class($post->post_name);
		}
		return $classes;
	}
	add_filter('body_class', 'add_slug_to_body_class');

	//--- Post Pagination
	function sae_page_navi() {
		global $wp_query;
		$bignum = 999999999;
		if ($wp_query->max_num_pages <= 1)
			return;
		echo '<nav class="pagination">';
		echo paginate_links( array(
			'base'         => str_replace($bignum, '%#%', esc_url( get_pagenum_link($bignum))),
			'format'       => '', //'?paged=%#%'
			'current'      => max(1, get_query_var('paged')),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		));
		echo '</nav>';
	}

	//--- Custom View Article link to Post instead of [...] for Excerpts
	function sae_view_article($more){
		global $post;
		return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'tronc-b2b-theme') . '</a>';
	}
	add_filter('excerpt_more', 'sae_view_article');

	//--- Remove Admin bar
	function remove_admin_bar(){
		return false;
	}
	add_filter('show_admin_bar', 'remove_admin_bar');

	//--- Remove thumbnail width and height dimensions
	function remove_thumbnail_dimensions( $html ){
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
	add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
	add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);

	//--- remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
	function sae_filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'sae_filter_ptags_on_images');

	//--- Related Posts Function - call using sae_related_posts();
	function sae_related_posts() {
		echo '<ul id="typ-related-posts">';
		global $post;
		$tags = wp_get_post_tags( $post->ID );
		if($tags) {
			foreach( $tags as $tag ) {
				$tag_arr .= $tag->slug . ',';
			}
			$args = array(
				'tag' => $tag_arr,
				'numberposts' => 5,
				'post__not_in' => array($post->ID)
			);
			$related_posts = get_posts( $args );
			if($related_posts) {
				foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
					<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; }
			else { ?>
				<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'tronc-b2b-theme' ) . '</li>'; ?>
			<?php }
		}
		wp_reset_postdata();
		echo '</ul>';
	}

	//--- Custom Gravatar in Settings > Discussion
	// function sae_gravatar($avatar_defaults){
	// 	$myavatar = get_template_directory_uri() . '/theme/images/gravatar.jpg';
	// 	$avatar_defaults[$myavatar] = 'Custom Gravatar';
	// 	return $avatar_defaults;
	// }
	// add_filter('avatar_defaults', 'sae_gravatar');



	/*--- Remove Actions ---*/
	// remove_action('wp_head', 'feed_links_extra', 3);	//--- Display the links to the extra feeds such as category feeds
	// remove_action('wp_head', 'feed_links', 2); 		 	//--- Display the links to the general feeds: Post and Comment Feed
	// remove_action('wp_head', 'rsd_link'); 			 	//--- Display the link to the Really Simple Discovery service endpoint, EditURI link
	// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);



	/*--- Remove Actions ---*/
	add_filter('widget_text', 'do_shortcode');		//--- Allow shortcodes in Dynamic Sidebar
	add_filter('widget_text', 'shortcode_unautop');	//--- Remove <p> tags in Dynamic Sidebars (better!)
	add_filter('the_excerpt', 'shortcode_unautop'); //--- Remove auto <p> tags in Excerpt (Manual Excerpts only)
	add_filter('the_excerpt', 'do_shortcode'); 		//--- Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)



	/*--- Remove Actions ---*/
	remove_filter('the_excerpt', 'wpautop');	//--- Remove <p> tags from Excerpt altogether

?>
