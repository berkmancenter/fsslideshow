<?php 

wp_enqueue_script('jquery');
wp_enqueue_script('cycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('fsslideshow', get_bloginfo('stylesheet_directory') . '/fsslideshow.js');

add_action( 'init', 'fsslideshow_create_post_types' );

function fsslideshow_create_post_types() {
  error_log('Registering custom post type');
	register_post_type( 'fs_slide',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'slide' )
			),
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
