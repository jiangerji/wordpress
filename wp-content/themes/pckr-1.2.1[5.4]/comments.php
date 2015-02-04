<div id="comments">

	<?php //trackbacks
		if (function_exists('wp_list_comments')) {
			$trackbacks = $comments_by_type['pings'];
		} else {
			$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
		}
	?>


		<?php if($comments) : ?>

			<?php if ( function_exists('wp_list_comments') ) : ?>

					<div id="loading-comments"><span class="spinner"><span class="spinner-icon"></span></span>Loading ....</div>
					<ul class="commentlist"><?php wp_list_comments('type=comment&callback=mirana_comment&max_depth=10000'); ?></ul>
					<nav class="commentnav"><?php paginate_comments_links('prev_text=上一页&next_text=下一页');?></nav>

			<?php endif; ?>

		<?php endif; ?>


		<?php if(comments_open()) : ?>

			<div id="respond">

					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="comm_frm">

						<div id="text-area">
							<textarea name="comment" id="comment" rows="10" tabindex="4" placeholder="输入评论内容..."></textarea>
						</div>

						<div class="submitdiv clearfix">
							<div class="submitcom">
							<?php if($user_ID) : ?>

							<!--已登录-->
							<div class="welcomediv">
								<div class="welcometip">
									<?php echo get_avatar( get_the_author_email(), 28 ); ?>
									<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" class="profile"><?php echo $user_identity; ?></a><span style="margin:0 10px">/</span><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" class="logout">登出？</a>
								</div>
								<input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" />
							</div>

							<?php else : ?>

							<!--未登录-->
							<div class="welcomediv">
								<?php if ( $comment_author != "" ) : ?>
									<script type="text/javascript">function setStyleDisplay(id, status){document.getElementById(id).style.display = status;}</script>
									<div class="welcometip">
									<?php printf(__('你好，%s，欢迎回来！'), $comment_author) ?>
									<div id="showinfo"><a href="javascript:setStyleDisplay('comboxinfo','');setStyleDisplay('showinfo','none');setStyleDisplay('hideinfo','');"><?php _e('修改资料 &raquo;'); ?></a></div>
									<div id="hideinfo"><a href="javascript:setStyleDisplay('comboxinfo','none');setStyleDisplay('showinfo','');setStyleDisplay('hideinfo','none');"><?php _e('关闭 &raquo;'); ?></a></div>
									</div>
								<?php else : ?>
									<div class="welcometip"><?php printf(__('你目前的身份是游客，评论请输入昵称和电邮！'), $comment_author) ?></div>
								<?php endif; ?>
								<input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" />
							</div>

							<section id="comboxinfo">
								<div class="cominfodiv cominfodiv-author"><label for="author" class="author">昵称：</label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /></div>
								<div class="cominfodiv cominfodiv-email"><label for="email" class="email">邮箱：</label><input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /></div>
								<div class="cominfodiv cominfodiv-url"><label for="url" class="url">网址：</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></div>
							</section>
							<?php if ( $comment_author != "" ) : ?>
								<script type="text/javascript">setStyleDisplay('hideinfo','none');setStyleDisplay('comboxinfo','none');</script>
							<?php endif; ?>
							<?php endif; ?>
							<?php comment_id_fields(); ?></div>
							<div id="cancel_comment_reply"><?php cancel_comment_reply_link('取消回复') ?></div>
						</div>
						<?php do_action('comment_form', $post->ID); ?>

					</form>

			</div><!--end respond-->

		<?php endif; ?>

</div><!--end comments-->