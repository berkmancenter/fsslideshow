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
$args = array( 'post_type' => 'fs_slide');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="fs_slide">';
	the_title();
	the_content();
	echo '</div>';
endwhile;
?>

			</div><!-- #content -->
		</div><!-- #container -->
<?php
	wp_footer();
?>
</body>
</html>
