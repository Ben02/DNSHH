<?php
function themeConfig($form) {
    $shareid = new Typecho_Widget_Helper_Form_Element_Text('shareid', NULL, '190950', _t('百度分享id'), _t('请输入您的百度分享id'));
    $form->addInput($shareid);

    $setadmin = new Typecho_Widget_Helper_Form_Element_Textarea('setadmin', NULL, "admin@example.com\nadmin@model.com", _t('博主邮箱'), _t('在这里输入邮箱，一行一个，博主的评论头像隔壁会出现黄V认证'));
    $form->addInput($setadmin);

    $setvip = new Typecho_Widget_Helper_Form_Element_Textarea('setvip', NULL, "vip@example.com\nvip@model.com", _t('认证贵宾'), _t('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现蓝V认证'));
    $form->addInput($setvip);

    $setstar = new Typecho_Widget_Helper_Form_Element_Textarea('setstar', NULL, "water@example.com\nstar@model.com", _t('灌水达人'), _t('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现红星认证'));
    $form->addInput($setstar);
  }

//获得读者墙
function getFriendWall()
{
    $db = Typecho_Db::get();
    $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
              ->from('table.comments')
              ->where('status = ?', 'approved')
              ->where('type = ?', 'comment')
              ->where('authorId = ?', '0')
              ->where('mail != ?', 'admin@ben-lab.com')   //排除自己上墙
              ->group('author')
              ->order('cnt', Typecho_Db::SORT_DESC)
              ->limit('15');    //读取几位用户的信息
    $result = $db->fetchAll($sql);
 
    if (count($result) > 0) {
        $maxNum = $result[0]['cnt'];
        foreach ($result as $value) {
            $mostactive .= '<li><a target="_blank" rel="nofollow" href="' . $value['url'] . '"><span class="pic" style="background: url(http://1.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=36&d=&r=G) no-repeat; "></span><em>' . $value['author'] . '</em><strong>+' . $value['cnt'] . '</strong><br />' . $value['url'] . '</a></li>';    
        }
        echo $mostactive;
    }
}
/**
 * 评论者认证
 *
 * @author ShingChi
 * @access public
 * @param str $email 评论者邮址
 * @return viod 
 */
function commentApprove($widget, $email = NULL, $set)
{
    if (empty($email)) return;
 
$getvip = $set->widget('Widget_Options')->setvip;
$setvip = explode("\n", $getvip);
$getadmin = $set->widget('Widget_Options')->setadmin;
$setadmin = explode("\n", $getadmin);
$getstar = $set->widget('Widget_Options')->setstar;
$setstar = explode("\n", $getstar);

    if (in_array($email, $setadmin)) {
        echo '<img class="vip" title="独一无二的博主认证" src="http://1.labcdn.sinaapp.com/cache/images/yellowv.png" width="15px"/>';
    } else if (in_array($email, $setvip)) {
        echo '<img class="vip" title="认证贵宾VIP" src="http://1.labcdn.sinaapp.com/cache/images/bluev.png" width="15px"/>';
    } else if (in_array($email, $setstar)) {
        echo '<img class="vip-water" title="灌水达人" src="http://1.labcdn.sinaapp.com/cache/images/star.png" width="17px"/>';
    }
}
//随机文章
    function theme_random_posts(){ 
        $defaults = array( 
            'number' => 5, 
            'before' => '<ul class="list">', 
            'after' => '</ul>', 
            'xformat' => '<li><a href="{permalink}">{title}</a></li>' 
        ); 
        $db = Typecho_Db::get(); 

        $sql = $db->select()->from('table.contents') 
            ->where('status = ?','publish') 
            ->where('type = ?', 'post') 
            ->limit($defaults['number']) 
            ->order('RAND()'); 
         
        $result = $db->fetchAll($sql); 
        echo $defaults['before']; 
        foreach($result as $val){ 
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val); 
            echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']); 
        } 
        echo $defaults['after']; 
    }
?>