<?php

/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

//支持外链缩略图
if ( function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
 set_post_thumbnail_size( 140, 100, true );
function catch_first_image() {global $post, $posts;$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){
		$first_img = bloginfo('template_url'). '/thumb/default.png';
		}
  return $first_img;
};

//中文截取
function custom_excerpt_length( $length ) {
	return 400;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function output_avatar($avatar,$id_or_email,$size,$default,$alt){
	return str_replace("class='avatar","class='",$avatar);
}
add_filter('get_avatar','output_avatar',10,5);