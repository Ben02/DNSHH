<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __('DNSHH主题设置', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('DNSHH V1.2', 'options_framework_theme'),
		'desc' => __('<p style="font-size:13px;">感谢您使用DNSHH主题！此版本更新日期：2013-03-09（<a href="http://ben-lab.com/typecho/1805.html" target="_blank">检查更新</a>） 如果您喜欢这款主题，请考虑捐助我，您的支持是我最大的动力！</p>', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('LOGO地址', 'options_framework_theme'),
		'desc' => __('在这里填入一个图片URL地址, 博客头部将显示该LOGO；留空则以文字形式显示网站标题', 'options_framework_theme'),
		'id' => 'logourl',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('导航栏输出', 'options_framework_theme'),
		'id' => 'menudisplay',
		'std' => 'page',
		'type' => 'radio',
		'options' => array(
					'cat' => __('分类目录', 'options_framework_theme'),
					'page' => __('独立页面', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('略缩图显示', 'options_framework_theme'),
		'desc' => __('SAE或BAE等不兼容timthumb的用户请禁用此功能','options_framework_theme'),
		'id' => 'thumbdisplay',
		'std' => 'display',
		'type' => 'radio',
		'options' => array(
					'display' => __('启用', 'options_framework_theme'),
					'close' => __('禁用', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('摘要输出', 'options_framework_theme'),
		'desc' => __('若选择包含HTML格式则会自动禁用略缩图的显示，并且需要自行用more标签截断摘要','options_framework_theme'),
		'id' => 'textdisplay',
		'std' => 'text',
		'type' => 'radio',
		'options' => array(
					'text' => __('纯文本', 'options_framework_theme'),
					'html' => __('包含HTML格式', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('文章版权信息', 'options_framework_theme'),
		'id' => 'copydisplay',
		'std' => 'display',
		'type' => 'radio',
		'options' => array(
					'display' => __('显示', 'options_framework_theme'),
					'close' => __('不显示', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('百度分享', 'options_framework_theme'),
		'desc' => __('若选择不显示则可以无视下面的百度分享id设置', 'options_framework_theme'),
		'id' => 'sharedisplay',
		'std' => 'display',
		'type' => 'radio',
		'options' => array(
					'display' => __('显示', 'options_framework_theme'),
					'close' => __('不显示', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('百度分享id', 'options_framework_theme'),
		'desc' => __('请输入您的百度分享id', 'options_framework_theme'),
		'id' => 'shareid',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('前后文章', 'options_framework_theme'),
		'id' => 'pndisplay',
		'std' => 'display',
		'type' => 'radio',
		'options' => array(
					'display' => __('显示', 'options_framework_theme'),
					'close' => __('不显示', 'options_framework_theme')
					));

	$options[] = array(
		'name' => __('博主邮箱', 'options_framework_theme'),
		'desc' => __('在这里输入邮箱，一行一个，博主的评论头像隔壁会出现黄V认证', 'options_framework_theme'),
		'id' => 'setadmin',
		'std' => "admin@example.com\nadmin@model.com",
		'type' => 'textarea');

	$options[] = array(
		'name' => __('认证贵宾', 'options_framework_theme'),
		'desc' => __('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现蓝V认证', 'options_framework_theme'),
		'id' => 'setvip',
		'std' => "vip@example.com\nvip@model.com",
		'type' => 'textarea');

	$options[] = array(
		'name' => __('灌水达人', 'options_framework_theme'),
		'desc' => __('在这里输入邮箱，一行一个，邮箱拥有者的评论头像隔壁会出现红星认证', 'options_framework_theme'),
		'id' => 'setstar',
		'std' => "water@example.com\nstar@model.com",
		'type' => 'textarea');

	return $options;
}