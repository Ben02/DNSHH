<?php
    /**
    * 标签
    *
    * @package custom
    */
?><?php $this->need('header.php'); ?>
<div id="title"><a title="<?php $this->author() ?>" href="<?php $this->author->permalink(); ?>" target="_blank"><?php $this->author->gravatar(48); ?></a>
<h1><?php $this->title() ?></h1>
<span class="desc"><?php $this->date(); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span>
</div>
<div class="post">
			<?php $this->content(''); ?>
					<style>
		.size-8{font-size:10pt;} 
        .size-18{font-size:12pt;} 
        .size-28{font-size:14pt;} 
        .size-35{font-size:15pt;} 
		</style>
		<div class="jBox" style="margin-bottom:10px;">
<div class="jBoxH"><h2><?php _e('标签'); ?></h2></div>
<?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
<?php if($tags->have()): ?>
    <?php while ($tags->next()): ?>
   <a style="color:rgb(<?php echo(rand(0,255)); ?>,<?php echo(rand(0,255)); ?>,<?php echo(rand(0,255)); ?>)" href="<?php $tags->permalink(); ?>" class="size-<?php $tags->split(8, 18, 28, 35); ?>"title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
    <?php endwhile; ?>
<?php endif; ?>
</div>
		<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>