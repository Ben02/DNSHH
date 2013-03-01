<?php
    /**
    * guestbook
    *
    * @package custom
    */
?>
<?php $this->need('header.php'); ?>
<div id="title"><a title="<?php $this->author() ?>" href="<?php $this->author->permalink(); ?>" target="_blank"><?php $this->author->gravatar(48); ?></a>
<h1><?php $this->title() ?></h1>
<span class="desc"><?php $this->date(); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span>
</div>
<div class="post">
	 <div id="list-post" style="margin: -10px auto 21px auto;width: 600px;">	
 <ul class='readers-list'>
		<?php getFriendWall(); ?>
</ul></div>
			<?php $this->content(''); ?>
</div>
		<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>