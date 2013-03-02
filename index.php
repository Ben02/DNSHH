<?php
/**
 * 主题特色：小清新，单栏，简洁，蓝白。
 * 
 * @package DNSHH
 * @author Ben
 * @version 1.1
 * @link http://me.ben-lab.com
 */
 
 $this->need('header.php');
 ?>
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
      </tbody>
    </table>
    <ol class="page-navigator"><?php $this->pageNav('上一页','下一页',10,'...');?></ol>

<?php $this->need('footer.php'); ?>