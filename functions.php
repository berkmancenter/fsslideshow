<?php 

wp_enqueue_script('jquery');
wp_enqueue_script('cycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('dotimeout', get_bloginfo('stylesheet_directory') . '/jquery.ba-dotimeout.min.js');
wp_enqueue_script('fullscreenr', get_bloginfo('stylesheet_directory') . '/jquery.fullscreenr.js');
wp_enqueue_script('fsslideshow', get_bloginfo('stylesheet_directory') . '/fsslideshow.js');

add_action( 'init', 'fsslideshow_create_post_types' );
add_action( 'admin_menu', 'fsslideshow_admin_menu');

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

function fsslideshow_admin_menu(){
    add_submenu_page('options-general.php', __('Fullscreen Slideshows'), __('Fullscreen Slideshow'), 'manage_options', 'fsslideshow_config', 'fsslideshow_config');
}

function fsslideshow_config(){
	$updated = false;
	if ( isset($_POST['submit']) ) {
		if ( function_exists('current_user_can') && !current_user_can('manage_options') ){
			die(__('how about no?'));
		};
		// Save options
		$updated = true;
		update_option('fsslideshow_default_slideshow_category', stripslashes($_POST['fsslideshow_default_slideshow_category']));
	}
	// emit form
	if($updated){ 
		echo "<div id='message' class='updated'><p><strong>" . __('Saved options.') ."</strong></p></div>";
	}

    $categories = get_categories('hide_empty=0&orderby=name&taxonomy=slideshow_category');
	$default = get_option('fsslideshow_default_slideshow_category');

?>
<div class="wrap">
  <form action="" method="post">
	<h2><?php _e('Fullscreen Slideshow Configuration'); ?></h2>
	<table class="form-table">
		<tr>
			<th><label for="fsslideshow_default_slideshow_category"><?php _e('Default slideshow category') ?></label></th>
			<td>
			<select name="fsslideshow_default_slideshow_category">
		<?php foreach($categories as $cat){ ?>
			<option <?php echo ($default == $cat->slug) ? ' selected="selected" ' : ''; ?>value="<?php echo esc_attr($cat->slug); ?>"><?php echo htmlspecialchars($cat->name); ?></option>
		<?php }?>
			</select>
		</td>
		</td>
	</table>
	  <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Update Options'); ?>"  /></p> 
  </form>
<?php
}
