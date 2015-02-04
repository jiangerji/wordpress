<?php 
//主题安装多说提示
add_action('admin_notices', 'showAdminMessages');
function showAdminMessages()
{
	$plugin_messages = array();
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if(!is_plugin_active('duoshuo/duoshuo.php' ))
	{
		$plugin_messages[] = 'PCKr 主题需要<a href="http://wordpress.org/plugins/duoshuo/">多说</a>或其它第三方评论系统支持。';
	}
	if(count($plugin_messages) > 0)
	{
		echo '
<div id="message" class="error">';
			foreach($plugin_messages as $message)
			{
				echo '
<p>'.$message.'</p>
';
			}
		echo '</div>
';
	}
}
?>
