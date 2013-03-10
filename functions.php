<?php
function themeConfig($form) {
    echo('<p style="margin-bottom:14px;font-size:13px;text-align:center;">感谢您使用DNSHH主题V1.2版本！此版本更新日期：2013-03-09（<a href="http://ben-lab.com" target="_blank">检查更新</a>） 如果您喜欢这款主题，请<a href="https://me.alipay.com/donateben" target="_blank">捐助</a>我，您的支持是我最大的动力！</p>');

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('LOGO地址'), _t('在这里填入一个图片URL地址, 博客头部将显示一个LOGO；留空则以文字形式显示网站标题'));
    $form->addInput($logoUrl);

    $menuDisplay = new Typecho_Widget_Helper_Form_Element_Radio('menuDisplay', 
    array(
        'cat' => _t('分类目录'),  
        'page' => _t('独立页面')
        ), 
    'page', 
    _t('导航栏输出'));
    $form->addInput($menuDisplay);

    $thumbDisplay = new Typecho_Widget_Helper_Form_Element_Radio('thumbDisplay', 
    array(
        'display' => _t('启用'),  
        'close' => _t('禁用')
        ), 
    'display', 
    _t('略缩图显示'),_t('SAE或BAE等不兼容timthumb的用户请禁用此功能；禁用后可删除Thumbnail插件'));
    $form->addInput($thumbDisplay);

    $textDisplay = new Typecho_Widget_Helper_Form_Element_Radio('textDisplay', 
    array(
        'text' => _t('纯文本'),
        'html' => _t('包含HTML格式')
        ), 
    'text', 
    _t('摘要输出'),_t('若选择包含HTML格式则会自动禁用略缩图的显示，并且需要自行用more标签截断摘要'));
    $form->addInput($textDisplay);

    $copyDisplay = new Typecho_Widget_Helper_Form_Element_Radio('copyDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('不显示')
        ), 
    'display', 
    _t('文章版权信息'));
    $form->addInput($copyDisplay);

    $shareDisplay = new Typecho_Widget_Helper_Form_Element_Radio('shareDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('不显示')
        ), 
    'display', 
    _t('百度分享'),_t('若选择不显示则可以无视下面的百度分享id设置'));
    $form->addInput($shareDisplay);

    $shareid = new Typecho_Widget_Helper_Form_Element_Text('shareid', NULL, '190950', _t('百度分享id'), _t('请输入您的百度分享id'));
    $form->addInput($shareid);

    $pnDisplay = new Typecho_Widget_Helper_Form_Element_Radio('pnDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('不显示')
        ), 
    'display', 
    _t('前后文章'));
    $form->addInput($pnDisplay);

    $setadmin = new Typecho_Widget_Helper_Form_Element_Textarea('setadmin', NULL, "admin@example.com\nadmin@model.com", _t('博主邮箱'), _t('在这里输入邮箱，一行一个，博主的评论头像隔壁会出现黄V认证'));
    $form->addInput($setadmin);

    $setvip = new Typecho_Widget_Helper_Form_Element_Textarea('setvip', NULL, "vip@example.com\nvip@model.com", _t('认证贵宾'), _t('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现蓝V认证'));
    $form->addInput($setvip);

    $setstar = new Typecho_Widget_Helper_Form_Element_Textarea('setstar', NULL, "water@example.com\nstar@model.com", _t('灌水达人'), _t('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现红星认证'));
    $form->addInput($setstar);
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