<?php

	function homepg_custom_post(){
		register_post_type('home-page',
			array('labels' => array(
				'name' => _x('Home Content', 'post type general name'),
				'singular_name' => _x('Home Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Home Content'),
				'add_new_item' => __('Add New Home Content'),
				'edit_item' => __('Edit Home Content'),
				'new_item' => __('New Home Content'),
				'view_item' => __('View Home Content'),
				'search_items' => __('Search Home Content'),
				'not_found' =>  __('No Home Content Found'),
				'not_found_in_trash' => __('No Home Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Home Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Home Content to Display on the Home Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'home-page',
				'hierarchical' => true,
				//'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'home-page');
	// register_taxonomy_for_object_type('post_tag', 'home-page');

	add_action('init', 'homepg_custom_post');

	// register_taxonomy('custom_cat',
	// 	array('home-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Home Page Categories'),
	// 			'singular_name' => __('Home Page Category'),
	// 			'search_items' => __('Search Home Page Categories'),
	// 			'all_items' => __('All Home Page Categories'),
	// 			'parent_item' => __('Parent Home Page Category'),
	// 			'parent_item_colon' => __('Parent Home Page Category:'),
	// 			'edit_item' => __('Edit Home Page Category'),
	// 			'update_item' => __('Update Home Page Category'),
	// 			'add_new_item' => __('Add New Home Page Category'),
	// 			'new_item_name' => __('New Home Page Category Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array('slug' => 'custom-slug')
	// 	)
	// );
	//
	// register_taxonomy('custom_tag',
	// 	array('home-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Home Page Tags'),
	// 			'singular_name' => __('Home Page Tag'),
	// 			'search_items' => __('Search Home Page Tags'),
	// 			'all_items' => __('All Home Page Tags'),
	// 			'parent_item' => __('Parent Home Page Tag'),
	// 			'parent_item_colon' => __('Parent Home Page Tag:'),
	// 			'edit_item' => __('Edit Home Page Tag'),
	// 			'update_item' => __('Update Home Page Tag'),
	// 			'add_new_item' => __('Add New Home Page Tag'),
	// 			'new_item_name' => __('New Home Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
