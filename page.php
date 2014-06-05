<?php 
// 评论Ajax翻页 by 牧风

if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){// Ajax请求的头数据
    comments_template(); 
}else{
	get_header();
?> 
<?php while ( have_posts() ) : the_post();?>
<?php setPostViews(get_the_ID()); ?>
<div id="title"><a href="<?php echo $authordata->user_url; ?>" title="作者：<?php echo $authordata->display_name;?>"><img src="<?php echo output_avatar_url( get_the_author_email(), 48 ); ?>"></a>
<h1><?php the_title() ?></h1>
<span class="desc"><?php the_time('Y-m-d'); ?>  /  <?php echo getPostViews(get_the_ID()); ?> 次围观  /  <?php comments_popup_link('快抢沙发', '沙发被抢', '% 条评论'); ?></span>
</div>
<div class="post">
	<?php the_content(); ?>
</div>
<div id="comments">
	<?php comments_template(); ?>
</div><!-- #comments .comments-area -->
<div class="clear"></div>
<?php get_footer(); ?>
<?php endwhile;
} ?>
