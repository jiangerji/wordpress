<?php
	// 清除评论里的Track计数
	add_filter('get_comments_number', 'mirana_comment_count', 0);
	function mirana_comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

	// 反全英文垃圾评论
	function mirana_scp_comment_post( $incoming_comment ) {
		$pattern = '/[一-龥]/u';
		if(!preg_match($pattern, $incoming_comment['comment_content'])) {
			mirana_ajax_error( "为防止垃圾评论，评论文字必须包含中文！" );
		}
		return( $incoming_comment );
	}
	add_filter('preprocess_comment', 'mirana_scp_comment_post');

	// 新窗口打开评论链接
	add_filter('get_comment_author_link', 'mirana_newwinlinks', 6);
	function mirana_newwinlinks($text) {
		$text = preg_replace('/<a (.+?)>/i', "<a $1 target='_blank'>", $text);
		return $text;
	}

	// 相对时间
	function mirana_time_ago( $type = 'commennt', $day = 30 ) {
		$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
		$timediff = time() - $d('U');
		if ($timediff <= 60*60*24*$day){
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
		}
		if ($timediff > 60*60*24*$day){
		echo  date('Y/m/d',get_comment_date('U')), ' ', get_comment_time('H:i');
		};
	}

	// 最新评论
	function mirana_recent_comments($show_comments=6) {
		$my_email = get_bloginfo ('admin_email');
		$i = 1;
		$comments = get_comments('number=50&status=approve&type=comment');
		foreach ($comments as $rc_comment) {
			if ($rc_comment->comment_author_email != $my_email) {?>
				<li class="sidcomment">
					<a href="<?php echo get_permalink($rc_comment->comment_post_ID); ?>#comment-<?php echo $rc_comment->comment_ID; ?>" title="查看完整评论">
						<?php echo get_avatar($rc_comment->comment_author_email,28); ?>
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', convert_smilies($rc_comment->comment_content))), 0, 27,"..."); ?>
					</a>
				</li>
				<?php
				if ($i == $show_comments) break;
				$i++;
			}
		}
	}

	//评论主体
	function mirana_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		global $commentcount;

		if(!$commentcount) {
			$page = get_query_var('cpage')-1;
			$cpp=get_option('comments_per_page');
			$commentcount = $cpp * $page;
		}?>

		<li id="comment-<?php comment_ID() ?>" <?php comment_class('commenttips',$comment_id,$comment_post_ID); ?> >
			<div class="commentavatar">
				<?php echo get_avatar( get_comment_author_email(), '56'); ?>
			</div>
			<div class="commenttext">
				<div class="commentmeta">
					<span class="commentid"><?php comment_author_link();?></span>
					<span class="commenttime">评论于<?php echo mirana_time_ago(); ?></span>
					<span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<span class="moderation"><?php _e('Your comment is awaiting moderation.') ?></span>
					<?php endif; ?>
				</div>
				<div class="commentp"><?php comment_text() ?></div>
			</div>
		  <?php
	}