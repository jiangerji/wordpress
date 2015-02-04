<?php
function footer_code(){
  echo "<script type='text/javascript'>"."\n" ;
  echo pckr_option('analy');
  echo "</script>"."\n"; 
}
add_filter("wp_footer", "footer_code",100);

/**
 * Ajax 评论
 */
add_action( 'wp_ajax_nopriv_comment', 'comment_callback' );
add_action( 'wp_ajax_comment', 'comment_callback' );
function comment_callback() {
	if( 'POST' == $_SERVER['REQUEST_METHOD'] ){
		global $wpdb;
		nocache_headers();
		$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

		$post = get_post($comment_post_ID);

		if ( empty($post->comment_status) ) {
			do_action('comment_id_not_found', $comment_post_ID);
			ajax_error(__('Invalid comment status.')); // 將 exit 改為錯誤提示
		}

		// get_post_status() will get the parent status for attachments.
		$status = get_post_status($post);

		$status_obj = get_post_status_object($status);

		if ( !comments_open($comment_post_ID) ) {
			do_action('comment_closed', $comment_post_ID);
			ajax_error(__('评论已关闭!')); // 將 wp_die 改為錯誤提示
		} elseif ( 'trash' == $status ) {
			do_action('comment_on_trash', $comment_post_ID);
			ajax_error(__('Invalid comment status.')); // 將 exit 改為錯誤提示
		} elseif ( !$status_obj->public && !$status_obj->private ) {
			do_action('comment_on_draft', $comment_post_ID);
			ajax_error(__('Invalid comment status.')); // 將 exit 改為錯誤提示
		} elseif ( post_password_required($comment_post_ID) ) {
			do_action('comment_on_password_protected', $comment_post_ID);
			ajax_error(__('Password Protected')); // 將 exit 改為錯誤提示
		} else {
			do_action('pre_comment_on_post', $comment_post_ID);
		}

		$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
		$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
		$comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
		$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
		//$edit_id              = ( isset($_POST['edit_id']) ) ? $_POST['edit_id'] : null; // 提取 edit_id

		// If the user is logged in
		$user = wp_get_current_user(); //var_dump($user);
		if ( $user->exists() ) {
			if ( empty( $user->display_name ) )
				$user->display_name=$user->user_login;
			$comment_author       = $wpdb->escape($user->display_name);
			$comment_author_email = $wpdb->escape($user->user_email);
			$comment_author_url   = $wpdb->escape($user->user_url);
			if ( current_user_can('unfiltered_html') ) {
				if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
					kses_remove_filters(); // start with a clean slate
					kses_init_filters(); // set up the filters
				}
			}
		} else {
			if ( get_option('comment_registration') || 'private' == $status )
				ajax_error(__('你必须要登陆之后才可以发表评论.')); // 將 wp_die 改為錯誤提示
		}

		$comment_type = '';

		if ( get_option('require_name_email') && !$user->exists() ) {
			if ( 6 > strlen($comment_author_email) || '' == $comment_author )
				ajax_error( __('请填写昵称和邮箱.') ); // 將 wp_die 改為錯誤提示
			elseif ( !is_email($comment_author_email))
				ajax_error( __('请填写一个有效的邮箱.') ); // 將 wp_die 改為錯誤提示
		}

		if ( '' == $comment_content )
			ajax_error( __('请输入评论.') ); // 將 wp_die 改為錯誤提示


		// 增加: 檢查重覆評論功能
		$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
		if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
		$dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
		if ( $wpdb->get_var($dupe) ) {
			ajax_error(__('您已经发布过一条相同的评论!'));
		}

		// 增加: 檢查評論太快功能
		if ( $lasttime = $wpdb->get_var( $wpdb->prepare("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author = %s ORDER BY comment_date DESC LIMIT 1", $comment_author) ) ) { 
		$time_lastcomment = mysql2date('U', $lasttime, false);
		$time_newcomment  = mysql2date('U', current_time('mysql', 1), false);
		$flood_die = apply_filters('comment_flood_filter', false, $time_lastcomment, $time_newcomment);
		if ( $flood_die ) {
			ajax_error(__('请过一会再发表评论.'));
			}
		}

		$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;

		$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

        //var_dump($commentdata);

		// 新建評論
		$comment_id = wp_new_comment( $commentdata );

		$comment = get_comment($comment_id); //var_dump($comment);
		do_action('set_comment_cookies', $comment, $user);
		
		//此处非常必要，无此处下面的评论无法输出 by mufeng
		$GLOBALS['comment'] = $comment;
		
		//以下是評論式樣, 不含 "回覆". 要用你模板的式樣 copy 覆蓋.
		?>
			<li id="comment-<?php comment_ID() ?>" <?php comment_class('commenttips',$comment_id,$comment_post_ID); ?> >
				<div class="commentavatar">
					<?php echo get_avatar( get_comment_author_email(), '48'); ?>
				</div>
				<div class="commenttext">
					<div class="commentmeta">
						<span class="commentid"><?php comment_author_link();?></span>
						<span class="commenttime">评论于<?php echo time_ago(); ?></span> 				
						<?php if ($comment->comment_approved == '0') : ?>
							<span class="moderation left"><?php _e('Your comment is awaiting moderation.') ?></span>
						<?php endif; ?>
					</div>
					<div class="commentp">	
						<?php comment_text() ?>
					</div>
				</div>
		<?php die(); //以上是評論式樣, 不含 "回覆". 要用你模板的式樣 copy 覆蓋.
	}else{return;}
}

/**
 * Ajax 评论翻页
 * 
 * @return HTML
 */
add_action( 'wp_ajax_nopriv_pagenavi', 'pagenavi_callback' );
add_action( 'wp_ajax_pagenavi', 'pagenavi_callback' );
function pagenavi_callback(){
	global $post,$wp_query, $wp_rewrite;
	$postid = isset($_GET['post']) ? $_GET['post'] : null;
	$pageid = isset($_GET['page']) ? $_GET['page'] : null;
	if(!$postid || !$pageid){
		ajax_error(__('Error post id or comment page id.'));
	}
	// get comments
	$comments = get_comments('post_id='.$postid);

	$post = get_post($postid);

	if(!$comments){
		ajax_error(__('Error! can\'t find the comments'));
	}

	if( 'desc' != get_option('comment_order') ){
		$comments = array_reverse($comments);
	}

	// set as singular (is_single || is_page || is_attachment)
	$wp_query->is_singular = true;

	// base url of page links
	$baseLink = '';
	if ($wp_rewrite->using_permalinks()) {
		$baseLink = '&base=' . user_trailingslashit(get_permalink($postid) . 'comment-page-%#%', 'commentpaged');
	}

	echo '<ul class="commentlist">';
	wp_list_comments('callback=comment&type=comment&page=' . $pageid . '&per_page=' . get_option('comments_per_page'), $comments);
	echo '</ul><nav class="commentnav">';
	paginate_comments_links('prev_text=上一页&next_text=下一页&current=' . $pageid);
	echo '</nav>';
	die;
}

/**
* Ajax 错误提示
*/
function ajax_error($text) { 
    header('HTTP/1.0 500 Internal Server Error');
	header('Content-Type: text/plain;charset=UTF-8');
    echo $text;
    exit;
}