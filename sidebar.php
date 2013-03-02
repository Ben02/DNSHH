<hr>
    <table class="table footer">
       <tbody>
        <tr><td style="padding-right: 15px!important;"><span>最近回复</span>    <ul>
      <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li><?php $comments->author(false); ?> : <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(50, '...'); ?></a></li>
            <?php endwhile; ?>
    </ul> </td>
    <td style="padding-right: 15px!important;"><?php if ($this->is('post')): //判断是否文章页?>
  <?php $this->related(5)->to($relatedPosts); ?>
    <?php if ($this->related(5)->have()): //如果有相关文章?><span>相关文章</span>
          <ul>
            <?php while ($relatedPosts->next()): ?>
            <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
            <?php endwhile; ?>  
          </ul>
    <?php else: //没有相关文章输出最新文章?><span>最新文章</span>
          <ul>
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
          </ul> 
    <?php endif; ?>
<?php else: //不是文章页就输出随机文章?><span>随机文章</span>
          <ul>
<?php theme_random_posts();?>
          </ul>
     <?php endif; ?></td>
    <td  class="links"><span>友情链接</span>  <ul>  
<li><a href="http://.com/" title="请到sidebar.php修改友情链接" target="_blank">请到sidebar.php修改友情链接</a></li>
<li><a href="http://ben-lab.com/" title="Ben" target="_blank">Ben's Lab</a></li> 
</ul></td></tr>
      </tbody>
    </table>