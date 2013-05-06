    <table class="table table-striped">
       <tbody>
        <tr style="display:none"><td></td></tr>
        <?php while ( have_posts() ) : the_post(); ?>
        <tr>
          <td>
		<?php if (of_get_option('textdisplay') == 'text') { ?>
            <h3 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="desc"><?php the_time('Y-m-d'); ?>  /  <?php the_views(); ?> 次围观  /  <?php comments_popup_link('快抢沙发', '沙发被抢', '% 条评论'); ?></span></h3>
            	<?php if (of_get_option('thumbdisplay') == 'display') { ?>
            		<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img class="thumb" src="<?php echo catch_first_image() ?>" /></a>
            		<span class="content"><?php the_excerpt(200); ?></span>
            	<?php } ?>
            	<?php if (of_get_option('thumbdisplay') == 'close') { ?>
        			<span class="content nothumb"><?php the_excerpt(200); ?></span>
        		<?php } ?>
		<?php } ?>
		<?php if (of_get_option('textdisplay') == 'html') { ?>
			<div id="title"><a href="<?php echo $authordata->user_url; ?>" title="作者：<?php echo $authordata->display_name;?>"><?php echo get_avatar( get_the_author_email(), 48 ); ?></a>
				<h1><?php the_title() ?></h1>
					<span class="desc"><?php the_time('Y-m-d'); ?> / <?php the_category(' , '); ?> / <?php the_tags('',' , ',''); ?>  /  <?php the_views(); ?> 次围观  /  <?php comments_popup_link('快抢沙发', '沙发被抢', '%条评论'); ?></span>
			</div>
			<div class="post postindex">
			<?php the_content('阅读剩余部分...'); ?>
			</div>
		<?php } ?>
          </td>
        </tr>
<?php endwhile; ?>
      </tbody>
    </table>
<?php par_pagenavi(6); ?>