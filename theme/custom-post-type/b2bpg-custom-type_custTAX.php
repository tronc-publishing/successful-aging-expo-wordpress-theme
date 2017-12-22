<?php

	function b2bpg_custom_post(){
		register_post_type('b2b-page',
			array('labels' => array(
				'name' => _x('B2B Content', 'post type general name'),
				'singular_name' => _x('B2B Content', 'post type singular name'),
				'add_new' => _x('Add New', 'B2B Content'),
				'add_new_item' => __('Add New B2B Content'),
				'edit_item' => __('Edit B2B Content'),
				'new_item' => __('New B2B Content'),
				'view_item' => __('View B2B Content'),
				'search_items' => __('Search B2B Content'),
				'not_found' =>  __('No B2B Content Found'),
				'not_found_in_trash' => __('No B2B Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'B2B Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add B2B Content to Display on the B2B Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'b2b-page',
				'hierarchical' => true,
				//'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'b2b-page');
	// register_taxonomy_for_object_type('post_tag', 'b2b-page');

	add_action('init', 'b2bpg_custom_post');

	// register_taxonomy('custom_cat',
	// 	array('b2b-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('B2B Page Categories'),
	// 			'singular_name' => __('B2B Page Category'),
	// 			'search_items' => __('Search B2B Page Categories'),
	// 			'all_items' => __('All B2B Page Categories'),
	// 			'parent_item' => __('Parent B2B Page Category'),
	// 			'parent_item_colon' => __('Parent B2B Page Category:'),
	// 			'edit_item' => __('Edit B2B Page Category'),
	// 			'update_item' => __('Update B2B Page Category'),
	// 			'add_new_item' => __('Add New B2B Page Category'),
	// 			'new_item_name' => __('New B2B Page Category Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array('slug' => 'custom-slug')
	// 	)
	// );
	//
	// register_taxonomy('custom_tag',
	// 	array('b2b-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('B2B Page Tags'),
	// 			'singular_name' => __('B2B Page Tag'),
	// 			'search_items' => __('Search B2B Page Tags'),
	// 			'all_items' => __('All B2B Page Tags'),
	// 			'parent_item' => __('Parent B2B Page Tag'),
	// 			'parent_item_colon' => __('Parent B2B Page Tag:'),
	// 			'edit_item' => __('Edit B2B Page Tag'),
	// 			'update_item' => __('Update B2B Page Tag'),
	// 			'add_new_item' => __('Add New B2B Page Tag'),
	// 			'new_item_name' => __('New B2B Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
