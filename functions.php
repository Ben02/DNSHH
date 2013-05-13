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
		return $first_img;
	}
	else
	{
  	return bloginfo('template_url'). '/thumb/timthumb.php?src=' . $first_img . '&h=100&w=140&zc=1';
	}
};

//中文截取
function custom_excerpt_length( $length ) {
	return 400;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//输出头像地址
function output_avatar_url($email,$size){
	$email_hash = md5( strtolower( trim( $email ) ) );
	if (!empty($size) ) $p = '?size=' . $size;
	$dir = sprintf( "http://%d.gravatar.com/avatar/", ( hexdec( $email_hash[0] ) % 2 ) );
    return $dir . $email_hash . $p;
}

//格式化评论
function format_comments($comment,$args,$depth) { 
	commentApprove($comment->comment_author_email); ?>
	<li id="comment-<?php comment_ID() ?>" class="<?php if ($depth==1) echo 'comment-parent'; else echo 'comment-child'; ?>">
	<?php if($comment->comment_author_email != '') { ?>
	<div class="comment-author">
	<img class="avatar" width="32" height="32" alt="<?php printf(__('$s'),get_comment_author_link()) ?>" src="<?php echo output_avatar_url($comment->comment_author_email,32) ?>">
	</div>
	<?php } ?>
	<div class="comment-meta">
	<cite class="fn">
	<a target="_blank" rel="nofollow" href="<?php comment_author_url(); ?>"><?php echo $comment->comment_author ?></a>
	</cite>
	<span class="commentdate">
	[ <a href="<?php echo get_comment_link( $comment->comment_ID )  ?>"><?php echo $comment->comment_date ?></a> ] 
	</span>
	<span class="comment-reply">
	<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '回复' , 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</span>
	</div>
	<div class="comment-p">
	<p><?php echo $comment->comment_content ?></p>
	</div>
<?php } 

/**
 * 评论者认证
 *
 * @author ShingChi
 * @access public
 * @param str $email 评论者邮址
 * @return viod 
 */
function commentApprove($email = NULL)
{
    if (empty($email)) return;
 
$getvip = of_get_option('setvip');
$setvip = explode("\n", $getvip);
$getadmin = of_get_option('setadmin');
$setadmin = explode("\n", $getadmin);
$getstar = of_get_option('setstar');
$setstar = explode("\n", $getstar);

    if (in_array($email, $setadmin)) {
        echo '<img class="vip" title="独一无二的博主认证" src="http://1.labcdn.sinaapp.com/cache/images/yellowv.png" width="15px"/>';
    } else if (in_array($email, $setvip)) {
        echo '<img class="vip" title="认证贵宾VIP" src="http://1.labcdn.sinaapp.com/cache/images/bluev.png" width="15px"/>';
    } else if (in_array($email, $setstar)) {
        echo '<img class="vip-water" title="灌水达人" src="http://1.labcdn.sinaapp.com/cache/images/star.png" width="17px"/>';
    }
}
//随机文章
function theme_random_posts() {
	 $rand_posts = get_posts('numberposts=5&orderby=rand');  foreach( $rand_posts as $post ) { ?>
	 <li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a></li>
	 <?php }
}
//文章分页
function par_pagenavi($range = 9){ ?>
<ol class="page-navigator">
	<ol class="page-navigator">
	<?php 
	global $paged, $wp_query;
	if ( !$max_page ) { $max_page = $wp_query->max_num_pages; }
	if  ($max_page > 1 ) {
		if(!$paged){
			$paged = 1;
		} 
		if($paged != 1) { ?>
		<li><a href="<?php previous_posts( false ) ?>" class="prev">上一页</a></li>
		<?php } 
		if($max_page > $range){
			if($paged < $range) { for($i = 1; $i <= ($range + 1); $i++)
				{
					echo "<li";
					if($i==$paged) echo " class='current'";
					echo"><a href='" . get_pagenum_link($i) ."'";
					echo ">$i</a></li>";
					}
				}
			elseif($paged >= ($max_page - ceil(($range/2))))
				{
				for($i = $max_page - $range; $i <= $max_page; $i++)
					{echo "<li";
					if($i==$paged)echo " class='current'";
					echo"><a href='" . get_pagenum_link($i) ."'";
					echo ">$i</a></li>";
					}
				}
			elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)
					{
					echo "<li";
					if($i==$paged) echo " class='current'";
					echo "><a href='" . get_pagenum_link($i) ."'";echo ">$i</a></li>";
					}
				}
			}
		else{
			for($i = 1; $i <= $max_page; $i++)
				{
				echo "<li";
				if($i==$paged)echo " class='current'";
				echo "><a href='" . get_pagenum_link($i) ."'";
				echo ">$i</a></li>";
				}
			} 
			if($paged != $max_page) { ?>
			<li><a href="<?php next_posts( $max_page, true ) ?>" class="next">下一页</a></li>
			<?php } ?>
		<?php } ?>
	</ol>
</ol>
	<?php } 

//get_comments_pagenum_link
function comments_pagenavi($range = 5){ ?>
	<ol class="page-navigator">
	<?php 
	if ( !$max_comment_page ) { $max_comment_page = get_comment_pages_count(); }
	if  ($max_comment_page > 1 ) {
		$cpaged = get_query_var('cpage');
		if($cpaged != 1) { ?>
		<li><a href="<?php echo esc_url( get_comments_pagenum_link( $cpaged - 1 ) ) ?>" class="prev">上一页</a></li>
		<?php } 
		if($max_comment_page > $range){
			if($cpaged < $range) { for($i = 1; $i <= ($range + 1); $i++)
				{
					echo "<li";
					if($i==$cpaged) echo " class='current'";
					echo"><a href='" . get_comments_pagenum_link($i) ."'";
					echo ">$i</a></li>";
					}
				}
			elseif($cpaged >= ($max_comment_page - ceil(($range/2))))
				{
				for($i = $max_comment_page - $range; $i <= $max_comment_page; $i++)
					{echo "<li";
					if($i==$cpaged)echo " class='current'";
					echo"><a href='" . get_comments_pagenum_link($i) ."'";
					echo ">$i</a></li>";
					}
				}
			elseif($cpaged >= $range && $cpaged < ($max_comment_page - ceil(($range/2)))){
				for($i = ($cpaged - ceil($range/2)); $i <= ($cpaged + ceil(($range/2))); $i++)
					{
					echo "<li";
					if($i==$cpaged) echo " class='current'";
					echo "><a href='" . get_comments_pagenum_link($i) ."'";echo ">$i</a></li>";
					}
				}
			}
		else{
			for($i = 1; $i <= $max_comment_page; $i++)
				{
				echo "<li";
				if($i==$cpaged)echo " class='current'";
				echo "><a href='" . get_comments_pagenum_link($i) ."'";
				echo ">$i</a></li>";
				}
			} 
			if($cpaged != $max_comment_page) { ?>
			<li><a href="<?php echo esc_url( get_comments_pagenum_link($cpaged + 1) ) ?>" class="next">下一页</a></li>
			<?php } ?>
		<?php } ?>
	</ol>
	<?php } 
