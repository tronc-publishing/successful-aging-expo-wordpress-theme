<?php

	function adspg_custom_post(){
		register_post_type('ads-page',
			array('labels' => array(
				'name' => _x('Ads Content', 'post type general name'),
				'singular_name' => _x('Ads Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Ads Content'),
				'add_new_item' => __('Add New Ads Content'),
				'edit_item' => __('Edit Ads Content'),
				'new_item' => __('New Ads Content'),
				'view_item' => __('View Ads Content'),
				'search_items' => __('Search Ads Content'),
				'not_found' =>  __('No Ads Content Found'),
				'not_found_in_trash' => __('No Ads Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Ads Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Ads Content to Display on the Ads Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'ads-page',
				'hierarchical' => true,
				//'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'ads-page');
	// register_taxonomy_for_object_type('post_tag', 'ads-page');

	add_action('init', 'adspg_custom_post');

	// register_taxonomy('custom_cat',
	// 	array('ads-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Ads Page Categories'),
	// 			'singular_name' => __('Ads Page Category'),
	// 			'search_items' => __('Search Ads Page Categories'),
	// 			'all_items' => __('All Ads Page Categories'),
	// 			'parent_item' => __('Parent Ads Page Category'),
	// 			'parent_item_colon' => __('Parent Ads Page Category:'),
	// 			'edit_item' => __('Edit Ads Page Category'),
	// 			'update_item' => __('Update Ads Page Category'),
	// 			'add_new_item' => __('Add New Ads Page Category'),
	// 			'new_item_name' => __('New Ads Page Category Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array('slug' => 'custom-slug')
	// 	)
	// );
	//
	// register_taxonomy('custom_tag',
	// 	array('ads-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Ads Page Tags'),
	// 			'singular_name' => __('Ads Page Tag'),
	// 			'search_items' => __('Search Ads Page Tags'),
	// 			'all_items' => __('All Ads Page Tags'),
	// 			'parent_item' => __('Parent Ads Page Tag'),
	// 			'parent_item_colon' => __('Parent Ads Page Tag:'),
	// 			'edit_item' => __('Edit Ads Page Tag'),
	// 			'update_item' => __('Update Ads Page Tag'),
	// 			'add_new_item' => __('Add New Ads Page Tag'),
	// 			'new_item_name' => __('New Ads Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
