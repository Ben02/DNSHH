<?php get_header(); while ( have_posts() ) : the_post();?>
<div id="title"><a href="<?php echo $authordata->user_url; ?>" title="作者：<?php echo $authordata->display_name;?>"><?php echo get_avatar( get_the_author_email(), 48 ); ?></a>
<h1><?php the_title() ?></h1>
<span class="desc"><?php the_time('Y-m-d'); ?>  /  <?php the_views(); ?> 次围观  /  <?php comments_popup_link('快抢沙发', '沙发被抢', '% 条评论'); ?></span>
</div>
			<?php the_content; ?>
		<?php comments_template(); ?>
<?php get_footer(); ?>
<?php endwhile;?>