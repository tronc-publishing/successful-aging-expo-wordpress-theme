<?php

	function contactuspg_custom_post(){
		register_post_type('contact-us-page',
			array('labels' => array(
				'name' => _x('Contact Us Content', 'post type general name'),
				'singular_name' => _x('Contact Us Content', 'post type singular name'),
				'add_new' => _x('Add New', 'Contact Us Content'),
				'add_new_item' => __('Add New Contact Us Content'),
				'edit_item' => __('Edit Contact Us Content'),
				'new_item' => __('New Contact Us Content'),
				'view_item' => __('View Contact Us Content'),
				'search_items' => __('Search Contact Us Content'),
				'not_found' =>  __('No Contact Us Content Found'),
				'not_found_in_trash' => __('No Contact Us Content Found In Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Contact Us Content'
				),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-widgets-menus',
				'description' => __('Add Contact Us Content to Display on the Contact Us Page'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => 'contact-us-page',
				'hierarchical' => true,
				// 'taxonomies' => array('category', 'post_tag'),
				'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats')
			)
		);
	}
	// register_taxonomy_for_object_type('category', 'contact-us-page');
	// register_taxonomy_for_object_type('post_tag', 'contact-us-page');

	add_action('init', 'contactuspg_custom_post');

	// register_taxonomy('custom_cat_contact-us',
	// 	array('contact-us-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Contact Us Page Categories'),
	// 			'singular_name' => __('Contact Us Page Category'),
	// 			'search_items' => __('Search Contact Us Page Categories'),
	// 			'all_items' => __('All Contact Us Page Categories'),
	// 			'parent_item' => __('Parent Contact Us Page Category'),
	// 			'parent_item_colon' => __('Parent Contact Us Page Category:'),
	// 			'edit_item' => __('Edit Contact Us Page Category'),
	// 			'update_item' => __('Update Contact Us Page Category'),
	// 			'add_new_item' => __('Add New Contact Us Page Category'),
	// 			'new_item_name' => __('New Contact Us Page Category Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array('slug' => 'custom-slug')
	// 	)
	// );

	// register_taxonomy('custom_tag',
	// 	array('contact-us-page'),
	// 	array('hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __('Contact Us Page Tags'),
	// 			'singular_name' => __('Contact Us Page Tag'),
	// 			'search_items' => __('Search Contact Us Page Tags'),
	// 			'all_items' => __('All Contact Us Page Tags'),
	// 			'parent_item' => __('Parent Contact Us Page Tag'),
	// 			'parent_item_colon' => __('Parent Contact Us Page Tag:'),
	// 			'edit_item' => __('Edit Contact Us Page Tag'),
	// 			'update_item' => __('Update Contact Us Page Tag'),
	// 			'add_new_item' => __('Add New Contact Us Page Tag'),
	// 			'new_item_name' => __('New Contact Us Page Tag Name')
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true
	// 	)
	// );

?>
