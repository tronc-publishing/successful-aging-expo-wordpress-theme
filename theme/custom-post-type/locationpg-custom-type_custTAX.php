<?php

	function locationpg_custom_post(){
		register_post_type('location-page',
			array('labels' => array(
				'name' => _x('Location Content', 'post type general name'),
				'singular_name' => _x('Location Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Location Content'),
				'add_new_item' => __('Add New Location Content'),
				'edit_item' => __('Edit Location Content'),
				'new_item' => __('New Location Content'),
				'view_item' => __('View Location Content'),
				'search_items' => __('Search Location Content'),
				'not_found' =>  __('No Location Content Found'),
				'not_found_in_trash' => __('No Location Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Location Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Location Content to Display on the Location Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'location-page',
				'hierarchical' => true,
				// 'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'location-page');
	// register_taxonomy_for_object_type('post_tag', 'location-page');

	add_action('init', 'locationpg_custom_post');

	register_taxonomy('custom_cat_location',
		array('location-page'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __('Location Page Categories'),
				'singular_name' => __('Location Page Category'),
				'search_items' => __('Search Location Page Categories'),
				'all_items' => __('All Location Page Categories'),
				'parent_item' => __('Parent Location Page Category'),
				'parent_item_colon' => __('Parent Location Page Category:'),
				'edit_item' => __('Edit Location Page Category'),
				'update_item' => __('Update Location Page Category'),
				'add_new_item' => __('Add New Location Page Category'),
				'new_item_name' => __('New Location Page Category Name')
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'custom-slug')
		)
	);

	// register_taxonomy('custom_tag',
	// 	array('location-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Location Page Tags'),
	// 			'singular_name' => __('Location Page Tag'),
	// 			'search_items' => __('Search Location Page Tags'),
	// 			'all_items' => __('All Location Page Tags'),
	// 			'parent_item' => __('Parent Location Page Tag'),
	// 			'parent_item_colon' => __('Parent Location Page Tag:'),
	// 			'edit_item' => __('Edit Location Page Tag'),
	// 			'update_item' => __('Update Location Page Tag'),
	// 			'add_new_item' => __('Add New Location Page Tag'),
	// 			'new_item_name' => __('New Location Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
