    <table class="table table-striped">
       <tbody>
        <tr style="display:none"><td></td></tr>
        <?php while ( have_posts() ) : the_post(); ?>
        <tr>
          <td>
		<?php if ($this->options->textDisplay == 'text') { ?>
            <h3 class="h3"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a><span class="desc"><?php $this->date(); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span></h3>
            	<?php if ($this->options->thumbDisplay == 'display') { ?>
            		<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img class="thumb" src="<?php $this->options->themeUrl(); ?>thumb/timthumb.php?src=<?php Thumbnail_Plugin::show($this); ?>&h=100&w=140&zc=1" /></a>
            		<span class="content"><?php $this->excerpt(400, '...'); ?></span>
            	<?php } ?>
            	<?php if ($this->options->thumbDisplay == 'close') { ?>
        			<span class="content nothumb"><?php $this->excerpt(400, '...'); ?></span>
        		<?php } ?>
		<?php } ?>
		<?php if ($this->options->textDisplay == 'html') { ?>
			<div class="title"><a title="作者：<?php $this->author() ?>" href="<?php $this->author->permalink(); ?>" target="_blank"><?php $this->author->gravatar(48); ?></a>
				<h1><?php $this->title() ?></h1>
					<span class="desc"><?php $this->date(); ?> / <?php $this->category(' , '); ?> / <?php $this->tags(' , ', true, 'none'); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span>
			</div>
			<div class="post postindex">
			<?php $this->content('阅读剩余部分...'); ?>
			</div>
		<?php } ?>
          </td>
        </tr>
<?php endwhile; ?>
      </tbody>
    </table>
    <ol class="page-navigator"><?php $this->pageNav('上一页','下一页',10,'...');?></ol>