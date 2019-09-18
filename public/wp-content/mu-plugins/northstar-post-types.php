<?php
function northstar_post_types() {
	//Event Post Type
	register_post_type('event', array(
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'rewrite' => array(
			'slug' => 'events'
		),
		'has_archive' => true,
		'public' => true, //to make visible to all viewers
		'labels' => array(
		  'name' => 'Events',
		  'add_new_item' => 'Add New Event',
		  'edit_item' => 'Edit Event',
		  'all_items' => 'All Events',
		  'singular_name' => 'Event'
		),
		'menu_icon' => 'dashicons-calendar'
	));

	//Sermon Post Type
	register_post_type('sermon', array(
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array(
			'slug' => 'sermons'
		),
		'has_archive' => true,
		'public' => true, //to make visible to all viewers
		'labels' => array(
		  'name' => 'Sermons',
		  'add_new_item' => 'Add New Sermon',
		  'edit_item' => 'Edit Sermon',
		  'all_items' => 'All Sermons',
		  'singular_name' => 'Sermon'
		),
		'menu_icon' => 'dashicons-microphone'
	));

	//News Post Type
	register_post_type('news-post', array(
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'rewrite' => array(
			'slug' => 'news'
		),
		'has_archive' => true,
		'public' => true, //to make visible to all viewers
		'labels' => array(
		  'name' => 'News',
		  'add_new_item' => 'Add New Post',
		  'edit_item' => 'Edit News Post',
		  'all_items' => 'All News Posts',
		  'singular_name' => 'News-Post'
		),
		'menu_icon' => 'dashicons-testimonial'
	));
}

add_action('init','northstar_post_types');
?>