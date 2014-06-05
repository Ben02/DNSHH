<hr>
    <table class="table footer">
       <tbody>
        <tr><td style="padding-right: 15px!important;">
          <span>最近回复</span>
          <ul>
          	<?php $comments = get_comments( array ('number' => '5' ) );?>
          	<?php foreach ($comments as $comment) { ?>
          	   <li><?php echo $comment->comment_author ?> : <a href="<?php echo get_comment_link( $comment->comment_ID )?>"><?php echo mb_substr($comment->comment_content,0,25,'utf-8');?></a></li>
          	<?php } ?>
          </ul></td>
          <td style="padding-right: 15px!important;"><?php if (is_single()): //判断是否文章页?>
          <?php 
          global $post;
           $post_author = get_the_author_meta( 'user_login' ); 
             $args = array(
                'author_name' => $post_author,
                'post__not_in' => array($post->ID),
                'showposts' => 5,               // 显示相关文章数量
                'orderby' => date,          // 按时间排序
                'caller_get_posts' => 1
            );
        	query_posts($args);?>
            <?php if (have_posts()) : //如果有相关文章?>
    	     <span>相关文章</span>
           <ul>
          	<?php while(have_posts()) { the_post(); update_post_caches($posts);?>
          			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          	<?php } ?>
           </ul>
	<?php //} 
	wp_reset_query();
	?>
      <?php else: //没有相关文章输出最新文章?>
          <span>最新文章</span>
          <ul>
            <?php foreach(get_posts() as $post) { ?>
			       <li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a></li>
			<?php } ?>
          </ul> 
    <?php endif; ?>
<?php else: //不是文章页就输出随机文章?>
          <span>随机文章</span>
          <ul>
<?php theme_random_posts();?>
          </ul>
     <?php endif; ?></td>
    <td  class="links">
          <span>友情链接</span>
          <ul>  
<!-- 
修改友情链接方法：
添加
<li><a href="网站地址" title="网站作者（可选）" target="_blank">网站名称</a></li> 
到</ul>的前面
-->
            <li><a href="http://.com/" title="请到sidebar.php修改友情链接" target="_blank">请到sidebar.php修改友情链接</a></li>
            <li><a href="http://ben-lab.com/" title="Ben" target="_blank">Ben's Lab</a></li> 
          </ul>
        </td></tr>
      </tbody>
    </table>