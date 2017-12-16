<?php

	function entertainmentpg_custom_post(){
		register_post_type('entertainment-page',
			array('labels' => array(
				'name' => _x('Entertainment Content', 'post type general name'),
				'singular_name' => _x('Entertainment Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Entertainment Content'),
				'add_new_item' => __('Add New Entertainment Content'),
				'edit_item' => __('Edit Entertainment Content'),
				'new_item' => __('New Entertainment Content'),
				'view_item' => __('View Entertainment Content'),
				'search_items' => __('Search Entertainment Content'),
				'not_found' =>  __('No Entertainment Content Found'),
				'not_found_in_trash' => __('No Entertainment Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Entertainment Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Entertainment Content to Display on the Entertainment Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'entertainment-page',
				'hierarchical' => true,
				// 'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'entertainment-page');
	// register_taxonomy_for_object_type('post_tag', 'entertainment-page');

	add_action('init', 'entertainmentpg_custom_post');

	register_taxonomy('custom_cat_entertainment',
		array('entertainment-page'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __('Entertainment Page Categories'),
				'singular_name' => __('Entertainment Page Category'),
				'search_items' => __('Search Entertainment Page Categories'),
				'all_items' => __('All Entertainment Page Categories'),
				'parent_item' => __('Parent Entertainment Page Category'),
				'parent_item_colon' => __('Parent Entertainment Page Category:'),
				'edit_item' => __('Edit Entertainment Page Category'),
				'update_item' => __('Update Entertainment Page Category'),
				'add_new_item' => __('Add New Entertainment Page Category'),
				'new_item_name' => __('New Entertainment Page Category Name')
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'custom-slug')
		)
	);

	// register_taxonomy('custom_tag',
	// 	array('entertainment-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Entertainment Page Tags'),
	// 			'singular_name' => __('Entertainment Page Tag'),
	// 			'search_items' => __('Search Entertainment Page Tags'),
	// 			'all_items' => __('All Entertainment Page Tags'),
	// 			'parent_item' => __('Parent Entertainment Page Tag'),
	// 			'parent_item_colon' => __('Parent Entertainment Page Tag:'),
	// 			'edit_item' => __('Edit Entertainment Page Tag'),
	// 			'update_item' => __('Update Entertainment Page Tag'),
	// 			'add_new_item' => __('Add New Entertainment Page Tag'),
	// 			'new_item_name' => __('New Entertainment Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
