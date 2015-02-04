<?php
/* 某段时间内最热文章
 * Reference: http://www.wprecipes.com/rarst-asked-how-to-get-most-commented-posts-of-the-week
 * Edit: zwwooooo
 */
function weekly_focus($days=7, $nums=10) { //$days参数限制时间值，单位为‘天’，默认是7天；$nums是要显示文章数量
	global $wpdb;
	$today = date("Y-m-d H:i:s"); //获取今天日期时间
	$daysago = date( "Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60) );  //Today - $days
	$result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");
	$output = '';
	if(empty($result)) { ?>
		<li class="cf"><h1>没有数据</h1></li>
<?php
	} else {
?>
	<div class="category-popular">
		<h3><i class="icon-signal" style="margin-right: 10px;font-size: 2rem;font-size: 20px;"></i>一周热点</h3>
		<ul class="category-popular__list">
<?php
		foreach ($result as $topten) {
			$postid = $topten->ID;
			$title = $topten->post_title;
			$commentcount = $topten->comment_count;
			if ($commentcount != 0) {
?>
				<li class="cf"><span><?php echo get_the_time('n/d g:H',$postid) ?></span><h1><a href="<?php get_permalink($postid)?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h1></li>
<?php
			}
		}
	}
?>
		</ul>
</div>
<?php
}
