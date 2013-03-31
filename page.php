<?php
// 评论Ajax翻页 by 牧风

if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){// Ajax请求的头数据
    $this->need('comments.php');
}else{
    if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
    $this->need('header.php');
?>
<div id="title"><a title="<?php $this->author() ?>" href="<?php $this->author->permalink(); ?>" target="_blank"><?php $this->author->gravatar(48); ?></a>
<h1><?php $this->title() ?></h1>
<span class="desc"><?php $this->date(); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span>
</div>
			<?php $this->content(''); ?>
		<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
<?php }?>