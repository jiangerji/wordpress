<?php   
class LatestPosts extends WP_Widget{   
    function LatestPosts(){   
        $widget_ops = array('classname'=>'widget_LatestPosts','description'=>'显示最新文章');   
        $this->WP_Widget(false,'PCKr 最新文章',$widget_ops);   
    }   
    //表单   
    function form($instance){   
        $instance = wp_parse_args((array)$instance,array(   
        'title'=>'PC-36Kr 最新文章','showPosts'=>10   
        ));   
        $title = htmlspecialchars($instance['title']);   
        $LatestPosts = htmlspecialchars($instance['LatestPosts']);   
        $output = '<table>';   
        $output .= '</td></tr><tr><td>显示数量：</td><td>';   
        $output .= '<input id="'.$this->get_field_id('LatestPosts') .'" name="'.$this->get_field_name('LatestPosts').'" type="text" value="'.$instance['LatestPosts'].'" />';   
        $output .= '</td></tr></table>';   
        echo $output;   
    }   
       
    function update($new_instance,$old_instance){   
        $instance = $old_instance;   
        $instance['LatestPosts'] = strip_tags(stripslashes($new_instance['LatestPosts']));   
        return $instance;   
    }   
       
    function widget($args,$instance){   
        extract($args);   
        $title = apply_filters('widget_title',empty($instance['title']) ? '&nbsp;' : $instance['title']);   
        $LatestPosts = empty($instance['LatestPosts']) ? 10 : $instance['LatestPosts'];      
        $this->get_LatestPosts($LatestPosts);   
    }   
    function get_LatestPosts($LatestPosts){   
	echo '<section class="aside-today">
							<h2 class="aside-today__title">最近更新<span>+'.$LatestPosts.'</span></h2>
							<ul class="aside-today__list"> ';
							?>
	<?php query_posts('showposts='.$LatestPosts); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<li>
			<div class="topic"><span><a href="<?php the_permalink();?>"><img style="margin-bottom: 5px;" alt="<?php the_title() ;?>"  src="<?php echo mmimg(get_the_ID()) ?>" ></a><?php $category = get_the_category(); if($category[0]){echo '<a class="'.random_color().'"  href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a> / '; echo $category[0]->slug;}?></span></div>
			<h1><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>
	</li>
	<?php endwhile; endif; wp_reset_query(); ?>
<?php
	echo '							
							</ul>
			</section>';
    }     
}   
  
function LatestPosts(){   
    register_widget('LatestPosts');   
}   
add_action('widgets_init','LatestPosts');   
