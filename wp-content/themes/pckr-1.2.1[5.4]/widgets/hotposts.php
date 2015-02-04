<?php   
class HotPosts extends WP_Widget{   
    function HotPosts(){   
        $widget_ops = array('classname'=>'widget_HotPosts','description'=>'显示热门文章');   
        $this->WP_Widget(false,'PCKr 热门文章',$widget_ops);   
    }   
    //表单   
    function form($instance){   
        $instance = wp_parse_args((array)$instance,array(   
        'title'=>'PCKr 热门文章','showPosts'=>10   
        ));   
        $title = htmlspecialchars($instance['title']);   
        $HotPosts = htmlspecialchars($instance['HotPosts']);   
        $output = '<table>';   
        $output .= '</td></tr><tr><td>显示数量：</td><td>';   
        $output .= '<input id="'.$this->get_field_id('HotPosts') .'" name="'.$this->get_field_name('HotPosts').'" type="text" value="'.$instance['HotPosts'].'" />';   
        $output .= '</td></tr></table>';   
        echo $output;   
    }   
       
    function update($new_instance,$old_instance){   
        $instance = $old_instance;   
        $instance['HotPosts'] = strip_tags(stripslashes($new_instance['HotPosts']));   
        return $instance;   
    }   
       
    function widget($args,$instance){   
        extract($args);   
        $title = apply_filters('widget_title',empty($instance['title']) ? '&nbsp;' : $instance['title']);   
        $HotPosts = empty($instance['HotPosts']) ? 10 : $instance['HotPosts'];      
        $this->get_HotPosts($HotPosts);   
    }   
    function get_HotPosts($HotPosts){  
	?>
	<section class="sidebar-popular cf">
				<h3>热门文章</h3>
                <?php
                $query_data = array(
                  'posts_per_page' => $HotPosts, // 顯示的文章數量
                  'orderby' => 'comment_count'
                    );
                $post_list = new WP_Query($query_data);
                ?>
				<div class="sidebar-popular__list">
				<?php while( $post_list->have_posts() ) { $post_list->the_post(); global $post; ?>
                <article class="sidebar-popular__posts cf">
                    <div class="meta"></div>
                    <div class="image thumb-60 left"><img  class='image lazyload' src="http://static.mywpku.com/blank.gif" data-src="<?php echo mmimg(get_the_ID()) ?>" alt="<?php the_title(); ?>"></div>
                    <h1><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                </article>
				<?php } ?>
				</div>
                <?php wp_reset_query(); ?>
	</section>
<?php	
	

    }     
}   
  
function HotPosts(){   
    register_widget('HotPosts');   
}   
add_action('widgets_init','HotPosts');   
