<?php function threadedComments($comments, $singleCommentOptions) {
    
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    } 
    
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
?>

<?php commentApprove($comments, $comments->mail, $comments); ?><li id="<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
?>">
    <div class="comment-author">
        <?php $comments->gravatar($singleCommentOptions->avatarSize,"http://ww1.sinaimg.cn/large/67252e9ajw1dqn0haiinwj.jpg");?> 
    </div>
    <div class="comment-meta">
       <cite class="fn"><?php $singleCommentOptions->beforeAuthor();
                $comments->author();$singleCommentOptions->afterAuthor();  ?></cite>
                
                <span class="commentdate"><a href="<?php $comments->permalink(); ?>"><?php $singleCommentOptions->beforeDate();
                $comments->date($singleCommentOptions->dateFormat);
                $singleCommentOptions->afterDate(); ?></a></span><span class="comment-reply"><?php $comments->reply($singleCommentOptions->replyWord); ?></span>
    </div>
    <div class="comment-p">
        <?php $comments->content();?>
    </div>
    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($singleCommentOptions);?>
    </div>
    <?php } ?>
</li>

<?php
}
?>



<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php $this->commentsNum(_t(''), _t('<h3>仅有一条评论</h3>'), _t('<h3>已有 %d 条评论</h3>')); ?>
            <?php $comments->pageNav(); ?>
            <?php $comments->listComments(); ?>

            <div class="comment-box">
            <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            
            <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
            </div>
            
            <div class="addcomment"></div>
            <h3 id="response"><?php _e('<b style="font-size:18px"> > </b>添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <div class="ie6show"></div>
                <div class="form-vertical">
                <p><textarea style="width:90%;float:left;margin: 0 15px 10px 10px;height: 140px;" name="text" id="comment" tabindex="1" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};"><?php $this->remember('text'); ?></textarea></p>
                </div>          
                <div class="form-vertical">
                <?php if($this->user->hasLogin()): ?>
                <div class="control-group">
                <div class="controls">
                <div class="input-prepend">             
                <label class="control-label" for="inputIcon">已经以 <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> 的身份登录. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('[退出]'); ?></a></p></label>
                </div>
                </div></div>                
                <?php else: ?>
                <div class="control-group">
                <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input style="width: 141px;"  placeholder="昵称" type="text" tabindex="2" name="author" value="<?php $this->remember('author'); ?>" />
                </div>
                </div></div>
                <div class="control-group">
                <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                    <input style="width: 141px;" placeholder="邮箱" type="text" tabindex="3" name="mail" value="<?php $this->remember('mail'); ?>" />
                </div>
                </div></div>
                <div class="control-group">
                <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-leaf"></i></span>
                    <input style="width: 141px;" placeholder="网站" type="text" tabindex="4" name="url" value="<?php $this->remember('url'); ?>" />
                </div>
                </div></div>
                <?php endif; ?>
                <div class="control-group">
                <div class="controls">
                <div class="input-prepend">
                <input style="width: 181px;" type="submit" class="btn btn-primary" tabindex="5" value="<?php _e('提交评论（Ctrl+Enter）'); ?>" id="misubmit"/>    
                </div>
                </div>
                </div></div>
                <div class="clear"></div>
            </form>
            </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="clear"></div>
            </div>
</div>