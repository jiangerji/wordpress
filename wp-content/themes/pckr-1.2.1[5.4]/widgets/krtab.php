<?php
add_action('widgets_init', 'widget_KrTab' );
function widget_KrTab() {
	register_widget('widget_KrTab' );
}
class widget_krtab extends WP_Widget {
	function widget_krtab() {
		$option = array('classname' => 'widget_krtab', 'description' => '开启右侧Tab展示文章' );
		$this->WP_Widget(false, 'PCKr Tab展示文章 ', $option);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo KrTab();
	}
}
function KrTab(){
?>
<section class="sidebar-tab">
				<ul class="sidebar-tab__tabs cf tabs">
					<li class="tab-forum"><a data-target="#tab-forum" title="" class=""><?php echo pckr_option('tabfirsttitle'); ?></a></li>
					<li class="tab-36krplus active"><a data-target="#tab-36krplus" title="" class="active"><?php echo pckr_option('tabsecondtitle'); ?></a></li>
					<li class="tab-815"><a class="" data-target="#tab-815" title=""><?php echo pckr_option('tabthirdtitle'); ?></a></li>
				</ul>
				<div id="tabs-content" class="sidebar-tab__wrapper">
					<div id="tab-forum" class="sidebar-tab__forum tabs-pane">
						<ul>
							<?php query_posts('showposts=9&cat='.pckr_option('tabfirst')); ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<li><h2><a href="<?php the_permalink();?> " target="_blank"><?php the_title(); ?></a></h2></li>
							<?php endwhile; endif; wp_reset_query(); ?>
							<span class="tabulousclear"></span>
						</ul>
 					</div>
					<div id="tab-36krplus" class="sidebar-tab__36krplus tabs-pane active">
						<ul>
							<?php query_posts('showposts=9&cat='.pckr_option('tabsecond')); ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<li><h2><a href="<?php the_permalink();?> " target="_blank"><?php the_title(); ?></a></h2></li>
							<?php endwhile; endif; wp_reset_query(); ?>
							<span class="tabulousclear"></span>
						</ul>
					</div>
					<div id="tab-815" class="sidebar-tab__815 tabs-pane">
						<ul>
							<?php query_posts('showposts=9&cat='.pckr_option('tabthird')); ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<li><h2><a href="<?php the_permalink();?> " target="_blank"><?php the_title(); ?></a></h2></li>
							<?php endwhile; endif; wp_reset_query(); ?>
							<span class="tabulousclear"></span>
						</ul>
 					</div>
				</div>
</section>
<?php
};
