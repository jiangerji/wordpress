<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'iam007');

/** MySQL数据库用户名 */
define('DB_USER', 'jiangerji');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'eMBWzH5SIFJw5I4c');

/** MySQL主机 */
define('DB_HOST', 'jiangerji.mysql.rds.aliyuncs.com');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tAf`D0hWLA9FmW:B@(#12 aTreB;c&C;V%#0!3x-BgLc7.P:i~Z-?zqRICm|U9/m');
define('SECURE_AUTH_KEY',  'J9]TF3^MJdSjSN{RiQ^+Uv@SrxWJkRXF7|qT.?VQk??Qwx{vlu0;ieI/$cj+`H,[');
define('LOGGED_IN_KEY',    '~}X02CwM7( 6?fK,gx6y_zwq69PnYA>l4RPQO2>z@-4pt#bAzFn@mY~<^bPD+N-$');
define('NONCE_KEY',        '{ik y2-8)/[{[$)^5I3*@VD?gfnRkka5#,vcvymIETlE&[> Q5+I~ }8]ASv-~I=');
define('AUTH_SALT',        '9`TWQ`><J(7-XN*Zg@ocai:e_wjJk/_e0b83k<QY9x.o=U3@Yeb~a{7N5mYQasIt');
define('SECURE_AUTH_SALT', 'k,L6j~p%-$!_6C2G~G5|7+#LQ1t*Uz&aH}2H1HdpOsOH0So`(dxD3rknb}t9`5#A');
define('LOGGED_IN_SALT',   'P)?=BUsm@S&mE`G;KLs|_b,{KUX;WcRIjN{?xX5/Lmq^q!U-e|sVrbB3>=F3]|r0');
define('NONCE_SALT',       'sVm//DMAZo?X[46+-vs7.F-Agyuc(&oW=QPTZmD*FAOx6+%.~&[-$Uu,k6F- ~s-');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'jl_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
