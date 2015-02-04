<?php  
add_action('widgets_init', 'HotTags' );
function HotTags() {
	register_widget('HotTags' );
}
class HotTags extends WP_Widget {
	function HotTags() {
	$control_ops = '';
		$widget_ops = array('classname' => 'widget_hottags', 'description' => '按点击量显示标签' );
		$this->WP_Widget('HotTags', 'PCKr 热门标签', $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$count = apply_filters('widget_name', $instance['count']);
		get_HotTags($count);
	}
	function form($instance) {
?>
		<p>
			<label>
				显示数量：
				<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $instance['count']; ?>" class="widefat" />
			</label>
		</p>
<?php
	}
}
?>
<?php
  function get_HotTags($HotTags){   
	echo '<section class="aside-tags">
				<ul class="aside-tags__list cf">
					<li>';
				$args = array(
'number'                    => $HotTags,  
'smallest'                  => 16, 
'largest'                   => 16,
'unit'                      => 'px', 
'separator'                 => "</li><li>",
'orderby'                   => 'count', 
'order'                     => 'DESC',
'exclude'                   => null, 
'include'                   => null, 
'topic_count_text_callback' => default_topic_count_text,
'link'                      => 'view', 
'taxonomy'                  => 'post_tag', 
'echo'                      => true,
'child_of'                   => null
); 
				 
				wp_tag_cloud($args);
	echo '
				</li>
				</ul>
				
			</section>';
    }     
