<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option('optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings );
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
	$nmh304 = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$nocategory = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$useless = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$gravatar = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$comprhtml = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$fancybox = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$dashboard = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$focus = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$imgtext = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$weibo = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$twitter = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$facebook = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$feed = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$uselesswidgets = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$friendly = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$openthumbnails = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$timthumb = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$partner_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$about_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$joinus_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$contact_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$otherinfo_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$footer_option = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$ajaxscroll = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$twocolumn = array(
		'on' => __('开启', 'options_framework_theme'),
		'off' => __('关闭', 'options_framework_theme')
	);
	$options = array();
	$options[] = array(
		'name' => __('基本设置', 'options_framework_theme'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('网站描述', 'options_framework_theme'),
		'desc' => __('SEO设置，输入您的网站描述，一般不超过200字符', 'options_framework_theme'),
		'id' => 'desc',
		'type' => 'text');
	$options[] = array(
		'name' => __('网站统计代码', 'options_framework_theme'),
		'desc' => __('如百度统计、CNZZ、Google Analytics', 'options_framework_theme'),
		'id' => 'analy',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('网站关键词', 'options_framework_theme'),
		'desc' => __('SEO设置，输入您的网站关键词，以英文逗号(,)隔开。', 'options_framework_theme'),
		'id' => 'keywords',
		'type' => 'textarea');
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array('plugins' => 'wordpress' ),
		'teeny' => true
	);
	$options[] = array(
		'name' => __('网站Favicon地址', 'options_framework_theme'),
		'id' => 'favicon',
		'type' => 'text');
	$options[] = array(
		'name' => __('手机端下菜单名称', 'options_framework_theme'),
		'desc' => __('对应原36Kr中的“寻求报道”项目', 'options_framework_theme'),
		'id' => 'mobilemenu',
		'type' => 'text');
	$options[] = array(
		'name' => __('文章列表使用TimThumb进行截取缩略图', 'options_framework_theme'),
		'desc' => __('若您喜欢截取缩略图的方式，可开启此功能', 'options_framework_theme'),
		'id' => 'timthumb',
		'std' => 'off',
		'type' => 'radio',
		'options' => $timthumb);
	$options[] = array(
		'name' => __('网站双栏布局', 'options_framework_theme'),
		'desc' => __('开启此功能后将自动废除左侧边栏，转换为双栏布局。', 'options_framework_theme'),
		'id' => 'two-column',
		'std' => 'off',
		'type' => 'radio',
		'options' => $twocolumn);
	$options[] = array(
		'name' => __('文章内图片使用灯箱效果展示', 'options_framework_theme'),
		'desc' => __('若您的网站图片较多，可开启此选项作进一步美化。', 'options_framework_theme'),
		'id' => 'fancybox',
		'std' => 'off',
		'type' => 'radio',
		'options' => $fancybox);
	$options[] = array(
		'name' => __('主题主色设置', 'options_framework_theme'),
		'desc' => __('通过此功能可以迅速打造出一个与原网站截然不同的风格！', 'options_framework_theme'),
		'id' => 'colorpicker',
		'std' => '#51aded',
		'type' => 'color' );
	$options[] = array(
		'name' => __('主题Logo位置颜色自定义', 'options_framework_theme'),
		'desc' => __('请设置比以上略深一些的颜色', 'options_framework_theme'),
		'id' => 'colorpicker-nd',
		'std' => '#1D71B6',
		'type' => 'color' );
	$options[] = array(
		'name' => __('主题细节颜色自定义', 'options_framework_theme'),
		'desc' => __('请设置比以上略浅一些的颜色', 'options_framework_theme'),
		'id' => 'colorpicker-rd',
		'std' => '#2277b7',
		'type' => 'color' );
	$options[] = array(
		'name' => __('文章页顶部图片自动调取', 'options_framework_theme'),
		'desc' => __('默认为输入新的图片地址，但若您喜欢自动调取文章第一张图片，可开启此功能', 'options_framework_theme'),
		'id' => 'openthumbnails',
		'std' => 'off',
		'type' => 'radio',
		'options' => $openthumbnails);
	$options[] = array(
		'name' => __('手机端下菜单URL', 'options_framework_theme'),
		'desc' => __('对应原36Kr中的“寻求报道”项目所指向的URL', 'options_framework_theme'),
		'id' => 'mobilemenurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部Logo', 'options_framework_theme'),
		'desc' => __('请上传一个尺寸为80*80的Logo文件或是输入文件URL<font color="red">（白色字体，无色背景）</font>', 'options_framework_theme'),
		'id' => 'uploadlogo',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('顶部滚动Logo', 'options_framework_theme'),
		'desc' => __('请上传一个尺寸为80*60的Logo文件或是输入文件URL<font color="red">（蓝色字体，无色背景）</font>', 'options_framework_theme'),
		'id' => 'uploadlogo1',
		'type' => 'upload');
	$options[] = array(
		"name" => "缩略图自定义宽高",
  		"id" => "thumb_width",
		"desc" => "仅针对大屏幕上的缩略图大小进行调整",
  		"std" => "180px",
  		"class" => "mini",
 		"type" => "text");
	$options[] = array(
  		"id" => "thumb_height",
  		"std" => "120px",
  		"class" => "mini",
		"desc" => "请注意尺寸需要后跟单位",
 		"type" => "text");
	$options[] = array(
		'name' => __('底部是否开启', 'options_framework_theme'),
		'desc' => __('用于显示关于本站、合作伙伴等信息，可自由选择开闭。', 'options_framework_theme'),
		'id' => 'footer_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $partner_option);
	$options[] = array(
		'name' => __('合作伙伴/其他说明部分是否开启', 'options_framework_theme'),
		'desc' => __('显示于底部第三列', 'options_framework_theme'),
		'id' => 'partner_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $partner_option);
	$options[] = array(
		'name' => __('底部版权代码', 'options_framework_theme'),
		'desc' => sprintf( __('显示于底部黑色部分', 'options_framework_theme' ) ),
		'id' => 'copyright',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	$options[] = array(
		'name' => __('关于本站信息是否开启', 'options_framework_theme'),
		'desc' => __('显示于底部第一列', 'options_framework_theme'),
		'id' => 'about_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $about_option);
	$options[] = array(
		'name' => __('关于本站信息', 'options_framework_theme'),
		'desc' => sprintf( __('显示于底部第一列', 'options_framework_theme' ) ),
		'id' => 'about',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	$options[] = array(
		'name' => __('加入我们信息是否开启', 'options_framework_theme'),
		'desc' => __('显示于底部第二列', 'options_framework_theme'),
		'id' => 'joinus_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $joinus_option);
	$options[] = array(
		'name' => __('加入我们信息', 'options_framework_theme'),
		'desc' => sprintf( __('显示于底部第二列', 'options_framework_theme' ) ),
		'id' => 'joinus',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	$options[] = array(
		'name' => __('联系我们信息是否开启', 'options_framework_theme'),
		'desc' => __('显示于底部第三列', 'options_framework_theme'),
		'id' => 'contact_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $contact_option);
	$options[] = array(
		'name' => __('联系我们信息', 'options_framework_theme'),
		'desc' => sprintf( __('显示于底部第三列', 'options_framework_theme' ) ),
		'id' => 'contact',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	$options[] = array(
		'name' => __('详细信息URL', 'options_framework_theme'),
		'desc' => __('建议跳转到联系方式页面', 'options_framework_theme'),
		'id' => 'moreinfo',
		'type' => 'text');
	$options[] = array(
		'name' => __('其他说明是否开启', 'options_framework_theme'),
		'desc' => __('显示于非首页底部第三列，建议用于显示版权信息。', 'options_framework_theme'),
		'id' => 'otherinfo_option',
		'std' => 'on',
		'type' => 'radio',
		'options' => $otherinfo_option);	
	$options[] = array(
		'name' => __('其他说明', 'options_framework_theme'),
		'desc' => sprintf( __('显示于非首页底部第三列，建议用于显示版权信息。', 'options_framework_theme' ) ),
		'id' => 'otherinfo',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	/*****网站加速设置*****/
	$options[] = array(
		'name' => __('网站加速/优化设置', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('304 Not Modified Header', 'options_framework_theme'),
		'desc' => __('开启 304 Not Modified Header，提高网站效率 - 代码来自WPJAM', 'options_framework_theme'),
		'id' => 'NMH304',
		'std' => 'on',
		'type' => 'radio',
		'options' => $nmh304);
	$options[] = array(
		'name' => __('开启文章列表无限载入 AJAX 效果', 'options_framework_theme'),
		'desc' => __('优化访客体验，免翻页等待。', 'options_framework_theme'),
		'id' => 'ajaxscroll',
		'std' => 'off',
		'type' => 'radio',
		'options' => $nocategory);
	$options[] = array(
		'name' => __('去除路径中多余Category标志', 'options_framework_theme'),
		'desc' => __('No Category Base代码版，对SEO有良好效果，建议开启。', 'options_framework_theme'),
		'id' => 'nocategory',
		'std' => 'off',
		'type' => 'radio',
		'options' => $nocategory);
	$options[] = array(
		'name' => __('去除无用代码', 'options_framework_theme'),
		'desc' => __('去除WordPress不常用代码，加快网站速度。（开启后无法使用Windows Live Writer等工具发布文章）', 'options_framework_theme'),
		'id' => 'useless',
		'std' => 'off',
		'type' => 'radio',
		'options' => $useless);
	$options[] = array(
		'name' => __('提升Gravatar加载速度', 'options_framework_theme'),
		'desc' => __('通过七牛云存储强大的CDN功能，可将位于美国服务器的Gravatar下载至国内，提速效果明显', 'options_framework_theme'),
		'id' => 'gravatar',
		'std' => 'off',
		'type' => 'radio',
		'options' => $gravatar);
	$options[] = array(
		'name' => __('压缩前台HTML代码', 'options_framework_theme'),
		'desc' => __('删除WordPress输出页面多余空格，提速效果明显', 'options_framework_theme'),
		'id' => 'comprhtml',
		'std' => 'off',
		'type' => 'radio',
		'options' => $comprhtml);

	$options[] = array(
		'name' => __('移除多余WordPress后台部件', 'options_framework_theme'),
		'desc' => __('仪表盘内的WordPress新闻等部件并不经常使用，开启本功能提速效果明显', 'options_framework_theme'),
		'id' => 'dashboard',
		'std' => 'on',
		'type' => 'radio',
		'options' => $dashboard);	
	$options[] = array(
		'name' => __('SEO Friendly Images', 'options_framework_theme'),
		'desc' => __('自动给文章图片添加Alt信息，对搜索引擎更加友好', 'options_framework_theme'),
		'id' => 'friendly',
		'std' => 'on',
		'type' => 'radio',
		'options' => $friendly);	
		
	/*******菜单设置*******/
	$options[] = array(
		'name' => __('顶部导航设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('右侧白色按钮标题', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏右侧“投稿”位置', 'options_framework_theme'),
		'id' => 'header-last-button-1',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('右侧白色按钮链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-last-button-1-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('右侧蓝色按钮标题', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏右侧“登录”位置', 'options_framework_theme'),
		'id' => 'header-last-button',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('右侧蓝色按钮链接地址', 'options_framework_theme'),
		'id' => 'header-last-button-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[1]', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第一位并跟随滚动', 'options_framework_theme'),
		'id' => 'header-first',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[1]链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-first-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[2]', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第二位并跟随滚动', 'options_framework_theme'),
		'id' => 'header-second',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[2]链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-second-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[3]', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第三位并跟随滚动', 'options_framework_theme'),
		'id' => 'header-third',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[3]链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-third-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[4]', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第四位并跟随滚动', 'options_framework_theme'),
		'id' => 'header-fourth',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[4]链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-fourth-url',
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[5]', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第五位并跟随滚动', 'options_framework_theme'),
		'id' => 'header-fifth',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('顶部菜单名称[5]链接地址', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header-fifth-url',
		'type' => 'text');
		
	/*******菜单设置*******/
	$options[] = array(
		'name' => __('下拉菜单设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('彩色Topic显示数量', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第一位的下拉菜单第二项', 'options_framework_theme'),
		'id' => 'topic',
		"class" => "mini",
		'type' => 'text');
	$get = pckr_option('topic');
	for($i=1;$i<=$get;$i++) {
		$options[] = array(
		'name' => __('Topic['.$i.']链接显示名称', 'options_framework_theme'),
		'id' => 'topic'.$i,
		"class" => "mini",
		'type' => 'text');
		$options[] = array(
		'name' => __('Topic['.$i.']链接显示别名', 'options_framework_theme'),
		'id' => 'topic'.$i.'-slug',
		"class" => "mini",
		'desc' => __('别名对应" /"斜杠后内容', 'options_framework_theme'),
		'type' => 'text');
		$options[] = array(
		'name' => __('Topic['.$i.']链接地址', 'options_framework_theme'),
		'id' => 'topic'.$i.'-url',
		'type' => 'text');
		$options[] = array(
		'name' => __('Topic['.$i.']显示类型', 'options_framework_theme'),
		'desc' => __('显示类型填写内容具体请看官网【主题使用教程】', 'options_framework_theme'),
		'id' => 'topic'.$i.'-type',
		'type' => 'text');
		
	}
	$options[] = array(
		'name' => __('下拉菜单底部蓝色按钮标题', 'options_framework_theme'),
		'desc' => __('显示于下拉菜单“让您的主题出现在这里”位置', 'options_framework_theme'),
		'id' => 'dropdown-button',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('下拉菜单底部蓝色按钮链接地址', 'options_framework_theme'),
		'id' => 'dropdown-button-url',
		'type' => 'text');
		
	/*******线下活动菜单设置*******/
	$options[] = array(
		'name' => __('活动菜单设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('活动菜单标题', 'options_framework_theme'),
		'desc' => __('显示于导航第二位', 'options_framework_theme'),
		'id' => 'activity-title',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('显示数量', 'options_framework_theme'),
		'desc' => __('显示于顶部导航栏第二位的“线下活动”，不填写为不开启', 'options_framework_theme'),
		'id' => 'activity',
		"class" => "mini",
		'type' => 'text');
	$activity = pckr_option('activity');
	for($i=1;$i<=$activity;$i++) {
		$options[] = array(
		'name' => __('活动['.$i.']标题名称', 'options_framework_theme'),
		'id' => 'activity'.$i,
		"class" => "mini",
		'type' => 'text');
		$options[] = array(
		'name' => __('活动['.$i.']标题链接', 'options_framework_theme'),
		'id' => 'activity'.$i.'-url',
		"class" => "mini",
		'type' => 'text');
		$options[] = array(
		'name' => __('活动['.$i.']月份', 'options_framework_theme'),
		'id' => 'activity'.$i.'-month',
		'desc' => __('活动月份填写格式为"JAN","FEB","WEN"', 'options_framework_theme'),
		'type' => 'text');
		$options[] = array(
		'name' => __('活动['.$i.']时间', 'options_framework_theme'),
		'desc' => __('活动时间为具体天数', 'options_framework_theme'),
		'id' => 'activity'.$i.'-day',
		'type' => 'text');
		$options[] = array(
		'name' => __('活动['.$i.']地址', 'options_framework_theme'),
		'desc' => __('建议格式为“北京，中国”', 'options_framework_theme'),
		'id' => 'activity'.$i.'-address',
		'type' => 'text');
		$options[] = array(
		'name' => __('活动['.$i.']状态', 'options_framework_theme'),
		'id' => 'activity'.$i.'-status',
		"class" => "mini",
		'desc' => __('显示于活动地址的右侧', 'options_framework_theme'),
		'type' => 'text');		
		$options[] = array(
		'name' => __('活动['.$i.']是否激活', 'options_framework_theme'),
		'id' => 'activity'.$i.'-check',
		"class" => "mini",
		'desc' => __('仅可填写两个值：1、0，分别代表蓝色和灰色样式', 'options_framework_theme'),
		'type' => 'text');
	}
	$options[] = array(
		'name' => __('下拉菜单底部蓝色按钮标题', 'options_framework_theme'),
		'desc' => __('显示于下拉菜单“查看所有活动”位置', 'options_framework_theme'),
		'id' => 'dropdown-activity-button',
		"class" => "mini",
		'type' => 'text');
	$options[] = array(
		'name' => __('下拉菜单底部蓝色按钮链接地址', 'options_framework_theme'),
		'id' => 'dropdown-activity-button-url',
		'type' => 'text');
		
	/*******小工具设置*******/
	$options[] = array(
		'name' => __('小工具设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('去除无用小工具', 'options_framework_theme'),
		'desc' => __('由于没有专门给WordPress自带小工具设计样式，暂时关闭。', 'options_framework_theme'),
		'id' => 'removewidgets',
		'std' => 'on',
		'type' => 'radio',
		'options' => $uselesswidgets);
		
	$options[] = array(
		'name' => __('Tab第一列显示标题', 'options_framework_theme'),
		'desc' => __('对应36Kr中“社区新帖”部分，至多4个字', 'options_framework_theme'),
		'id' => 'tabfirsttitle',
		'class' => 'mini',
		'std' => '社区新帖',
		'type' => 'text');
	$options[] = array(
		'name' => __('Tab第一列显示内容', 'options_framework_theme'),
		'desc' => __('对应36Kr中“社区新帖”部分，请在下方输入调取分类目录ID，若需调取多个请用英文逗号(,)隔开。', 'options_framework_theme'),
		'id' => 'tabfirst',
		'type' => 'text');
	$options[] = array(
		'name' => __('Tab第二列显示标题', 'options_framework_theme'),
		'desc' => __('对应36Kr中“Startup-X”部分，至多4个字', 'options_framework_theme'),
		'id' => 'tabsecondtitle',
		'class' => 'mini',
		'std' => 'Startup-X',
		'type' => 'text');
	$options[] = array(
		'name' => __('Tab第二列显示内容', 'options_framework_theme'),
		'desc' => __('对应36Kr中“Startup-X”部分，请在下方输入调取分类目录ID，若需调取多个请用英文逗号(,)隔开。', 'options_framework_theme'),
		'id' => 'tabsecond',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Tab第三列显示标题', 'options_framework_theme'),
		'desc' => __('对应36Kr中“8点1氪”部分，至多4个字', 'options_framework_theme'),
		'id' => 'tabthirdtitle',
		'class' => 'mini',
		'std' => '8点1氪',
		'type' => 'text');
	$options[] = array(
		'name' => __('Tab第三列显示内容', 'options_framework_theme'),
		'desc' => __('对应36Kr中“8点1氪”部分，请在下方输入调取分类目录ID，若需调取多个请用英文逗号(,)隔开。', 'options_framework_theme'),
		'id' => 'tabthird',
	'type' => 'text');
	
	/*******广告/专题设置*******/
	$options[] = array(
		'name' => __('广告/专题设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('文章列表620*172专题/广告模块', 'options_framework_theme'),
		'desc' => __('展示于文章列表，有极高的点击率。', 'options_framework_theme'),
		'id' => 'focus',
		'std' => 'off',
		'type' => 'radio',
		'options' => $focus);
	$options[] = array(
		'name' => __('专题/广告标题', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'focustitle',
		'type' => 'text');
	$options[] = array(
		'name' => __('专题/广告链接', 'options_framework_theme'),
		'desc' => __('点击图片后跳转地址。', 'options_framework_theme'),
		'id' => 'focusurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('展示于第几篇文章后？', 'options_framework_theme'),
		'desc' => __('自定义专题/模块显示位置，例如输入7，则此图片出现于第七篇文章之后。', 'options_framework_theme'),
		'id' => 'focusnext',
		'type' => 'text');
	$options[] = array(
		'name' => __('专题/广告图片', 'options_framework_theme'),
		'desc' => __('请上传一个尺寸为620px*172px的图片文件或是输入文件URL。', 'options_framework_theme'),
		'id' => 'uploadfocus',
		'type' => 'upload');
	$options[] = array(
		'name' => __('文章列表620*175图文广告模块', 'options_framework_theme'),
		'desc' => __('展示于文章列表，有极高的点击率。', 'options_framework_theme'),
		'id' => 'imgtext',
		'std' => 'off',
		'type' => 'radio',
		'options' => $imgtext);
	$options[] = array(
		'name' => __('展示于第几篇文章后？', 'options_framework_theme'),
		'desc' => __('自定义图文显示位置，例如输入2，则此图片出现于第二篇文章之后。', 'options_framework_theme'),
		'id' => 'imgtextnext',
		'type' => 'text');
	$options[] = array(
		'name' => __('图文广告图片', 'options_framework_theme'),
		'desc' => __('请上传一个尺寸为100px*100px的图片文件或是输入文件URL。', 'options_framework_theme'),
		'id' => 'uploadimg',
		'type' => 'upload');
	$options[] = array(
		'name' => __('图文广告标题', 'options_framework_theme'),
		'desc' => __('用于显示产品名', 'options_framework_theme'),
		'id' => 'imgtextitle',
		'type' => 'text');
	$options[] = array(
		'name' => __('图文广告短地址', 'options_framework_theme'),
		'desc' => __('用于显示产品地址（建议输入根域名，例如www.mywpku.com输入MYWPKu.COM更为合适）', 'options_framework_theme'),
		'id' => 'imgtextsurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('图文广告地址', 'options_framework_theme'),
		'desc' => __('用于显示产品地址（建议输入完整域名，例如www.mywpku.com输入http://www.mywpku.com更为合适）', 'options_framework_theme'),
		'id' => 'imgtexturl',
		'type' => 'text');

	$options[] = array(
		'name' => __('图文广告描述', 'options_framework_theme'),
		'desc' => sprintf( __('用于显示产品描述', 'options_framework_theme' ) ),
		'id' => 'imgtextdesc',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	/*******社会化/订阅设置*******/
	$options[] = array(
		'name' => __('社会化/订阅设置', 'options_framework_theme'),
		'type' => 'heading' );
	$options[] = array(
		'name' => __('二维码描述', 'options_framework_theme'),
		'desc' => __('显示于图片上方，一般为对图片的描述。', 'options_framework_theme'),
		'id' => 'qrtext',
		'type' => 'text');
	$options[] = array(
		'name' => __('二维码图片', 'options_framework_theme'),
		'desc' => __('请上传一个尺寸为200*200的二维码图片文件或是输入文件URL', 'options_framework_theme'),
		'id' => 'qrcode',
		'type' => 'upload');
	$options[] = array(
		'name' => __('新浪微博', 'options_framework_theme'),
		'desc' => __('展示于左侧二维码下方', 'options_framework_theme'),
		'id' => 'Weibo',
		'std' => 'on',
		'type' => 'radio',
		'options' => $weibo);
	$options[] = array(
		'name' => __('新浪微博地址', 'options_framework_theme'),
		'desc' => __('请输入新浪微博地址（带http://）', 'options_framework_theme'),
		'id' => 'weibourl',
		'type' => 'text');
	$options[] = array(
		'name' => __('新浪微博提示', 'options_framework_theme'),
		'desc' => __('鼠标移动至图标后出现的Tooltip效果，必填', 'options_framework_theme'),
		'id' => 'weibotip',
		'type' => 'text');
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('展示于左侧二维码下方', 'options_framework_theme'),
		'id' => 'Twitter',
		'std' => 'off',
		'type' => 'radio',
		'options' => $twitter);
	$options[] = array(
		'name' => __('Twitter地址', 'options_framework_theme'),
		'desc' => __('请输入Twitter地址（带http://）', 'options_framework_theme'),
		'id' => 'twitterurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('Twitter提示', 'options_framework_theme'),
		'desc' => __('鼠标移动至图标后出现的Tooltip效果，必填', 'options_framework_theme'),
		'id' => 'twittertip',
		'type' => 'text');
	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('展示于左侧二维码下方', 'options_framework_theme'),
		'id' => 'Facebook',
		'std' => 'off',
		'type' => 'radio',
		'options' => $facebook);
	$options[] = array(
		'name' => __('Facebook地址', 'options_framework_theme'),
		'desc' => __('请输入Facebook地址（带http://）', 'options_framework_theme'),
		'id' => 'facebookurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('Facebook提示', 'options_framework_theme'),
		'desc' => __('鼠标移动至图标后出现的Tooltip效果，必填', 'options_framework_theme'),
		'id' => 'facebooktip',
		'type' => 'text');
	$options[] = array(
		'name' => __('Feed订阅', 'options_framework_theme'),
		'desc' => __('展示于左侧二维码下方', 'options_framework_theme'),
		'id' => 'Feed',
		'std' => 'on',
		'type' => 'radio',
		'options' => $feed);
	$options[] = array(
		'name' => __('Feed订阅地址', 'options_framework_theme'),
		'desc' => __('请输入Feed订阅地址（带http://）', 'options_framework_theme'),
		'id' => 'feedurl',
		'type' => 'text');
	$options[] = array(
		'name' => __('Feed订阅提示', 'options_framework_theme'),
		'desc' => __('鼠标移动至图标后出现的Tooltip效果，必填', 'options_framework_theme'),
		'id' => 'feedtip',
		'type' => 'text');
		
	
	return $options;
}