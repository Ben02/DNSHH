<?php $this->need('header.php'); ?>
<?php if ($this->have()): ?>
<div class="alert alert-info"><h4><?php $this->archiveTitle(' &lt; ','',''); ?></h4></div>
    <table class="table table-striped">
       <tbody>
        <tr style="display:none"><td></td></tr>
        	<?php while($this->next()): ?>
        <tr>
          <td>
            <h3 class="h3"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a><span class="desc"><?php $this->date(); ?>  /  <?php $this->views(); ?> 次围观  /  <?php $this->commentsNum('快抢沙发', '沙发被抢', '%d 条评论'); ?></span></h3>
            <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img class="thumb" src="<?php $this->options->themeUrl(); ?>thumb/timthumb.php?src=<?php Thumbnail_Plugin::show($this); ?>&h=100&w=140&zc=1" /></a>
        <span class="content"><?php $this->excerpt(400, '...'); ?></span>
          </td>
        </tr>
			 <?php endwhile; ?>
			 <?php else: ?>
				<blockquote>没有搜索到与“<?php $this->archiveTitle(' &lt; ','',''); ?>”相关的内容
					<small>请更换关键词重新搜索</small></blockquote>
<img style="display:block;margin:0 auto 0 auto" src="<?php $this->options->themeUrl(); ?>img/404.gif" />
			<?php endif; ?>
      </tbody>
    </table>
    <ol class="page-navigator"><?php $this->pageNav('上一页','下一页',10,'...');?></ol>

<?php $this->need('footer.php'); ?>