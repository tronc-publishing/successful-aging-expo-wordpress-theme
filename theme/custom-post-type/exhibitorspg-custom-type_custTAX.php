<?php

	function exhibitorspg_custom_post(){
		register_post_type('exhibitors-page',
			array('labels' => array(
				'name' => _x('Exhibitors Content', 'post type general name'),
				'singular_name' => _x('Exhibitors Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Exhibitors Content'),
				'add_new_item' => __('Add New Exhibitors Content'),
				'edit_item' => __('Edit Exhibitors Content'),
				'new_item' => __('New Exhibitors Content'),
				'view_item' => __('View Exhibitors Content'),
				'search_items' => __('Search Exhibitors Content'),
				'not_found' =>  __('No Exhibitors Content Found'),
				'not_found_in_trash' => __('No Exhibitors Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Exhibitors Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Exhibitors Content to Display on the Exhibitors Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'exhibitors-page',
				'hierarchical' => true,
				//'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'exhibitors-page');
	// register_taxonomy_for_object_type('post_tag', 'exhibitors-page');

	add_action('init', 'exhibitorspg_custom_post');

	// register_taxonomy('custom_cat',
	// 	array('exhibitors-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Exhibitors Page Categories'),
	// 			'singular_name' => __('Exhibitors Page Category'),
	// 			'search_items' => __('Search Exhibitors Page Categories'),
	// 			'all_items' => __('All Exhibitors Page Categories'),
	// 			'parent_item' => __('Parent Exhibitors Page Category'),
	// 			'parent_item_colon' => __('Parent Exhibitors Page Category:'),
	// 			'edit_item' => __('Edit Exhibitors Page Category'),
	// 			'update_item' => __('Update Exhibitors Page Category'),
	// 			'add_new_item' => __('Add New Exhibitors Page Category'),
	// 			'new_item_name' => __('New Exhibitors Page Category Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array('slug' => 'custom-slug')
	// 	)
	// );
	//
	// register_taxonomy('custom_tag',
	// 	array('exhibitors-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Exhibitors Page Tags'),
	// 			'singular_name' => __('Exhibitors Page Tag'),
	// 			'search_items' => __('Search Exhibitors Page Tags'),
	// 			'all_items' => __('All Exhibitors Page Tags'),
	// 			'parent_item' => __('Parent Exhibitors Page Tag'),
	// 			'parent_item_colon' => __('Parent Exhibitors Page Tag:'),
	// 			'edit_item' => __('Edit Exhibitors Page Tag'),
	// 			'update_item' => __('Update Exhibitors Page Tag'),
	// 			'add_new_item' => __('Add New Exhibitors Page Tag'),
	// 			'new_item_name' => __('New Exhibitors Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
