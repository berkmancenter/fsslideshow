<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf('Page %s', 'twentyten', max( $paged, $page ) );
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
wp_head();
?>
</head>
<body <?php body_class(); ?>>
    <div id="container">
			<div id="content" role="main">

<?php 
$args = array( 'post_type' => 'fs_slide', 'orderby' => 'menu_order', 'order' => 'ASC');
$loop = new WP_Query( $args );
if($loop->have_posts()){ ?>
  <div class="fs_slide_container">
  <?php 
  while ( $loop->have_posts() ) : $loop->the_post();
  ?>
  	<div class="fs_slide <?php echo get_post_meta($post->ID, 'slide_style', true) ?>">
      <div class="slide_content">
  	  <h1><?php the_title();?></h1>
  	  <div class="slide_text"><?php the_content(); ?></div>
      </div>
  	</div>
    <?php 
  endwhile;
  ?>
  </div> <!-- fs_slide_container -->
<?php 
  } else {
  echo '<h1>None found.</h1>';
}
?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php
	wp_footer();
?>
</body>
</html>
