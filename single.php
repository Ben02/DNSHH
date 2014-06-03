<?php 
// 评论Ajax翻页 by 牧风

if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){// Ajax请求的头数据
    comments_template(); 
}else{
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<?php setPostViews(get_the_ID()); ?>
<div id="title"><a href="<?php echo $authordata->user_url; ?>" title="作者：<?php echo $authordata->display_name;?>"><img src="<?php echo output_avatar_url( get_the_author_email(), 48 ); ?>"></a>
<h1><?php the_title() ?></h1>
<span class="desc"><?php the_time('Y-m-d'); ?> / <?php the_category(' , '); ?> / <?php  the_tags('',' , ',''); ?>  /  <?php echo getPostViews(get_the_ID()); ?> 次围观  /  <?php comments_popup_link('快抢沙发', '沙发被抢', '% 条评论'); ?></span>
</div>
<div class="post">
			<?php the_content(); ?>
            <?php if (of_get_option('copydisplay') == 'display') { ?>
	<div class="lblue">本博客所有文章<a>如无特别注明</a>均为原创。<br />复制或转载请<a>以超链接形式</a>注明转自<a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('name') ?></a>，原文地址《<a href="<?php the_permalink() ?>"><?php the_title() ?></a>》
</div><?php } ?>        <?php if (of_get_option('sharedisplay') == 'display') { ?>
	<div class="share2">
		<ul class="drop-menu">
<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <a class="bds_qzone"></a>
        <a class="bds_tsina"></a>
        <a class="bds_tqq"></a>
        <a class="bds_renren"></a>
        <a class="bds_kaixin001"></a>
        <a class="bds_tqf"></a>
        <a class="bds_douban"></a>
        <a class="bds_tsohu"></a>
        <a class="bds_taobao"></a>
        <a class="bds_sohu"></a>
        <a class="bds_t163"></a>
        <a class="bds_tfh"></a>
        <a class="bds_hx"></a>
        <a class="bds_ff"></a>
        <a class="bds_xg"></a>
        <a class="bds_ty"></a>
        <a class="bds_hi"></a>
        <a class="bds_msn"></a>
        <a class="bds_deli"></a>
        <a class="bds_fbook"></a>
        <a class="bds_mshare"></a>
        <a class="bds_bdhome"></a>
        <a class="bds_tieba"></a>
        <a class="bds_diandian"></a>
        <a class="bds_huaban"></a>
        <a class="bds_youdao"></a>
        <a class="bds_mail"></a>
        <a class="bds_copy"></a>
        <span class="bds_more"></span>
		<a class="shareCount"></a>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=<?php echo of_get_option('shareid') ?>" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
		</li>
		</ul>
	</div><?php } ?><!--end share-->
            <?php if (of_get_option('pndisplay') == 'display') { ?>
<span class="float_l"  id="pre_post">上一篇： <?php previous_post_link(); ?></span>
<span class="float_r" id="next_post">下一篇： <?php next_post_link(); ?>
</span><?php } ?>
<div style="clear:both"></div>
</div>
<div id="comments">
		<?php comments_template(); ?>
</div><!-- #comments .comments-area -->
<div class="clear"></div>
<?php get_footer(); ?>
<?php endwhile; 
	}?>