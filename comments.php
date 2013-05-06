<?php

if ( post_password_required() )
	return;
?>

<script>
$(function() {
	$('.comment-reply-link').attr('href','javascript:void(0);');
	addComment = new Object();
	addComment.moveForm = function(comment_id, parent, id, post_id) {
			$('.respond').appendTo('#' + comment_id);
			$('.cancel-comment-reply').show();
			$('#comment_parent').val(parent);
			};
	addComment.cancelReply = function() {
			$('.respond').appendTo('#comment-box-wrapper');
			$('.cancel-comment-reply').hide();
			$('#comment_parent').val('0');
			};
});
</script>
	<?php if ( have_comments() ) : ?>
		<?php
			printf( _n( '<h3>仅有一条评论</h3>', '<h3>已有 %1$s 条评论</h3>', get_comments_number() ),
				number_format_i18n( get_comments_number() ));
		?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<?php comments_pagenavi(5); ?>
		<?php endif; // check for comment navigation ?>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol' ,'callback' => 'format_comments') ); ?>
		</ol><!-- .commentlist -->

	<?php endif; // have_comments() ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() ) : ?>
			<p class="nocomments"><?php _e( '<h3>评论已关闭</h3>'); ?></p>
		<?php else: ?>
		<div id="comment-box-wrapper">
			<div class="comment-box respond">
				<div class="cancel-comment-reply" style="display:none"><a id="cancel-comment-reply-link" onclick="return addComment.cancelReply();" rel="nofollow" href="javascript:void(0);">取消回复</a></div>
				 <div class="addcomment" id="respond"></div>
				<?php $commenter = wp_get_current_commenter();　?>
				<h3 id="response"><b style="font-size:18px"> &gt; </b><?php comment_form_title( '添加新评论', '向 %s 进行回复' );?></h3>
				<form method="post" action="<?php bloginfo('siteurl') ?>/wp-comments-post.php" id="comment_form">
					<div class="ie6show"></div>
					<div class="form-vertical">
						<p><textarea style="width:90%;float:left;margin: 0 15px 10px 10px;height: 140px;" name="comment" id="comment" tabindex="1" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};"></textarea></p>
					</div>
					<div class="form-vertical">
						<?php if(is_user_logged_in()): ?>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<?php $current_user = wp_get_current_user(); ?>
									<label class="control-label" for="inputIcon">已经以 <a href="<?php echo get_edit_user_link() ?>"><?php echo $current_user->display_name ?></a> 的身份登录. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">[退出]</a></p></label>
									</div>
								</div>
							</div>
						<?php else: ?>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-user"></i></span>
									<input style="width: 141px;" placeholder="昵称" type="text" tabindex="2" name="author" value="<?php echo esc_attr( $commenter['comment_author'] ) ?>" />
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-envelope"></i></span>
										<input style="width: 141px;" placeholder="邮箱" type="text" tabindex="3" name="email" value="<?php echo esc_attr(  $commenter['comment_author_email'] ) ?>" />
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-leaf"></i></span>
										<input style="width: 141px;" placeholder="网站" type="text" tabindex="4" name="url" value="<?php echo  esc_attr( $commenter['comment_author_url'] ) ?>" />
									</div>
								</div>
							</div>
						<?php endif; ?>
						<div class="control-group">
							<div class="controls">
								<div class="input-prepend">
									<input style="width: 181px;" type="submit" class="btn btn-primary" tabindex="5" value="<?php _e('提交评论（Ctrl+Enter）'); ?>" id="misubmit"/>
								<?php comment_id_fields(); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</form>
			</div>	
			</div>
		<?php endif; ?>