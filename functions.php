<?php 

wp_enqueue_script('jquery');
wp_enqueue_script('cycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('dotimeout', get_bloginfo('stylesheet_directory') . '/jquery.ba-dotimeout.min.js');
wp_enqueue_script('fullscreenr', get_bloginfo('stylesheet_directory') . '/jquery.fullscreenr.js');
wp_enqueue_script('fsslideshow', get_bloginfo('stylesheet_directory') . '/fsslideshow.js');

add_action( 'init', 'fsslideshow_create_post_types' );
register_taxonomy('slideshow_category','fs_slide',array('labels' => array('name' => 'Slideshow Categories', 'singular_name' => 'Slideshow Category')));

function fsslideshow_create_post_types() {
	register_post_type( 'fs_slide',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'Slide' )
			),
    'taxonomies' => array('slideshow_category'),
    'supports' => array(
      'title',
      'editor',
      'page-attributes',
      'custom-fields'
    ),
		'public' => true,
		'has_archive' => true,
		)
	);
}
