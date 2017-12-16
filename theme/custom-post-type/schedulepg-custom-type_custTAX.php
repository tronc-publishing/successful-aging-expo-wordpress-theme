<?php

	function schedulepg_custom_post(){
		register_post_type('schedule-page',
			array('labels' => array(
				'name' => _x('Schedule Content', 'post type general name'),
				'singular_name' => _x('Schedule Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Schedule Content'),
				'add_new_item' => __('Add New Schedule Content'),
				'edit_item' => __('Edit Schedule Content'),
				'new_item' => __('New Schedule Content'),
				'view_item' => __('View Schedule Content'),
				'search_items' => __('Search Schedule Content'),
				'not_found' =>  __('No Schedule Content Found'),
				'not_found_in_trash' => __('No Schedule Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Schedule Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Schedule Content to Display on the Schedule Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'schedule-page',
				'hierarchical' => true,
				// 'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'schedule-page');
	// register_taxonomy_for_object_type('post_tag', 'schedule-page');

	add_action('init', 'schedulepg_custom_post');

	register_taxonomy('custom_cat_schedule',
		array('schedule-page'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __('Schedule Page Categories'),
				'singular_name' => __('Schedule Page Category'),
				'search_items' => __('Search Schedule Page Categories'),
				'all_items' => __('All Schedule Page Categories'),
				'parent_item' => __('Parent Schedule Page Category'),
				'parent_item_colon' => __('Parent Schedule Page Category:'),
				'edit_item' => __('Edit Schedule Page Category'),
				'update_item' => __('Update Schedule Page Category'),
				'add_new_item' => __('Add New Schedule Page Category'),
				'new_item_name' => __('New Schedule Page Category Name')
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'custom-slug')
		)
	);

	// register_taxonomy('custom_tag',
	// 	array('schedule-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Schedule Page Tags'),
	// 			'singular_name' => __('Schedule Page Tag'),
	// 			'search_items' => __('Search Schedule Page Tags'),
	// 			'all_items' => __('All Schedule Page Tags'),
	// 			'parent_item' => __('Parent Schedule Page Tag'),
	// 			'parent_item_colon' => __('Parent Schedule Page Tag:'),
	// 			'edit_item' => __('Edit Schedule Page Tag'),
	// 			'update_item' => __('Update Schedule Page Tag'),
	// 			'add_new_item' => __('Add New Schedule Page Tag'),
	// 			'new_item_name' => __('New Schedule Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
